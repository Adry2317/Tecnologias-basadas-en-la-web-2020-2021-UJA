<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  

    <div class="container" style="margin-top: 300px; margin-bottom: 300px">
      <h2>Actividades para apuntarse</h2>
      <br>
      <br>           
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Deporte</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Plazas</th>
            <th>Reservas</th>
          </tr>
        </thead>
        <tbody>
          <?php
             //helper(["form"]);
             $ultimo = 0;//Muestro actividades
              if(sizeof($actividades) > 0){
                  $cont = 0;
                  foreach ($actividades as $row){
                    echo "<tr>
                        <td>". $row -> id_actividad ."</td>
                        <td>". $row -> Nombre ."</td>
                        <td>". $row -> Deporte ."</td>
                        <td>". $row -> Fecha ."</td>
                        <td>". $row -> Hora_inicio . "-" . $row -> Hora_fin . "</td>
                        <td>".$row->plazas."</td>
                        <td><button type='button' class='btn' data-toggle='modal' data-target='#exampleModalCenter".$cont."'><img src='../assets/img/informacion.png' alt='Reservas'/></button></td>
                        
                        
                        
                    </tr>";
                    $ultimo = $row -> id_actividad;//Boton arriba ver usuarios
                    $cont = $cont + 1;//input de abajo el ultimo id de actividad
                  }

                  echo "<input type='text' style='display: none' name='cant' value='".$ultimo."'></tr>";

              }//Boton añadir 
              echo "<tr><td><button type='button' class='btn' data-toggle='modal' data-target='#exampleModalMod'><img src='../assets/img/mas.png' alt='Reservas'/></button></td><td>" .
              //Formulario añadir
              form_open('Actividades/modificar',['id'=>'formIdact']) .

              //Boton y campo editar 
              "<div class='form-group'><button type='button' id='irActv' class='btn'><img src='../assets/img/edi.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='actualAct' placeholder='Id de Actividad' value=''>
                </div>
                
                </td><td><p class='alert alert-danger' id='comprobarIdAct' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numero' placeholder='Id de Actividad' style='display: none' value='".$cont."'></td></form>

                <td>".//Campo arriba de errores

                form_open('Actividades/borrar',['name'=>'formEliminar']) .//Boton y formulario eliminar

                "<div class='form-group'><button type='button' id='quitar' class='btn'><img src='../assets/img/quitar.png' alt='Reservas'/></button></div><div class='form-group'>
                      <input type='text' class='form-control' name='Elimi' placeholder='Id de Actividad' value=''>
                </div>
                </td><td><p class='alert alert-danger' id='comprobarIdEli' style='display: none'>Id incorrecta</p></td><td><input type='text' class='form-control' name='numeroEli' placeholder='Id de Actividad' style='display: none' value='".$cont."'></td></form>

                </tr>"


          ?>
        </tbody>
      </table>
      <?php if (isset($error10)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $error10 ?>

        </div>
      <?php endif; ?>
      <?php if (isset($error11)): ?>

        <div class="alert alert-danger" role="alert">
            <?= $error11 ?>

        </div>
      <?php endif; ?>
    </div>
    

    <!-- Modal -->
    <?php
      $tot = 0;
      $aux = 0;
      foreach ($actividades as $row) {
        
         

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



                foreach ($actividadUsuario as $key ) {
                    if($key -> id_actividad == $row -> id_actividad){
                        foreach ($usuarios as $value) {
                            if($value->DNI == $key -> dni_usuario){
                                echo "<tr>
                                <td>" . $value->DNI  . "</td>
                                <td>" . $value->Usuario  . "</td>
                                <td>" . $key -> fecha_reserva  . "</td>
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

    <!--Modal Añadir-->
   <div class='modal fade' id='exampleModalMod' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Insertar actividad</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
              <div class='modal-body'> 
                <?=form_open('Actividades/insertar',['name'=>'formActinse']) ?>
                  <div class='form-group'>
                      <label for='imputNombre'>Nombre actividad</label>
                      <input type='text' class='form-control' name='imputNombreInsert' placeholder='Nombre actividad' value=''>
                  </div>
                  <div class='form-group' style='display: none'>
                      <label for='imputNombre'>Nombre actividad</label>
                      <input type='text' class='form-control' name='identInsert' placeholder='Nombre actividad' value=''>
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
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Hora inicio</legend>
                        <div class='col-sm-10'>
                            <input type='time' id='start' name='horainiInsert' value=''>
                        </div>
                      </div>
                  </fieldset>
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Fecha Fin</legend>
                        <div class='col-sm-10'>
                            <input type='time' id='start' name='horafinInsert' value=''>
                        </div>
                      </div>
                  </fieldset>
                  <div class='form-group'>
                      <label for='imputNombre'>Numero de plazas</label>
                      <input type='number'  name='plazasInsert' value=''>
                      
                  </div>
                  <div class='form-group'>
                      <button type='button' class='btn btn-primary' id='Confi'>Confirmar cambios</button>
                      
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
    

  
  

    
</body>


</html>