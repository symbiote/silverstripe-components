<?php

namespace SilbinaryWolf\Components;

use Exception;
use SilverStripe\View\ViewableData;

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
     * - $failover
     * - $customisedObject
     * - $extension_instances
     * - $beforeExtendCallbacks
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

        // NOTE(Jake): 2018-08-02
        //
        // Don't allow use of invalid properties.
        // ie. You can't pass "failover" as it's used by ViewableData
        //
        foreach (get_object_vars($this) as $prop => $value) {
            if (isset($props[$prop])) {
                throw new ComponentReservedPropertyException($name, $prop);
            }
        }

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
