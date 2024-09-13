<?php

namespace Symbiote\Components;

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

    protected $____properties;

    public function __construct($name, array $props)
    {
        parent::__construct();

        $this->____name = $name;
        foreach ($props as $prop => $value) {
            $this->____properties[$prop] = $value;
        }

        // NOTE(Jake): 2018-08-02
        //
        // Don't allow use of invalid properties.
        // ie. You can't pass "failover" as it's used by ViewableData
        //
        // The invalid ViewableData properties are at time of writing:
        // - $failover
        // - $customisedObject
        // - $extension_instances
        // - $beforeExtendCallbacks
        //
        foreach (get_object_vars($this) as $prop => $value) {
            if (isset($this->____properties[$prop])) {
                throw new ComponentReservedPropertyException($name, $prop);
            }
        }
    }

    /**
     * Disable default ViewableData __get behaviour.
     */
    public function __get($property)
    {
        return $this->____properties[$property] ?? null;
    }
}
