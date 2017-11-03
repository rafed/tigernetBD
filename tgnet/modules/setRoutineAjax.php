<?php
	if(isset($_GET['submit'])){
		include '../includes/db-config.php';

		if($_GET['submit'] == 'delete'){
			$query = "DELETE FROM courseSchedule WHERE day='".$_GET['day']. "' AND duration='".$_GET['duration']."'";
			$sqlResult=mysqli_query($sqlConnect,$query);

			if(mysqli_affected_rows($sqlConnect)>0){
				echo "true";
			}
			else {
				echo "false";
			}

			mysqli_close($sqlConnect); 
		}
	}
?>
