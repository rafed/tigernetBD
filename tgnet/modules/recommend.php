<h3 style="text-align:center">Recommended courses</h3>
<?php
	function getSquareRoot($array,$avg){
		$total=0;
		foreach($array as $x => $x_value){
			//echo $x_value." ";
			$total=$total+(($x_value-$avg)*($x_value-$avg));
		}
		//echo "Total ".$total."<br>";
		return sqrt($total);
	}
	
	$email=$_SESSION['email'];
	
	include 'includes/db-config.php';
	
	$query="select courseName,rating from student,courseRating where student.roll=courseRating.roll and email='$email'";
	$sqlResult=mysqli_query($sqlConnect,$query);
	
	$total=0;
	$rating1 = array(); 
	
	while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
	{
		$total=$total+$sqlRow['rating'];
		$rating1[$sqlRow['courseName']]=$sqlRow['rating'];
	}
	$avg1=$total/mysqli_affected_rows($sqlConnect);
	
	/*foreach($rating1 as $x => $x_value) {
		$x_value=$x_value-$avg;
		$rating1[$x]=$x_value;
		//echo $x." ".$x_value."<br>";
	}*/
	
	$sqrt1=getSquareRoot($rating1,$avg1);
	/*foreach($rating1 as $x => $x_value) {
		echo $x." ".$x_value."<br>";
	}*/

	if($sqrt1!=0){
		$query="select DISTINCT(email) from student where email!='$email'";
		$sqlResult=mysqli_query($sqlConnect,$query);
		$studentList = [];
		
		while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
		{
			$studentList[] = $sqlRow['email'];
		}
		
		$ranking = array();
		for($i=0;$i<count($studentList);$i++){
			//echo $studentList[$i]."<br>";
			$query="select courseName,rating from student,courseRating where student.roll=courseRating.roll and email='$studentList[$i]'";
			$sqlResult=mysqli_query($sqlConnect,$query);
			
			$total=0;
			$rating2 = array(); 
			
			while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
			{
				$total=$total+$sqlRow['rating'];
				$rating2[$sqlRow['courseName']]=$sqlRow['rating'];
			}
			$avg2=$total/mysqli_affected_rows($sqlConnect);
			
			/*foreach($rating2 as $x => $x_value) {
				$x_value=$x_value-$avg;
				$rating2[$x]=$x_value;
				//echo $x." ".$x_value."<br>";
			}*/
			$sqrt2=getSquareRoot($rating2,$avg2);
			
			if($sqrt2!=0){
				$query="(select courseName from student where email='$studentList[$i]' and courseName in (select courseName from student where email='$email'))";
				$sqlResult=mysqli_query($sqlConnect,$query);
				
				$total=0;
				
				while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
				{
					
					if(isset($rating1[$sqlRow['courseName']]) && isset($rating2[$sqlRow['courseName']])){
						$total=$total+(($rating1[$sqlRow['courseName']]-$avg1)*($rating2[$sqlRow['courseName']]-$avg2));
					}
				}
				//echo "<br>";
				$ranking[$studentList[$i]]=($total/($sqrt1*$sqrt2));
				//echo "VALUE for ".$studentList[$i]." ".($total/($sqrt1*$sqrt2))."<br>";
			}
		}
		
		arsort($ranking);
		
		$count=0;
		foreach($ranking as $x => $x_value){
			$query="(select courseName from student,courseRating where student.roll=courseRating.roll and rating>2 and email='$x' and courseName in (select courseName from student where email='$x' and courseName not in (select courseName from student where email='$email')))";
			
			$sqlResult=mysqli_query($sqlConnect,$query);
			
			while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
			{
				if($count<2){
					echo "<img class='img-responsive img-rounded' src=/tgnet/img/".$sqlRow['courseName'].".png alt=".$sqlRow['courseName'].">";
					//echo $sqlRow['courseName']."<br>";
					$count++;
				}
				else{
					break;
				}
			}
			if($count==2){
				break;
			}
		}
	}	
	mysqli_close($sqlConnect); 	
?>
