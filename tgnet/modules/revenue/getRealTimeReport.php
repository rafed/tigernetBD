<?php
	if(isset($_POST['submit']))
	{
		include '../../includes/db-config.php';
		$date1=$_POST['dateFrom'];
		$date2=$_POST['dateTo'];

		$sql ="select category,amount,DATE(dateOfEntry) from revenue where DATE(dateOfEntry) between '$date1' and '$date2' order by DATE(dateOfEntry)";
            $result = $conn->query($sql);
            if ($result == true) {
				$row1=null;
				$totalBill=0;
				$i=0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

						$row1[$i] = $row;
						$totalBill+=$row['amount'];
						$i++;
					}
                    
                }
			}
			else {
                echo $conn->error;
			}
			
			$sql ="select paymentAmount,DATE(paymentDate) from coursePayment where DATE(paymentDate) between '$date1' and '$date2' order by DATE(paymentDate)";
			$result = $conn->query($sql);
            if ($result == true) {
				
                if ($result->num_rows > 0) {
                	$row=null;
                	$row['category']='short course';
                	
                    while ($row2 = $result->fetch_assoc()) {
                    	
						$row['paymentAmount']=$row2['paymentAmount'];
						$row['paymentDate']=$row2['DATE(paymentDate)'];
						$row1[$i] = $row;
						$totalBill+=$row['paymentAmount'];
						$i++;
					}
                }
			}
			else {
                echo $conn->error;
			}
			
		$timePeriod=$date1.'  to  '.$date2;
		$header = array("Category", "Amount", "Date");
		include "pdf/realTimeReportpdf.php";
	}
?>