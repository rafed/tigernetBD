<!DOCTYPE html>
<head>
	<?php
		include 'includes/header.php';
	?>
	<title>
		TigernetBD | Home
	</title>

	<style>
		#cover {
			background-image: url("/tgnet/img/classroom.jpg");
			background-size: cover;
			width: 100%;
			height:100vh;
			opacity: 0.6;

			text-align:center;
		}

		.jumbotron {
			background: none;
		}

		.jumbotron h1{
			font-size: 100px;
		}
		
		.jumbotron p{
			font-size: 40px;
		}

		#main img{
			margin: 0 auto;
		}
		#main {
			background-color: #222;
		}
	</style>
</head>
<body>
<?php
	include 'includes/topmenu.php';
?>
<div id='cover'>
	<div class="jumbotron">
	<h1>TigernetBD</h1>
	<p>Providing IT training for the 21st century</p>
	</div>
</div>

<div id="main" class="container-fluid">
	<h1 style="text-align:center">Courses we offer</h1>
	<div class="row" >
		<div class="col-md-4">
			<img class="img-responsive" src="img/HTML & CSS.png">
		</div>
		<div class="col-md-4">
			<img class="img-responsive" src="img/Javascript.png">
		</div>
		<div class="col-md-4">
			<img class="img-responsive" src="img/MySQL.png">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<img class="img-responsive" src="img/PHP.png">
		</div>
		<div class="col-md-4">
			<img class="img-responsive" src="img/Server administration.png">
		</div>
		<div class="col-md-4">
			<img class="img-responsive" src="img/Wordpress.png">
		</div>
	</div>
	<br>
</div>
</body>
