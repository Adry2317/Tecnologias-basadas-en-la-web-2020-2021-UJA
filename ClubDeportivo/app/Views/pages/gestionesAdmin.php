<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container" style="margin-top: 100px; margin-bottom: 100px">
      <h2>Materiales para reservar</h2>
      <br>
             
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Deporte </th>
            
            
            
            <th>Cantidad disponible</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Reservas</th>
          </tr>
        </thead>
        <tbody>
          <?php
             //helper(["form"]);
             $ultimo = 0;
              if(sizeof($material) > 0){
                  	$cont = 0;
                  	foreach ($material as $row){
	                  	
		                    echo "<tr>
		                        
		                        <td>". $row -> id_material ."</td>
		                        <td>". $row -> Nombre .  "</td>
		                        <td>". $row -> Deporte ."  </td>
		                        
		                        
		                        <td>". $row -> Cantidad . "</td>
                            <td>". $row -> Coste . "</td>
                            <td>". $row -> Fecha . "</td>


		                        <td><button type='button' class='btn' data-toggle='modal' data-target='#exampleModalCenter".$cont."'><img src='../assets/img/informacion.png' alt='Reservas'/></button></td>
		                        
		                        
		                        
		                    </tr>";
		                    $ultimo = $row -> id_material;
		                    $cont = $cont + 1;
                		
                  	}
                    echo "<input type='text' style='display: none' name='cant' value='".$ultimo."'></tr>";
                  
              }
              //Boton añadir 
              echo "<tr><td><button type='button' class='btn' data-toggle='modal' data-target='#exampleModalMod2'><img src='../assets/img/mas.png' alt='Reservas'/></button></td><td>" .
              //Formulario añadir
              form_open('Gestiones/modificarMaterial',['id'=>'formUpdate']) .

              //Boton y campo editar 
              "<div class='form-group'><button type='button' id='ir' class='btn'><img src='../assets/img/edi.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='actual' placeholder='Id de Material' value=''>
                </div>
                
                </td><td><p class='alert alert-danger' id='comprobarId' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numero' placeholder='Id de Material' style='display: none' value='".$cont."'></td></form>

                <td>".//Campo arriba de errores

                form_open('Gestiones/borrarMaterial',['id'=>'formEliminarMaterial']) .//Boton y formulario eliminar

                "<div class='form-group'><button type='button' id='quitar' class='btn'><img src='../assets/img/quitar.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='Elimi' placeholder='Id de Material' value=''>
                </div>
                </td><td><p class='alert alert-danger' id='comprobarIdEli' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numeroEli' placeholder='Id de Material' style='display: none' value='".$cont."'></td></form>

                </tr>"

             


          ?>
        </tbody>
      </table>
      <?php if (isset($error8)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $error8 ?>

        </div>
      <?php endif; ?>
      <?php if (isset($error10)): ?>

          <div class="alert alert-danger" role="alert">
              <?= $error10 ?>

          </div>
      <?php endif; ?>
      </div>
      <!-- Modal -->
    <?php
     
      $tot = 0;
      $aux = 0;
      foreach ($material as $row) {
        
        
        
        
        
        //Hacer la busqueda de usuarios por DNI y mostrar
        echo "<div class='modal fade' id='exampleModalCenter".$aux."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Usuarios apuntados</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'>
                <table class='table table-striped'>
                <thead>
                    <tr>
                      <td>Dni</td>
                      <td>Usuario</td>
                      <td>Fecha</td>
                    </tr>
                </thead>
                <tbody>";


                
                foreach($UsuariosMateriales as $usuariosApuntados) {
                   if($row->id_material == $usuariosApuntados->id_material){
                     foreach($usuario as $user){
                        if($usuariosApuntados->dni_user == $user->DNI){
                          echo "<tr>
                          <td>" .$usuariosApuntados->dni_user  . "</td>
                          <td>" . $user->Usuario  . "</td>
                          <td>" . $usuariosApuntados -> fecha_reserva  . "</td>
                          </tr>";
                        }
                      }
                    }  
                }
                    
                
                
                  


            
                echo "</tbody>
                </table>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
              </div>
            </div>
          </div>
        </div>
        ";
        $aux++;
      }

      $tot = $aux;
      
    ?>
    
       <!-- Modal -->
       <?php
     
     $tot = 0;
     $aux = 0;
     foreach ($pista as $row) {
       
       
       
       
       
       //Hacer la busqueda de usuarios por DNI y mostrar
       echo "<div class='modal fade' id='exampleModalCenter2".$aux."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
         <div class='modal-dialog modal-dialog-centered' role='document'>
           <div class='modal-content'>
             <div class='modal-header'>
               <h5 class='modal-title' id='exampleModalLongTitle'>Usuarios apuntados</h5>
               <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
               </button>
             </div>
             <div class='modal-body'>
               <table class='table table-striped'>
               <thead>
                   <tr>
                     <td>Dni</td>
                     <td>Usuario</td>
                     <td>Fecha</td>
                   </tr>
               </thead>
               <tbody>";


               
               foreach($UsuariosMateriales as $usuariosApuntados) {
                  if($row->id_material == $usuariosApuntados->id_material){
                    foreach($usuario as $user){
                       if($usuariosApuntados->dni_user == $user->DNI){
                         echo "<tr>
                         <td>" .$usuariosApuntados->dni_user  . "</td>
                         <td>" . $user->Usuario  . "</td>
                         <td>" . $usuariosApuntados -> fecha_reserva  . "</td>
                         </tr>";
                       }
                     }
                   }  
               }
                   
               
               
                 


           
               echo "</tbody>
               </table>
             </div>
             <div class='modal-footer'>
               <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
             </div>
           </div>
         </div>
       </div>
       ";
       $aux++;
     }

     $tot = $aux;
     
   ?>

 <!--Modal Añadir Material-->
 <div class='modal fade' id='exampleModalMod2' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Insertar Material</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'> 
                <?=form_open('Gestiones/insertarMaterial',['id'=>'formInsertarMaterial']) ?>
                  <div class='form-group'>
                      <label for='imputNombre'>Nombre Material</label>
                      <input type='text' class='form-control' name='imputNombreInsert' placeholder='Nombre Material' value=''>
                  </div>
                
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Deporte</legend>
                        <div class='col-sm-10'>

                        
                          
                        
                          <div class='form-check'>
                            <input class='form-check-input' type='radio' name='gridRadiosInsert' id='gridRadios1' value='option1'>
                            <label class='form-check-label' for='gridRadios1'>
                              Tenis
                            </label>
                          </div>

                        

                        
                          <div class='form-check'>
                            <input class='form-check-input' type='radio' name='gridRadiosInsert' id='gridRadios2' value='option2'>
                            <label class='form-check-label' for='gridRadios2'>
                              Baloncesto
                            </label>
                          </div>
                        

                        
                          <div class='form-check'>
                              <input class='form-check-input' type='radio' name='gridRadiosInsert' id='gridRadios3' value='option3'>
                              <label class='form-check-label' for='gridRadios3'>
                                Golf
                              </label>
                            </div>
                          </div>
                        </div>
                  </fieldset>
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Fecha</legend>
                        <div class='col-sm-10'>
                            <input type='date' id='start' name='startInsert' value=''>
                        </div>
                      </div>
                  </fieldset>
                  
                  
                  <div class='form-group'>
                      <label for='imputNombre'>Cantidad</label>
                      <input type='number'  name='Cantidad' value=''>
                      
                  </div>
                  <div class='form-group'>
                      <label for='imputNombre'>Precio</label>
                      <input type='number'  name='precio' value=''>
                      
                  </div>
                  <div class='form-group'>
                      <button type='button' class='btn btn-primary' name = "ConfiGestion" id='ConfiGestion'>Confirmar cambios</button>
                      
                  </div>
                  <div id='error' class='alert alert-danger' role='alert' style='display:none'>
                    <ul>
                        <li id='c1' style='display:none'></li>
                        <li id='c2' style='display:none'></li>
                        <li id='c3' style='display:none'></li>
                        <li id='c4' style='display:none'></li>
                        <li id='c5' style='display:none'></li>
                    </ul>

                  </div>
              </form>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
              </div>
            </div>
          </div>
        </div>

        <div class="container" style="margin-top: 100px; margin-bottom: 100px">
      <h2>Pistas para reservar</h2>
      <br>
             
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Deporte </th>
            
            
            
            <th>Cantidad disponible</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Reservas</th>
          </tr>
        </thead>
        <tbody>
          <?php
             //helper(["form"]);
             $ultimo = 0;
              if(sizeof($pista) > 0){
                  	$cont = 0;
                  	foreach ($pista as $row){
	                  	
		                    echo "<tr>
		                        
		                        <td>". $row -> id_material ."</td>
		                        <td>". $row -> Nombre .  "</td>
		                        <td>". $row -> Deporte ."  </td>
		                        
		                        
		                        <td>". $row -> Cantidad . "</td>
                            <td>". $row -> Coste . "</td>
                            <td>". $row -> Fecha . "</td>


		                        <td><button type='button' class='btn' data-toggle='modal' data-target='#exampleModalCenter2".$cont."'><img src='../assets/img/informacion.png' alt='Reservas'/></button></td>
		                        
		                        
		                        
		                    </tr>";
		                    $ultimo = $row -> id_material;
		                    $cont = $cont + 1;
                		
                  	}
                    echo "<input type='text' style='display: none' name='cant' value='".$ultimo."'></tr>";
                  
              }
              //Boton añadir 
              echo "<tr><td><button type='button' class='btn' data-toggle='modal' data-target='#exampleModalMod'><img src='../assets/img/mas.png' alt='Reservas'/></button></td><td>" .
              //Formulario añadir
              form_open('Gestiones/modificarPista',['id'=>'formUpdatePistas']) .

              //Boton y campo editar 
              "<div class='form-group'><button type='button' id='ir' class='btn'><img src='../assets/img/edi.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='actual2' placeholder='Id de Pista' value=''>
                </div>
                
                </td><td><p class='alert alert-danger' id='comprobarIdPistas' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numero' placeholder='Id de Material' style='display: none' value='".$cont."'></td></form>

                <td>".//Campo arriba de errores

                form_open('Gestiones/borrarPista',['id'=>'formEliminarPistas']) .//Boton y formulario eliminar

                "<div class='form-group'><button type='button' id='quitar' class='btn'><img src='../assets/img/quitar.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='Elimi2' placeholder='Id de Pista' value=''>
                </div>
                </td><td><p class='alert alert-danger' id='comprobarIdEliPista' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numeroEli' placeholder='Id de Material' style='display: none' value='".$cont."'></td></form>

                </tr>"

             


          ?>
        </tbody>
      </table>
      <?php if (isset($error9)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $error9 ?>

        </div>
      <?php endif; ?>
      <?php if (isset($error11)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $error11 ?>

        </div>
      <?php endif; ?>
      </div>
 
 <!--Modal Añadir Material-->
 <div class='modal fade' id='exampleModalMod' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Insertar Pista</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'> 
                <?=form_open('Gestiones/insertarPista',['id'=>'formInsertarPista']) ?>
                  <div class='form-group'>
                      <label for='imputNombre'>Nombre Pista</label>
                      <input type='text' class='form-control' name='imputNombreInsert2' placeholder='Nombre pistas' value=''>
                  </div>
                
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Deporte</legend>
                        <div class='col-sm-10'>

                        
                          
                        
                          <div class='form-check'>
                            <input class='form-check-input' type='radio' name='gridRadiosInsert2' id='gridRadios1' value='option1'>
                            <label class='form-check-label' for='gridRadios1'>
                              Tenis
                            </label>
                          </div>

                        

                        
                          <div class='form-check'>
                            <input class='form-check-input' type='radio' name='gridRadiosInsert2' id='gridRadios2' value='option2'>
                            <label class='form-check-label' for='gridRadios2'>
                              Baloncesto
                            </label>
                          </div>
                        

                        
                          <div class='form-check'>
                              <input class='form-check-input' type='radio' name='gridRadiosInsert2' id='gridRadios3' value='option3'>
                              <label class='form-check-label' for='gridRadios3'>
                                Golf
                              </label>
                            </div>
                          </div>
                        </div>
                  </fieldset>
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Fecha</legend>
                        <div class='col-sm-10'>
                            <input type='date' id='start' name='startInsert2' value=''>
                        </div>
                      </div>
                  </fieldset>
                  
                  
                  <div class='form-group'>
                      <label for='imputNombre'>Cantidad</label>
                      <input type='number'  name='Cantidad2' value=''>
                      
                  </div>
                  <div class='form-group'>
                      <label for='imputNombre'>Precio</label>
                      <input type='number'  name='precio2' value=''>
                      
                  </div>
                  <div class='form-group'>
                      <button type='button' class='btn btn-primary' name = "ConfiGestion2" id='ConfiGestion2'>Confirmar cambios</button>
                      
                  </div>
                  <div id='error2' class='alert alert-danger' role='alert' style='display:none'>
                    <ul>
                        <li id='c12' style='display:none'></li>
                        <li id='c22' style='display:none'></li>
                        <li id='c32' style='display:none'></li>
                        <li id='c42' style='display:none'></li>
                        <li id='c52' style='display:none'></li>
                    </ul>

                  </div>
              </form>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
              </div>
            </div>
          </div>
        </div>

</body>
</html>