<?php

namespace SilbinaryWolf\Components;

use ViewableData;
use Debug;

class Component extends ViewableData
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var array
     */
    protected $properties = array();

    public function __construct($name, array $properties)
    {
        $this->name = $name;
        $this->properties = $properties;
    }

    public function __get($property)
    {
        if (isset($properties[$property])) {
            return $properties[$property];
        }
        return parent::__get($property);
    }

    public function process()
    {
        return $this->renderWith($this->name, $this->properties);
    }
}
