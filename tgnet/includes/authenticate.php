<?php
	session_start();
	
	if(empty($_SESSION['email'])){
		header('Location: index.php?err=2');
	}
?>