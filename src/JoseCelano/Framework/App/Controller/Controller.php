<?php

namespace JoseCelano\Framework\App\Controller;

use JoseCelano\Framework\App\Web\Response;
use JoseCelano\Framework\Presentation\Web\View\Render;

abstract class Controller
{
    /** @var  Render */
    private $render;

    public function __construct(Render $render)
    {
        $this->render = $render;
    }

    public function render($view, $variables = [])
    {
        $content = $this->render->view($view, $variables);
        return new Response($content);
    }
}