<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Alert;

class Warning extends Alert
{
    public function render(callable $render)
    {
        return <<<EOT
        <div class="alert alert-warning" role="alert">
          <strong>Warning!</strong> {$this->message}
        </div>
EOT;
    }
}