<?php

use ErfanGooneh\T1\Controllers\LoginController; 
use ErfanGooneh\T1\Router; 

$router = new Router() ; 
$router->setRoute('/login', LoginController::class, 'index'); 
$router->run() ; 