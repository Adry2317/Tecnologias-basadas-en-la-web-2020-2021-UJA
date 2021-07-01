<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container" style="margin-top: 200px; margin-bottom: 100px">
      <h2>Actividades para apuntarse</h2>
      <br>
             
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Deporte </th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Plazas</th>
          </tr>
        </thead>
        <tbody>
        	<?php
        		//helper(["form"]);
             	
              	if(sizeof($actividades) > 0){
                  	
                  	foreach ($actividades as $row){

                  		
		                echo "<tr>
				                        
                      <td>". $row -> id_actividad ."</td>
                      <td>". $row -> Nombre .  "</td>
                      <td>". $row -> Deporte ."  </td>
                      <td>". $row -> Fecha . "</td>
                      <td>". $row -> Hora_inicio. "-" . $row -> Hora_fin  ."</td>
                      <td>". $row -> plazas . "</td>
		                            
                    </tr>";
		                    
                    	
                    	
                  	}
                }
                
                echo "<tr><td>".//Campo arriba de errores

                form_open('Gestiones/ApuntarseActividad',['id'=>'formApuntarseActividad']) .//Boton y formulario eliminar

                "<div class='form-group'><button type='button' id='ApuntarseActividad' class='btn'><img src='../assets/img/mas.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='idActividad' placeholder='Id de Actividad' value=''>
                </div>
                </td><td><p class='alert alert-danger' id='comprobarIdEliActApunt' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numeroEliApunt' placeholder='Id de Actividad' style='display: none' value=''></td>
                
                </form>

                </tr>"; 

        	?>
        
        </tbody>
      </table>
      <?php if (isset($errors)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $errors ?>

        </div>
      <?php endif; ?>
  	</div>


  	<div class="container" style="margin-top: 100px; margin-bottom: 100px">
      <h2>Materiales y Pistas para reservar</h2>
      <br>
             
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Deporte</th>
            <th>Cantidad</th>
            <th>Tipo</th>
            <th>Coste</th>
            
            
          </tr>
        </thead>
        <tbody>
        	<?php
        	//	helper(["form"]);
             	
              	if(sizeof($materiales) > 0){
                  	
                  	foreach ($materiales as $row){
                  		
                  		
		                echo "<tr>
				                        
				        <td>". $row -> id_material ."</td>
				        <td>". $row -> Nombre .  "</td>
                <td>". $row -> Deporte .  "</td>
                <td>". $row -> Cantidad."</td>
				        <td>". $row -> tipo ."  </td>
				        <td>". $row -> Coste . "</td>
		                            
		                </tr>";
		                
                   	}
                    	
                }
                echo "<tr><td>".//Campo arriba de errores

                form_open('Gestiones/reservaMaterialPista',['id'=>'formReservaActPist']) .//Boton y formulario eliminar

                "<div class='form-group'><button type='button' id='ReservaMatPist' class='btn'><img src='../assets/img/mas.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='idMaterialPista' placeholder='Id de Material/Pista' value=''>
                      <br>
                      <input type='text' class='form-control' name='Cantidad' placeholder='Cantidad' value=''>
                </div>
                </td>
                </form>

                </tr>";
        	?>
        </tbody>
      </table>
      <?php if (isset($errors3)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $errors3 ?>

        </div>
      <?php endif; ?>
      <?php if (isset($errors4)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $errors4 ?>

        </div>
      <?php endif; ?>
      <p class='alert alert-danger' id='comprobarIdEliActApunt3' style='display: none'>La cantidad debe de ser mayor a 0</p></td><td><input type='text' class='form-control' name='numeroEliApunt2' placeholder='Id de Actividad' style='display: none' value=''>
      <p class='alert alert-danger' id='comprobarIdEliActApunt2' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numeroEliApunt' placeholder='Id de Actividad' style='display: none' value=''>
      
  	</div>
</body>
</html>