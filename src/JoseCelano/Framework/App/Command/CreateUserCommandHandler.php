<?php

namespace JoseCelano\Framework\App\Command;

use JoseCelano\Framework\Domain\User;
use JoseCelano\Framework\Domain\UserId;
use JoseCelano\Framework\Domain\UserService;

class CreateUserCommandHandler
{
    /** @var UserService */
    private $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param CreateUserCommand $command
     * @throws \Exception
     */
    public function handle(CreateUserCommand $command)
    {
        $user = new User(
            UserId::fromString($command->getUserId()),
            $command->getUsername(),
            $command->getEmail(),
            $command->getPassword()
        );

        $this->userService->registerUser($user);
    }
}