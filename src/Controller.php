<?php

namespace ErfanGooneh\T1; 

use ErfanGooneh\T1\Auth; 

class Controller
{
    protected function render($view, $data = []){
        extract($data); 
        $user = Auth::getUser();
        include "Views/$view.php"; 
    }
    
}

