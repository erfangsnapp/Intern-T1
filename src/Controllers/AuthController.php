<?php
namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\User;
use ErfanGooneh\T1\Models\Food;
use ErfanGooneh\T1\Auth;

class AuthController extends Controller
{
    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->render('login') ;
        }
        else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $status = User::validate($username, $password); 
            if($status === NULL){
                $this->render('login', ['error' => 'Invalid username']);
            }
            else if($status === false){
                $this->render('login', ['error' => 'Invalid username or password']);
            }
            else{
                $token = Auth::generateToken(['username'=>$username]);
                setcookie('token', $token, time() + 3600 * 24, '/', '', false, true);
                header('Location: /');
                exit(); 
            }
        }
    }
    public function logout(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            setcookie('token', '', time() - 3600, '/', '', false, true);
            header('Location: /login');
            exit(); 
        }
        else{
            http_response_code(400);
        }
    }
}
