<?php

namespace JoseCelano\Framework\App;

use JoseCelano\Framework\App\Console\CreateUserConsoleCommand;
use JoseCelano\Framework\App\Console\Input;
use JoseCelano\Framework\App\Console\Output;
use JoseCelano\Framework\App\Exception\ConsoleException;
use JoseCelano\Framework\App\Exception\NotFoundCommandConsoleException;

class ConsoleKernel
{
    /**
     * @var AppKernel
     */
    private $appKernel;

    /**
     * HttpKernel constructor.
     * @param AppKernel $app
     */
    public function __construct(AppKernel $app)
    {
        $this->appKernel = $app;
    }

    /**
     * @param Input $input
     * @return Output
     */
    public function handle(Input $input)
    {
        if (PHP_SAPI != 'cli') {
            throw new ConsoleException("Commands must be executed on console");
        }

        $commandName = $input->getArgvNumber(1);

        if (empty($commandName)) {
            throw new ConsoleException("Missing first argument: command name");
        }

        $output = new Output();

        switch ($commandName) {

            case 'create-user':

                /** @var CreateUserConsoleCommand $createUserConsoleCommand */
                $createUserConsoleCommand = $this->appKernel->getService('create-user-console-command');
                $createUserConsoleCommand($input, $output);

                break;

            default:
                throw new NotFoundCommandConsoleException("Invalid command name: $commandName");
        }

        return $output;
    }

    private function dispatch($request, $action)
    {
        // TODO
    }

    public function terminate($request, $response)
    {
        // TODO
    }
}