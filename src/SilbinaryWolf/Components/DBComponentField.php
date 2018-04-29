<?php

namespace SilbinaryWolf\Components;

use Text;
use DBField;
use Exception;

class DBComponentField extends Text
{
    /**
     * Store the objects passed into a component property.
     *
     * @var (DBField|string)[]
     */
    protected $fields = array();

    public function __construct($name, array $fields)
    {
        parent::__construct($name);
        $this->fields = $fields;

        // Set value from fields
        $value = '';
        foreach ($this->fields as $field) {
            if (!is_object($field)) {
                $value .= $field;
                continue;
            }
            if (get_class($field) === 'Text') {
                // NOTE(Jake): 2018-04-29
                //
                // To ensure `getAttributesHTML()` isn't escaped and causes
                // double quoting, we just allow the RAW value for 'Text' fields.
                //
                // This will be in SS 3.X only.
                //
                $value .= $field->getValue();
                continue;
            }
            $value .= $field->forTemplate();
        }
        $this->value = $value;
    }

    /**
     * Stop default behaviour, which is escaping to XML.
     *
     * @return string
     */
    public function forTemplate()
    {
        return $this->getValue();
    }

    /**
     * (non-PHPdoc)
     * @see DBField::requireField()
     */
    public function requireField()
    {
        throw new Exception('Do not use this as a database field.');
    }
}
