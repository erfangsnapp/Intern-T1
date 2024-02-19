<?php

namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\Food;
use ErfanGooneh\T1\Auth;

class HomeController extends Controller
{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            if(!isset($_SESSION['username'])){
                header('Location: /login');
            }
            else
                $this->render('home', ['foods'=>Food::all()]);
        }
        else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user = Auth::getUser(); 
            if($user === NULL || $user->is_admin !== true){
                http_response_code(401);
                die(); 
            }
            $name = Food::validate_name($_POST['name']) ;
            if($name === NULL){
                http_response_code(400);
                die(); 
            }
            $instance = Food::get($name);
            if($instance === NULL)
                http_response_code(400);
            else if($instance->is_in_menu === true)
                $instance->set_out_menu();
            else
                $instance->set_in_menu();
        } 

    }
    
}
