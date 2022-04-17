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

        public function getId_sujet()
        {
            return $this->id_sujet;
        }
        
        public function getNom_sujet()
        {
            return $this->nom_sujet;
        }

        public function getCategories()
        {
            return $this->categories;
        }

        public function getAuteur()
        {
            return $this->auteur;
        }
        
        public function getReponses()
        {
            return $this->reponses;
        }

        public function getDate()
        {
            return $this->date;
        }

        // public function setId_sujet($id_sujet)
        // {
        //     $this->id_sujet = $id_sujet;
        //     return $this;
        // }

        // public function setNom_sujet($nom_sujet)
        // {
        //     $this->nom_sujet = $nom_sujet;
        //     return $this;
        // }

        // public function setAuteur($auteur)
        // {
        //     $this->auteur = $auteur;
        //     return $this;
        // }

        // public function setReponses($reponses)
        // {
        //     $this->reponses = $reponses;
        //     return $this;
        // }

        // public function setDate($date)
        // {
        //     $this->date = $date;
        //     return $this;
        // }

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