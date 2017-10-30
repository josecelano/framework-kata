<?php

use JoseCelano\Framework\Presentation\Web\View\Component\Page\Page;
use JoseCelano\Framework\Presentation\Web\View\Component\SignupForm\SignupForm;

render(Page::class, ['content' => captureRender(SignupForm::class)]);