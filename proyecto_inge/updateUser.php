<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
	header('Location:login.php');
	exit;
}
// Include config file
require_once "conex.php";
 
// Define variables and initialize with empty values
$name = $apellido = $correo = $numero = $contra = $tipo = "";
$name_err = $apellido_err = $correo_err = $numero_err = $contra_err = $tipo_err =   "";
 
// Processing form data when form is submitted
if(isset($_POST["idus"]) && !empty($_POST["idus"])){
    // Get hidden input value
    $idus = $_POST["idus"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor ingrese el nombre del usuario.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingrese un nombre válido.";
    } else{
        $name = $input_name;
    }

    // Validate apellido1 (ape1)
    $input_apellido = trim($_POST["apellido"]);
    if(empty($input_apellido)){
        $apellido_err = "Por favor ingrese el apellido del usuario.";
    } elseif(!filter_var($input_apellido, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $apellido_err = "Por favor ingrese un nombre válido.";
    } else{
        $apellido = $input_apellido;
    }

    // Validate correo
    // Validate correo
    $input_correo = trim($_POST["correo"]);
    if(empty($input_correo)){
        $correo_err = "Por favor ingrese su correo.";     
    } else{
        $correo = $input_correo;
    }
    
   //Validar celular 1 (cel1)
    $input_numero = trim($_POST["numero"]);
    if(empty($input_numero)){
        $numero_err = "Por favor ingrese su numero.";     
    } elseif(!ctype_digit($input_numero)){
        $numero_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $numero= $input_numero;
    }
   
    // Validate contraseña (contra)
     $input_contra = trim($_POST["contra"]);
    if(empty($input_contra)){
        $contra_err = "Por favor ingrese su contraseña.";     
    } else{
        $contra = $input_contra;
    }	
	// Validate tipo de usuario
    $input_tipo = trim($_POST["tipo"]);
    if(empty($input_tipo)){
        $tipo_err = "Por favor seleccione el tipo de usuario.";
    }else{
        $tipo = $input_tipo;
    }

    

    
 
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($apellido_err) && empty($correo_err) && empty($numero_err) && empty($contra_err) && empty($tipo_err)){
        // Prepare an update statement
        $sql = "UPDATE usuarios SET name=?, apellido=?, correo=?, numero=?, contra=?, tipo=? WHERE idus=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi",$param_name,$param_apellido,$param_correo,$param_numero,$param_contra,$param_tipo,$param_idus);
            
            // Set parameters
            $param_name = $name;
            $param_apellido= $apellido;
			$param_correo = $correo;
			$param_numero = $numero;			
			$param_contra = $contra;
            $param_tipo = $tipo;       
			$param_idus = $idus;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location:usuarios.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["idus"]) && !empty(trim($_GET["idus"]))){
        // Get URL parameter
        $idus =  trim($_GET["idus"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM usuarios WHERE idus = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_idus);
            
            // Set parameters
            $param_idus = $idus;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                     $name = $row["name"];
                     $apellido = $row["apellido"];
				     $correo = $row["correo"];
                     $numero = $row["numero"];
                     $contra = $row["contra"];
					 $tipo = $row["tipo"];
                     
                     

                 } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: errorUsuario.php");
                    exit();
                 }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: errorCliente.php");
        exit();
    }
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRIP-IOT</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png"> <!-- necesito cambiar esto y poner nuestro logo-->
    <link rel="shortcut icon" href="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

        

