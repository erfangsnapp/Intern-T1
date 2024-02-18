<?php

namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\Food;
if(!isset($_SESSION)){
    session_start(); 
}
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
            if($_SESSION['is_admin'] === true){
                http_response_code(400);
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
            else if($instance->is_in_menu)
                $instance->set_out_menu();
            else
                $instance->set_in_menu();
        } 

    }
    
}
