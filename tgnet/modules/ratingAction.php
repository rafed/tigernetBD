<?php
	include '../includes/db-config.php';
	$query="insert into courseRating values('$_POST[roll]','$_POST[rating]')";
	$sqlResult=mysqli_query($sqlConnect,$query);
	
	if(mysqli_affected_rows($sqlConnect)>0){
		echo "Done";
	}
	else{
		echo "Error";
	}
	mysqli_close($sqlConnect); 
?>