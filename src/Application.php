<?php

namespace ErfanGooneh\T1; 

use ErfanGooneh\T1\ORM\JsonDB;

class Application{
    public static Application $app;
    public Router $router;
    public $db; 

    public function __construct($config){ 
        $this->router = new Router(); 
        $this->db = new JsonDB();
        self::$app = $this;
    }
}