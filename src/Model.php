<?php
namespace ErfanGooneh\T1;

class Model{ 
    protected $UID;
    private static function get_model_name(){
        $str = get_called_class();
        return substr($str, strrpos($str, '\\') + 1);
    }
    public static function db_path(){
        return __DIR__ . "/db/" . self::get_model_name() . ".json";
    }
    public static function all(){
        $f = file_get_contents(self::db_path());
        $result = json_decode($f, true);
        return $result;       
    }
    public static function get($UID){
        $objects = self::all();
        unset($objects["UID"]);
        return new self(...$objects);
    }
    public function save(){
        $objects = self::all();
        $result = [];
        $props = get_object_vars($this);
        foreach ($props as $key => $value) {
            $result += [$key => $value];
        }
        $objects[$this->UID] = $result ; 
        $f = fopen(self::db_path(), "w");
        fwrite($f, json_encode($objects));
    }

}