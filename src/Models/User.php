<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T1\Model;

class User extends Model
{
    protected string $username;
    protected string $password;
    protected bool $is_admin=false; 
    public static $fieldRules = [
       'username' => ['type'=>'string', 'max_length' => 50, 'required'=>true],
       'password' => ['type'=>'password', 'required'=> true],
       'is_admin' => ['type'=>'bool']
    ];


    public function is_admin()
    {
        return ($this->is_admin === true); 
    }
    public function set_admin(){
        $this->is_admin = true; 
        $this->save(); 
    }
    public static function validate($username, $password){
        $user = User::get(['username'=>$username]);
        if($user === NULL)return NULL;
        if(!password_verify($password, $user->password))return false;
        return $user;
    }

}