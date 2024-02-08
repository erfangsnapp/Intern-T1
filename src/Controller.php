<?php

namespace ErfanGooneh\T1 ; 

class Controller
{
    protected function render($view){
        include "Views/$view.php"; 
    }
}