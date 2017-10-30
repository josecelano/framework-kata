<?php

namespace JoseCelano\Framework\App\Web;

use JoseCelano\Framework\App\Exception\NotFoundHttpException;

class Router
{
    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function match($requestUri)
    {
        foreach ($this->routes as $route) {
            if ($route['url'] == $requestUri) {
                return $route;
            }
        }
        throw new NotFoundHttpException("Route for uti $requestUri not found");
    }

    public function matchByName($routeName)
    {
        foreach ($this->routes as $name => $route) {
            if ($name == $routeName) {
                return $route;
            }
        }
        throw new NotFoundHttpException("Route with name $routeName not found");
    }

    public function getUrl($routeName)
    {
        $route = $this->matchByName($routeName);
        if (!$route) {
            return null;
        }
        return $route['url'];
    }
}