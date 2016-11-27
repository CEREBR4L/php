<?php

    class Bar extends Foo{


        //this wont work as trying to override the final
        //method from Foo -> final public function sayHello()
        public function sayHello(){
            echo "Hello from Bar!";
        }

    }

?>

