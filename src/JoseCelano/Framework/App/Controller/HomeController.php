<?php

namespace JoseCelano\Framework\App\Controller;

use JoseCelano\Framework\App\Service\AuthenticationService;
use JoseCelano\Framework\App\Web\Request;
use JoseCelano\Framework\Presentation\Web\View\Render;

class HomeController extends Controller
{
    /** @var AuthenticationService */
    private $authenticationService;

    public function __construct(Render $render, AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
        parent::__construct($render);
    }

    public function __invoke(Request $request)
    {
        $user = $this->authenticationService->getUser();

        if (!$user) {
            $welcomeText = '';
        } else {
            $welcomeText = sprintf('Welcome %s!', $user->getUsername());
        }

        return $this->render('pages/home', [
            'welcomeText' => $welcomeText,
        ]);
    }
}