<script>
    document.getElementById("writing").classList.remove('col-md-7');
    document.getElementById("writing").classList.add('col-md-8');
</script>

<?php
	if(isset($_POST['submit'])){
		include 'includes/db-config.php';

		if($_POST['submit'] == 'add'){
			$query="INSERT INTO courseSchedule values('$_POST[courseName]', '$_POST[day]', '$_POST[teacher]', '$_POST[time]')";
			$sqlResult=mysqli_query($sqlConnect,$query);
		}

		if($_POST['submit'] == 'update'){
			$query = "UPDATE courseSchedule SET day='" .$_POST['day'].
											"', duration='".$_POST['duration'].
											"', courseName='" .$_POST['courseName'].
											"', teacherEmail='" .$_POST['email'].
											"' WHERE day='" .$_POST['prevDay']. "' and duration='" .$_POST['prevDuration']. "'";
			$sqlResult=mysqli_query($sqlConnect,$query);
		}

		if(mysqli_affected_rows($sqlConnect)>0){
			echo '<script>
			window.onload = function () {
				alert("Action successful!");
			}
			</script>';
		}
		else{
			echo '<script>
			window.onload = function () {
				alert("Action failed. Try again!");
			}
			</script>';
		}

		mysqli_close($sqlConnect); 
	}
?>

<h2>Existing schedules</h2>

<?php
	include 'includes/db-config.php';
	$query="SELECT courseName , day, name, email, duration 
			FROM courseSchedule, users 
			WHERE users.email=courseSchedule.teacherEmail
			ORDER BY FIELD(day, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')";
	$sqlResult=mysqli_query($sqlConnect,$query);

	echo '<table class="table table-striped table-hover">';
	echo '<thead>';
	echo '<tr>';
		echo '<th>Day</th>';
		echo '<th>Duration</th>';
		echo '<th>Course Name</th>';
		echo '<th>Name</th>';
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
			echo '<td class="name">'.$row['name'].'</td>';
			echo '<td class="email">'.$row['email'].'</td>';
			echo '<td> <button type="button" class="btn btn-warning" onClick="editRoutine(this);" data-toggle="modal" data-target="#editRoutine">Edit</button> </td>';
			echo '<td> <button type="button" class="btn btn-danger" onClick="confirmDelete(this);" name="submit" value="delete">Delete</button> </td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
?>

<script>
	function editRoutine(button){
		row = $(button).closest("tr");
		prevDay = row.find("td.day").text();
		prevDuration = row.find("td.duration").text();
		day = row.find("td.day").text();
		duration = row.find("td.duration").text();
		course = row.find("td.course").text();
		email = row.find("td.email").text();

		document.getElementById('prevDay').value = prevDay;
		document.getElementById('prevDuration').value = prevDuration;
		document.getElementById('course').value = course;
		document.getElementById('email').value = email;
		document.getElementById('day').value = day;
		document.getElementById('duration').value = duration;
	}

	function confirmDelete(button){
		row = $(button).closest("tr");
		day = row.find("td.day").text();
		duration = row.find("td.duration").text();

		if(confirm("Are you sure you want to delete this entry?")){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if(this.responseText == 'true'){
						window.location.href = "setRoutine.php";
					}
					else {
						alert("Could not delete. Try again.");
					}
				}
			};
			xhttp.open("GET", "/tgnet/modules/setRoutineAjax.php?submit=delete&day=" + day + "&duration=" + encodeURIComponent(duration), true);
			xhttp.send();
		}
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
		
		<form class="form-horizontal" action="setRoutine.php" method="post">
			<input id='prevDay' type="hidden" name="prevDay" value="">
			<input id='prevDuration'type="hidden" name="prevDuration" value="">

			<div class="form-group">
				<label class="control-label col-sm-3">Course Name:</label>	
				<div class='col-sm-9'>
					<select id='course' class='form-control' name="courseName" required>
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
				<label class="control-label col-sm-3" >Teacher:</label>
				<div class='col-sm-9'>
					<select id='email' class='form-control' name="email" required>
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
				<label class="control-label col-sm-3">Day:</label>
				<div class='col-sm-9'>
					<select id='day' class='form-control' name="day" required>
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
				<label class="control-label col-sm-3">Time:</label>
				<div class='col-sm-9'>
					<select id='duration' class='form-control' name="duration" required>
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
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" name="submit" value="update">Update</button>
			</div>
		</form> 
		  
		</div>
	</div>

	</div>
</div>

<!-- -------------------Mews part----------------------------- -->

<h2>Add new routine</h2>

<br>
<form class="form-horizontal" action="setRoutine.php" method="post">
	<div class="form-group">
		<label class="control-label col-sm-2">Course Name:</label>	
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
		<label class="control-label col-sm-2" >Teacher:</label>
		<div class='col-sm-8'>
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
		<div class='col-sm-8'>
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
		<div class='col-sm-8'>
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
		<div class="col-sm-offset-5 col-sm-6">
			<button type="submit" class="btn btn-success" name="submit" value="add">Submit</button>
		</div>
	</div>
</form>