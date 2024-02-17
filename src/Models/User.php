<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T1\Model;

class User extends Model
{
    public $username;
    public $password;
    protected $is_admin; 
    public function __construct($username, $password, $is_admin=false)
    {
        $this->username = $username;
        $this->UID = &$this->username; 
        $this->password = $password;
        $this->is_admin = ($username === "admin" && $password === "admin123");
    }
    public function is_admin()
    {
        return ($this->is_admin === true); 
    }
    public function set_admin(){
        $this->is_admin = true; 
        $this->save(); 
    }
    public static function validate($username, $password){
        $user = User::get($username);
        if($user === NULL)return NULL;
        if($user->password !== $password)return false;
        return $user;
    }
}