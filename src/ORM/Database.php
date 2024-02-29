<?php

namespace ErfanGooneh\T1\ORM;

abstract class Database{
    protected $table; 
    public function __construct($table){
        $this->table = $table;
    }
    abstract public function save($data); 
    abstract public function get($arr, $multiple_result=false);
    abstract public function getById($id);
    abstract public function all();
    abstract public function create($data);
//    abstract public function delete($id);
//    abstract public function update($id, $data);
}
