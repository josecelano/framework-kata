<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\LoginForm;

use JoseCelano\Component\BaseReactComponent;
use JoseCelano\Framework\Presentation\Web\View\Component\Alert\Warning;
use JoseCelano\Framework\Presentation\Web\View\Component\Button\Button;
use JoseCelano\Framework\Presentation\Web\View\Component\Tag\H\H2;

class LoginForm extends BaseReactComponent
{
    public $check_login_route;

    public function __construct($props)
    {
        $props['check_login_route'] = $this->optional($props, 'check_login_route', route('check_login'));
        $props['error'] = $this->optional($props, 'error', '');
        parent::__construct($props);
    }

    public function render(callable $render)
    {
        return <<<EOT
        <form class="form-signin" action="{$this->check_login_route}" method="post">
        
        {$render(H2::class, ['text' => 'Please sign in'])}
        
        {$render(UsernameField::class)}
        
        {$render(PasswordField::class)}
        
        {$render(Button::class, ['text' => 'Sign in'])}
        
        </form>
EOT;
    }
}