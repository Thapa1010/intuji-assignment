<?php

namespace App;

class Router{
    private $routes = [];

    public function __construct($routes){
        $this->routes = $routes;
    }

    public  function dispatch(){
        $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        
        if(array_key_exists($uri,$this->routes)){
            $this->mapControllerMethod($this->routes[$uri]);
        }else{
            require(__DIR__.'/../views/errors/404.php');
        }
    }

    public function mapControllerMethod(string $handler){

        list($controllerName,$method) = explode('@',$handler);

        $controllerClass = "App\\Controllers\\$controllerName";
        if(class_exists($controllerClass) && method_exists($controllerClass,$method)){
            $instance = new $controllerClass();
            $instance->$method();
            
        }else{
            require(__DIR__.'/../views/errors/500.php');

        }
    }
}