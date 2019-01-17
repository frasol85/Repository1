<?php
/*
IS 448
Ray Rasolofonera
Deliverable 6
12/18/2018
File: strongORnot.php 

This file check if the new Password is strong or weak 
The password has to be: 
-at least one upper case letter, at least one lower case letter
-at least one number and is at least 6 characters long

*/

$password = $_GET["pass"];

$U_case = preg_match('@[A-Z]@', $password);
$L_case = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);

//Uncomment the line below if you want to see if the password is coming correctly into the PHP program
//echo "$password <br />";


if(!$U_case || !$L_case || !$number || (strlen($password) < 6)) {
  echo "Weak password";
}
else{
	echo "Strong password";
}


?>