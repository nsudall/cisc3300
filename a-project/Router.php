<?php
class Router {
    private $routes = [];

    public function get($route, $action) {
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action) {
        $this->routes['POST'][$route] = $action;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = strtok($_SERVER["REQUEST_URI"], '?'); // Remove query parameters

        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];
            list($controller, $method) = explode('@', $action);
            require_once "controllers/$controller.php";
            $instance = new $controller;
            $instance->$method();
        } else {
            http_response_code(404);
            echo "Page not found!";
        }
    }
}
?>