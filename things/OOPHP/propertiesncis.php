<?php

    class User{

        private $id; 
        private $username;
        private $email;
        private $password;

        public function __construct($username, $password){
            $this->username = $username;
            $this->password = $password;
            echo "Constructor <br />";
        }

        public function register(){
            echo "User registered <br />";
        }

        public function login(){
            $this->authUser();
        }

        public function authUser(){
            echo $this->username . " is authenticated <br />";
        }

        public function __destruct(){
            echo "Destructor!";
        }

    }

    $user = new User("Bobby",  "dfwefewfewf");
    $user->register();
    $user->login();

?>

