<?php

namespace SilbinaryWolf\Components;

use Exception;
use SSViewer;
use SSViewer_Scope;
use HTMLText;
use Text;
use Injector;
use SSTemplateParser;
use SSTemplateParseException;
use ArrayList;
use ArrayData;
use Debug;
use SS_List;
use DataObject;
use StringField;

class ComponentService
{
    const DEBUG_JSON_CODE_OUTPUT = false;
    /**
     * @param array            $res
     * @param SSTemplateParser $parser
     * @return string The PHP code to insert into the cached SS template file
     */
    public function generateTemplateCode(array $res, $parser)
    {
        $debugHasUsedJSON = false;

        $componentName = $res['ComponentName']['text'];
        $arguments = array();
        $resArguments = isset($res['arguments']) ? $res['arguments'] : array();
        foreach ($resArguments as $i => $phpOutput) {
            // Extract property / values from parser information
            $propertyAndValue = explode('=>', $phpOutput);
            $propertyName = trim($propertyAndValue[0]);
            $valueParts = $propertyAndValue[1];

            $propertyName = trim($propertyName, '\'');
            $propertyName = trim($propertyName, '"');

            if (strpos($valueParts, '<% if') !== false) {
                // NOTE(Jake): 2018-03-31
                //
                // This could be improved to figure out the exact line number of
                // this error. However I think the below message is reasonable
                // enough to debug.
                //
                throw new SSTemplateParseException('Missing < % end_if % > inside property "'.$propertyName.'" on component "'.$componentName.'"', $parser);
            }
            if (strpos($valueParts, '<% loop') !== false) {
                throw new SSTemplateParseException('Cannot use < % loop % > inside property "'.$propertyName.'" on component "'.$componentName.'"', $parser);
            }

            //
            $phpCodeValueParts = array();
            if ($propertyName &&
                $propertyName[0] === '_') {
                // Handle special variable (ie. prefixed with _)
                $propertyNameWithPrefix = $propertyName;
                $propertyName = substr($propertyNameWithPrefix, 1);
                switch ($propertyName) {
                    case 'json':
                        $jsonString = $valueParts;
                        $jsonString = trim($jsonString);
                        $jsonString = trim($jsonString, '\'');
                        $jsonString = trim($jsonString, '"');
                        // NOTE(Jake): 2018-08-03
                        //
                        // - Allow use of ' characters.
                        // - Allow use of " characters.
                        //
                        // See ComponentTest::testJSONEscapedCharacters() for examples.
                        //
                        $jsonString = str_replace(array("\\\\\\'", '\\\\"'), array("'", '\\"'), $jsonString);
                        $jsonData = @json_decode($jsonString, true);
                        if (json_last_error() !== JSON_ERROR_NONE) {
                            // todo(Jake): 2018-08-03
                            //
                            // See if we can use an alterate parser that can give better error messages.
                            //
                            switch (json_last_error()) {
                                case JSON_ERROR_SYNTAX:
                                    throw new SSTemplateParseException('JSON Syntax error, did you quote all the property names and remove trailing commas? I suggest running the following through a JSON validator online.'."\n".$jsonString, $parser);
                                    break;
                            }
                            throw new SSTemplateParseException('JSON '.json_last_error_msg()."\n".$jsonString, $parser);
                        }
                        foreach ($jsonData as $propertyName => $value) {
                            if (is_array($value)) {
                                // export valid template logic for nested data
                                $value = self::exportNestedDataForTemplates($value);
                            }
                            $phpCodeValueParts[] = "\$_props['".$propertyName."'][] = ".$value.";";
                        }
                        $debugHasUsedJSON = true;
                        break;

                    default:
                        throw new SSTemplateParseException('Invalid special property type: "'.$propertyNameWithPrefix.'", properties that start with a _ are reserved for special functionality. Available special property types are: "_json".', $parser);
                        break;
                }
            } else {
                // Modify provided PHP code
                $ifValueParts = explode('[_CPB]', $valueParts);
                foreach ($ifValueParts as $value) {
                    $value = trim($value);
                    // NOTE(Jake): 2018-04-29
                    //
                    // Remove blank string concats from template. This is to avoid an object from
                    // being cast to a string, like getAttributesHTML().
                    //
                    // We want to avoid this so that in SS4, there attributes aren't double quoted as
                    // HTML is escaped by default.
                    //
                    $valueParts = explode('[_CFP]', $value);
                    foreach ($valueParts as $valuePart) {
                        if ($valuePart === "''") {
                            // Skip empty string parts
                            continue;
                        }
                        $valuePart = trim($valuePart);
                        if (strpos($valuePart, '$val .=') !== false) {
                            if (strpos($valuePart, 'XML_val(') !== false) {
                                // NOTE(Jake): 2018-04-29, This hack is for inside an <% if %>
                                $valuePart = str_replace(array('XML_val(', ';'), array('obj(', '->self();'), $valuePart);
                            }
                            $valuePart = str_replace('$val .=', '$_props[\''.$propertyName.'\'][] =', $valuePart);
                            $phpCodeValueParts[] = $valuePart;
                            //$phpCode .= $valuePart."\n";
                            continue;
                        }
                        $valuePart = "\$_props['".$propertyName."'][] = ".$valuePart.";";
                        $phpCodeValueParts[] = $valuePart;
                        //$phpCode .= $valuePart."\n";
                    }
                }
            }

            //
            $phpCode = "";
            if (count($phpCodeValueParts) === 1) {
                //$phpCode .= "\$_props['".$propertyName."'] = \$_props['".$propertyName."'][0];\n";
                $phpCode = "\$_props['".$propertyName."'] = array();\n";
                $phpCode .= $phpCodeValueParts[0]."\n";
                //$phpCode .= "\$_props['".$propertyName."'] = \$_props['".$propertyName."'][0];\n";
            } else {
                $phpCode = "\$_props['".$propertyName."'] = array();\n";
                foreach ($phpCodeValueParts as $phpCodeValuePart) {
                    $phpCode .= $phpCodeValuePart."\n";
                }
                //$phpCode .= "\$_props['".$propertyName."'] = Injector::inst()->createWithArgs('SilbinaryWolf\\Components\\DBComponentField', array('".$propertyName."', \$_props['".$propertyName."']));\n";
            }
            $phpCode .= "\$_props['".$propertyName."'] = Injector::inst()->get('SilbinaryWolf\\Components\\ComponentService')->createProperty('".$propertyName."', \$_props['".$propertyName."']);\n";
            $arguments[$propertyName] = $phpCode;
        }

        // Output "children" php code
        $value = isset($res['Children']['php']) ? $res['Children']['php'] : '';
        if ($value) {
            if (isset($arguments['children'])) {
                throw new SSTemplateParseException('Cannot use "children" as a property name and have inner HTML.', $parser);
            }
            $value = "\$_props['children'] = '';\n".$value;
            $value = str_replace("\$val .=", "\$_props['children'] .=", $value);
            $value .= "\$_props['children'] = DBField::create_field('HTMLText', \$_props['children']);\n";
            $arguments['children'] = $value;
        }

        // Output PHP code for setting properties
        $result = "\$_props = array();\n";
        foreach ($arguments as $propertyName => $phpCode) {
            $result .= $phpCode;
        }
        $result .= <<<PHP
\$val .= Injector::inst()->get('SilbinaryWolf\\Components\\ComponentService')->renderComponent('$componentName', \$_props, \$scope);
unset(\$_props);
PHP;
        if (self::DEBUG_JSON_CODE_OUTPUT &&
            $debugHasUsedJSON) {
            var_dump($result);
            throw new Exception('Debug stop.');
        }
        return $result;
    }

