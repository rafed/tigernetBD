<?php

	if(isset($_POST['submit']))
	{
		include '../../includes/db-config.php';
		
		$month=$_POST['month'];

		$d1 = strtotime("first day of " . $month);
        $d2 = strtotime("last day of" . $month);
		$date1 = date('Y-m-d',$d1);
		$date2=date('Y-m-d',$d2);

		
		
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
			
		$year=date("Y",$d1);
		$month=date("F",$d1);
		
		$header = array("Category", "Amount", "Date");
		include "pdf/monthlyReportpdf.php";

		

		
	}
?>