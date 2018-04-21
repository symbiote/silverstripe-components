<?php

namespace SilbinaryWolf\Components;

use DBField;
use Exception;

class DBComponentField extends DBField
{
    /**
     * Change `forTemplate` calls to stop casting data
     * to XML.
     *
     * This isn't required in SilverStripe 3 but fixes double quote issues in
     * SilverStripe 4+.
     *
     * @see ComponentTest::testAvoidBadXMLEscaping()
     * @return string
     */
    public function forTemplate()
    {
        return $this->value;
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
