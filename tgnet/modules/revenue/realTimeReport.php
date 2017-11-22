<h2 >Real time report</h2>
</br>
<form class="form-horizontal well" action="modules/revenue/getRealTimeReport.php"  method="post" target="_blank">	
	<div class="form-group">
		<label class="control-label col-sm-3">Starting Date</label>	
		<div class='col-sm-8'>
			<input class="form-control" name="dateFrom" type="date" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Ending Date</label>	
		<div class='col-sm-8'>
			<input class="form-control" name="dateTo" type="date" required>
		</div>
	</div>
	
	<div class="form-group"> 
		<div class="col-sm-offset-5 col-sm-6">
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		</div>
	</div>
</form> 