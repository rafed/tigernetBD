<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta charset="UTF-8">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

<head>
	<?php 
		session_start();

		include '../../includes/header.php';

		if(isset($_SESSION['role'])){
			echo "<title>" . $_SESSION['role'] . "</title>";
		}
		else {
			echo "<title>TigernetBD</title>";
		}
	?>
</head>

<body>

<?php include '../../includes/topmenu.php'; ?>
	<div id="main" class="container-fluid">
		<div class="row" id="content">
			<div class="col-md-2" id="leftPanel">
				<?php include '../../includes/sideBar.php'; /********** leftbar goes here *********/  ?>     
			</div>
			
			<div class="col-md-8" id="writing">
				 <form name ="revenueForm" action="getYearlyReport.php"  method="post" target="_blank">
					  <h2 >Input Form</h2>
					  
					  <select class="w3-select w3-border" name="year" required>
						<option value="" disabled selected >Choose your option</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>

					  </select>
					  <p> </p>
					  
					  <p><button class="w3-btn w3-green"" name="submit">Submit</button></p>
				</form>                     
			</div>
			
			<div class="col-md-2" id="rightPanel">
					
			</div>
			
		</div>
	</div>

</body>
</html> 