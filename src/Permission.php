<?php

namespace ErfanGooneh\T1;

use ErfanGooneh\T1\Auth; 

class Permission
{
    static public function isAdmin(){
        if(!Auth::isAuthenticated()){
            return false; 
        }
        $user = Auth::getUser();
        if($user->role == 'admin'){
            return true;
        }
        return false;
    }
    static public function onlyAuthenticated(){
        if(!Auth::isAuthenticated()){
            header('Location: /login');
            die(); 
        }
    }
}