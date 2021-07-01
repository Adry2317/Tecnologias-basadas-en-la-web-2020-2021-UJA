<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>account setting or edit profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


    </style>
</head>
<body>
<?= form_open("ProfileController/updateProfile", ['id'=>'profileConfig']) ?>
<br><br><br><br><br>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<!--form_open_multipart("ProfileController/updateProfile", ['enctype'=>'nultipart/form-data'])  -->

<div class="card">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="<?php if(isset(session()->avatar)){echo base_url("assets/img/".session()->avatar);}else{echo base_url("assets/img/avatar.png");} ?>" >
				</div>
				<br>
				<h4><?php if(isset(session()->Nombre, session()->Apellidos)){
                        echo session()->Nombre," ",session()->Apellidos; 
                      } else {
                        echo "Sin nombre";
                      }
                      ?>
                      </h4>
					  <!-- style="display:none"-->
					  <!--<input type="file" class="form-control" id = "avatar" name ="avatar" style="display: none"  > -->
					  <!--<label for="avatar" class = "btn btn-primary">Cambiar imágen</label> -->	  
			</div>
			
		</div>
				 
	</div>
	
</div>
</div>

<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Datos personales</h6>
			</div>
          
            <div class = "row gutters">
            
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Name">Nombre</label>
					<input type="text" class="form-control" name="Nombre" id="Nombre" placeholder= <?php if(isset(session()->Nombre)){echo session()->Nombre; }else{echo "Nombre";} ?>>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Apellidos">Apellidos</label>
					<input type="text" class="form-control" name="Apellidos" id="Apellidos" placeholder=<?php if(isset(session()->Apellidos)){echo session()->Apellidos; }else{echo "Apellidos";} ?>>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Ususario">Usuario</label>
					<input type="text" class="form-control" name="Usuario" id="Usuario" readonly placeholder=<?php if(isset(session()->Usuario)){echo session()->Usuario; }else{echo "Usuario";} ?>>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="DNI">DNI</label>
					<input type="text" class="form-control" name ="DNI" id="DNI"  readonly placeholder=<?php if(isset(session()->DNI)){echo session()->DNI; }else{echo "DNI";} ?>>
				</div>
			</div>
		</div>
</div>
		<div class="row gutters">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="email" class="form-control" name="Email" id="Email" readonly placeholder=<?php if(isset(session()->Email)){echo session()->Email; }else{echo "Usuario";} ?>>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Telefono">Teléfono</label>
					<input type="text" class="form-control" name="Telefono" id="Telefono" placeholder=<?php if(isset(session()->Telefono)){echo session()->Telefono; }else{echo "Teléfono";} ?>>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="MEtodoPAgo">Método Pago</label>
					<input type="text" class="form-control" name="MetodoPago" id="MetodoPago" placeholder=<?php if(isset(session()->MetodoPago)){echo session()->MetodoPago; }else{echo "Pago";} ?>>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="NuevaContra">Nueva Contraseña</label>
					<input type="password" class="form-control" name="NewPassword" id="NewPassword" placeholder="Nueva contraseña">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="RepetirContra">Repetir Contraseña</label>
					<input type="password" class="form-control" name = "NewPasswordConfirm" id="NewPasswordConfirm" placeholder="Confirmar nueva contraseña">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<a href="viewProfile" class="btn btn-secondary">Volver</a>
					<button type="button" id="actualiza"  class="btn btn-primary">Actualizar</button>
				</div>
			</div>
		</div>
		<br>
		<?php if (isset($errors)): ?>

			<div class="alert alert-danger" role="alert">
				<?= \Config\Services::validation()->listErrors(); ?>

			</div>
		<?php endif; ?>
		<div id="errorPerfil" class="alert alert-danger" role="alert" style="display:none">
			<ul>
				<li id="c13" style="display:none"></li>
				<li id="c23" style="display:none"></li>
				<li id="c33" style="display:none"></li>
				<li id="c43" style="display:none"></li>
				<li id="c53" style="display:none"></li>
				<li id="c63" style="display:none"></li>
			</ul>

</div>
	</div>

</div>

</div>
</div>
</div>



<br><br><br><br><br>
</form>
</body>
</html>