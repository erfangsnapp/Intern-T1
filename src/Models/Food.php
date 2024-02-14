<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T1\Model ; 
class Food extends Model
{
    public $name; 
    public $price;
    public $picture;
    protected $is_in_menu; 

    public function __construct($name , $price, $picture, $is_in_menu=false){
        $this->name = $name; 
        $this->UID = &$this->name ;
        $this->price = $price;
        $this->picture = $picture;
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