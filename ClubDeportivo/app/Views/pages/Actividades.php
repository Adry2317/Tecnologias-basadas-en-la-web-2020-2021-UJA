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
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Plazas</th>
            <th>Apuntarse</th>
          </tr>
        </thead>
        <tbody>
          <?php
              if(sizeof($actividades) > 0){
                  $cont = 0;
                  foreach ($actividades as $row){
                    echo "<tr>
                        <td>". $cont ."</td>
                        <td>". $row -> Nombre ."</td>
                        <td>". $row -> Deporte ."</td>
                        <td>". $row -> Fecha ."</td>
                        <td>". $row -> Hora_inicio ."</td>
                        <td>". $row -> Hora_fin ."</td>
                        <td>". $row -> plazas ."</td>
                        <td><a href='../../LoginController/authLogin' class='btn btn-primary'>Apuntarse</a></td>
                    </tr>";
                    $cont = $cont + 1;
                  }

              }


          ?>
        </tbody>
      </table>
    </div>
</body>
</html>