<?php

namespace JoseCelano\Framework\App\Controller;

use JoseCelano\Framework\App\Web\Request;
use JoseCelano\Framework\Presentation\Web\View\Render;

class SignupController extends Controller
{
    public function __construct(Render $render)
    {
        parent::__construct($render);
    }

    public function __invoke(Request $request)
    {
        return $this->render('pages/signup');
    }
}