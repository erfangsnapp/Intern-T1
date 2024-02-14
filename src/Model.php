<?php
namespace ErfanGooneh\T1;

class Model{
    private $NAME; 
    protected $UID;
    public function __construct(){
        $str = get_called_class();
        $this->NAME = substr($str, strrpos($str, '\\') + 1);
    }
    public function db_path(){
        return __DIR__ . "/db/" . $this->NAME . ".json";
    }
    public function all(){
        $f = file_get_contents($this->db_path());
        $result = json_decode($f, true);
        return $result;       
    }
    public function save(){
        $objects = $this->all() ;
        $result = [];
        $props = get_object_vars($this);
        foreach ($props as $key => $value) {
            $result += [$key => $value];
        }
        $objects[$this->UID] = $result ; 
        $f = fopen($this->db_path(), "w");
        fwrite($f, json_encode($objects));
    }

}