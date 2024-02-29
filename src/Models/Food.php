<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T1\Model ; 
class Food extends Model
{
    protected $name; 
    protected $price;
    protected $picture;
    protected $is_in_menu=false; 
    public function set_in_menu(){
        $this->is_in_menu = true; 
    }
    public function set_out_menu(){
        $this->is_in_menu = false;
    }
    public function swapMenu(){
        if ($this->is_in_menu)
            $this->set_out_menu();
        else
            $this->set_in_menu();
    }
    public static function validate_name($name){
        return preg_match('/^[a-zA-Z\s\']+$/i', $name) ? $name : NULL; 
    }
}