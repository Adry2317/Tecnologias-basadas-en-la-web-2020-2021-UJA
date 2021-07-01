<!DOCTYPE html>
<html>
<head>
	<title>Footer</title>
</head>
<body>
	<footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Links usados</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php if(session()->logged_in){echo base_url("pages/logPrincipal");}else{echo base_url("pages/view/principal");} ?> ">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php if(session()->logged_in){echo base_url("pages/logContacto");}else{echo base_url("pages/view/contacto");} ?>">Contacto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php if(session()->logged_in){echo base_url("pages/logInstalaciones");}else{echo base_url("pages/view/instalaciones");} ?>">Servicios</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Servicios</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php if(session()->logged_in){echo base_url("Gestiones/vistaMaterialActividad");}else{echo base_url("pages/view/Actividades");} ?>">Actividades</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url("Gestiones/vistaMaterialActividad")?>">Reserva de material</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url("Gestiones/vistaMaterialActividad")?>">Reserva de pistas</a></li>
              
            </ul>
          </div>



          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Siguenos en nuestras redes sociales</h3>
            <p>Siguenos en todas nuestras redes sociales</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Tecnologias Web</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
      </div>
    </div>
  </footer><!-- End Footer -->


</body>

</html>
