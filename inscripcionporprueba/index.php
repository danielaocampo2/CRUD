<?php
date_default_timezone_set("America/Lima");
$currentDate= date("Y-m-d H:i:s");
include("../conexion/conexion.php");

  @$id_get=$_GET['id'];
  $query="SELECT * FROM inscripcionporprueba where id='$id_get'";
  $execute=mysqli_query($conexion,$query);
  while ($row=mysqli_fetch_array($execute)){   
  
  	     $id=$row[0];
         $swimmer = $row[1];    
         $date=$row[2];
         $competition=$row[3];
         $test=$row[4];
         $time=$row[5];
         $position=$row[6];
         $points=$row[6];
         $state=$row[6];
         }                                                     
    
?>
<!DOCTYPE html>
<html>

<head>

  <title>YS CRUD</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  <script src="../librerias/materialize/js/materialize.min.js" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="../librerias/materialize/css/materialize.min.css" type="text/javascript">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <script type="text/javascript">

    $(document).ready(function () {
      // Setup - add a text input to each footer cell
      $('#table_id tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
      });

      // DataTable
      var table = $('#table_id').DataTable({
        initComplete: function () {
          // Apply the search
          this.api().columns().every(function () {
            var that = this;

            $('input', this.footer()).on('keyup change clear', function () {
              if (that.search() !== this.value) {
                that
                  .search(this.value)
                  .draw();
              }
            });
          });
        },
        "language": {
          "lengthMenu": "Mostrar _MENU_ registros por página",
          "zeroRecords": "Ningún registro coincide con la búsqueda",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "search": "Buscar",
          "paginate": { "next": "Siguiente", "previous": "Anterior" },
          "infoFiltered": "(Filtrado de _MAX_ registros totales)"
        }
      });

      id = ($("#idn").val());
      if (id > 0) {
        $("#create-form").hide();

      } if (id == "") {
        $("#update-form").hide();

      }
    });
  </script>

</head>

