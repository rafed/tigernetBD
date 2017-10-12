<?php 
	session_start();
	session_destroy();
	header('Location: /tgnet/index.php');
?>