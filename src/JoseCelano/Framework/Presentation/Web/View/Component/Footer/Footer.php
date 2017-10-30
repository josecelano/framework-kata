<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Footer;

use JoseCelano\Component\BaseReactComponent;

class Footer extends BaseReactComponent
{
    public function render(callable $render)
    {
        return <<<EOT
        <footer class="footer">
            <p>&copy; Jose Celano 2017</p>
        </footer>
EOT;
    }
}