<body style="margin-left: 1px;">

  <input type="hidden" name="" id="idn" value="<?php echo $id_get?>">

  <div class="container">
    <div class="row">
      <div class="col-sm" id="create-form">
        <h5 class="blue-text">REGISTRO DE RESULTADOS</h5><br><br>
        <!-- formulario-->

        <form action="control.php" method="POST" accept-charset="utf-8">

          <div class="input-field ">
            <input type="number"  min="1"  name="swimmer" required>
            <label for="swimmer">Cédula nadador</label>
            
          </div>

          <div class="input-field ">
            <input type="text" name="date" value="<?php echo $currentDate;
              ?>" required>
            <label for="date">Fecha</label>
          </div>

          <div class="form-group">
            <label for="competition">Competicion</label>
            <select class="form-control" name="competition">
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
          </div>
          <div class="form-group">
            <label for="test">Prueba</label>
            <select class="form-control" name="test">
              <option>100 Mariposa </option>
              <option>100 Espalda</option>
              <option>100 Pecho</option>
              <option>100 Libre </option>
              <option>50 Mariposa </option>
              <option>50 Espalda</option>
              <option>50 Pecho</option>
              <option>50 Libre</option>
            </select>
          </div>
          <div class="input-field ">
            <input type="number" name="time" min="1">
            <label for="time">Tiempo empleado en prueba</label>
          </div>
          <div class="input-field ">
            <input type="number" name="position">
            <label for="position">Posición</label>
          </div>

          <div class="input-field ">
            <input type="number" name="points">
            <label for="points">Puntos</label>
          </div>
          <div class="form-group">
            <label for="state">Estado</label>
            <select class="form-control" name="state">
              <option>NA</option>
              <option>Descalificado </option>
              <option>Activo</option>
              <option>Finalizado</option>
            </select>
          </div>
          <div class="input-field">
            <button type="submit" name="btn-save" class="blue btn-small">Guardar</button>
          </div>
        </form>
      </div>
      <!-- tabla-->
      <div class="col-sm">
        <table class="display" id="table_id">
          <thead>
            <tr>
              <th>Id</th>
              <th>Cédula Nadador</th>
              <th>Fecha</th>
              <th>Competición</th>
              <th>Prueba</th>
              <th>Tiempo</th>
              <th>Posición</th>
              <th>Puntos</th>
              <th>Estado</th>
              <th>Editar</th>
            </tr>

          </thead>
          <tbody>
            <?php 

   include("../conexion/conexion.php");
   $sql="SELECT * FROM inscripcionporprueba";
     $execute=mysqli_query($conexion,$sql);
    while ($fila=mysqli_fetch_array($execute)) {
   
     ?>
            <tr>
              <td><?php echo $fila[0];?></td>
              <td><?php echo $fila[1];?></td>
              <td><?php echo $fila[2];?></td>
              <td><?php echo $fila[3];?></td>
              <td><?php echo $fila[4];?></td>
              <td><?php echo $fila[5];?></td>
              <td><?php echo $fila[6];?></td>
              <td><?php echo $fila[7];?></td>
              <td><?php echo $fila[8];?></td>

              <td><a href="index.php?id=<?php echo $fila[0] ?>" class="btn-small">Editar</a></td>
            </tr>
            <?php }?>
          </tbody>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Cédula Nadador</th>
              <th>Fecha</th>
              <th>Competición</th>
              <th>Prueba</th>
              <th>Tiempo</th>
              <th>Posición</th>
              <th>Puntos</th>
              <th>Estado</th>
              <th>Editar</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>


  <div class="col-sm" id="update-form">

    <h5 class="blue-text">EDITAR INFORMACIÓN</h5><br><br>
    <!-- formulario-->
    <form action="control.php" method="POST" accept-charset="utf-8" class="border p-3 form">
      <div class="input-field ">
        <input type="text" name="id" value="<?php
                      echo $id;
               ?>">
        <label for="id">Id</label>
      </div>
      <div class="input-field ">
        <input type="text" name="swimmer" value="<?php
                      echo $swimmer;
               ?>">
        <label for="swimmer">Cédula nadador</label>
      </div>

      <div class="input-field ">
        <input type="text" name="date" value="<?php
                      echo $date;
               ?>">
        <label for="date">Fecha</label>
      </div>
      <div class="input-field ">
        <input type="text" name="competition" value="<?php
                      echo $competition;
               ?>">
        <label for="competition">Competicion</label>
      </div>
      <div class="input-field ">
        <input type="text" name="test" value="<?php
                      echo $test;
               ?>">
        <label for="test">Prueba</label>
      </div>
      <div class="input-field ">
        <input type="text" name="time" value="<?php
                      echo $time;
               ?>">
        <label for="time">Tiempo empleado en prueba</label>
      </div>
      <div class="input-field ">
        <input type="text" name="position" value="<?php
                      echo $position;
               ?>">
        <label for="position">Posición</label>
      </div>

      <div class="input-field ">
        <input type="text" name="points" value="<?php
                      echo $points;
               ?>">
        <label for="points">Puntos</label>
      </div>
      <div class="input-field ">
        <input type="text" name="state" value="<?php
                      echo $state;
               ?>">
        <label for="state">Estado</label>
      </div>

      <div class="row">
        <div class="col-sm-1 col-xs-1 col-md-1 col-lg-1">
          <button type="submit" name="btn-update" class="blue btn-small">Actualizar</button>
        </div>
        <div class="col-sm-1 col-xs-1 col-md-1 col-lg-1">
          <button type="submit" name="btn-delete" class="red accent-darken-4 btn-small">Eliminar</button>
        </div>
        <div class="col-sm-1 col-xs-1 col-md-1 col-lg-1">
          <a type="submit" href="index.php" class="blue btn-small">Regresar</a>
        </div>
      </div>
      
    </form>
  </div>
</div>
</body>

</html>