<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Header;

use JoseCelano\Component\BaseReactComponent;
use JoseCelano\Framework\Domain\User;
use JoseCelano\Framework\Presentation\Web\View\Component\Tag\H\H3;

class Header extends BaseReactComponent
{
    /** @var  User|null */
    public $user;

    public function render(callable $render)
    {
        return <<<EOT
        <header class="header clearfix">
            {$render(Menu::class, ['user' => $this->user])}
            {$render(H3::class, ['text' => 'Framework Kata'])}
        </header>
EOT;
    }
}