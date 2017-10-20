<?php

	if(isset($_POST['submit']))
	{
		include '../../includes/db-config.php';
		
		$option=$_POST['option'];
		$amount=$_POST['amount'];
		$dt=$_POST['date'];
		if($dt==""){
			$dt=date("Y-m-d");
		}
		
		$sqlQuery ="INSERT INTO revenue (category,amount,dateOfEntry) VALUES ('$option', '$amount', '$dt')";

		$sqlResult = mysqli_query($sqlConnect,$sqlQuery);
		#mysqli_close($sqlConnect);
				
		
		if ($sqlResult == true) {

            $message = "Inserted successfully.";
                echo "<script>alert('$message')</script>";
                echo "
					<script type='text/javascript'>
						window.location='../../addRevenue.php';            
					</script>";
         } else {
			echo "Error: " . $sqlQuery . "<br>" . mysqli_error($sqlConnect);
		}
		#header('Location:../../addRevenue.php');
	}
?>