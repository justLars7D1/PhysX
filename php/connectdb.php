<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "physx";
	
$connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Couldn't find/connect (to) the database!");

?>