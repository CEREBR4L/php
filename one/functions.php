<?php

	/*==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--
		PHP FUNCTIONS LOL HOW 2 USE LMAO 
		There is more than a thousand function build into php
	 ==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--*/
	 
	 // Two to the power of 4 using pow()
	 echo pow(2, 4);

	 //wiriting your own finctions 
	 
	 function BestMeme(){
	 	echo "Pointless function";
	 }

	 //calling that function..
	 BestMeme();

	 // func with params 
	 function add($num, $num2){
	 	echo $num + $num2;
	 }

	 //call it with params
	 add(23, 3434);

	 //pass into by ref..
	 $cost = 2;
	 $tax = 0.4;

	 function fuckItUp(&$cost, $tax){
	 	//this changes var outside scope
	 	$cost += 20;

	 	//tax invoked as new var 
	 	$tax += 2002;
	 }

	 fuckItUp($cost, $tax);

	 //default arguments in functions -- if no tax is passed in .654 is used as a default
	 function defaultArgs($cost, $tax=0.654){
	 	echo $cost + ($cost * $tax);
	 }

	 //tax will use default
	 defaultArgs(2345);
	 //tax default over written by me calling func with that argument...
	 defaultArgs(23324, .334);

	 //return satement kills process of current block 
	 function meme($your, $mum){
	 	return $your + $mum;
	 	//this wont run
	 	$your += "Nah";
	 }

	 meme("Lol", "your mum");

	 // something something recursive functions can also be written in php like any other language so ok...
	 
	 //you can write function libs easily by including many functions in one file and then including it in other in the application and 
	 //calling these functions via that - it is reusable and saves time ez, lazy life. 

?>

