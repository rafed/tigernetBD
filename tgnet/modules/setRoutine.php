<h2>Set routine</h2>

<br>
<form class="form-horizontal" action="setRoutine.php" method="post">
	<div class="form-group">
		<label class="control-label col-sm-2">Course Name:</label>	
		<div class='col-sm-4'>
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
		<label class="control-label col-sm-2" >Teacher:</label>
		<div class='col-sm-4'>
			<select class='form-control' name="teacher" required>
				<option></option>
				<?php 
				include 'includes/db-config.php';
				$query="select email,name from users where role!='student'";
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
		<label class="control-label col-sm-2">Day:</label>
		<div class='col-sm-4'>
			<select class='form-control' name="day" required>
				<option></option>
				<?php 
				$days = array("Sunday", "Monday", "Tuesday","Wednesday", "Thursday", "Friday","Saturday");
				for($i=0;$i<count($days);$i++)
				{
					echo "<option value=\"".$days[$i]."\"".">".$days[$i]."</option>";
				}
				?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Time:</label>
		<div class='col-sm-4'>
			<select class='form-control' name="time" required>
				<option></option>
				<?php 
				$time = array("09:00:00 - 11:00:00 am", "11:00:00 - 01:00:00 pm", "03:00:00 - 05:00:00 pm","05:00:00 - 07:00:00 pm");
				for($i=0;$i<count($time);$i++)
				{
					echo "<option value=\"".$time[$i]."\"".">".$time[$i]."</option>";
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
		</div>
	</div>
</form>
<p id="error"></p>

<?php
	if(isset($_POST['submit'])){
		include 'includes/db-config.php';
		$query="INSERT INTO courseSchedule values('$_POST[courseName]', '$_POST[day]', '$_POST[teacher]', '$_POST[time]')";
		$sqlResult=mysqli_query($sqlConnect,$query);
		
		if(mysqli_affected_rows($sqlConnect)>0){
			echo "<script defer> alert('Successfully added!') </script>";
		}
		else{
			echo '<script language="javascript">';
				echo "function errorMessage() {document.getElementById('error').innerHTML='time slot is not empty'}";
				echo "errorMessage();";
			echo '</script>';
		}
		mysqli_close($sqlConnect); 
	}
?>

<!-- ------------------------------------------------ -->
<?php
	include 'includes/db-config.php';
	$query="SELECT * FROM courseSchedule ORDER BY day, duration";
	$sqlResult=mysqli_query($sqlConnect,$query);

	echo '<table class="table table-striped table-hover">';
	echo '<thead>';
	echo '<tr>';
		echo '<th>Day</th>';
		echo '<th>Duration</th>';
		echo '<th>Course Name</th>';
		echo '<th>Email</th>';
		echo '<th>Edit</th>';
		echo '<th>Delete</th>';
	echo '</tr>';
	echo '</thead>';
	
	echo '<tbody>';
	while ($row = mysqli_fetch_array($sqlResult)) {
		echo '<tr>';
			echo '<td class="day">'.$row['day'].'</td>';
			echo '<td class="duration">'.$row['duration'].'</td>';
			echo '<td class="course">'.$row['courseName'].'</td>';
			echo '<td class="email">'.$row['teacherEmail'].'</td>';
			echo '<td> <button type="button" class="btn btn-warning" onClick="editRoutine()" data-toggle="modal" data-target="#editRoutine">Edit</button> </td>';
			echo '<td> <button type="button" class="btn btn-danger" onClick="confirmDelete()">Delete</button> </td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
?>

<script>
	function confirmDelete(){
		confirm("Are you sure you want to delete this entry?");
	}

	function editRoutine(){
		var row = $(this).closest("tr");
		var day = row.find("td.day").val();
		alert(day);
	}
</script>

<div id="editRoutine" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update routine</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Update</button>
      </div>
    </div>

  </div>
</div>