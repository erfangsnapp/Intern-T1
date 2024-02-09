<?php

namespace ErfanGooneh\T1\Models; 
use ErfanGooneh\T1\Model; 

class User
{
    public $username;
    public $password;
    private $is_admin = false; 
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password; 
    }
    public function is_admin()
    {
        return ($this->is_admin == true); 
    }
}