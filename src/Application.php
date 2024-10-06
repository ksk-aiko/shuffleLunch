<?php

require_once __DIR__ . '/core/Router.php';

class Application
{

    private $router;

    public function __construct()
    {
        // Initialize the router
        $this->router = new Router($this->registerRoutes());
    }

    // Run the application
    public function run()
    {
        // Get the path from the request
        $params = $this->router->resolve($this->getPathInfo());
        var_export($params);
        // Extract the controller and action
        $controller = $params['controller'];
        $action = $params['action'];
    }

    // Get the path from the request
    private function getPathInfo() {
        return  $_SERVER['REQUEST_URI'];
    }

    // Register the routes
    private function registerRoutes() {
        return [
            '/' => ['controller' => 'shuffle', 'action' => 'index'],
        ];
    }
}