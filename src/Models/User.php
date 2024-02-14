<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T1\Model;

class User extends Model
{
    public $username;
    public $password;
    private $is_admin; 
    public function __construct($username, $password)
    {
        parent:: __construct();
        $this->username = $username;
        $this->UID = &$this->username; 
        $this->password = $password;
        $this->is_admin = ($username === "admin" && $password === "admin123");
        $this->save();
    }
    public function is_admin()
    {
        return ($this->is_admin === true); 
    }
}