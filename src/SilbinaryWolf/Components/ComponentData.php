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
