<?php

use JoseCelano\Framework\Presentation\Web\View\Component\LoginPage\LoginPage;

$extendsLayout = 'layout';

render(LoginPage::class, ['warning' => $error]);