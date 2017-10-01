<?php
// database related variables
	$database = 'tigernetbd';
	$host = 'localhost';
	$user = 'root';
	$pass = 'rafed';

	// conncet to database
	$sqlConnect=mysqli_connect('localhost','root','rafed','tigernetbd');

	if(!$sqlConnect){
		echo "Error coneccting DB";
		die(); 
	}
?>
