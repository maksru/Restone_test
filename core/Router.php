<?php
namespace core;

class Router
{
    private $routes = [];
    private $uri;

    public function __construct(string $query) {
        $this->routes = include_once(ROOT . '/routes/routes.php');
        $this->uri = empty($query) ? '/' : trim($query, '/');
    }

    public function uploadPage() {
        foreach ($this->routes as $uriReg => $path) {
            if (preg_match("~^$uriReg$~", $this->uri)) {
                $route = preg_replace("~$uriReg~", $path, $this->uri);
                $separator = explode('@', $route);
                $controller = array_shift($separator);
                $signature = explode('/', array_shift($separator));
                $action = array_shift($signature);
                $params = $signature;
                $pathToController = ROOT . '/aplication/Controllers/' . $controller . '.php';
                if (file_exists($pathToController)) {
                    include_once $pathToController;
                } else {
                    View::error('Метод не существует');
                    die();
                }
                $controllerName = '\aplication\\Controller\\' . $controller;
                $obj = new $controllerName;
                if (method_exists($obj, $action)) {
                    $obj->$action(...$params);
                } else {
                    View::error('Метод не существует');
                    die();
                }
                die();
            }
        }
        View::error('Путь не существует');
        die();
    }
}