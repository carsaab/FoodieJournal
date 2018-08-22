<?php
namespace TrainingProject\Routing;

class Route{
    private $method;
    private $uri;
    private $controller;
    private $action;

    function __construct($route) {
        list($this->method, $this->uri, $this->controller, $this->action) = $route;
    }

    function getController(){
        return $this->controller;
    }

    function getAction(){
        return $this->action;
    }

    function getMethod(){
        return $this->method;
    }

    function getUri(){
        return $this->uri;
    }
}

?>