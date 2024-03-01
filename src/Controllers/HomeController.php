<?php

namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\Food;
use ErfanGooneh\T1\Auth;
use ErfanGooneh\T1\Permission;

class HomeController extends Controller
{
    public function index(){
        
        Permission::onlyAuthenticated();
        
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->render('home', ['foods'=>Food::all()]);
        }
        else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            Permission::onlyAdmin(); 
            
            $user = Auth::getUser(); 
            
            $name = Food::validate_name($_POST['name']) ;
            if($name === NULL){
                http_response_code(400);
                die(); 
            }
            $instance = Food::get(['name'=>$name]);
            if($instance === NULL)
                http_response_code(400);
            else{
                $instance->swapMenu(); 
                $instance->save(); 
            }
        } 

    }
    
}
