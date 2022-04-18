<?php
    namespace app\models\entity;
    use app\models\repository\EntityRepository;

    class Article extends EntityRepository{
        protected $nom;
        protected $content;
        protected static $table = 'articles';

        public function __construct($nom = "", $content = ""){
            if($nom != ""){
                $this->nom = $nom;
                $this->content = $content;
            }
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of content
         */ 
        public function getContent()
        {
                return $this->content;
        }

        /**
         * Set the value of content
         *
         * @return  self
         */ 
        public function setContent($content)
        {
                $this->content = $content;

                return $this;
        }
    }


?>