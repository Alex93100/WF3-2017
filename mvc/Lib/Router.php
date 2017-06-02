<?php

namespace Lib;

class Router {

/*
 * @var Router
*/
    private static $instance;
    
/*
 * @var Array
*/
    private $routes = [];
    
/*
 * @var string
*/
    private $prefix = '';
    
    private function __construct(){}
        
/*
 * @return Router
*/

    public static function getInstance(){

        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;   
    }
    public function addRoute(
        $name,
        $uri,
        $controller,
        $action){
        
        $this->routes[$name] = [
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,];
        
        return $this;
    }
    
    public function findRoute(){
        $uri = str_replace($this->prefix, '', strtok($_SERVER['REQUEST_URI'],'?'));
    
    foreach ($this->routes as $route) {
        if($route['uri'] == $uri){
            return $route;
        }    
    }
    return null;
}

    public function run(){
        $route = $this->findRoute();
        
        if(!is_null($route)){
            //construit la chaîne Controller\UserController()
            $controllerName = 'Controller\\' . ucfirst($route['controller']).'Controller';
            $actionName = $route['action'] . 'Action';
            
            $controller = new $controllerName();
            $controller->$actionName();
            /*
             * revient à faire :
             * $controller = new Controller\UserController();
             * $controller->listAction();
             */
        }
        else{
            header('HTTP/1.0 404 Not Found');
            die;
        }
    }
    
    public function getPrefix() {
        return $this->prefix;
    }

    public function setPrefix($prefix) {
        $this->prefix = $prefix;
        return $this;
    }


}
