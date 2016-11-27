<?php 

    echo "<h1>FUNctions</h1>";

    $s = "<br />";

    function greet(){
        global $s;
        echo "Hello World" . $s;
    }

    greet();

    function greeet($name='Bob'){
        echo "hello, " . strtoupper($name);
    }

    greeet("Jeff");

    echo "<h1>Conditionals</h1>";

    $num = 10;

    if($num == 10){
        echo "Correct";
    }
    elseif($num < 10){
        echo "Too low";
    }
    else{
        echo "Wrong!";
    }

    $something = 0;
    $b = 23;

    if($something > 0 || $b < 19){
        echo "Hello";
    }

    if($something == 0 && $b > 10){
        echo "Somethings";
    }

?>

