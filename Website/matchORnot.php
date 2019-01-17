
<?php
/*
IS 448
Ray Rasolofonera
Deliverable 6
12/18/2018
File: matchORnot.php 
This file check if the user new and confirmed password matches or not
Used for the ajax function
*/

$password = $_GET["pass"];
$password1 = $_GET["pass1"];


//if($_GET["pass"] == $_GET["pass1"])
if($password == $password1)
{
	echo "It Matches";
}
else{
	echo"Does not Match";
}

?>