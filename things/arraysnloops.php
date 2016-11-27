<?php

    /*
        VARS AND ARRAYS
    */

    echo "<h1>Vars And ARRAYS</h1>";

    $s = "<br />";

    $myVar1 = 'Hello World';

    echo $myVar1 . ", I am doing a things." . $s;

    $numbers = array(1, 2, 3, 5, 65, 23, 5, 23);

    print_r($numbers);

    echo $s . $numbers[2];

    $ages = array(
        "John" => 23,
        "Fred" => 56,
        "Bob" => 12
    );

    echo $s . $ages['Fred'];

    echo $s . count($ages);

    array_pop($ages);

    array_shift($ages);

    /*
        LOOPS
    */

    echo "<h1>LOOPS</h1>";

    for($i = 0; $i < 10; $i++){
        echo $i .$s; 
    }

    $i = 0;

    while($i <= 10){
        echo "Number: " . $i . $s;
        $i++;
    }

    foreach($numbers as $number){
        echo "This is number: " . $number . $s;
    }

?>