    /**
     * Recursively replace nonassociative arrays with ArrayListExportable and
     * output with 'var_export' to produce template logic for the nested data.
     *
     * @param array     $array      The nested data to export
     * @param bool      $root       Ignore this
     * @return string               Executable template logic
     */
    private static function exportNestedDataForTemplates(array $array, $root = true)
    {
        // depth first
        foreach ($array as $prop => &$value) {
            if (is_array($value)) {
                $value = self::exportNestedDataForTemplates($value, false);
            }
        }
        unset($value);

        // json data expected to be keyed with ints, over the usual strings
        if (isset($array[0])) {
            // replace array with exportable array list
            $array = new ArrayListExportable($array);
        }

        return $root ? var_export($array, true) : $array;
    }

    /**
     * @return DBComponentField|SS_List|DataObject|ArrayData
     */
    public function createProperty($name, array $parts)
    {
        // NOTE(Jake): 2018-05-11
        //
        // If in a component, only 1 variable is passed, like so:
        // - <:Comp attribute="$AListVariable">
        //
        // This is so you can use DataLists in a component or the like.
        //
        // The 'instanceof' checks are only really necessary to cast patch "getAttributesHTML"
        // in SilverStripe 3.X. They can probably be removed in favour of just returning $parts[0]
        // in SilverStripe 4.X.
        //
        if (count($parts) === 1) {
            if (!($parts[0] instanceof StringField)) {
                return $parts[0];
            }
            if (($parts[0] instanceof Text)) {
                return $parts[0]->RAW();
            }
        }
        return Injector::inst()->createWithArgs('SilbinaryWolf\Components\DBComponentField', array($name, $parts));
    }

    /**
     * Render a component
     *
     * @param  string         $name
     * @param  array          $props
     * @param  SSViewer_Scope $scope
     * @return HTMLText
     */
    public function renderComponent($name, array $props, SSViewer_Scope $scope)
    {
        $result = Injector::inst()->createWithArgs('SSViewer', array($name));
        $data = new ComponentData($name, $props);
        $result = $result->process($data);
        // todo(Jake): 2018-03-31
        //
        // Perhaps make this class extend "Object" and add an extension point.
        // $this->extend('updateRenderComponent', $result, $name, $props, $scope);
        //
        return $result;
    }
}

/**
 * Used in place of ArrayList when preparing nested arrays for export for SS templates.
 *
 * var_export calls '__set_state' on classes, so it produces code like:
 *
 *      ArrayList::__set_state(array('items' => [...]))
 *
 * And because ArrayList doens't implement '__set_state', executing the code throws errors.
 * So we work around this by using an ArrayListExportable to produce:
 *
 *      ArrayListExportable::__set_state(array('items' => [...]))
 *
 * And implement '__set_state' to return a constructed ArrayList.
 */
class ArrayListExportable
{
    public function __construct($array = array())
    {
        // need to store items for var_export to recurse
        $this->items = $array;
    }

    public static function __set_state ($array)
    {
        // when executed, we naruto-style body-replace with in an ArrayList
        return new ArrayList($array['items']);
    }
}