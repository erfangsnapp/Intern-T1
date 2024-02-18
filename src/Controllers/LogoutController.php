<?php
namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\User;
use ErfanGooneh\T1\Models\Food;

session_start(); 

class LogoutController extends Controller
{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            session_unset();
            session_destroy(); 
            header('Location: /login');
            exit(); 
        }
        else{
            http_response_code(400);
        }
    }
}
