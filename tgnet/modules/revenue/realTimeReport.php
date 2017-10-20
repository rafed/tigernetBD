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
				 <form name ="revenueForm" action="getRealTimeReport.php"  method="post" target="_blank">
					  <h2 >Input Form</h2>
					  
					  <p>      
						<label ><b>From</b></label>
					  <input class="w3-input w3-border" name="dateFrom" type="date" required></p>
					  
					  <p>      
						<label ><b>To</b></label>
					  <input class="w3-input w3-border" name="dateTo" type="date" required></p>
					  <p> 
					  <button class="w3-btn w3-green" name="submit">submit</button></p>
				</form>                     
			</div>
			
			<div class="col-md-2" id="rightPanel">
					
			</div>
			
		</div>
	</div>

</body>
</html> 