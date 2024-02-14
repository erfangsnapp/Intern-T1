<?php

namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\User;
use ErfanGooneh\T1\Models\Food;

class LoginController extends Controller
{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] === 'GET')
            $this->render('login') ;
        else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::get($username);
            if($user === NULL){
                $this->render('login', ['error' => 'Invalid username']);
            }
            else if($password !== $user->password){
                $this->render('login', ['error' => 'Invalid username or password']);
            }
            else{
                $this->render('home', ['is_admin'=>$user->is_admin()]) ; 
            }
        }
    }
}
