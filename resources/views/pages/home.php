<?php

use JoseCelano\Framework\Presentation\Web\View\Component\HomePage\HomePage;

$extendsLayout = 'layout';

render(HomePage::class, [
    'user' => user(),
    'welcome_text' => $welcomeText,
]);