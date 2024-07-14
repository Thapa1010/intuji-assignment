<?php

namespace App;

/**
 * Router class for handling URL routing and dispatching requests to controllers.
 * 
 * 
 */
class Router{

     /**
     * @var array $routes Array of routes and their handlers
     */
    private $routes = [];

    public function __construct($routes){
        $this->routes = $routes;
    }

     /**
     * Dispatch the current request to the appropriate controller and method.
     */
    public  function dispatch(){
        $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        
        if(array_key_exists($uri,$this->routes)){
            $this->mapControllerMethod($this->routes[$uri]);
        }else{
            require(__DIR__.'/../views/errors/404.php');
        }
    }

    /**
     * Map the route to the corresponding controller method and handle authentication if required.
     * 
     * @param array $handler Array containing the controller method and guard
     */
    public function mapControllerMethod(array $handler){

        list($mapping,$guard) = $handler;
        list($controllerName,$method) = explode('@',$mapping);

        if($guard === 'auth' && !sessionExists('google_auth_code')){
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