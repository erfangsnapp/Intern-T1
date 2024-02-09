<?php

namespace ErfanGooneh\T1\Models; 
use ErfanGooneh\T1\Model; 

class User
{
    public $username;
    public $password;
    private bool $is_admin; 
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->is_admin = ($username == "admin" && $password == "admin123");
    }
    public function is_admin()
    {
        return ($this->is_admin); 
    }
}