<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T
class Food
{
    public $name; 
    public $price;
    private $is_in_menu; 

    public function __conrstruct($name , $price){
        $this->name = $name; 
        $this->price = $price;
        $this->is_in_menu = false;
    }

    public function set_in_menu(){
        $this->is_in_menu = true; 
    }
    public function set_out_menu(){
        $this->is_in_menu = false;
    }
}