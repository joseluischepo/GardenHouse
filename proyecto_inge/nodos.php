<?php
//Inicio onfiguracion de sesión
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
	header('Location:login.php');
	exit;
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
                    <li class="active"> <!--menu-item-has-children dropdown-->
                        <a href="nodos.php" ><i class="menu-icon fa fa-user"></i><?php echo $_SESSION['usuario'];?></a><!--class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"-->
                        <!--ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa- user"></i><a href="#">Mi perfil</a></li>
                                <li><i class="fa fa-lemon-o#"></i><a href="#">Configuracion</a></li>
                                <li><i class="fa fa-lemon-o#"></i><a href="#">Logout</a></li>
                                                              
                        </ul-->
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
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Nodos</h2>
                        <a href="createNodo.php" class="btn btn-success pull-right">Agregar nueva nodo</a><br></br>
                       
                        
                    </div>
                    <?php
                        // Include config file
                        require_once "conex.php";
                        
                        if($_SESSION['tipo'] == 1){ //ADMINISTRADOR
                                                        $sql = "SELECT * FROM nodo";
                                                        if($result = mysqli_query($link, $sql)){
                                                            if(mysqli_num_rows($result) > 0){
                                                                echo"<div class='row'>";
                                                                    echo"<div class='col-xl-11'>";
                                                                        echo"<div class='card'>";
                                                    
                                                        echo"<div class='card-body--'>";
                                                        echo"<div class='table-stats order-table ov-h'>";
                                                            echo"<table class='table '>";
                                                                echo"<thead>";
                                                                    echo"<tr>";
                                                                        echo "<th>#</th>";
                                                                        echo "<th>Led</th>";
                                                                        echo "<th>Humedad Tierra</th>";
                                                                        echo "<th>Temperatura Ambiental</th>";
                                                                        echo "<th>Nivel Agua</th>";
                                                                        echo "<th>Fecha</th>";                                           
                                                                        echo "<th>Tipo</th>";
                                                                        echo "<th>Id Usuario</th>";
                                                                        echo "<th>apikey</th>";
                                                                        echo "<th>opciones</th>"; 
                                                                    echo"</tr>";
                                                                echo"</thead>";
                                                                echo"<tbody>";
                                                                while($row = mysqli_fetch_array($result)){
                                                                    echo "<tr>";
                                                                        echo "<td>" . $row['idn'] . "</td>";
                                                                        echo "<td>" . $row['luz'] . "</td>";
                                                                        echo "<td>" . $row['humedad_t'] . "</td>";                                             
                                                                        echo "<td>" . $row['humedad_am'] . "</td>";
                                                                        echo "<td>" . $row['nivel_a'] . "</td>";
                                                                        echo "<td>" . $row['Fecha'] . "</td>";
                                                                        echo "<td>" . $row['tipo_h'] . "</td>";
                                                                        echo "<td>" . $row['idu'] . "</td>";
                                                                        echo "<td>" . $row['apikey'] . "</td>";                                                 
                                                                        echo "<td>";
                                                                            echo "<a href='readnodo.php?idn=". $row['idn'] ."' title='Ver' data-toggle='tooltip'><i class='fa fa-eye'></i></a>";
                                                                            //echo "<a href='updatenodo.php?idn=". $row['idn'] ."' title='Actualizar' data-toggle='tooltip'><i class='fa fa-pencil'></i></a>";
                                                                            echo "<a href='deletenodo.php?idn=". $row['idn'] ."' title='Borrar' data-toggle='tooltip'><i class='fa fa-minus-circle'></i></a>";
                                                                            echo "<a href='nodoskey.php?idn=". $row['idn'] ."' title='Apikey' data-toggle='tooltip'><i class='fa fa-key'></i></a>";
                                                                            //echo "<a href='GHAM-C.php?idn=". $row['idn'] ."' title='Grafica' data-toggle='tooltip'><i class='fa fa-key'></i></a>";
                                                                        echo "</td>";
                                                                    echo "</tr>";
                                                                }
                                                                echo "</tbody>";                            
                                                            echo "</table>";
                                                            // Free result set
                                                            mysqli_free_result($result);
                                                        } 
                                                    else{
                                                            echo "<p class='lead'><em>No se han agreado nodos.</em></p>";
                                                        }
                                                    } else{
                                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                    }
                                                }elseif($_SESSION['tipo'] == 2){ //CLIENTE
                                                        $idu = $_SESSION['iduser'];
                                                        $sql = "SELECT * FROM nodo WHERE idu = $idu";
                                                        if($result = mysqli_query($link, $sql)){
                                                            if(mysqli_num_rows($result) > 0){
                                                                echo"<div class='row'>";
                                                                    echo"<div class='col-xl-11'>";
                                                                        echo"<div class='card'>";                            
                                                                            echo"<div class='card-body--'>";
                                                                                echo"<div class='table-stats order-table ov-h'>";
                                                                                    echo"<table class='table '>";
                                                                                        echo "<thead>";
                                                                                            echo "<tr>";
                                                                                                echo "<th>#</th>";
                                                                                                echo "<th>Led</th>";
                                                                                                echo "<th>Humedad Tierra</th>";
                                                                                                echo "<th>Temperatua ambiental</th>";
                                                                                                echo "<th>Nivel Agua</th>";
                                                                                                echo "<th>Fecha</th>";                                           
                                                                                                echo "<th>Tipo</th>";
                                                                                                echo "<th>Id Usuario</th>";
                                                                                                echo "<th>Apikey</th>";
                                                                                                echo "<th>opciones</th>";						
                                                                                            echo "</tr>";
                                                                                        echo "</thead>";
                                                                                        echo "<tbody>";
                                                                                        while($row = mysqli_fetch_array($result)){
                                                                                            echo "<tr>";
                                                                                                echo "<td>" . $row['idn'] . "</td>";
                                                                                                echo "<td>" . $row['luz'] . "</td>";
                                                                                                echo "<td>" . $row['humedad_t'] . "</td>";										
                                                                                                echo "<td>" . $row['humedad_am'] . "</td>";
                                                                                                echo "<td>" . $row['nivel_a'] . "</td>";
                                                                                                echo "<td>" . $row['Fecha'] . "</td>";
                                                                                                echo "<td>" . $row['tipo_h'] . "</td>";
                                                                                                echo "<td>" . $row['idu'] . "</td>";	
                                                                                                echo "<td>" . $row['apikey'] . "</td>";									
                                                                                                echo "<td>";
                                                                                                echo "<a href='readnodo.php?idn=". $row['idn'] ."' title='Ver' data-toggle='tooltip'><i class='fa fa-eye'></i></a>";
                                                                                                //echo "<a href='GNA-C.php?apikey=". $row['apikey'] ."' title='Ver grafica' data-toggle='tooltip'><i class='fa fa-eye'></i></a>";
                                                                                                echo "<a href='deletenodo.php?idn=". $row['idn'] ."' title='Borrar' data-toggle='tooltip'><i class='fa fa-minus-circle'></i></a>";
                                                                                                echo "</td>";
                                                                                            echo "</tr>";
                                                                                        }
                                                                                        echo "</tbody>";                            
                                                                                    echo "</table>";
                                                                                    // Free result set
                                                                                    mysqli_free_result($result);
                                                                                
                                                                            } 
                                                                            else{
                                                                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                                                                }
                                                                            } else{
                                                                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                                            }
                                                            }
                                            
                                                            
                                                                
                                                                
                                                                
                                                                // Attempt select query execution
                                                            
                                            
                                                                // Close connection
                    mysqli_close($link);
                    ?>
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
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>
</html>
