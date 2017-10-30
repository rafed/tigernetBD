<h2>Apply For Course</h2>

<br>
<form class="form-horizontal" action="applyCourse.php" method="post">
	<div class="form-group">
		<label class="control-label col-sm-2">Select Course:</label>	
		<div class='col-sm-4'>
			<select class='form-control' name="courseName" required>
				<option></option>
				<?php 
				include 'includes/db-config.php';
				$query="select * from course";
				$sqlResult=mysqli_query($sqlConnect,$query);
				while($sqlRow=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC))
				{
					echo "<option value=\"".$sqlRow['name']."\"".">".$sqlRow['name']." (".$sqlRow['fee']." tk)</option>";
				}
				mysqli_close($sqlConnect); 
				?>
			</select>
		</div>
	</div>

	<div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-6">
			<button type="submit" class="btn btn-success" name="apply" value="apply">Apply</button>
		</div>
	</div>
</form>
<p id="error"></p>

<?php
	if(isset($_POST['apply'])){
		include 'includes/db-config.php';
		
		$roll=uniqid();
		
		$query="INSERT INTO student values('$roll','$_SESSION[email]','$_POST[courseName]','inactive')";
		$sqlResult=mysqli_query($sqlConnect,$query);
		
		if(mysqli_affected_rows($sqlConnect)>0){
			echo "Applied Successfully";
		}
		else{
			echo "Try again";
		}
		mysqli_close($sqlConnect); 
	}
?>