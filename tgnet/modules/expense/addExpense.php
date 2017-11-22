<h2 >Add Expense</h2>
</br>
<form class="form-horizontal well" action="modules/expense/setExpense.php"  method="post">
	<div class="form-group">
		<label class="control-label col-sm-3">Expense Category</label>	
		<div class='col-sm-8'>
			<input class="form-control" name="category" type="text" required>
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
  

