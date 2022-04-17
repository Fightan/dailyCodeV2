<?php
    namespace app\models\entity;
    use app\models\repository\EntityRepository;

    class Message extends EntityRepository{
        protected $id;
        protected $message;
        protected $auteur;
        protected $date;
        protected static $table = "messages";

        public function __construct($id = "0", $message = "Vide", $auteur = "Anonyme", $date = "Aujourd'hui"){
            if($id != "0"){
                $this->id = $id;
                $this->message = $message;
                $this->auteur = $auteur;
                $this->date = $date;
            }
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of message
         */ 
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */ 
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }

        /**
         * Get the value of auteur
         */ 
        public function getAuteur()
        {
                return $this->auteur;
        }

        /**
         * Set the value of auteur
         *
         * @return  self
         */ 
        public function setAuteur($auteur)
        {
                $this->auteur = $auteur;

                return $this;
        }

        /**
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        /**
         * Get the value of table
         */ 
        public static function getTable()
        {
                return self::$table;
        }

        /**
         * Set the value of table
         *
         * @return  self
         */ 
        public static function setTable($table)
        {
                self::$table = $table;
        }
    }

?>