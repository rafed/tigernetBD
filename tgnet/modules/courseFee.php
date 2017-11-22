<h2>Add new entry</h2>

<br>
<form class="form-horizontal well" action="courseFee.php" method="post">
	<div class="form-group">
		<label class="control-label col-sm-3">Course Name:</label>	
		<div class='col-sm-8'>
			<select class='form-control' name="courseName" required>
				<option></option>
				<?php 
				include 'includes/db-config.php';
				$query="select name from course";
				$sqlResult=mysqli_query($sqlConnect,$query);
				while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
				{
					echo "<option value=\"".$sqlRow['name']."\"".">".$sqlRow['name']."</option>";
				}
				mysqli_close($sqlConnect); 
				?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3" >Student Name:</label>
		<div class='col-sm-8'>
			<select class='form-control' name="student" required>
				<option></option>
				<?php 
				include 'includes/db-config.php';
				$query="select distinct student.email,name from users,student where student.email=users.email and role='student' and currentStatus='active'";
				$sqlResult=mysqli_query($sqlConnect,$query);
				while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
				{
					echo "<option value=\"".$sqlRow['email']."\"".">".$sqlRow['name']." (".$sqlRow['email'].")</option>";
				}
				mysqli_close($sqlConnect); 
				?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3" >Amount:</label>
		<div class='col-sm-8'>
			<input id="amount" name="amount" type="number" class="form-control" required>
		</div>
	</div>
	
	<div class="form-group"> 
		<div class="col-sm-offset-5 col-sm-6">
			<button type="submit" class="btn btn-primary" name="submit" value="add">Submit</button>
		</div>
	</div>
</form>

<?php
	if(isset($_POST['submit'])){
		include 'includes/db-config.php';
		$query="INSERT INTO coursePayment(roll,paymentAmount,paymentDate) select roll,'$_POST[amount]', now() from student where courseName='$_POST[courseName]' and email='$_POST[student]'";
		$sqlResult=mysqli_query($sqlConnect,$query);
		
		if(mysqli_affected_rows($sqlConnect)>0){
			$query="update student set currentStatus='active' where courseName='$_POST[courseName]' and email='$_POST[student]'";
			$sqlResult=mysqli_query($sqlConnect,$query);
		}
		mysqli_close($sqlConnect); 
	}
?>

</br>
</br>
<h2>Recent Payment History</h2>
</br>
<input type="text" id="studentName" onkeyup="searchStudent()" placeholder="Search Student" title="Search">
</br>
</br>

<table id= 'paymentHistoryTable' class='table table-bordered text-center'>
	<thead>
		<th class="text-center success">Student Name</th>
		<th class="text-center success">Course Name</th>
		<th class="text-center success">Amount</th>
		<th class="text-center success">Date</th>
	</thead>
	
	<?php
	
	include 'includes/db-config.php';
	
	$query="select name, student.email, courseName,paymentAmount,paymentDate from users,student,coursePayment where student.roll=coursePayment.roll and student.email=users.email and ((SELECT TIMESTAMPDIFF(MONTH, paymentDate, now()))<=1)";
	$sqlResult=mysqli_query($sqlConnect,$query);
	
	
	while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
	{
		echo "<tr><td>".$sqlRow['name']." (".$sqlRow['email'].")</td>";
		echo "<td>".$sqlRow['courseName']."</td>";
		echo "<td>".$sqlRow['paymentAmount']."</td>";
		echo "<td>".$sqlRow['paymentDate']."</td></tr>";
	} 
	
	mysqli_close($sqlConnect); 	
	
	?>
</table>

<script>
function searchStudent() { 
	var input, filter, table, tr, td, i;
	input = document.getElementById("studentName");
	filter = input.value.toUpperCase();
	table = document.getElementById("paymentHistoryTable");
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
