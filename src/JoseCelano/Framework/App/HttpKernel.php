<?php

namespace JoseCelano\Framework\App;

use JoseCelano\Framework\App\Exception\HttpException;
use JoseCelano\Framework\App\Web\Request;
use JoseCelano\Framework\App\Web\Response;
use JoseCelano\Framework\App\Web\Router;

class HttpKernel
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var AppKernel
     */
    private $appKernel;

    /**
     * HttpKernel constructor.
     * @param AppKernel $app
     * @param Router $router
     * @internal param \string[][] $routes
     */
    public function __construct(AppKernel $app, Router $router)
    {
        $this->router = $router;
        $this->appKernel = $app;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle($request)
    {
        $route = $this->router->match($request->getRequestUri());
        return $this->dispatch($request, $route['action']);
    }

    private function dispatch($request, $action)
    {
        $controller = $this->appKernel->getService($action);

        if (!$controller) {
            throw new \Exception(sprintf('Controller service %s not found ', $action));
        }

        try {
            $response = $controller($request);
        } catch (HttpException $e) {
            $response = new Response($e->getMessage(), $e->getStatusCode());
        }

        return $response;
    }

    public function terminate($request, $response)
    {
        // TODO
    }
}