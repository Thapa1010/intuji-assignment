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

    public function mapControllerMethod(array $handler){

        list($mapping,$guard) = $handler;
        list($controllerName,$method) = explode('@',$mapping);

        if($guard === 'auth' && !isset(($_SESSION['google_auth_code']))){
            require(__DIR__.'/../views/errors/401.php');
            die();
        }
        $controllerClass = "App\\Controllers\\$controllerName";
        if(class_exists($controllerClass) && method_exists($controllerClass,$method)){
            $instance = new $controllerClass();
            $instance->$method();
            
        }else{
            require(__DIR__.'/../views/errors/500.php');

        }
    }
}