<?php

namespace JoseCelano\Framework\App\Controller;

use JoseCelano\Framework\App\Service\AuthenticationService;
use JoseCelano\Framework\App\Web\RedirectResponse;
use JoseCelano\Framework\App\Web\Request;
use JoseCelano\Framework\Presentation\Web\View\Render;

class CheckLoginController extends Controller
{
    /** @var  AuthenticationService */
    private $authenticationService;

    public function __construct(
        Render $render,
        AuthenticationService $authenticationService
    )
    {
        $this->authenticationService = $authenticationService;
        parent::__construct($render);
    }

    public function __invoke(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');

        if ($this->authenticationService->authenticateUser($username, $password)) {
            return new RedirectResponse('./home');
        } else {
            $request->getSession()->put('error', 'Authentication fail.');
            return new RedirectResponse('./login');
        }
    }
}