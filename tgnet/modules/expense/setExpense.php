<?php

	if(isset($_POST['submit']))
	{
		include '../../includes/db-config.php';
		
		$category=$_POST['category'];
		$amount=$_POST['amount'];
		$dt=$_POST['date'];
		if($dt==""){
			$dt=date("Y-m-d");
		}
		
		$sqlQuery ="INSERT INTO expense (category,amount,dateOfEntry) VALUES ('$category', '$amount', '$dt')";

		$sqlResult = mysqli_query($sqlConnect,$sqlQuery);
		#mysqli_close($sqlConnect);
				
		
		if ($sqlResult == true) {

            $message = "Inserted successfully.";
                echo "<script>alert('$message')</script>";
                echo "
					<script type='text/javascript'>
						window.location='../../addExpense.php';            
					</script>";
         } else {
			echo "Error: " . $sqlQuery . "<br>" . mysqli_error($sqlConnect);
		}
		#header('Location:../../addExpense.php');
	}
?>
