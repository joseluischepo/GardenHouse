<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Usuarios</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <i class="fa fa-user fa-fw" aria-hidden="true"></i><b class="hidden-xs">Administrador</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                    </li>
                    <li>
                        <a href="usuarios.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Usuarios</a>
                    </li>
                    <li>
                        <a href="registro_usuarios.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Registrar usuario</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Registro</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="......" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Cerrar sesion

                        </a>
                        <ol class="breadcrumb">
                            <li><a href="#">Configuraciones</a></li>
                            <li><a href="#">Configuraciones</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                                <div class="white-box">
                                    <form class="form-horizontal form-material" action="guardar_usuarios.php" method="POST">
                                        <h3 class="box-title">Registro de usuarios</h3>
                                        <div class="form-group">
                                            <label class="col-md-12">Nombre</label>
                                                <div class="col-md-12">
                                                <input type="text" required name="nombre" placeholder="Nombre..." value="" class="form-control form-control-line" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Apellido</label>
                                                <div class="col-md-12">
                                                <input type="text" required name="apellido" placeholder="Apellido..." value="" class="form-control form-control-line" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Correo</label>
                                                <div class="col-md-12">
                                                <input type="text" required name="correo" placeholder="Correo..." value="" class="form-control form-control-line" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Numero</label>
                                                <div class="col-md-12">
                                                <input type="text" required name="numero" placeholder="Numero..." value="" class="form-control form-control-line" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Contrase??a</label>
                                                <div class="col-md-12">
                                                <input type="text" required name="contrase??a1" placeholder="Contrase??a..." value="" class="form-control form-control-line" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Repita la contrase??a</label>
                                                <div class="col-md-12">
                                                <input type="text" required name="contrase??a2" placeholder="Confirme contrase??a..." value="" class="form-control form-control-line" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" type="submit" class="form-control form-control-line" >Guardar usuario</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center">Administrador </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>
