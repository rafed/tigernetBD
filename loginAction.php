<?php
	session_start();

	if(isset($_POST['login']))
	{
		include 'includes/db-config.php';
		
		$sqlQuery = "select * from users where email='$_POST[email]' and password='$_POST[password]'";
		$sqlResult = mysqli_query($sqlConnect,$sqlQuery);
		mysqli_close($sqlConnect);
				
		$sqlRow = mysqli_fetch_array($sqlResult,MYSQLI_ASSOC);
		if(!$sqlRow){
			session_destroy(); 
			header('Location: index.php?err=1');
			exit;
		}
		
		$_SESSION['email'] = $_POST[email];
		$_SESSION['role'] = $sqlRow['role'];

		header('Location: routine.php');
		/*** User roles ***/
		// if($role == "accountant"){
		// 	header('Location: accountant.php');
		// 	exit;
		// }
		
		// if($role == "course manager"){
		// 	header('Location: courseManager.php');
		// 	exit;
		// }

		// if($role == "student"){
		// 	header('Location: student.php');
		// 	exit;
		// }

		// if($role == "teacher"){
		// 	header('Location: teacher.php');
		// 	exit;
		// }
	}
?>
