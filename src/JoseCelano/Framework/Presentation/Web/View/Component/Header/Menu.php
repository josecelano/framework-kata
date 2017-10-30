<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Header;

use JoseCelano\Component\BaseReactComponent;
use JoseCelano\Framework\Domain\User;

class Menu extends BaseReactComponent
{
    /** @var  User|null */
    public $user;
    public $home_route;
    public $login_route;
    public $logout_route;
    public $signup_route;

    public function __construct($props)
    {
        $props['home_route'] = $this->optional($props, 'home_route', route('home'));
        $props['login_route'] = $this->optional($props, 'login_route', route('login'));
        $props['logout_route'] = $this->optional($props, 'logout_route', route('logout'));
        $props['signup_route'] = $this->optional($props, 'signup_route', route('signup'));
        parent::__construct($props);
    }

    public function render(callable $render)
    {
        // TODO: activate link for current url.
        return <<<EOT
        <nav>
            <ul class="nav nav-pills float-right">
                {$this->homeLink(true)}
                {$this->signupLink()}
                {$this->logInOutLink()}
            </ul>
        </nav>
EOT;
    }

    /**
     * @param bool $active
     * @return string
     */
    private function homeLink($active = false)
    {
        $active = $active ? 'active' : '';
        return <<<EOT
        <li class="nav-item">
            <a class="nav-link {$active}" href="{$this->home_route}">Home <span class="sr-only">(current)</span></a>
        </li>
EOT;
    }

    /**
     * @param bool $active
     * @return string
     */
    private function signupLink($active = false)
    {
        $active = $active ? 'active' : '';
        if (!$this->user) {
            $signup = <<<EOT
            <li class="nav-item">
                <a class="nav-link {$active}" href="{$this->signup_route}">Sign Up</a>
            </li>
EOT;
        } else {
            $signup = '';
        }
        return $signup;
    }

    /**
     * @param bool $active
     * @return string
     */
    private function logInOutLink($active = false)
    {
        $active = $active ? 'active' : '';
        if (!$this->user) {
            $login = <<<EOT
            <li class="nav-item">
                <a class="nav-link {$active}" href="{$this->login_route}">Login</a>
            </li>
EOT;
        } else {
            $login = <<<EOT
            <li class="nav-item">
                <a class="nav-link {$active}" href="{$this->logout_route}">Logout</a>
            </li>
EOT;
        }
        return $login;
    }
}