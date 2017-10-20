<?php
	// database related variables
	$database = 'tigernetbd';
	$host = 'localhost';
	$user = 'root';
	$pass = 'rafed';

	// conncet to database
	$sqlConnect = mysqli_connect($host, $user, $pass, $database);
	$conn = new mysqli($host, $user, $pass, $database);

	if(!$sqlConnect){
		echo "Error coneccting DB";
		die(); 
	}
?>
