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

            $sql = "INSERT INTO ".static::$table." VALUES (".$attributes.")";
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
    } 

?>