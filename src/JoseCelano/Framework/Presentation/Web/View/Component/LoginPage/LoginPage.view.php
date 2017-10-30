<?php

use JoseCelano\Framework\Presentation\Web\View\Component\LoginForm\LoginForm;
use JoseCelano\Framework\Presentation\Web\View\Component\LoginPage\LoginPage;
use JoseCelano\Framework\Presentation\Web\View\Component\Page\Page;

/** @var LoginPage $props */

$loginForm = captureRender(LoginForm::class);

render(Page::class, [
    'content' => $loginForm,
    'warning' => $props->warning,
]);