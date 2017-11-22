<?php
	session_start();

	if(isset($_POST['login']))
	{
		include '../includes/db-config.php';
		
		$psswd = md5($_POST['password']);
		
		//echo $psswd;
		$sqlQuery = "select * from users where email='" . $_POST['email'] . "' and password='" . $psswd  . "'";
		$sqlResult = mysqli_query($sqlConnect,$sqlQuery);
		mysqli_close($sqlConnect);
				
		$sqlRow = mysqli_fetch_array($sqlResult,MYSQLI_ASSOC);
		if(!$sqlRow){
			session_destroy(); 
			header('Location: /tgnet/login.php?err=1');
			exit;
		}
		
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['role'] = $sqlRow['role'];

		header('Location: /tgnet/routine.php');
	}
?>
