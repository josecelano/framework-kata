<?php

namespace JoseCelano\Framework\App\Controller;

use JoseCelano\Framework\App\Command\CreateUserCommand;
use JoseCelano\Framework\App\Command\CreateUserCommandHandler;
use JoseCelano\Framework\App\Web\RedirectResponse;
use JoseCelano\Framework\App\Web\Request;
use JoseCelano\Framework\Domain\UserRepository;
use JoseCelano\Framework\Presentation\Web\View\Render;

class CreateUserController extends Controller
{
    /** @var  UserRepository */
    private $userRepository;

    /** @var  CreateUserCommandHandler */
    private $createUserCommandHandler;

    public function __construct(
        Render $render,
        UserRepository $userRepository,
        CreateUserCommandHandler $createUserCommandHandler
    )
    {
        $this->userRepository = $userRepository;
        $this->createUserCommandHandler = $createUserCommandHandler;
        parent::__construct($render);
    }

    public function __invoke(Request $request)
    {
        $username = $request->post('username');
        $email = $request->post('email');
        $password = $request->post('password');

        $command = new CreateUserCommand(
            $this->userRepository->nextIdentity(),
            $username,
            $email,
            $password
        );

        $this->createUserCommandHandler->handle($command);

        // TODO: login user

        return new RedirectResponse('./login');
    }
}