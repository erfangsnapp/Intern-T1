<?php

namespace ErfanGooneh\T1\Controllers;
use ErfanGooneh\T1\Controller;

class HomeController extends Controller
{
    public function index($data=[]){
        if($_SERVER['REQUEST_METHOD'] === 'GET')
            $this->render('home', $data) ;
    }
}
