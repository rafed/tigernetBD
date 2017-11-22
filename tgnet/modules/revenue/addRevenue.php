<h2 >Add Revenue</h2>
</br>
<form class="form-horizontal well" name ="revenueForm" action="setRevenue.php"  method="post">
	<div class="form-group">
		<label class="control-label col-sm-3">Revenue Category</label>	
		<div class='col-sm-8'>
			<select class='form-control' name="option" required>
				<option></option>
				<option value="Cyber cafe">Cyber cafe</option>
				<option value="Web Project">Web Project</option>
				<option value="Domain business">Domain business</option>
			</select>
		</div>
	</div>
	
	
	<div class="form-group">
		<label class="control-label col-sm-3">Amount</label>	
		<div class='col-sm-8'>
			<input class="form-control" name="amount" type="number" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Date</label>	
		<div class='col-sm-8'>
			<input class="form-control" name="date" type="date">
		</div>
	</div>
	
	<div class="form-group"> 
		<div class="col-sm-offset-5 col-sm-6">
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</div>
	</div>
</form>                     
