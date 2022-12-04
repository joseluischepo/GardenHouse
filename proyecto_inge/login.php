<?php
include 'conexion2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>GardenHouse</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Crip-Iot</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
	
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
						<span class="login100-form-title-1">
							Ingresar
						</span>
					</div>

					<form class="login100-form validate-form" action="userS.php" method="POST">
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input50">Correo</span><!--estaba en 100-->
							<input class="input100" type="text" name="username" placeholder="Enter username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
							<span class="label-input50">Password</span> <!--estaba en 100-->
							<input class="input100" type="password" name="password" placeholder="Enter password">
							<span class="focus-input100"></span>
						</div>

						<div class="flex-sb-m w-full p-b-30">
							<div>
								<a href="index.html" class="txt1">
									Ir al inicio
								</a>
							</div>

							<div>
								<a href="registro.php" class="txt1">
									No tengo una cuenta
								</a>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit">
								Ingresar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="js/main.js"></script>

</body>
</html>