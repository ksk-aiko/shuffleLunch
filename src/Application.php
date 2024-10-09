<?php
// Include the router
require_once __DIR__ . '/core/Router.php';
// Include the controller
require_once __DIR__ . '/controller/ShuffleController.php';

class Application
{
    // Router instance
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
        // Extract the controller and action
        $controller = $params['controller'];
        $action = $params['action'];
        // Run the action
        $this->runAction($controller, $action);
    }

    // Get the path from the request
    private function getPathInfo() {
        return  $_SERVER['REQUEST_URI'];
    }

    private function runAction($controllerName, $action) {
        // Get the controller class.ucfirst is used to capitalize the first letter of the controller name
        $controllerClass = ucfirst($controllerName) . 'Controller';
        $controller = new $controllerClass();
        $controller->run($action);
    }

    // Register the routes
    private function registerRoutes() {
        return [
            '/' => ['controller' => 'shuffle', 'action' => 'index'],
        ];
    }
}