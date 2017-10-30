<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Tag\H;

class H1 extends H
{
    public function render(callable $render)
    {
        return <<<EOT
        <h1 class="display-3">{$this->text}</h1>
EOT;
    }
}