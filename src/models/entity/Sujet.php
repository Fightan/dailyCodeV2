<?php
    namespace app\models\entity;
    use app\models\repository\EntityRepository;

    class Sujet extends EntityRepository{
        protected $id_sujet;
        protected $nom_sujet;
        protected $message;
        protected $categories;
        protected $auteur;
        protected $reponses;
        protected $date;
        protected static $table = "forum";
       
        public function __construct($id_sujet = "0", $nom_sujet = "New subject", $message = "New message", $categories = "1", $auteur = "Anonym", $reponses = 0, $date = "Today"){
            if($id_sujet !== "0"){
                $this->id_sujet = $id_sujet;
                $this->nom_sujet = $nom_sujet;
                $this->message = $message;
                $this->categories = $categories;
                $this->auteur = $auteur;
                $this->reponses = $reponses;
                $this->date = $date;
            }
        }

        /**
         * Get the value of id_sujet
         */ 
        public function getId_sujet()
        {
                return $this->id_sujet;
        }

        /**
         * Set the value of id_sujet
         *
         * @return  self
         */ 
        public function setId_sujet($id_sujet)
        {
                $this->id_sujet = $id_sujet;

                return $this;
        }

        /**
         * Get the value of nom_sujet
         */ 
        public function getNom_sujet()
        {
                return $this->nom_sujet;
        }

        /**
         * Set the value of nom_sujet
         *
         * @return  self
         */ 
        public function setNom_sujet($nom_sujet)
        {
                $this->nom_sujet = $nom_sujet;

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
         * Get the value of categories
         */ 
        public function getCategories()
        {
                return $this->categories;
        }

        /**
         * Set the value of categories
         *
         * @return  self
         */ 
        public function setCategories($categories)
        {
                $this->categories = $categories;

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
         * Get the value of reponses
         */ 
        public function getReponses()
        {
                return $this->reponses;
        }

        /**
         * Set the value of reponses
         *
         * @return  self
         */ 
        public function setReponses($reponses)
        {
                $this->reponses = $reponses;

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