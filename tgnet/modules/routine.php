<?php
	$days = array("Sunday", "Monday", "Tuesday","Wednesday", "Thursday", "Friday","Saturday");
	$time = array("09:00:00 - 11:00:00 am", "11:00:00 - 01:00:00 pm", "03:00:00 - 05:00:00 pm","05:00:00 - 07:00:00 pm");
	$class= array("success", "danger", "info","warning", "active");
	$email=$_SESSION['email'];
	
	include 'includes/db-config.php';
	
	if($_SESSION['role']!="Student"){
		$query="select * from courseSchedule where teacherEmail='$email'";
		$sqlResult=mysqli_query($sqlConnect,$query);
		
		echo "<table class='table'>";
		echo "<tr class='active'>
				<th>Day</th>
				<th>09.00-11.00</th>
				<th>11.00-01.00</th>
				<th>03.00-05.00</th>
				<th>05.00-07.00</th>
			</tr>";
		
		for($i=0;$i<count($days);$i++){
			$index=$i%5;
			$row="<tr class=".$class[$index]."><td><b>".$days[$i]."</b>";
			for($j=0;$j<count($time);$j++){
				$course=" ";
				while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
				{
					$day=$sqlRow['day'];
					$duration=$sqlRow['duration'];
					if($day==$days[$i] && $duration==$time[$j]){
						$course=$sqlRow['courseName'];
					}
				}
				$row=$row."<td>".$course ."</td>";
				mysqli_data_seek($sqlResult, 0);
			}
			$row=$row."</tr>";
			echo $row;
		} 
		echo "</table>";
		mysqli_close($sqlConnect); 	
	}
	else{
		$query="select * from courseSchedule where courseSchedule.courseName in (select courseName from batch where studentEmail='$email')";
		$sqlResult=mysqli_query($sqlConnect,$query);
		
		echo "<table class='table'>";
		echo "<tr class='active'>
				<th>Day</th>
				<th>09.00-11.00</th>
				<th>11.00-01.00</th>
				<th>03.00-05.00</th>
				<th>05.00-07.00</th>
			</tr>";
		
		for($i=0;$i<count($days);$i++){
			$index=$i%5;
			$row="<tr class=".$class[$index]."><td><b>".$days[$i]."</b>";
			for($j=0;$j<count($time);$j++){
				$course=" ";
				while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
				{
					$day=$sqlRow['day'];
					$duration=$sqlRow['duration'];
					if($day==$days[$i] && $duration==$time[$j]){
						$course=$sqlRow['courseName'];
					}
				}
				$row=$row."<td>".$course ."</td>";
				mysqli_data_seek($sqlResult, 0);
			}
			$row=$row."</tr>";
			echo $row;
		} 
		echo "</table>";
		mysqli_close($sqlConnect); 	
	}
?>

