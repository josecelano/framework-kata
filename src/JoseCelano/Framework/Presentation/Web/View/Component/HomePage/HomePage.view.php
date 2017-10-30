<?php

/** @var JoseCelano\Framework\Presentation\Web\View\Component\HomePage\HomePage $component */
use JoseCelano\Framework\Presentation\Web\View\Component\Footer\Footer;
use JoseCelano\Framework\Presentation\Web\View\Component\Header\Header;
use JoseCelano\Framework\Presentation\Web\View\Component\Jumbotron\Jumbotron;
use JoseCelano\Framework\Presentation\Web\View\Component\Marketing\Marketing;

?>

<? render(Header::class, ['user' => $component->user]) ?>

    <main role="main">

        <? render(Jumbotron::class, ['user' => $component->user]) ?>

        <?= $component->welcome_text ?>

        <? render(Marketing::class) ?>

    </main>

<? render(Footer::class) ?>