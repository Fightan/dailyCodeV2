<?php
    namespace app\models\repository;
    use app\app;

    class EntityRepository{

        public function __get($key){
            $method = "get".ucfirst($key);
            return $this->$method();
        }

        public static function all(){
            return app::DB()->query("select * from ".static::$table, get_called_class());
        }

        public function add(){
            $attributes = "";
            $array = array();

            foreach(get_object_vars($this) as $name => $attr){
                $attributes .= ":" .$name. ", ";
                $array[":".$name] = $attr;
            }
            $attributes = rtrim($attributes, ", ");

            $sql = "INSERT INTO ".static::$table." VALUES (".$attributes.");";
            app::DB()->prepare($sql, $array, get_called_class());
        }

        public static function select($select, $where, $orderBy){
            $sql = "SELECT ".$select." FROM ".static::$table;
            if($where != ""){
                $sql .= " WHERE ".$where;
            }
            if($orderBy != ""){
                $sql .= " ORDER BY ".$orderBy;
            }
            return app::DB()->query($sql, get_called_class());
        }

        public static function delete($where){
            $sql = "DELETE FROM ".static::$table." WHERE ".$where;
            app::DB()->query($sql, get_called_class());
        }

        public static function count(){
            $sql = "SELECT COUNT(*) FROM ".static::$table;
            return app::DB()->queryAssoc($sql)[0]["COUNT(*)"];
        }

        public static function createTable(){
            $primaryKey = "";
            $names = "";

            foreach(get_class_vars(get_called_class()) as $name => $attr){
                if($primaryKey == ""){
                    $primaryKey = '"'.$name.'"';
                }
                $names .= '"'.$name.'" TEXT, ';
            }

            $sql ="CREATE TABLE IF NOT EXISTS ".static::$table." (".$names." PRIMARY KEY(".$primaryKey."));";
            app::DB()->query($sql , get_called_class());
        }

        public static function dropTable(){
            $sql = "DROP TABLE IF EXISTS ".static::$table;
            app::DB()->query($sql, get_called_class());
        }
    } 

?>