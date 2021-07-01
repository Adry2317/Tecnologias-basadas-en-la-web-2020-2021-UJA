<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container" style="margin-top: 300px; margin-bottom: 300px">
      <h2>Usuarios registrados</h2>
      <br>
      <br>           
      <table class="table table-striped">
        <thead>
          <tr>
            <th>DNI</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Correo</th>
          </tr>
        </thead>
        <tbody>
          	<?php
            // helper(["form"]);
            //Muestro actividades
              if(sizeof($usuarios) > 0){
                  $cont = 0;
                  foreach ($usuarios as $row){
                    echo "<tr>
                        <td>". $row->DNI ."</td>
                        <td>". $row->Usuario ."</td>
                        <td>". $row->Nombre ."</td>
                        <td>". $row->Apellidos ."</td>
                        <td>". $row->Telefono ."</td>
                        <td>". $row->Email."</td>

                    </tr>";
                    //Boton arriba ver usuarios
                    $cont = $cont + 1;//input de abajo el ultimo id de actividad
                  }

                  

              }
              echo "<tr><td>" .

              form_open('UsuariosAdmin/eliminar',['name'=>'formEliminarUsu']) .//Boton y formulario eliminar

                "<div class='form-group'><button type='button' id='quitarUsu' class='btn'><img src='../assets/img/quitar.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='ElimiUsu' placeholder='DNI usuario' value=''>
                </div>
                </td><td><p class='alert alert-danger' id='comprobarIdEliUsu' style='display: none'>DNI incorrecto</p></td><td><input type='text' class='form-control' name='numeroEliUsu' placeholder='DNI del usuario' style='display: none' value='".$cont."'></td></form>

                </tr>"
            ?>
        </tbody>
      </table>
      <?php if (isset($error7)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $error7 ?>

        </div>
      <?php endif; ?>
    </div>
</body>
</html>