<?php  
	//get things.php coz i can lol
	include(things.php);
	//or make sure you are not calling the same file multiple times with...
	include_once(things.php);

	//you can also require this will always load the file even if it sits in a block that evals false coz lol php... 
	require(things.php);
	//and meme you can also require juan time lol
	require_once(things.php);

	//you can define constants as such
	define("PI", 3.141592);
	//and use them like normal variables.
	$pi2 = PI * 2;

	@error_supression //whatever tha fuk tht is
	
	//php follows basic math rules 
	$total = 1 + 1 * 0.8;
	//the above is the same as
	$total = 1 + (1 * 0.8);

	$math = 5; //assign math to 5
	$math += 2; //add two to what is already assigned
	$math *= 20; //multiple what math already is by the number on the right.
	$math /= 5; //devide what math already is by the number on the right.
	$math .= 2; //math = math concated with 2... so if the number is 1, it becomes 12.

	//contacting strings too...
	$str = "things are";
	$str .= "cool";

	//the if statement lol
	$numbar = 2345345;

	if($numbar = $_POST['guess']){
		echo "<p>CORRECT LOL</p>";
	}

	//this is also valid....
	if($number == $_POST['guess']) echo "<p>CORRECT LOL</p>";

	//else lol and elseif lol
	if ($numbar == $_POST['lol']) {
		echo "cool";
	}
	elseif($numbar == null){
		echo "we fucked up lol";
	}
	else{
		echo "looooooser lol";
	}

	//switching up on u muhfukaz
	switch ($numbar) {
		case 123:
			echo "it is 123";
			break;
		case null:
			echo "we still fuken up lol";
			break;
		default:
			echo "fuk u big boi";
			break;
	}

	//loooooooooops
	//while..
	while ($numbar <= 10000) {
		echo $numbar++;
	}

	//do while
	do{
		echo $numbar++
	} while ($numbar < 243890573495);

	//for looooooooops
	for ($i=0; $i < 10; $i++) { 
		echo $i;
	}

	//foreach loops
	$arr = array(1, 2, 3, 4);

	foreach ($arr as $num) {
		echo $num;
	}

	
	$dundun = false;
	while ($numbar <= 102354523) {
		if ($dundun) {
			//break will stop a loop block.
			break;
		}

		if(!$dundun){
			//goto pikme out of the looop
			goto pikme;
		}
	}

	pikme: 
		echo "lol i got picked";

	while ($numbar <= 44534510) {
		if (!$dundun) {
			//breaks loop but goes to next iteration rather than stopping dead in it's trackz
			continue;
		}
		$numbar++;
	}

	//lol f u php

?>


