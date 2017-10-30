<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\SignupForm;

use JoseCelano\Component\BaseReactComponent;
use JoseCelano\Framework\Presentation\Web\View\Component\Button\Button;
use JoseCelano\Framework\Presentation\Web\View\Component\Tag\H\H2;

class SignupForm extends BaseReactComponent
{
    public function render(callable $render)
    {
        return <<<EOT
        <form class="form-signup" action="./create_user" method="post">
        
            {$render(H2::class, ['text' => 'Nice day to code!'])}
            
            {$render(UsernameField::class)}
            
            {$render(EmailField::class)}
        
            {$render(PasswordField::class)}
        
            {$render(Button::class, ['text' => 'Sign up'])}
        
        </form>
EOT;
    }
}