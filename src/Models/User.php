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
    public function validate(){
        $users = User::all();
        if(!isset($users[$this->username]))return NULL;
        if($users[$this->username]->password !== $this->password)return false;
        return User::get($this->username); 
    }
}