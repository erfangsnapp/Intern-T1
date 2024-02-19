<?php
namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;
use ErfanGooneh\T1\Models\User;
use ErfanGooneh\T1\Models\Food;
use ErfanGooneh\T1\Auth;

class LoginController extends Controller
{
    public function index(){
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
                $res = [];
                $res['token'] = Auth::generateToken(['username'=>$username]);
                echo json_encode($res); 
            }
        }
    }
}
