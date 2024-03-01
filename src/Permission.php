<?php

namespace ErfanGooneh\T1;

use ErfanGooneh\T1\Auth; 

class Permission
{
    static public function onlyAdmin(){
        if(!Auth::isAdmin()){
            http_response_code(401);
            die(); 
        }
    }
    static public function onlyAuthenticated(){
        if(!Auth::isAuthenticated()){
            header('Location: /login');
            die(); 
        }
    }
}