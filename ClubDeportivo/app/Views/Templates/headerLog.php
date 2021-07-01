<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Contact - Moderna Bootstrap Template</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	
	

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

	

	

	<!-- =======================================================
	* Template Name: Moderna - v4.0.1
	* Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
</head>
<body>
	<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="principal"><span>Club Deportivo</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="" href="<?php echo base_url("pages/logPrincipal") ?>">Inicio</a></li>
          <li><a href="<?php echo base_url("pages/logInstalaciones") ?>">Instalaciones</a></li>
          <li><a href="<?php echo base_url("Gestiones/vistaMaterialActividad") ?>">Actividades y material</a></li>
          <li><a href="<?php echo base_url("Gestiones/vistaGestionUsuarios") ?>">Mis gestiones</a></li>
          <li><a href="<?php echo base_url("pages/logContacto") ?>">Contacto</a></li>
          <li class="dropdown"><a href="#"><span><?= session()->Usuario ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url("ProfileController/viewProfile") ?>">Perfil</a></li>
              <li><a href="<?php echo base_url("Logout/cerrarSesion") ?>">Logout</a></li>
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
</body>
</html>