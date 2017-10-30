<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\LoginForm;

use JoseCelano\Component\BaseReactComponent;

class UsernameField extends BaseReactComponent
{
    public function render(callable $render)
    {
        return <<<EOT
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Your username or email" required autofocus>
EOT;
    }
}