<?php
	session_start();

	$email = $_SESSION['email'];
	$role = $_SESSION['role'];

	if(empty($email) || $role != 'student'){
		header('Location: index.php?err=2');
	}
?>

<!DOCTYPE html>
<html>

<head>
	<?php include 'includes/header.php'; ?>
	<title>Student</title>
</head>

<body>
	<div class="container-fluid">
		<?php include 'includes/topmenu.php'; ?>
	</div>
</body

</html>