<?php

namespace ErfanGooneh\T1 ; 

class Router
{
    protected $routes = [];

    public function setRoute($route, $controller, $action)
    {
        $this->routes[$route] = ['controller'=>$controller, 'action'=>$action];
    }

    public function run()
    {
        echo "You are at ".$_SERVER['REQUEST_URI'] ; 
        $uri = strtok($_SERVER['REQUEST_URI'], '?') ; 
        if(array_key_exists($uri, $this->routes)) {
            $controller = new $this->routes[$uri]['controller']() ;
            $action =  $this->routes[$uri]['action'];
            $controller->$action();
        }
        else{
            throw new \Exception("Not found") ; 
        }
    }
}