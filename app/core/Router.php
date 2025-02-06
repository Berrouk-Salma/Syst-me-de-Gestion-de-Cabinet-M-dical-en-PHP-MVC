<?php
namespace app\Core;

class Router {
    private $routes = [];

    public function addRoute($url, $controller, $action) {
        $this->routes[$url] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch() {
        $url = $_SERVER['REQUEST_URI'];
        if (array_key_exists($url, $this->routes)) {
            $controller = $this->routes[$url]['controller'];
            $action = $this->routes[$url]['action'];
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            echo "404 - Page not found!";
        }
    }
}


$router->addRoute('/appointments', 'app\Controllers\AppointmentsController', 'index');
$router->addRoute('/appointments/add', 'app\Controllers\AppointmentsController', 'add');

$router->addRoute('/login', 'app\Controllers\AuthController', 'login');
$router->addRoute('/logout', 'app\Controllers\AuthController', 'logout');
?>