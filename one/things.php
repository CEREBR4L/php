
<h1>PHP Things</h1>

<?php

/*

	MULTI 
	LINE
	COMMENTS 
	LOL 

 */

//variables 
$one = 1;
$two = "String";
$one = $one + 2;
$three = $one; 

//printing text via variable...
print $two;
print("<p>Hello lol</p>")

//echoing 
$var1 = "Hello";
$var2 = "What"
//can be writien both ways..
echo $var1, "there. ", $var2, " you want?";
echo "$var1 there. $var2 you want?";

//printf yer lol
printf("There is %d bottles.", 1099);
printf("%d bottles cost $%f", 100, 123.23);

//booleans
$bool = false;
$bool = -1; //true
$bool = 0; //false
$bool = 1; //true
$bool = true;

//ints 
$int = 42; // decimal
$int = -678900; // decimal
$int = 0755; // octal
$int = 0xC4E; // hexadecimal


//floats 
$float = 2.3;
$float = 3.432;
$float = 7.7e4;
$float = 1.23E+11;

//strings 
$str = 'heloo';
$str = "STRING 445342231432.34324";

//treating strings like arrays... 
$t = str[1];

//objects lol
class thing{

	private $state;

	function setState($a){

		$this->state = $a;

	}

}

$good = new thing;
$good->setState("active");

//forcing data types
$int = (int) "this is a string but will return an integer";

$state = "Off";
$obj = (object) $state;
print $obj->scalar; //returns off?

$str1 = "Hello";
$str2 =& $str1; // both vars now Hello
$str2 = &$str1; // same thing written slightly differently...
$str2 = "SEE yar."; //both vars are now SEE yar.

function locals(){
	$lol = "lolzor";
	print $lol; 
	//$lol variable is local and can only be used inside this function.
}

$global = "Hello I am global scoped var lol";

function getGlobal(){
	global $global; 
	echo "$global, funny.";
}

STATIC $stat = 0; 

function addStatic(){

	static $stat 

	$stat++;
	echo "$stat <br />";

}

addStatic();
addStatic();
addStatic();
//$stat should now return 3 :)
//
//kk i am bored now and still hate u php lol

?>


<h3><?php 
//dumb ass php in html bs...
echo "Welcome to PHP Things.";
?></h3>

