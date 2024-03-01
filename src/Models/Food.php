<?php

namespace ErfanGooneh\T1\Models;
use ErfanGooneh\T1\Model; 
    
class Food extends Model
{
    protected string $name; 
    protected float $price;
    protected string $picture;
    protected bool $is_in_menu=false; 

    public static $fieldRules = [
      'name' => ['type'=>'string', 'max_length' => 50], 
      'price' => ['type'=>'float', 'min' => 0],
      'picture' => ['type'=>'string', 'max_length' => 255],
      'is_in_menu' => ['type'=>'bool']
    ];

    
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
}