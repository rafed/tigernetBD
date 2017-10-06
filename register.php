<!DOCTYPE html>
<html>

<head>
	<?php include 'includes/header.php'; ?>
	<script type="text/javascript" src="js/registration.js"></script>
	<title>Home</title>
</head>

<body>
	<div class="container-fluid">
		
		<?php include 'includes/topmenu.php'; ?>
		
		<div class="row" id="content">
			<div class="col-sm-2" id="leftPanel">
				
			</div>
			
			<style>
				.register-form form.custom-form{
				padding:55px;
				box-sizing:border-box;
				background-color:#ffffff;
				box-shadow:0 1px 3px 0 rgba(0, 0, 0, 0.1);
				font:bold 14px sans-serif;
				text-align:center;
				margin:20px;
				color:#333;
				}

				@media (max-width:400px) {
				.register-form form.custom-form{
					padding:55px 10px;
				}
				}

				.register-form .custom-form h1{
				display:inline-block;
				color:#4c565e;
				font-size:24px;
				font-weight:bold;
				padding:0 10px 15px;
				margin-bottom:60px;
				border-bottom:2px solid rgb(108, 174, 224);
				}

				.register-form .custom-form .form-group{
				margin-bottom:25px;
				}

				.register-form .custom-form .label-column{
				text-align:right;
				color:#5F5F5F;
				}

				@media (max-width:768px) {
				.register-form .custom-form .label-column{
					text-align:left;
				}
				}

				.register-form .custom-form .input-column{
				color:#5f5f5f;
				text-align:left;
				}

				.register-form .custom-form .input-column input{
				color:#5f5f5f;
				box-shadow:1px 2px 4px 0 rgba(0, 0, 0, 0.08);
				padding:12px;
				border:1px solid #dbdbdb;
				border-radius:2px;
				height:42px;
				}

				.register-form .custom-form .dropdown .dropdown-toggle{
				background:#fff;
				border:1px solid #dbdbdb;
				box-shadow:1px 2px 4px 0 rgba(0, 0, 0, 0.08);
				color:#333;
				outline:none;
				}

				.register-form .custom-form .dropdown ul{
				background:#fff;
				}

				.register-form .custom-form .dropdown ul li a{
				background:#fff;
				color:#333;
				opacity:0.8;
				}

				.register-form .custom-form .dropdown ul li a:hover{
				opacity:1;
				}

				.register-form .custom-form .submit-button{
				border-radius:2px;
				background:#6caee0;
				color:#ffffff;
				font-weight:bold;
				box-shadow:1px 2px 4px 0 rgba(0, 0, 0, 0.08);
				padding:14px 22px;
				border:0;
				margin:30px;
				outline:none;
			}
			</style>
			
			
			<div class="row register-form">
				<div class="col-md-8 col-md-offset-2">
					<form name="registrationForm" class="form-horizontal custom-form" action="registerAction.php" method="post" onSubmit="return formValidation()">
						<h1>Register Form</h1>
						<div class="form-group">
							<div class="col-sm-4 label-column">
								<label class="control-label" for="name-input-field">Name </label>
							</div>
							<div class="col-sm-6 input-column">
								<input class="form-control" type="text" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 label-column">
								<label class="control-label" for="email-input-field">Email </label>
							</div>
							<div class="col-sm-6 input-column">
								<input class="form-control" type="email" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 label-column">
								<label class="control-label" for="pawssword-input-field">Password </label>
							</div>
							<div class="col-sm-6 input-column">
								<input class="form-control" name="password" type="password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 label-column">
								<label class="control-label" for="repeat-pawssword-input-field">Repeat Password </label>
							</div>
							<div class="col-sm-6 input-column">
								<input class="form-control" name="confirmPassword" type="password" required>
							</div>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox">I've read and accept the terms and conditions</label>
						</div>
						<button class="btn btn-default submit-button" type="submit" onClick="return formValidation()">Submit Form</button>
					</form>
					</div>
				</div>
			</div>
    	</div>
	</div>
</body>

</html>


