<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Button;

use JoseCelano\Component\BaseReactComponent;

class Button extends BaseReactComponent
{
    public $class;
    public $type;
    public $text;

    public function __construct($props)
    {
        $props['class'] = $this->optional($props, 'class', 'btn btn-lg btn-primary btn-block');
        $props['type'] = $this->optional($props, 'type', 'submit');
        parent::__construct($props);
    }

    public function render(callable $render)
    {
        return <<<EOT
        <button class="{$this->class}" type="{$this->type}">{$this->text}</button>
EOT;
    }
}