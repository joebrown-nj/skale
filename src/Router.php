<?php

/*
namespace App;

use App\Controller;

class Router extends Controller
{
    protected $routes = [];

    // public function __construct() {
    //     parent::__construct();
    // }

    private function addRoute($route, $controller, $action, string $method): void
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get(string $route, string $controller, string $action, string $postGet = "GET"): void
    {
        $this->addRoute($route, $controller, $action, $postGet);
    }

    /**
     * @return void
     */
/*
    public function dispatch()
    {
        $uri = $this->getP1(); //strtok($_SERVER['REQUEST_URI'], '?');
        // $uri = $uri == '' ? 'home' : $uri;
        $uri2 = $this->getP2(); // ? 'detail' : '';
        $uri3 = $this->getP3();
        $method =  $_SERVER['REQUEST_METHOD'];
// echo $uri;
// echo $uri2;
// $this->prettyPrint($this->routes);
// die;
        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            // if($uri2) $controller->$uri2();
            // else $controller->$action();
            $controller->$action();
        } else {
            // throw new \Exception("No route found for URI: $uri");
            $this->view->render("404");
        }
    }
}
    */