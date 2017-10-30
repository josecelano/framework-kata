<?php

namespace JoseCelano\Framework\App;

use JoseCelano\Framework\App\Command\CreateUserCommandHandler;
use JoseCelano\Framework\App\Console\CreateUserConsoleCommand;
use JoseCelano\Framework\App\Controller\CheckLoginController;
use JoseCelano\Framework\App\Controller\CreateUserController;
use JoseCelano\Framework\App\Controller\HomeController;
use JoseCelano\Framework\App\Controller\LoginController;
use JoseCelano\Framework\App\Controller\LogoutController;
use JoseCelano\Framework\App\Controller\SignupController;
use JoseCelano\Framework\App\Exception\HttpException;
use JoseCelano\Framework\App\Exception\NotFoundHttpException;
use JoseCelano\Framework\App\Service\AuthenticationService;
use JoseCelano\Framework\App\Web\Router;
use JoseCelano\Framework\Domain\UserService;
use JoseCelano\Framework\Infrastructure\Persistence\InMemory\InMemoryUserRepository;
use JoseCelano\Framework\Infrastructure\Persistence\MySql\DBConfig;
use JoseCelano\Framework\Infrastructure\Persistence\MySql\MySqlUserRepository;
use JoseCelano\Framework\Infrastructure\Session\PhpNativeSession;
use JoseCelano\Framework\Presentation\Web\View\Render;

class AppKernel
{
    /** @var Container */
    private $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function registerParameters($parameters)
    {
        foreach ($parameters as $key => $parameter) {
            $this->container->addParameter($key, $parameter);
        }
    }

    public function getParameter($key)
    {
        if ($this->container->exists($key)) {
            return $this->container->getParameter($key);
        }
        return null;
    }

    public function getService($key)
    {
        if ($this->container->exists($key)) {
            return $this->container->getService($key);
        }

        switch ($key) {
            case 'router':
                $this->container->addService($key, new Router(
                    $this->getParameter('routes')
                ));
                break;
            case 'http-kernel':
                $this->container->addService($key, new HttpKernel(
                    $this,
                    $this->getService('router')
                ));
                break;
            case 'console-kernel':
                $this->container->addService($key, new ConsoleKernel(
                    $this
                ));
                break;
            case 'session':
                $this->container->addService($key, new PhpNativeSession());
                break;
            case 'user-repository':
                $database = $this->container->getParameter('database');

                switch ($this->getEnvironment()) {
                    case 'local':
                        $this->container->addService($key, new MySqlUserRepository(
                            new DBConfig(
                                $database['db_hostname'],
                                $database['db_port'],
                                $database['db_database'],
                                $database['db_username'],
                                $database['db_password']
                            )
                        ));
                        break;
                    case 'testing';
                        $this->container->addService($key, new InMemoryUserRepository());
                        break;
                }

                $this->container->addService($key, new MySqlUserRepository(
                    new DBConfig(
                        $database['db_hostname'],
                        $database['db_port'],
                        $database['db_database'],
                        $database['db_username'],
                        $database['db_password']
                    )
                ));
                break;
            case 'user-service':
                $this->container->addService($key, new UserService(
                    $this->getService('user-repository')
                ));
                break;
            case 'authentication-service':
                $this->container->addService($key, new AuthenticationService(
                    $this->getService('session'),
                    $this->getService('user-repository')
                ));
                break;
            case 'render':
                $this->container->addService($key, new Render(
                    $this->getParameter('view_base_path')
                ));
                break;
            // Controllers
            case 'home-controller':
                $this->container->addService($key, new HomeController(
                    $this->getService('render'),
                    $this->getService('authentication-service')
                ));
                break;
            case 'login-controller':
                $this->container->addService($key, new LoginController(
                    $this->getService('render')
                ));
                break;
            case 'logout-controller':
                $this->container->addService($key, new LogoutController(
                    $this->getService('render'),
                    $this->getService('authentication-service')
                ));
                break;
            case 'signup-controller':
                $this->container->addService($key, new SignupController(
                    $this->getService('render')
                ));
                break;
            case 'check-login-controller':
                $this->container->addService($key, new CheckLoginController(
                    $this->getService('render'),
                    $this->getService('authentication-service')
                ));
                break;
            case 'create-user-controller':
                $this->container->addService($key, new CreateUserController(
                    $this->getService('render'),
                    $this->getService('user-repository'),
                    $this->getService('create-user-command-handler')
                ));
                break;
            // Command handlers
            case 'create-user-command-handler':
                $this->container->addService($key, new CreateUserCommandHandler(
                    $this->getService('user-service')
                ));
                break;
            // Console commands
            case 'create-user-console-command':
                $this->container->addService($key, new CreateUserConsoleCommand(
                    $this->getService('user-repository'),
                    $this->getService('create-user-command-handler')
                ));
                break;
            default:
                throw new \Exception('Unknown service ' . $key);
        }

        return $this->container->getService($key);
    }

    /**
     * Throw an HttpException with the given data.
     *
     * @param  int $code
     * @param  string $message
     * @param  array $headers
     * @return void
     */
    public function abort($code, $message = '', array $headers = [])
    {
        if ($code == 404) {
            throw new NotFoundHttpException($message);
        }
        throw new HttpException($code, $message, null, $headers);
    }

    private function getEnvironment()
    {
        $config = $this->getParameter('config');
        $environment = $config['env'];
        return $environment;
    }
}