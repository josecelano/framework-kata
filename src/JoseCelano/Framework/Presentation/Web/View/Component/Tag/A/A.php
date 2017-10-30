<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Tag\A;

use JoseCelano\Component\BaseReactComponent;

class A extends BaseReactComponent
{
    public $class;
    public $href;
    public $role;
    public $text;

    public function render(callable $render)
    {
        return <<<EOT
        <a class="{$this->class}" href="{$this->href}" role="button">{$this->text}</a>
EOT;
    }
}