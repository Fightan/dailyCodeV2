<?php
    namespace app\models\entity;
    use app\models\repository\EntityRepository;

    class UserStats extends EntityRepository{
        protected $id;
        protected $visitsToday;
        protected $visitsAllTime;
        protected $nombreSujets;
        protected $nombreMessages;
        protected $todayDate;
        protected static $table = "user_stats";

        public function __construct($id = "0", $visitsToday = 0, $visitsAllTime = 0, $nombreSujets = 0, $nombreMessages = 0, $todayDate = "Ajourdh'ui"){
            if($id != "0"){
                $this->id = $id;
                $this->visitsToday = $visitsToday;
                $this->visitsAllTime = $visitsAllTime;
                $this->nombreSujets = $nombreSujets;
                $this->nombreMessages = $nombreMessages;
                $this->todayDate = $todayDate;
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
         * Get the value of visitsToday
         */ 
        public function getVisitsToday()
        {
                return $this->visitsToday;
        }

        /**
         * Set the value of visitsToday
         *
         * @return  self
         */ 
        public function setVisitsToday($visitsToday)
        {
                $this->visitsToday = $visitsToday;

                return $this;
        }

        /**
         * Get the value of visitsAllTime
         */ 
        public function getVisitsAllTime()
        {
                return $this->visitsAllTime;
        }

        /**
         * Set the value of visitsAllTime
         *
         * @return  self
         */ 
        public function setVisitsAllTime($visitsAllTime)
        {
                $this->visitsAllTime = $visitsAllTime;

                return $this;
        }

        /**
         * Get the value of nombreSujets
         */ 
        public function getNombreSujets()
        {
                return $this->nombreSujets;
        }

        /**
         * Set the value of nombreSujets
         *
         * @return  self
         */ 
        public function setNombreSujets($nombreSujets)
        {
                $this->nombreSujets = $nombreSujets;

                return $this;
        }

        /**
         * Get the value of nombreMessages
         */ 
        public function getNombreMessages()
        {
                return $this->nombreMessages;
        }

        /**
         * Set the value of nombreMessages
         *
         * @return  self
         */ 
        public function setNombreMessages($nombreMessages)
        {
                $this->nombreMessages = $nombreMessages;

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

        /**
         * Get the value of todayDate
         */ 
        public function getTodayDate()
        {
                return $this->todayDate;
        }

        /**
         * Set the value of todayDate
         *
         * @return  self
         */ 
        public function setTodayDate($todayDate)
        {
                $this->todayDate = $todayDate;

                return $this;
        }
    }


?>