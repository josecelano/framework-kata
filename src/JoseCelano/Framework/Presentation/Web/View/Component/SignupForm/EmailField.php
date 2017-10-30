<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\SignupForm;

use JoseCelano\Component\BaseReactComponent;

class EmailField extends BaseReactComponent
{
    public function render(callable $render)
    {
        return <<<EOT
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Your email" required autofocus>
EOT;
    }
}