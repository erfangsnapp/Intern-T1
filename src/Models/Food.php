<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T1\Model ; 
class Food extends Model
{
    public $name; 
    public $price;
    private $is_in_menu; 

    public function __conrstruct($name , $price){
        parent:: __construct();
        $this->name = $name; 
        $this->UID = &$this->name ;
        $this->price = $price;
        $this->is_in_menu = false;
        $this->save();
    }

    public function set_in_menu(){
        $this->is_in_menu = true; 
    }
    public function set_out_menu(){
        $this->is_in_menu = false;
    }
}