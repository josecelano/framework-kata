<?php

$routes = [

    'home' => [
        'url' => '/home',
        'method' => 'get',
        'action' => 'home-controller'
    ],

    'login' => [
        'url' => '/login',
        'method' => 'get',
        'action' => 'login-controller'
    ],

    'signup' => [
        'url' => '/signup',
        'method' => 'get',
        'action' => 'signup-controller'
    ],

    'check_login' => [
        'url' => '/check_login',
        'method' => 'post',
        'action' => 'check-login-controller'
    ],

    'logout' => [
        'url' => '/logout',
        'method' => 'get',
        'action' => 'logout-controller'
    ],

    'create_user' => [
        'url' => '/create_user',
        'method' => 'post',
        'action' => 'create-user-controller'
    ],
];

return $routes;