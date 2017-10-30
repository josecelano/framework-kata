<?php

require __DIR__ . '/../app/bootstrap.php';

use JoseCelano\Framework\App\AppKernel;
use JoseCelano\Framework\App\Console\Input;
use JoseCelano\Framework\App\ConsoleKernel;

$appKernel = new AppKernel();

$basePath = dirname(__DIR__);

$appKernel->registerParameters([
    'base_path' => $basePath,
    'database' => require __DIR__ . '/database.php',
]);

/** @var ConsoleKernel $consoleKernel */
$consoleKernel = $appKernel->getService('console-kernel');

$input = Input::capture();

$output = $consoleKernel->handle($input);

$output->send();