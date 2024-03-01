<?php

namespace ErfanGooneh\T1\ORM; 

use ErfanGooneh\T1\ORM\Database;

class MySQL extends Database{
    private $server;
    private $user;
    private $password;
    private $conn; 
    public function __construct($config){
        parent::__construct($config['table']);
        $this->server = $config['server'];
        $this->user = $config['user'];
        $this->pass = $config['password'];
    }
    public function connect(){
        $this->conn = new mysqli($this->server, $this->user, $this->pass);
    }
}