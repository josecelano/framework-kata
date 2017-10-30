<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Tag\H;

class H4 extends H
{
    public function render(callable $render)
    {
        return <<<EOT
        <h4 class="">{$this->text}</h4>
EOT;
    }
}