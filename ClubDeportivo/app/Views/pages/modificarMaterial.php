<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="content" style="margin-top: 300px; margin-bottom: 300px; margin-left: 20px">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                

	<?php
		$row = $material;
		echo "<h1>Modificar Material</h1>" .

		
        form_open('Gestiones/modificar',['name'=>'formAct']) .
                  
                
                  "<div class='form-group'>
                      <label for='imputNombre'>Nombre actividad</label>
                      <input type='text' class='form-control' name='imputNombre' placeholder='Nombre Material' value='".$row -> Nombre."'>
                  </div>
                  <br>
                  <br>
                  <div class='form-group' style='display: none'>
                      <label for='imputNombre'>Nombre actividad</label>
                      <input type='text' class='form-control' name='ident' placeholder='Nombre actividad' value='".$row -> id_material ."'>
                  </div>
                  <br>
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Deporte</legend>
                        <div class='col-sm-10'>";

                        if($row -> Deporte == 'Tenis'){
                          echo "<div class='form-check'>
                            <input class='form-check-input' type='radio' name='gridRadios' id='gridRadios1' value='option1' checked>
                            <label class='form-check-label' for='gridRadios1'>
                              Tenis
                            </label>
                          </div>";
                        }else{
                          echo "<div class='form-check'>
                            <input class='form-check-input' type='radio' name='gridRadios' id='gridRadios1' value='option1'>
                            <label class='form-check-label' for='gridRadios1'>
                              Tenis
                            </label>
                          </div>";

                        }

                        if($row -> Deporte == 'Baloncesto'){
                          echo "<div class='form-check'>
                            <input class='form-check-input' type='radio' name='gridRadios' id='gridRadios2' value='option2' checked>
                            <label class='form-check-label' for='gridRadios2'>
                              Baloncesto
                            </label>
                          </div>";
                        }else{
                            echo "<div class='form-check'>
                            <input class='form-check-input' type='radio' name='gridRadios' id='gridRadios2' value='option2'>
                            <label class='form-check-label' for='gridRadios2'>
                              Baloncesto
                            </label>
                          </div>";
                        }

                        if($row -> Deporte == 'Golf'){
                            echo "<div class='form-check'>
                              <input class='form-check-input' type='radio' name='gridRadios' id='gridRadios3' value='option3' checked>
                              <label class='form-check-label' for='gridRadios3'>
                                Golf
                              </label>
                            </div>
                          </div>";
                        }else{
                          echo "<div class='form-check'>
                              <input class='form-check-input' type='radio' name='gridRadios' id='gridRadios3' value='option3'>
                              <label class='form-check-label' for='gridRadios3'>
                                Golf
                              </label>
                            </div>
                          </div>";
                        }

                      echo "</div>
                  </fieldset>
                  <br>
                  <br>
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Fecha</legend>
                        <div class='col-sm-10'>
                            <input type='date' id='start' name='start' value='". $row -> Fecha ."'>
                        </div>
                      </div>
                  </fieldset>
                  <br>
                  <br>
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Cantidad</legend>
                        <div class='col-sm-10'>
                            <input type='text' id='start' name='cantidad' value='". $row -> Cantidad."'>
                        </div>
                      </div>
                  </fieldset>
                  <br>
                  <br>
                  <fieldset class='form-group'>
                      <div class='row'>
                        <legend class='col-form-label col-sm-2 pt-0'>Coste</legend>
                        <div class='col-sm-10'>
                            <input type='text' id='start' name='coste' value='". $row -> Coste."'>
                        </div>
                      </div>
                  </fieldset>
                  <br>
                  <br>
                  
                  <div class='form-group'>
                      <button type='button' class='btn btn-primary' id='Confirmar'>Confirmar cambios</button>

                      <a href='#' class='btn btn-primary' id='Cancelar'>Cancelar</a>
                      
                      
                      
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
              </form>";
              ?>
                                     </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>    
</body>
</html>