<?php
	if(isset($_POST['submit'])){

		if($_POST['option'] == 'Real Time'){
			header('Location: expReal.php');
		}
		else if($_POST['option'] == 'Monthly'){
			header('Location: expMonthly.php');
		}
		else{
			header('Location: expYearly.php');
		}
	}
?>
<h2 >Expense Report</h2>
</br>
    
<form class="form-horizontal well" name ="revenueForm" action="expenseReport.php"  method="post">
	<div class="form-group">
		<label class="control-label col-sm-3">Report Type</label>	
		<div class='col-sm-8'>
			<select class='form-control' name="option" required>
				<option></option>
				<option value="Real Time">Real Time</option>
				<option value="Monthly">Monthly</option>
				<option value="Yearly">Yearly</option>
			</select>
		</div>
	</div>
	
	<div class="form-group"> 
		<div class="col-sm-offset-5 col-sm-6">
			<button type="submit" class="btn btn-primary" name="submit" value="report">Generate Report</button>
		</div>
	</div>
</form>


                     


