<?php
	// database related variables
	$database = 'tigernetbd';
	$host = 'localhost';
	$user = 'root';
	$pass = '';

	// conncet to database
	$sqlConnect=mysqli_connect($host, $user, $pass, $database);

	if(!$sqlConnect){
		echo "Error coneccting DB";
		die(); 
	}
?>
