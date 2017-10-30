<?php

namespace JoseCelano\Component;

abstract class BaseComponent implements Component
{
    protected $props;

    public function __construct($props)
    {
        $this->props = $props;
        foreach ($props as $propName => $propValue) {
            $this->{$propName} = $propValue;
        }
    }

    /**
     * @return mixed
     */
    public function props()
    {
        return $this->props;
    }

    protected function optional($props, $name, $default = '')
    {
        return isset($props[$name]) ? $props[$name] : $default;
    }
}