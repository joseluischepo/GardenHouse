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
$luz = $humedad_t = $humedad_am = $nivel_a = $Fecha = $tipo_h =  "";
$luz_err = $humedad_t_err = $humedad_am_err = $nivel_a_err = $Fecha_err = $tipo_h_err =  "";
 
// Processing form data when form is submitted
if(isset($_POST["idn"]) && !empty($_POST["idn"])){
    // Get hidden input value
    $idn = $_POST["idn"];
    
    //Validar luz
    $input_luz = trim($_POST["luz"]);
    if(empty($input_luz)){
        $luz_err = "Por favor ingrese el valor del led.";     
    } elseif(!ctype_digit($input_luz)){
        $luz_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $luz= $input_luz;
    }

    //Validar humedad de la tierra
    $input_humedad_t = trim($_POST["humedad_t"]);
    if(empty($input_humedad_t)){
        $humedad_t_err = "Por favor ingrese el valor del sensor.";     
    } elseif(!ctype_digit($input_humedad_t)){
        $humedad_t_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $humedad_t= $input_humedad_t;
    }

    //Validar humedad ambiental
    $input_humedad_am = trim($_POST["humedad_am"]);
    if(empty($input_humedad_am)){
        $humedad_am_err = "Por favor ingrese el valor del sensor.";     
    } elseif(!ctype_digit($input_humedad_am)){
        $humedad_am_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $humedad_am= $input_humedad_am;
    }

    //Validar nivel del agua
    $input_nivel_a = trim($_POST["nivel_a"]);
    if(empty($input_nivel_a)){
        $nivel_a_err = "Por favor ingrese el valor del sensor.";     
    } elseif(!ctype_digit($input_nivel_a)){
        $nivel_a_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $nivel_a= $input_nivel_a;
    }
    
   //Validar fecha
    $input_Fecha = trim($_POST["Fecha"]);
    if(empty($input_Fecha)){
        $Fecha_err = "Por favor ingrese la fecha.";     
    } elseif(!ctype_digit($input_Fecha)){
        $Fecha_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $Fecha= $input_Fecha;
    }
   
    	
	// Validate tipo de usuario
    $input_tipo_h = trim($_POST["tipo_h"]);
    if(empty($input_tipo_h)){
        $tipo_h_err = "Por favor seleccione el tipo de usuario.";
    }else{
        $tipo_h = $input_tipo_h;
    }

    
    
 
    
    // Check input errors before inserting in database
    if(empty($luz_err) && empty($humedad_t_err) && empty($humedad_am_err) && empty($nivel_a_err) && empty($Fecha_err) && empty($tipo_h_err)){
        // Prepare an update statement
        $sql = "UPDATE nodo SET luz=?, humedad_t=?, humedad_am=?, nivel_a=?, Fecha=?, tipo_h=?  WHERE idn=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi",$param_luz,$param_humedad_t,$param_humedad_am,$param_nivel_a,$param_Fecha,$param_tipo_h,$param_idn);
            
            // Set parameters
            $param_luz = $luz;
            $param_humedad_t= $humedad_t;
			$param_humedad_am = $humedad_am;
			$param_nivel_a = $nivel_a;			
			$param_Fecha = $Fecha;
            $param_tipo_h = $tipo_h;      
			$param_idn = $idn;
            
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
    if(isset($_GET["idn"]) && !empty(trim($_GET["idn"]))){
        // Get URL parameter
        $idn =  trim($_GET["idn"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM nodo WHERE idn = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_idn);
            
            // Set parameters
            $param_idn = $idn;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                     $luz = $row["luz"];
                     $humedad_t = $row["humedad_t"];
				     $humedad_am = $row["humedad_am"];
                     $nivel_a = $row["nivel_a"];
                     $Fecha= $row["Fecha"];
					 $tipo_h = $row["tipo_h"];
                     
                     

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
                                <li><i class='fa fa-lemon-o'></i><a href='hortalizas.php'>Hortalizas</a></li>
                                                              
                            </ul>
                        </li>
                        <li class='menu-item-has-children dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon fa fa-bar-chart-o'></i>Graficas individuales</a>
                            <ul class='sub-menu children dropdown-menu'>
                                <li><i class='ti-shine'></i><a href='GHAM.php'>Grafica Humedad Ambiental</a></li>
                                <li><i class='fa fa-tachometer'></i><a href='GNA.php'>Grafica Nivel Agua</a></li>
                                <li><i class='fa fa-bar-chart-o'></i><a href='GHT.php'>Grafica Humedad Tierra</a></li>
                                <li><i class='fa fa-tint'></i><a href='GTA.php'>Grafica Temperatura Agua</a></li>
                            </ul>
                        </li>
                        <li class='menu-item-has-children dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-bar-chart-alt'></i>Graficas variadas</a>
                            <ul class='sub-menu children dropdown-menu'>
                            <li><i class='ti-shine'></i><a href='GHAM.php'>Humedad Ambienta Y tierral</a></li>
                            <li><i class='fa fa-tachometer'></i><a href='GNA.php'>Grafica Nivel y Temperatura Agua</a></li>              
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
                                <li><i class="fa fa-power-off"></i><a href="index.html">Salir</a></li>
                            </ul>
                        </li>
                </ul>
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
                                    <div class="row form-group <?php echo (!empty($luz_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Led</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="luz" id="luz" placeholder="999999" value="<?php echo $luz; ?>°" class="form-control"><small class="form-text text-muted">Dato</small></div>
                                        <span class="help-block"><?php echo $luz_err;?></span>
                                    </div>      
                                    <div class="row form-group <?php echo (!empty($humedad_t_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Humedad de la tierra</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="humedad_t" id="humedad_t" placeholder="" value="<?php echo $humedad_t; ?>°" class="form-control"><small class="form-text text-muted">Dato</small></div>
                                        <span class="help-block"><?php echo $humedad_t_err;?></span>
                                    </div>    
                                    <div class="row form-group <?php echo (!empty($humedad_am_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Humedad ambiental</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="humedad_am" id="humedad_am" placeholder="" value="<?php echo $humedad_am; ?>°" class="form-control"><small class="form-text text-muted">Dato</small></div>
                                        <span class="help-block"><?php echo $humedad_am_err;?></span>
                                    </div>
                                    <div class="row form-group <?php echo (!empty($nivel_a_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nivel del Agua</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="nivel_a" id="nivel_a" placeholder="" value="<?php echo $nivel_a; ?>" class="form-control"><small class="form-text text-muted">Dato</small></div>
                                        <span class="help-block"><?php echo $nivel_a_err;?></span>
                                    </div>
                                    <div class="row form-group <?php echo (!empty($Fecha_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fecha</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="Fecha" id="Fecha" placeholder="" value="<?php echo $Fecha; ?>" class="form-control"><small class="form-text text-muted">Datos</small></div>
                                        <span class="help-block"><?php echo $Fecha_err;?></span>
                                    </div>
                                    <div class="row form-group <?php echo (!empty($tipo_h_err)) ? 'has-error' : ''; ?>">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                        <div class="col-12 col-md-9">
                                        <select name="tipo_h" id="tipo_h" class="form-control">
                                            <?php
                                                if($tipo_h == 'Lechuga'){
                                                    echo "<option selected value=1>Lechuga</option>
                                                    <option value=2>Chile habanero</option>
                                                    <option value=3>Tomates</option>
                                                    <option value=4>Cebolla</option>
                                                    <option value=5>cilantro</option>
                                                    <option value=6>chile</option>";
                                                }elseif($tipo_h == 'Chile habanero'){
                                                    echo "
                                                    <option value=1>Lechuga</option>
                                                    <option selected value=2>Chile habanero</option>";
                                                }elseif($tipo_h == 'Tomates'){
                                                    echo "
                                                    <option value=1>Lechuga</option>
                                                    <option selected value=2>Chile habanero</option>";
                                                }elseif($tipo_h == 'Cebolla'){
                                                    echo "
                                                    <option value=1>Lechuga</option>
                                                    <option selected value=2>Chile habanero</option>";
                                                }elseif($tipo_h == 'Cilantro'){
                                                    echo "
                                                    <option value=1>Lechuga</option>
                                                    <option selected value=2>Chile habanero</option>";
                                                }elseif($tipo_h == 'chile'){
                                                    echo "
                                                    <option value=1>Lechuga</option>
                                                    <option selected value=2>Chile habanero</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                    </div>

                                    
                                    <div class="card-footer">
                                    
                                        <input type="hidden" name="idn" value="<?php echo $idn; ?>"/>
                                        <input type="submit" class="btn btn-primary" value="Enviar"> 
                                        <p><a href="nodos.php" class="btn btn-primary">Volver</a></p>
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