<?php
// Include config file
require_once "conex.php";
 
//Inicio onfiguracion de sesión


// Define variables and initialize with empty values
$name = $apellido = $correo = $numero = $contra = "";
$name_err = $apellido_err = $correo_err = $numero_err = $contra_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor ingrese el nombre del empleado.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingrese un nombre válido.";
    } else{
        $name = $input_name;
    }
    
    //Validar apellido1
   $input_apellido = trim($_POST["apellido"]);
    if(empty($input_apellido)){
        $apellido_err = "Por favor ingrese su apellido.";
    } elseif(!filter_var($input_apellido, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $apellido_err = "Por favor ingrese un nombre válido.";
    } else{
        $apellido = $input_apellido;
    }
   
    // Validate correo
    $input_correo = trim($_POST["correo"]);
    if(empty($input_correo)){
        $correo_err = "Por favor ingrese su correo.";     
    } else{
        $correo = $input_correo;
    }
	//Validar numero
    $input_numero = trim($_POST["numero"]);
    if(empty($input_numero)){
        $numero_err = "Por favor ingrese su numero de celular.";     
    } elseif(!ctype_digit($input_numero)){
        $numero_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $numero = $input_numero;
    }
	
	// Validate contraseña
    $input_contra = trim($_POST["contra"]);
    if(empty($input_contra)){
        $contra_err = "Por favor ingrese su contraseña.";     
    } else{
        $contra = $input_contra;
    }
	  
    // Check input errors before inserting in database
    if(empty($name_err) && empty($apellido_err) && empty($correo_err) && empty($numero_err) && empty($contra_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO usuarios (name,apellido,correo,numero,contra) VALUES (?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_apellido, $param_correo, $param_numero, $param_contra);
            
            // Set parameters
            $param_name = $name;
            $param_apellido= $apellido;		    
			$param_correo = $correo;
			$param_numero = $numero;
			$param_contra = $contra;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location:login.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Registrate
					</span>
				</div>

				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
					<div class="wrap-input100 validate-input m-b-26 <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>" data-validate="Username is required">
						<span class="label-input100">Nombre</span>
						<input class="input100" type="text" required name="name" placeholder="Ingrese su nombre" value="<?php echo $name; ?>" class="form-control form-control-line">
						<span class="focus-input100"><?php echo $name_err;?></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-26 <?php echo (!empty($apellido_err)) ? 'has-error' : ''; ?>" data-validate="Username is required">
						<span class="label-input100">Apellido</span>
						<input class="input100" type="text" required name="apellido" placeholder="Ingrese su apellido" value="<?php echo $apellido; ?>" class="form-control form-control-line">
						<span class="focus-input100"><?php echo $apellido_err;?></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-26 <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>" data-validate="Username is required">
						<span class="label-input100">Correo</span>
						<input class="input100" type="text" required name="correo" placeholder="correo@correo.com" value="<?php echo $correo; ?>" class="form-control form-control-line">
						<span class="focus-input100"><?php echo $correo_err;?></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-26 <?php echo (!empty($numero_err)) ? 'has-error' : ''; ?>" data-validate="Username is required">
						<span class="label-input100">Numero</span>
						<input class="input100" type="text" required name="numero" placeholder="9999999" value="<?php echo $numero; ?>" class="form-control form-control-line">
						<span class="focus-input100"><?php echo $numero_err;?></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18<?php echo (!empty($contra_err)) ? 'has-error' : ''; ?>" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" required name="contra" placeholder="Ingrese su contraseña" value="<?php echo $contra; ?>" class="form-control form-control-line">
						<span class="focus-input100"><?php echo $contra_err;?></span>
					</div>

                    <!--div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Confirme password</span>
						<input class="input100" type="password" placeholder="Repita la contraseña" value="" class="form-control form-control-line">
						<span class="focus-input100"></span>
					</div-->

					<div class="flex-sb-m w-full p-b-30">

						<div>
							<a href="login.php" class="txt1">
								Ya tengo una cuenta
							</a>
						</div>

						<div>
							<a href="index.html" class="txt1">
								Ir al inicio
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" class="form-control form-control-line" type="submit">
							Registrarme 
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