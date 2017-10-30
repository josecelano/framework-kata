<?php

namespace JoseCelano\Framework\Presentation\Web\View\Component\Page;

use JoseCelano\Component\BaseReactComponent;
use JoseCelano\Framework\Presentation\Web\View\Component\Alert\Warning;
use JoseCelano\Framework\Presentation\Web\View\Component\Footer\Footer;
use JoseCelano\Framework\Presentation\Web\View\Component\Header\Header;

class Page extends BaseReactComponent
{
    public $content;
    public $warning;

    public function __construct($props)
    {
        $props['content'] = $this->optional($props, 'content', '');
        $props['warning'] = $this->optional($props, 'warning', '');
        parent::__construct($props);
    }

    public function render(callable $render)
    {
        $warning = $this->warning($render);

        return <<<EOT
        {$render(Header::class)}
        
        <main role="main">
            {$warning}
            {$this->content}
        </main>
        
        {$render(Footer::class)}
EOT;
    }

    private function warning(callable $render)
    {
        if ($this->warning != '') {
            $warning = $render(Warning::class, ['message' => $this->warning]);
        } else {
            $warning = '';
        }
        return $warning;
    }
}