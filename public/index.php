<?php

require '../vendor/autoload.php';

use ErfanGooneh\T1\Application; 

use ErfanGooneh\T1\Controllers\AuthController;
use ErfanGooneh\T1\Controllers\HomeController;

$config = [
    'db' => [
        'servername' => 'db', 
        'username' => 'root', 
        'password' => 'adminadmin123',
        'dbname' => 'app'
    ]
];

$app = new Application($config);  
$router = $app->router ; 
$router->setRoute('/', HomeController::class, 'index');
$router->setRoute('/login', AuthController::class, 'login');
$router->setRoute('/logout', AuthController::class, 'logout');
$router->run();

