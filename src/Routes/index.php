<?php

use ErfanGooneh\T1\Controllers\LoginController;
use ErfanGooneh\T1\Controllers\LogoutController;
use ErfanGooneh\T1\Controllers\HomeController;
use ErfanGooneh\T1\Router; 

$router = new Router() ; 
$router->setRoute('/', HomeController::class, 'index');
$router->setRoute('/login', LoginController::class, 'index');
$router->setRoute('/logout', LogoutController::class, 'index');
$router->run() ; 