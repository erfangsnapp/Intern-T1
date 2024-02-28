<?php

use ErfanGooneh\T1\Controllers\AuthController;
use ErfanGooneh\T1\Controllers\HomeController;
use ErfanGooneh\T1\Router; 

$router = new Router() ; 
$router->setRoute('/', HomeController::class, 'index');
$router->setRoute('/login', AuthController::class, 'login');
$router->setRoute('/logout', AuthController::class, 'logout');
$router->run() ; 