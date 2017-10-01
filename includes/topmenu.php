<div class="row" id="topBar">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="/"><b>Tigernet BD</b></a>
			</div>
			
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="/info/index.html">About Us</a></li>
					<li><a href="/info/contact.html">Contact me</a></li>
					<li><a href="/info/privacy.html">Privacy policy</a></li>

					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Series articles<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a>chata mata</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
						if(isset($_SESSION['email'])){ ?>
							<li><a href="logout.php">Logout</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
</div>
