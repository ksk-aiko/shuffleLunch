<?php

require_once __DIR__ . '/core/Router.php';

class Application
{

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        $params = $this->router->resolve($path);
        $controller = $params['controller'];
        $action = $params['action'];
    }
}