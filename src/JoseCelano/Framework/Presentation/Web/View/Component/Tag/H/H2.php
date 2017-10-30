<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Tag\H;

class H2 extends H
{
    public function render(callable $render)
    {
        return <<<EOT
        <h2 class="form-signin-heading">{$this->text}</h2>
EOT;
    }
}