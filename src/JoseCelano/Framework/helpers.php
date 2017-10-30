<?php

function app()
{
    global $appKernel;
    return $appKernel;
}

function base_path()
{
    app()->getParameter('base_path');
}

function route($name)
{
    return \JoseCelano\Framework\App\Facade\Router::getUrl($name);
}

function user()
{
    return \JoseCelano\Framework\App\Facade\Authentication::user();
}