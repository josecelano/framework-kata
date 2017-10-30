<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\SignupForm;

use JoseCelano\Component\BaseReactComponent;

class PasswordField extends BaseReactComponent
{
    public function render(callable $render)
    {
        return <<<EOT
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
EOT;
    }
}