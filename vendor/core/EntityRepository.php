<?php
    namespace app;

    use Symfony\Component\VarDumper\VarDumper;

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
    } 

?>