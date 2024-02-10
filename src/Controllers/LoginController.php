<?php

namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\User;

class LoginController extends Controller
{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] === 'GET')
            $this->render('login') ;
        else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new User($username, $password); 
            $this->render('home', ['is_admin'=>$user->is_admin()]) ; 
        }
    }
}
