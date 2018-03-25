<?php

namespace SilbinaryWolf\Components;

use Exception;
use InvalidArgumentException;
use Debug;
use DBField;
use SSViewer;
use Injector;
use HTMLText;

class TemplateParserComponentProvider
{
    /**
     * @return string
     */
    public static function componentTemplate($res)
    {
        if (!isset($res['Arguments']) || !isset($res['Arguments'][0])) {
            throw new InvalidArgumentException('A component name must be passed into <% component MyComponentName %>');
        }
        $componentNameText = $res['Arguments'][0]['text'];
        $parts = preg_split('/\s+/', $componentNameText);
        $componentName = $parts[0];
        if (isset($parts[1])) {
            throw new InvalidArgumentException('Component name cannot have spaces. You also must have a comma after the component name. You have: '.$componentNameText);
        }
        unset($res['Arguments'][0]);

        // Add parameters
        $properties = array(
            'Children' => '',
        );
        foreach ($res['Arguments'] as $i => $argument) {
            $argumentNumber = $i - 1;
            $originalText = $argument['php'];
            $text = $originalText;
            if ($text[0] === '\''
                && $text[strlen($text)-1] === '\''
            ) {
                $text = substr($text, 1, -1);
            }
            $varNameAndValue = explode('=', $text);
            if (!isset($varNameAndValue[1])
                || isset($varNameAndValue[2])
            ) {
                throw new InvalidArgumentException('Argument #'.$argumentNumber.' is incorrectly formatted. Expected something like \'MyArgument=This String!\' or \'MyArgument=$MyVar\', instead got '.$originalText.'.');
            }
            $varName = $varNameAndValue[0];
            $value = $varNameAndValue[1];
            if (!$value) {
                throw new InvalidArgumentException('Argument #'.$argumentNumber.' is incorrectly formatted. Expected something like \'MyArgument=This String!\' or \'MyArgument=$MyVar\', instead got '.$originalText.'.');
            }
            $properties[$varName] = $value;
        }

        $componentClass = Component::class;
        $htmlTextClass = HTMLText::class;

        // Add HTML within the block as $Children variable
        $childrenText = $res['Template']['text'];
        $hasChildren = trim($childrenText);
        if ($hasChildren) {
            $children = DBField::create_field($htmlTextClass, $childrenText);
            $properties['Children'] = $children;
        }

        // Output PHP code for setting the array of properties
        $propertiesAsPHPCode = 'array(';
        foreach ($properties as $name => $value) {
            $propertiesAsPHPCode .= "\n";
            if ($value instanceof HTMLText) {
                $propertiesAsPHPCode .= "'".$name."' => DBField::create_field('".$htmlTextClass."', '".$value."'),";
                continue;
            }
            // Detect variables
            if ($value && $value[0] === '$') {
                $value = substr($value, 1);
                $propertiesAsPHPCode .= "'".$name."' => \$scope->getObj('".$value."'),";
                continue;
            }
            // Detect numeric values
            if ($value
                && $value[0] === '0' || $value[0] === '1' || $value[0] === '2'
                || $value[0] === '3' || $value[0] === '4' || $value[0] === '5'
                || $value[0] === '6' || $value[0] === '7' || $value[0] === '8'
                || $value[0] === '9'
            ) {
                if (!is_numeric($value)) {
                    throw new InvalidArgumentException('Invalid value: "'.$value.'", Property "'.$name.'" cannot start with a number followed by non-numbers.');
                }
                $propertiesAsPHPCode .= "'".$name."' => ".$value.",";
                continue;
            }
            // Detect escaping variables
            if ($value && $value[0] === '\\'
                && isset($value[1]) && $value[1] === '$'
            ) {
                $value = substr($value, 1);
            }
            $propertiesAsPHPCode .= "'".$name."' => '".$value."',";
        }
        $propertiesAsPHPCode .= "\n)";


        return <<<PHP
\$val .= Injector::inst()->createWithArgs('$componentClass', array('$componentName', $propertiesAsPHPCode))->process();
PHP;
    }
}
