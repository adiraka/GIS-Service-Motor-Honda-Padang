<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Selamat Datang</title>

	<link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="header-ahass"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e92030;">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="home.php"><strong>HOME</strong></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><strong>PROFIL</strong></a>
							</li>
						</ul>
						<div class="my-2 my-lg-0">
							<a class="btn btn-success" href="login.php">LOGIN</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card login-form">
					<h5 class="card-header text-center">LOGIN</h5>
					<div class="card-body">
						<form action="login_proses.php" method="POST">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control">
							</div>
							<br>
							<div class="form-group">
								<button type="submit" class="btn btn-block btn-success">LOGIN</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container text-center">
			2018 @ STMIK Indonesia Allright Reserved.
		</div>
	</div>

	<script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvbr9LgPDtHcrZ0tffOHDRPxcSx2B_PSI&callback=initMap"></script>
</body>
</html>