</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="nodos.php"><i class="menu-icon fa fa-user"></i><?php echo $_SESSION['usuario'];?></a>
                    </li>
                    <?php
                    if($_SESSION['tipo'] == 1){   

                        echo"                      
                        <li class='menu-item-has-children dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon fa fa-table'></i>Tablas</a>
                            <ul class='sub-menu children dropdown-menu'>
                                <li><i class='fa fa-users'></i><a href='usuarios.php'>Usuarios</a></li>
                                
                                                              
                            </ul>
                        </li>
                        <li class='menu-item-has-children dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon fa fa-bar-chart-o'></i>Graficas individuales</a>
                            <ul class='sub-menu children dropdown-menu'>
                                <li><i class='ti-shine'></i><a href='GHAM.php'>Grafica temperatura Ambiental</a></li>
                                <li><i class='fa fa-tachometer'></i><a href='GNA.php'>Grafica Nivel Agua</a></li>
                                <li><i class='fa fa-bar-chart-o'></i><a href='GHT.php'>Grafica Humedad Tierra</a></li>
                                <li><i class='fa fa-tint'></i><a href='GTA.php'>Grafica Led</a></li>
                            </ul>
                        </li>
                        <li class='menu-item-has-children dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-bar-chart-alt'></i>Graficas variadas</a>
                            <ul class='sub-menu children dropdown-menu'>
                            <li><i class='ti-shine'></i><a href='GHAMT.php'>Temperatura Ambienta Y Humedad de la tierra</a></li>
                            <li><i class='fa fa-tachometer'></i><a href='GNT.php'>Grafica agua y led</a></li>              
                            </ul>
                        </li>";
                    }
                    ?>
                        <li class="menu-title">Extras</li><!-- /.menu-title -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Mis Opciones</a>
                            <ul class='sub-menu children dropdown-menu'>
                                <li><i class="fa fa-user"></i><a href="perfil.php">Mi perfil</a></li>
                                <!--li><i class="fa fa-gear (alias)"></i><a href="updateperfil.php">Configuración</a></li-->
                                <li><i class="fa fa-lemon-o"></i><a href="hortalizas.php">Hortalizas</a></li>
                                <li><i class="fa fa-power-off"></i><a href="index.html">Salir</a></li>
                            </ul>
                        </li>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><!--img src="images/logo.png" alt="Logo"></a-->
                    <a id="menuToggle" class="menutoggle" ><i class="fa fa-bars"></i></a>
                   
                </div>
            </div>
            <!--div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                    

                        
                    </div-->

                    <!--div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="index.html"><i class="fa fa-power -off"></i>Logout</a-->
                            <!--action="salir.php" method="POST"-->
                        <!--/div>
                    </di-->

                <!--/div>
            </div-->
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                
              
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-header">
                                <strong>Usuarios</strong> actualización
                            </div>
                            <div class="card-body card-block" >
                                <form class="form-horizontal"action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                                        <div class="col-12 col-md-9"><input type="text"name="name" id="name" placeholder="Ingrese su nombre" value="<?php echo $name; ?>" class="form-control"><small class="form-text text-muted">Nombre</small></div>
                                        <span class="help-block"><?php echo $name_err;?></span>
                                    </div>       
                                    <div class="row form-group <?php echo (!empty($apellido_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Apellido</label></div>
                                        <div class="col-12 col-md-9"><input type="text"name="apellido" id="apellido" placeholder="Ingrese su primer apellido" value="<?php echo $apellido; ?>" class="form-control"><small class="form-text text-muted">Apellido</small></div>
                                        <span class="help-block"><?php echo $apellido_err;?></span>
                                    </div>   
                                    <div class="row form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Correo</label></div>
                                        <div class="col-12 col-md-9"><input type="email" name="correo" id="correo" placeholder="correo@correo.com" value="<?php echo $correo; ?>" class="form-control"><small class="help-block form-text">Please enter your email</small></div>
                                        <span class="focus-input100"><?php echo $correo_err;?></span>
                                    </div>
                                    <div class="row form-group <?php echo (!empty($numero_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Numero</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="numero" id="numero" placeholder="9999999" value="<?php echo $numero; ?>" class="form-control"><small class="form-text text-muted">Numero</small></div>
                                        <span class="help-block"><?php echo $numero_err;?></span>
                                    </div>
                                    <div class="row form-group <?php echo (!empty($contra_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                                        <div class="col-12 col-md-9"><input type="password" name="contra" id="contra" placeholder="Ingrese su contraseña" value="<?php echo $contra; ?>" class="form-control"><small class="help-block form-text">Please enter a complex password</small></div>
                                        <span class="focus-input100"><?php echo $contra_err;?></span>
                                    </div>
                                    <div class="row form-group <?php echo (!empty($tipo_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                        <div class="col-12 col-md-9">
                                        <select name="tipo" id="tipo" class="form-control">
                                            <?php
                                                if($tipo == 1){
                                                    echo "<option selected value=1>Administrator</option>
                                                    <option value=2>Cliente</option>";
                                                }elseif($tipo == 2){
                                                    echo "
                                                    <option value=1>Administrator</option>
                                                    <option selected value=2>Cliente</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                    </div>

                                   
                                    <div class="card-footer">
                                    
                                        <input type="hidden" name="idus" value="<?php echo $idus; ?>"/>
                                        <input type="submit" class="btn btn-primary" value="Enviar"> 
                                        <p><a href="usuarios.php" class="btn btn-primary">Volver</a></p>
                                    </div>
                                    
                                
                                
                                </form>
                            
                            
                            </div>
                            
                        </div>                       
                    </div>
                </div>
                <!-- /.orders -->       
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2022 CRIP-IOT
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="index.html">CRIP-IOT</a>

                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
    
</body>
</html>