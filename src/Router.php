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
        $uri = strtok($_SERVER['REQUEST_URI'], '?') ; 
        if(!array_key_exists($uri, $this->routes)) {
            include('Views/404.php'); 
            set_status_header(404);
            die(); 
        }
        $controller = new $this->routes[$uri]['controller']() ;
        $action =  $this->routes[$uri]['action'];
        $controller->$action();
    }
}