<?php

namespace JoseCelano\Framework\App\Console;

use JoseCelano\Framework\App\Command\CreateUserCommand;
use JoseCelano\Framework\App\Command\CreateUserCommandHandler;
use JoseCelano\Framework\Domain\UserRepository;

class CreateUserConsoleCommand extends ConsoleCommand
{
    /** @var UserRepository */
    private $userRepository;

    /** @var CreateUserCommandHandler */
    private $createUserCommandHandler;

    public function __construct(
        UserRepository $userRepository,
        CreateUserCommandHandler $createUserCommandHandler
    )
    {
        $this->userRepository = $userRepository;
        $this->createUserCommandHandler = $createUserCommandHandler;
    }

    public function __invoke(Input $consoleInput, Output $output)
    {
        $username = $consoleInput->getArgvNumber(2);
        $email = $consoleInput->getArgvNumber(3);
        $password = $consoleInput->getArgvNumber(4);

        $command = new CreateUserCommand(
            $this->userRepository->nextIdentity(),
            $username,
            $email,
            $password
        );

        try {
            $this->createUserCommandHandler->handle($command);
            $output->writeLn("User created\n");
        } catch (\Exception $e) {
            $output->writeLn("Error trying to create the user. " . $e->getMessage());
        }
    }
}