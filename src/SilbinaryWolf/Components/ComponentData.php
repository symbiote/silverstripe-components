<?php

namespace SilbinaryWolf\Components;

use SilbinaryWolf\Components\Tests\ComponentTest;
use ViewableData;
use Exception;

class ComponentData extends ViewableData
{
    /**
     * The component name.
     * NOTE: Many _'s to avoid clashing with a property called 'name'.
     *
     * @var string
     */
    protected $____name;

    /**
     * Various ViewableData properties such as:
     * - $class
     * - $failover
     *
     * @var \stdClass
     */
    protected $____viewabledata;

    /**
     * NOTE(Jake): 2018-04-06
     *
     * We use a custom class instead of ArrayData to avoid
     * property clashing.
     *
     * (ie. passing an property 'class' to ArrayData won't work as
     * it'll just utilize the class name "ArrayData")
     */
    public function __construct($name, array $props)
    {
        parent::__construct();

        // NOTE(Jake): 2018-06-01
        //
        // Move underlying properties to `____viewabledata`
        // We do this to avoid clashing of property names like $class.
        //
        // ie. If you don't pass a $class variable in, $class will end
        //     up defaulting to 'SilbinaryWolf\Components\ComponentData'.
        //
        //     We don't want this!
        //
        $data = new \stdClass;
        foreach (get_object_vars($this) as $prop => $value) {
            $data->{$prop} = $value;
            unset($this->{$prop});
        }
        $this->____viewabledata = $data;

        //
        $this->____name = $name;
        foreach ($props as $prop => $value) {
            $this->{$prop} = $value;
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
