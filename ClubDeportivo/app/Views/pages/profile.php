<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile with data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

    </style>
</head>
<body>
<div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <div class="main-body">
      
      <br><br><br><br><br>
      <h1 align="center">Información del perfil</h1>
      <br>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php if(isset(session()->avatar)){echo base_url("assets/img/".session()->avatar);}else{echo base_url("assets/img/avatar.png");} ?>"  class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php if(isset(session()->Nombre, session()->Apellidos)){
                        echo session()->Nombre," ", session()->Apellidos; 
                      } else {
                        echo "Sin nombre";
                      }
                      ?>
                      </h4>
                      <br>
                      <a class = "btn btn-pill text-white btn-block btn-primary" href="viewProfileConfig">Modificar perfil</a>
                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre Completo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php if(isset(session()->Nombre, session()->Apellidos)){
                        echo session()->Nombre, " ", session()->Apellidos," "; 
                      } else {
                        echo "Sin información";
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Usuario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php if(isset(session()->Usuario)){
                         echo session()->Usuario;
                      } else {
                        echo "Sin información";
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">DNI</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php if(isset(session()->DNI)){
                        echo session()->DNI; 
                      } else {
                        echo "Sin información";
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php if(isset(session()->Email)){
                        echo session()->Email; 
                      } else {
                        echo "Sin información";
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Teléfono</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php if(isset(session()->Telefono)){
                        echo session()->Telefono; 
                      } else {
                        echo "Sin información";
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Método de pago</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php if(isset(session()->MetodoPago)){
                        echo session()->MetodoPago; 
                      } else {
                        echo "Sin información";
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
      
            </div>
          </div>
        </div>
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
<br><br><br><br><br>
</body>
</html>