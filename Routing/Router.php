<?php
namespace TrainingProject\Routing;
use \TrainingProject\Routing\Route;
use \TrainingProject\Controllers\Login;
class Router{
    private $routes = [];
    private $allowedMethods = [];


    function __construct($routes) {
        //Take all the routes listed in the routes.php file and store the array as a member var of Router
        foreach ($routes as $route){
            $this->addRoute($route[0], $route[1], $route[2], $route[3]);
        }
    }


    function addRoute($method, $uri, $controller, $action){
        $this->routes[$uri] = new Route([$method, $uri,  $controller, $action]);
    }


    function resolve($uri){
        // TODO verify that uri is in routes
        // TODO verify that method is in allowedMethods

        $route = $this->routes[$uri]; //uses Route class
        $controllerClassName = "TrainingProject\Controllers\\" . $route->getController(); //TODO don't use explicit namespace here. use aliasing in a different file instead
        $controller = new $controllerClassName();
        $action = $route->getAction();

        //call specified member function (aka perform the "action")
        call_user_func($controller->{$action}());
    }
}

?>
