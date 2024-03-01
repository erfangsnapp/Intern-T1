<?php

namespace ErfanGooneh\T1;

use ErfanGooneh\T1\Auth; 

class Permission
{
    static public function isAdmin(){
        if(!Auth::isAuthenticated()){
            return false; 
        }
        return self::getPayload($_COOKIE['token'])['is_admin']; 
    }
    static public function onlyAuthenticated(){
        if(!Auth::isAuthenticated()){
            header('Location: /login');
            die(); 
        }
    }
}