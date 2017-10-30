<?php

require __DIR__ . '/../app/bootstrap.php';

use JoseCelano\Framework\App\AppKernel;
use JoseCelano\Framework\App\HttpKernel;
use JoseCelano\Framework\App\Service\Session;
use JoseCelano\Framework\App\Web\Request;

$appKernel = new AppKernel();

$basePath = dirname(__DIR__);

$appKernel->registerParameters([
    'base_path' => $basePath,
    'view_base_path' => $basePath . '/resources/views',
    'config' => require __DIR__ . '/config.php',
    'routes' => require __DIR__ . '/routes.php',
    'database' => require __DIR__ . '/database.php',
]);

/** @var HttpKernel $httpKernel */
$httpKernel = $appKernel->getService('http-kernel');

// TODO: Code Review: move session start and save inside HttpKernel?

/** @var Session $session */
$session = $appKernel->getService('session');
$session->start();
$session->load($_SESSION);

$request = Request::capture();
$request->setSession($session);

$response = $httpKernel->handle($request);

$response->send();

$httpKernel->terminate($request, $response);

$session->save($_SESSION);

// DEBUG
// var_dump($_SESSION);


