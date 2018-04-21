<?php

namespace SilbinaryWolf\Components;

use SilbinaryWolf\Components\Tests\ComponentTest;
use ViewableData;
use Exception;

class ComponentData extends ViewableData
{
    /**
     * Change the base default field so that `forTemplate` calls don't cast
     * the data to XML.
     *
     * This isn't required in SilverStripe 3 but fixes double quote issues in
     * SilverStripe 4+.
     *
     * @see ComponentTest::testAvoidBadXMLEscaping()
     * @var string
     * @config
     */
    private static $default_cast = 'SilbinaryWolf\Components\DBComponentField';
    
    /**
     * The component name.
     * NOTE: Many _'s to avoid clashing with a property called 'name'.
     *
     * @var string
     */
    protected $____name;

    /**
     * NOTE(Jake): 2018-04-06
     *
     * We use a custom class instead of ArrayData to avoid
     * property clashing.
     *
     * (ie. passing an property 'class' to ArrayData won't work as
     * it'll just utilize the class name "ArrayData")
     *
     */
    public function __construct($name, array $props)
    {
        $this->____name = $name;
        foreach ($props as $name => $value) {
            $this->{$name} = $value;
        }
    }

    /**
     * Disable default ViewableData __get behaviour.
     */
    public function __get($property)
    {
        return null;
    }
}
