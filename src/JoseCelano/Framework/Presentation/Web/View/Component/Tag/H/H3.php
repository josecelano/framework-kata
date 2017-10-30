<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Tag\H;

class H3 extends H
{
    public function render(callable $render)
    {
        return <<<EOT
        <h3 class="text-muted">{$this->text}</h3>
EOT;
    }
}