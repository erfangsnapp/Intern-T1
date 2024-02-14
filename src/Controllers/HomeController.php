<?php

namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\Food;
class HomeController extends Controller
{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] === 'GET')
            $this->render('home', ['foods'=>Food::all(), 'is_admin'=>false])  ;
        else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $instance = Food::get($_POST['name']);
            $instance->is_in_menu = !$instance->is_in_menu;
            var_dump($instance); 
            $instance->save();
            die();
        }
    }
    
}
