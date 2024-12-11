<?php

require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/controller/ShuffleController.php';
require_once __DIR__ . '/controller/EmployeeController.php';
require_once __DIR__ . '/core/HttpNotFoundException.php';

class Application


{
    private $router;

    public function __construct()
    {
        $this->router = new Router($this->registerRoutes());
    }

    public function run()
    {
        try {
            $params = $this->router->resolve($this->getPathInfo());
            if (! $params) {
                throw new HttpNotFoundException();
            }
            $controller = $params['controller'];
            $action = $params['action'];
            $this->runAction($controller, $action);
        } catch (HttpNotFoundException) {
            $this->render404Page();
        }
    }

    private function runAction($controllerName, $action)
    {
        $controllerClass = ucfirst($controllerName) . 'Controller';
        $controller = new $controllerClass();
        $controller->run($action);
    }

    private function registerRoutes()
    {
        return [
            '/' => ['controller' => 'shuffle', 'action' => 'index'],
            '/shuffle' => ['controller' => 'shuffle', 'action' => 'create'],
            '/employee' => ['controller' => 'employee', 'action' => 'index'],
            '/employee/create' => ['controller' => 'employee', 'action' => 'create'],
        ];
    }

    private function getPathInfo()
    {
        return $_SERVER['REQUEST_URI'];
    }

    private function render404Page()
    {
        header('HTTP/1.0 404 Not Found');
        $content = <<<EOT
            <!DOCTYPE html>
            <html>
            <head>
                <title>404 Not Found</title>
            </head>
            <body>
                <h1>404 Not Found</h1>
                <p>The requested URL {$_SERVER['REQUEST_URI']} was not found on this server.</p>
            </body>
            </html>
        EOT;
        
        echo $content;
    }
}
