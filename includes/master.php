<?php
	session_start();

	if(empty($_SESSION['email'])){
		header('Location: index.php?err=2');
	}
?>

<!DOCTYPE html>
<html>

<head>
	<?php 
		include 'includes/header.php'; 
		echo "<title>$title</title>";
	?>
	<link rel="stylesheet" href="includes/style.css">
</head>

<body>
	
	<div class="container-fluid">
		<?php include 'includes/topmenu.php'; ?>
		
		<div class="row" id="content">
			<div class="col-md-2" id="leftPanel">
				<?php include 'includes/sideBar.php'; /********** leftbar goes here *********/  ?>     
			</div>
			
			<div class="col-md-8" id="writing">
				<?php include "$page";                /********** content goes here *********/  ?>    
			</div>
			
			<div class="col-md-2" id="rightPanel">
					
			</div>
			
		</div>
	</div>
</body>

</html>
