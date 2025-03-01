<?php

class Application
{
    private $router;
    private $response;

    public function __construct()
    {
        $this->router = new Router($this->registerRoutes());
        $this->response = new Response();
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
        
        $this->response->send();
    }

    private function runAction($controllerName, $action)
    {
        // Convert the controller name to the class name
        $controllerClass = ucfirst($controllerName) . 'Controller';
        if (!class_exists($controllerClass)) {
            throw new HttpNotFoundException();
        }
        // Create an instance of the controller class
        $controller = new $controllerClass();
        // Run the action and get the content
        $content = $controller->run($action);
        $this->response->setContent($content);
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
        //TODO:response instance to set status code, text, and content
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
