<?php

    class First{

        public $id = 23;
        protected $name = "John Doe";

        public function saySomething(){
            echo "Something...";
        }

    }

    class Second extends First{

        public function getName(){
            echo $this->name;
        }

    }

    $second = new Second;

    echo $second->saySomething() . "<br />";

    echo $second->getName();

?>

