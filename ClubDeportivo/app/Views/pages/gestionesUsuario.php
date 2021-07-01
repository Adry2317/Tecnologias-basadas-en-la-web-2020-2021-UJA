<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container" style="margin-top: 200px; margin-bottom: 100px">
      <h2>Actividades reservadas</h2>
      <br>
             
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Actividad</th>
            <th>Deporte </th>
            <th>Fecha reserva</th>
            <th>Fecha actividad</th>
            <th>Hora</th>

          </tr>
        </thead>
        <tbody>
        	<?php
        		
             	$ultimo = 0;
				      $cont = 0;
              	if(sizeof($useract) > 0){
                  	
                  	foreach ($useract as $row){
                  		foreach ($actividades as $key) {
                  			
                  			if($key -> id_actividad == $row -> id_actividad){
                  		
		                  		echo "<tr>
				                        
				                    <td>". $row -> id_usuario_actividad ."</td>
				                    <td>". $key -> Nombre .  "</td>
				                    <td>". $key -> Deporte ."  </td>
				                    <td>". $row -> fecha_reserva . "</td>
                            <td>". $key -> Fecha . "</td>
		                            <td>". $key -> Hora_inicio. " - " . $key -> Hora_fin  ."</td>
		                            
		                        </tr>";
		                    }
                    	}
                    	
                  	}
                }

                  	echo "<tr><td>".//Campo arriba de errores

                form_open('Gestiones/eliminarActReservada',['id'=>'formEliminarActApunt']) .//Boton y formulario eliminar

                "<div class='form-group'><button type='button' id='quitarActApunt' class='btn'><img src='../assets/img/quitar.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='ElimiActApunt' placeholder='Id de Actividad' value=''>
                </div>
                </td><td><p class='alert alert-danger' id='comprobarIdEliActApunt' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numeroEliApunt' placeholder='Id de Actividad' style='display: none' value=''></td></form>

                </tr>";


                


        	?>
        </tbody>
      </table>
      <?php if (isset($error6)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $error6 ?>

        </div>
      <?php endif; ?>
  	</div>


  	<div class="container" style="margin-top: 100px; margin-bottom: 100px">
      <h2>Materiales reservados</h2>
      <br>
             
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Deporte</th>
            <th>Cantidad</th>
            <th>Fecha reserva</th>
            
            
          </tr>
        </thead>
        <tbody>
        	<?php

        		
             	$ultimo = 0;

              	if(sizeof($usermateriales) > 0){
                  	$cont = 0;
                  	foreach ($usermateriales as $row){
                  		foreach ($materiales as $key) {
                  			
                  			if($key -> id_material == $row -> id_material){
                  		
		                  		echo "<tr>
				                        
				                    <td>". $row -> id_usuario_material ."</td>
				                    <td>". $key -> Nombre .  "</td>
                            <td>". $key -> Deporte .  "</td>
				                    <td>". $row -> cantidad ."  </td>
				                    <td>". $row -> fecha_reserva . "</td>
		                            
		                        </tr>";
		                    }
                    	}
                    	
                  	}
                }

                  	echo "<tr><td>".//Campo arriba de errores

                form_open('Gestiones/eliminarMatReservado',['id'=>'formEliminarMaterialApunt']) .//Boton y formulario eliminar

                "<div class='form-group'><button type='button' id='quitarMatApunt' class='btn'><img src='../assets/img/quitar.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='ElimiMatApunt' placeholder='Id de Material' value=''>
                </div>
                </td><td><p class='alert alert-danger' id='comprobarIdEliMatApunt' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numeroEliMatApunt' placeholder='Id de Material' style='display: none' value=''></td></form>

                </tr>";


                  	
                


        	?>
        </tbody>
      </table>
      <?php if (isset($error5)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $error5 ?>

        </div>
      <?php endif; ?>
  	</div>
    

    


</body>
</html>