<?php
    namespace app;

use Symfony\Component\VarDumper\VarDumper;

    class EntityRepository{

        public function __get($key){
            $method = "get".ucfirst($key);
            return $this->$method();
        }

        public static function all(){
            return app::DB()->query("select * from ".static::TABLE, get_called_class());
        }

        public static function add($object){
            $attributes = "";
            $array = array();
            foreach(get_object_vars($object) as $name => $attr){
                $attributes .= ":" .$name. ", ";
                $array[$name] = $attr;
            }
            $attributes = rtrim($attributes, ", ");
            $sql = "INSERT INTO ".static::TABLE." VALUES (".$attributes.")";
            app::DB()->prepare($sql, $array, get_called_class());
        }
    } 

?>