<?php

namespace JoseCelano\Framework\App\Facade;

class Router
{
    public static function getUrl($routeName)
    {
        /** @var \JoseCelano\Framework\App\Router $router */
        $router = app()->getService('router');
        return $router->getUrl($routeName);
    }
}