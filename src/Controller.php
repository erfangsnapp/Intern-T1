<?php

namespace ErfanGooneh\T1 ; 

class Controller
{
    protected function render($view, $data = []){
        extract($data); 
        include "Views/$view.php"; 
    }
    
}