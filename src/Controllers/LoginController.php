<?php

namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;

class LoginController extends Controller
{
    public function index(){
        $this->render('login') ; 
    }
}