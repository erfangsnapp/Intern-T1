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
            if($instance === NULL)
                http_response_code(400);
            else if($instance->is_in_menu)
                $instance->set_out_menu();
            else
                $instance->set_in_menu();
        }

    }
    
}
