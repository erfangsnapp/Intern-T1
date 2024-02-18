<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T1\Model;

class User extends Model
{
    public $username;
    public $password;
    protected $is_admin; 
    public function __construct($username, $password, $is_admin)
    {
        $this->username = $username;
        $this->UID = &$this->username; 
        $this->password = $password;
        $this->is_admin = $is_admin;
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
        if(!password_verify($password, $user->password))return false;
        return $user;
    }
}