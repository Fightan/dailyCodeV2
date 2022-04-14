<?php
    namespace app\models\entity;
    use app\EntityRepository;
    use app\app;

    class CategorieEntity extends EntityRepository{
        protected $id;
        protected $nom;
        protected static $table = "categories";

        public function __construct($id = "0", $nom = "New category"){
            if($id !== "0"){
                $this->id = $id;
                $this->nom = $nom;
            }
        }

        public function getId()
        {
            return $this->id;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        public function setNom($nom)
        {
            $this->nom = $nom;
            return $this;
        }
    }


?>