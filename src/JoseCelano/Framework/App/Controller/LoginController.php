<?php

namespace JoseCelano\Framework\App\Controller;

use JoseCelano\Framework\App\Web\Request;
use JoseCelano\Framework\Presentation\Web\View\Render;

class LoginController extends Controller
{
    public function __construct(Render $render)
    {
        parent::__construct($render);
    }

    public function __invoke(Request $request)
    {
        $error = $request->getSession()->pull('error');
        return $this->render('pages/login', ['error' => $error]);
    }
}