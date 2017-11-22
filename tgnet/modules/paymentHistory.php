<h2>My Payment History</h2>
</br>
<input type="text" id="courseName" onkeyup="searchCourse()" placeholder="Search Course" title="Search">
</br>
</br>

<table id= 'paymentTable' class='table table-bordered text-center'>
	<thead>
		<th class="text-center success">Course Name</th>
		<th class="text-center success">Amount</th>
		<th class="text-center success">Date</th>
	</thead>
	
	<?php
	
	$email=$_SESSION['email'];
	
	include 'includes/db-config.php';
	
	$query="select courseName,paymentAmount,paymentDate from student,coursePayment where student.roll=coursePayment.roll and email='$email'";
	$sqlResult=mysqli_query($sqlConnect,$query);
	
	
	while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
	{
		echo "<tr><td>".$sqlRow['courseName']."</td>";
		echo "<td>".$sqlRow['paymentAmount']."</td>";
		echo "<td>".$sqlRow['paymentDate']."</td></tr>";
	} 
	
	mysqli_close($sqlConnect); 	
	
	?>
</table>

<script>
function searchCourse() { 
	var input, filter, table, tr, td, i;
	input = document.getElementById("courseName");
	filter = input.value.toUpperCase();
	table = document.getElementById("paymentTable");
	tr = table.getElementsByTagName("tr");

	for (i = 0; i < tr.length; i++){
		td = tr[i].getElementsByTagName("td")[0];
		if (td){
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} 
			else {
				tr[i].style.display = "none";
			}
		} 
	}
}
</script>

