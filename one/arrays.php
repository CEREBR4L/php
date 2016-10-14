<?php
		
	//create arrays while defining keys

	$array = array(0 => "Meme", 1 => "Also a meme");

	echo $array[0]; //echo "Meme"

	$things = array("Key" => "The key is used to referance this long ass thing", "ME" => "A long as thing");

	echo $things["Key"]; //echos "The key is used to referance this long ass thing"

	$arrayInArray = array(
			"place" => array("One" => "Things", "Two" => "Things and stuff"),
			"other" => array("Two" => "Second one", "Three" => "Free")
		);

	echo $arrayInArray["place"]["Two"];//echos Things and stuff 

	//php allows you to create an array without defining it first

	$things[0] = "Thing";
	$things[1] = "More Things";

	//or like this... both have the same desired affect in this cose, 
	//also it is possible to add any key in the square brackets as a ref
	
	$stuff[] = "one";
	$stuff[] = "Two";

	//dont define the key for the array
	

	$lol = array("One", "Six", "Eight", "Five");

	$lol[2]; //returns Eight


	//lists are used for simultaneous var assignment but are much like arrays
	//example read file with each line with info seperated by | 
		
	$data = fopen(example.txt, "r");

	while ($line = fgets($data, 4096)){
		list($name, $phone, $thing) = explode("|", $line);
	}

	fclose($data);

	//you can create a number array within a range like so

	$lmao = range(1, 4);
	//this is the same as $lamo = array(1, 2, 3, 4);

	$oioi = range(0, 10, 5);
	//this is the same as $oioi = array(0, 5, 10);
	
	//can also be done with letters
	$letterMe = range("A", "C");
	//same as $letterMe = array("A", "B", "C");
	
	/*
	==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-
	TEST IF ITS AN ARRAY
	==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-==-
	 */
	
	$oo = range(1, 4);
	$OO = "String";

	boolean is_array($oo);	//truu
	boolean is_array($OO);	//not truu

	//outputting arryas lol
	
	foreach ($oo as $o) {
		echo "{$o}<br />";
	}

	//adding to front of an array 
	
	array_unshift($oo, 6, 7); //6, 7, 1, 2, 3, 4

	//adding to the end of an array
	
	array_push($oo, 34, 43); //6, 7, 1, 2, 3, 4, 34, 43

	//remove first from array
	
	array_unshift($oo);	//removes 6

	//remove from end of array
	
	array_pop($oo);	//removes 43

	//search array 
	
	in_array(4, $oo); //tru

	//search array by key 
	
	array_key_exists(0, $oo); //truu?

	//search by array value 
	
	array_search("Meme", $array); //truu

	//get all the keys in an array
	
	array_keys($array); // output Array ([0] => [0]...etc)

	//get all the values in the array

	array_values($array); // output Array ([0] => "Meme"..etc);

	//count amount of values in an array
	
	count($array);

	//sort 
	
	sort($array);
	rsort($array); //reverse sort...

	//join arrays tograther 
	
	$a = range("A", "R");
	$b = rand("S", "M");
	array_merge($a, $b);

	//slice and dice 
	
	array_slice($array, 2, -1);

	//splice / split
	
	array_splice($array, 1);

	// no supprise you can do a lot more moving around playing with arrays
	// with more built in functions but I will learn them as I need them for 
	// now we will leave it as this...

?>