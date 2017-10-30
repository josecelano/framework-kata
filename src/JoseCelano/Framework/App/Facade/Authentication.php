<?php

namespace JoseCelano\Framework\App\Facade;

use JoseCelano\Framework\App\Service\AuthenticationService;

class Authentication
{
    public static function user()
    {
        /** @var AuthenticationService $authenticationService */
        $authenticationService = app()->getService('authentication-service');
        return $authenticationService->getUser();
    }
}