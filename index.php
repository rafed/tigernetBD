<!DOCTYPE html>
<html>

<head>
	<?php include 'includes/header.php'; ?>
	<title>Home</title>
</head>

<body>
	<div class="container-fluid">
		
		<?php include 'includes/topmenu.php'; ?>
		
		<div class="row" id="content">
			<div class="col-sm-2" id="leftPanel">
				
			</div>
			<div class="col-sm-8" id="contentPanel">
				 <form action="login.php" method="post">
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="checkbox">
						<label><input type="checkbox"> Remember me</label>
					</div>
					<button type="submit" class="btn btn-default" name="login" value="login">Submit</button>
				</form> 
			</div>
			<div class="col-sm-2" id="rightPanel">
				
			</div>
		</div>
	</div>
</body>

</html>


