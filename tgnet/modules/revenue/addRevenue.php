<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<form class="form-group" name ="revenueForm" action="setRevenue.php"  method="post">
	<h2 >Add Revenue</h2>
	</br>
	<p>
		<label ><b>Select Revenue Category</b></label>
		<select class="w3-select w3-border" name="option" required>
			<option value="" disabled selected>Choose your option</option>
			<option value="Cyber cafe" name='option'>Cyber cafe</oprtion>
			<option value="Short course" name='option'>Short course</option>
			<option value="Domain business" name='option'>Domain business</option>
		</select>
	</p>
	<p>
		<label ><b>Amount</b></label>
		<input class="w3-input w3-border" name="amount" type="number" required>
	</p>
	<p>      
		<label ><b>DATE</b></label>
		<input class="w3-input w3-border" name="date" type="date">
	</p>
	<p> 
		<button class="w3-btn w3-green" name="submit">submit</button>
	</p>
</form>                     
