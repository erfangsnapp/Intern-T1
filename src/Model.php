<?php

namespace ErfanGooneh\T1;

use ErfanGooneh\T1\ORM\JsonDB;

class Model{ 
    public $id;
    static protected $db = 'JsonDB';
    private static function get_model_name(){
        $str = get_called_class();
        return substr($str, strrpos($str, '\\') + 1);
    }
    public static function all(){
        $data = self::{self::$db}()->all();
        $result = [];
        foreach ($data as $object){
            $entry = new static(); 
            $entry->loadData($object);
            $result[] = $entry;
        }
        return $result; 
    }
    public static function getById($id){
        $data = self::{self::$db}()->getById($id);
        $entry = new static(); 
        $entry->loadData($data); 
        return $entry; 
    }
    public static function get($arr, $multiple_result=false){
        $data = self::{self::$db}()->get($arr, $multiple_result);
        if(!$multiple_result){
            $entry = new static(); 
            $entry->loadData($data); 
            return $entry;
        }
        $result = []; 
        foreach ($data as $object){
            $entry = new static(); 
            $entry->loadData($object);
            $result[] = $entry;
        }
        return $result; 
    }
    public function read($key){
        return $this->$key;
    }
    public function save(){
        self::{self::$db}()->save($this->ExportData());
    }
    public function loadData(array $data){
        foreach ($data as $key => $value) {
            if(property_exists($this, $key))
                $this->$key = $value;
        }
    } 
    public function ExportData(){
        return get_object_vars($this);
    }
    public static function JsonDB(){
        return new JsonDB(
                [
                'table'=>self::get_model_name()
                ]
            );
    }
}