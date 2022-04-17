<?php
    namespace app\models\entity;
    use app\models\repository\EntityRepository;

    class User extends EntityRepository{
        protected $id;
        protected $username;
        protected $password;
        protected $email;
        protected $rank;
        protected static $table = "comptes";

        public function __construct($id = "0", $username = "", $email = "", $password = "", $rank = "0"){
            if($id !== "0"){
                $this->id = $id;
                $this->username = $username;
                $this->password = $password;
                $this->email = $email;
                $this->rank = $rank;
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
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of rank
         */ 
        public function getRank()
        {
                return $this->rank;
        }

        /**
         * Set the value of rank
         *
         * @return  self
         */ 
        public function setRank($rank)
        {
                $this->rank = $rank;

                return $this;
        }

        public static function login($username){
            $user = User::select("*", 'username = "'.$username.'"', "");
            if($user != null){
                $password = $_POST["password"];
                if(password_verify($password, $user[0]->password)){
                    $_SESSION["user"] = $user[0];
                }else{
                    return "Mot de passe incorrect";
                }
            }else{
                return "Utilisateur inconnu";
            }
        }
    }


?>