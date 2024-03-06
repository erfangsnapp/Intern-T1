<?php

namespace ErfanGooneh\T1; 

use ErfanGooneh\T1\ORM\JsonDB;
use ErfanGooneh\T1\ORM\MySQL;

class Application{
    public static Application $app;
    public Router $router;
    public $db; 

    public function __construct($config){ 
        $this->router = new Router(); 
        $this->db = new MySQL($config['db']);
        self::$app = $this;
    }
}