<?php

namespace ErfanGooneh\T1\ORM; 

use ErfanGooneh\T1\ORM\Database;

class JsonDB extends Database{
    public function __construct($config){
        parent::__construct($config['table']);
    }
    public function db_path(){
        return __DIR__ . "/../db/" . $this->table . ".json";
    }
    public function all(){
        $f = file_get_contents($this->db_path());
        $result = json_decode($f, true);
        return $result;       
    }
    public function getById($id){
        $all = self::all();
        if(!isset($all[$id]))return NULL;
        return $all[$id];
    }
    public function get($arr, $multiple_result=false){
        $all = self::all(); 
        foreach ($all as $id => $entry){
            foreach ($arr as $key => $value){
                if($entry[$key] != $value)
                    unset($all[$id]);
            }
        }
        if($multiple_result)
            return $all; 
        return reset($all); 
    }
    public function create($data){
        $all = self::all(); 
        $id_number = (end($all)['id']+1); 
        $data['id'] = $id_number; 
        $this->save($data); 
    }
    public function save($data){
        $objects = self::all();
        $objects[$data['id']] = $data ; 
        $f = fopen($this->db_path(), "w");
        fwrite($f, json_encode($objects));
    }
}

