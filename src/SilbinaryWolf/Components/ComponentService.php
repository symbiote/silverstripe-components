<?php

namespace SilbinaryWolf\Components;

use SSViewer;
use SSViewer_Scope;
use HTMLText;
use Injector;
use SSTemplateParser;
use SSTemplateParseException;
use ArrayData;
use Debug;

class ComponentService
{
    /**
     * @param array            $res
     * @param SSTemplateParser $parser
     * @return string The PHP code to insert into the cached SS template file
     */
    public function generateTemplateCode(array $res, $parser)
    {
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

            // Modify provided PHP code
            $ifValueParts = explode('[_CPB]', $valueParts);
            $phpCode = "\$_props['".$propertyName."'] = array();\n";
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
                //$value = str_replace(array("''.", ".''"), '', $value);
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
                        $phpCode .= $valuePart."\n";
                        continue;
                    }
                    $phpCode .= "\$_props['".$propertyName."'][] = ".$valuePart.";\n";
                    //$propertyCode .= $valuePart.',';
                }
                //$propertyCode = substr($propertyCode, 0, -1);
                //$propertyCode = 'array('.$propertyCode.')';
                //$propertyCode = 'Injector::inst()->createWithArgs(\'SilbinaryWolf\\Components\\DBComponentField\', array('.$propertyCode.'))';
                /*if (strpos($value, '$val .=') !== false) {
                    $value = str_replace('$val .=', '$_props[\''.$propertyName.'\'][] =', $value);
                    $phpCode .= $value."\n";
                    continue;
                }
                $phpCode .= '$_props[\''.$propertyName.'\'][] = '.$propertyCode.";\n";*/
            }
            $phpCode .= "\$_props['".$propertyName."'] = Injector::inst()->createWithArgs('SilbinaryWolf\\Components\\DBComponentField', array('".$propertyName."', \$_props['".$propertyName."']));\n";
            $arguments[$propertyName] = $phpCode;
            //$arguments[$propertyName] = "Injector::inst()->createWithArgs('SilbinaryWolf\\Components\\DBComponentField', array(".$phpCode."))";
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
        return $result;
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
