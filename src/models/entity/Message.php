<?php
    namespace app\models\entity;
    use app\models\repository\EntityRepository;

    class Message extends EntityRepository{
        protected $id;
        protected $message;
        protected $auteur;
        protected $date;
    }

?>