<?php

namespace JoseCelano\Component;

use ReflectionClass;

abstract class BaseVueComponent extends BaseComponent implements Component, VueStyle
{
    public function viewPath()
    {
        $reflector = new ReflectionClass(get_class($this));
        $componentFileDir = dirname($reflector->getFileName());
        $componentClassName = $reflector->getShortName();

        return "$componentFileDir/$componentClassName.view.php";
    }
}