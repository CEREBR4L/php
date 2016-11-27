<?php

    class User{

        public function __construct(){
            echo "Constructor <br />";
        }

        public function register(){
            echo "User registered <br />";
        }

        public function login($username, $password){
            echo $username . " is now logged in <br />";
            $this->authUser($username, $password);
        }

        public function authUser($username, $password){
            echo $username . " is authenticated <br />";
        }

        public function __destruct(){
            echo "Destructor!";
        }

    }

    $user = new User;
    $user->register();
    $user->login("Bob", "123");

?>

