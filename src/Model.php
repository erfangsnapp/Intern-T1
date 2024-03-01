<?php

namespace ErfanGooneh\T1;

use ErfanGooneh\T1\Application; 

class Model{ 
    public $id;
    private static function get_model_name(){
        $str = get_called_class();
        return substr($str, strrpos($str, '\\') + 1);
    }
    public static function all(){
        $data = Application::$app->db->all(self::get_model_name());
        $result = [];
        foreach ($data as $object){
            $entry = new static(); 
            $entry->loadData($object);
            $result[] = $entry;
        }
        return $result; 
    }
    public static function getById($id){
        $data = Application::$app->db->getById(self::get_model_name(), $id);
        $entry = new static(); 
        $entry->loadData($data); 
        return $entry; 
    }
    public static function get($arr, $multiple_result=false){
        $data = Application::$app->db->get(self::get_model_name(), $arr, $multiple_result);
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
        Application::$app->db->save(self::get_model_name(), $this->exportData());
    }
    public function loadData(array $data){
        foreach ($data as $key => $value) {
            if(property_exists($this, $key))
                $this->$key = $value;
        }
    } 
    public function exportData(){
        return get_object_vars($this);
    }
}