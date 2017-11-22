<?php

	if(isset($_POST['submit']))
	{
		include '../../includes/db-config.php';
		
		$year=$_POST['year'];

		$d1 = strtotime( $year."0101");
        $d2 = strtotime($year."1231");
		$date1 = date('Y-m-d',$d1);
		$date2=date('Y-m-d',$d2);
		echo $date1." ".$date2;

		
		
		$sql ="select category,amount,DATE(dateOfEntry) from expense where DATE(dateOfEntry) between '$date1' and '$date2' order by DATE(dateOfEntry)";
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
		$timePeriod=$year;
		$header = array("Category", "Amount", "Date");
		include "pdf/yearlyReportpdf.php";
	}
?>