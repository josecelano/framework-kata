<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Jumbotron;

use JoseCelano\Component\BaseReactComponent;
use JoseCelano\Framework\Domain\User;
use JoseCelano\Framework\Presentation\Web\View\Component\Tag\A\A;
use JoseCelano\Framework\Presentation\Web\View\Component\Tag\H\H1;

class Jumbotron extends BaseReactComponent
{
    /** @var  User|null */
    public $user;
    public $signup_route;

    public function __construct($props)
    {
        $props['signup_route'] = $this->optional($props, 'signup_route', route('signup'));
        parent::__construct($props);
    }

    public function render(callable $render)
    {
        if (!$this->user) {
            $signup = <<<EOT
                <p>{$render(A::class, [
                'class' => 'btn btn-lg btn-success',
                'href' => $this->signup_route,
                'role' => 'button',
                'text' => 'Sign up today',
            ])}</p>
EOT;
        } else {
            $signup = '';
        }

        return <<<EOT
        <div class="jumbotron">
            
            {$render(H1::class, ['text' => 'Your no-vendor framework for katas'])}
            
            <p class="lead">Do you need a kata skeleton for web app katas that does not use any third-party package? This is
                your solution.</p>
                
            {$signup}
            
        </div>
EOT;
    }
}