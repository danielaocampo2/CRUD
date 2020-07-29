<?php

include("../conexion/conexion.php");
@$id_get = $_GET['id'];
$query = "SELECT * FROM nadador where id='$id_get'";
$execute = mysqli_query($conexion, $query);

while ($row = mysqli_fetch_array($execute)) {

    $id = $row[0];
    $name = $row[1];
    $lastname = $row[2];
    $college = $row[3];
    $sex = $row[4];
    $age = $row[5];
    $eps = $row[6];
}

?>
<!DOCTYPE html>
<html>

<head>
    <style>
        .btn-space {
       margin-right: 5px;}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YS CRUD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="../librerias/materialize/js/materialize.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../librerias/materialize/css/materialize.min.css" type="text/javascript">
    

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script type="text/javascript">
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#table_id tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
            });
            // DataTable
            var table = $('#table_id').DataTable({
                initComplete: function() {
                    // Apply the search
                    this.api().columns().every(function() {
                        var that = this;
                        $('input', this.footer()).on('keyup change clear', function() {
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
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)"
                }
            });
            id = ($("#idn").val());
            if (id > 0) {
                $("#create-form").hide();
            }
            if (id == "") {
                $("#update-form").hide();
            }
            
         

            
        });
    </script>
</head>

<body>

    <input type="hidden" name="" id="idn" value="<?php echo $id_get ?>">

    <div class="container">
        <div class="row">
            <div class="col-sm" id="create-form">
                <h5 class="blue-text">REGISTRO DE NADADORES</h5><br><br>
                <!-- formulario-->
                <form action="control.php" method="POST" accept-charset="utf-8">

                    <div class="input-field ">
                        <input type="number" min="1" name="id" required>
                        <label for="id">Cédula</label>
                    </div>

                    <div class="input-field ">
                        <input type="text" name="name" required>
                        <label for="name">Nombres</label>
                    </div>

                    <div class="input-field ">
                        <input type="text" name="lastname" required>
                        <label for="lastname">Apellidos</label>
                    </div>

                    <div class="input-field ">
                        <input type="text" name="college" required>
                        <label for="college">Universidad</label>
                    </div>
                    <div class="form-group">
                        <label for="sex">Sexo</label>
                        <select class="form-control" name="sex">
                            <option value="F" >Femenino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                    <div class="input-field ">
                        <input type="number" min="1" name="age" required>
                        <label for="age">Edad</label>
                    </div>

                    <div class="input-field ">
                        <input type="text" name="eps">
                        <label for="eps">EPS</label>
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
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Universidad</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Eps</th>
                            <th>Editar</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php

                        include("../conexion/conexion.php");
                        $sql = "SELECT * FROM nadador";
                        $execute = mysqli_query($conexion, $sql);
                        while ($fila = mysqli_fetch_array($execute)) {

                        ?>
                            <tr>
                                <td><?php echo $fila[0]; ?></td>
                                <td><?php echo $fila[1]; ?></td>
                                <td><?php echo $fila[2]; ?></td>
                                <td><?php echo $fila[3]; ?></td>
                                <td><?php echo $fila[4]; ?></td>
                                <td><?php echo $fila[5]; ?></td>
                                <td><?php echo $fila[6]; ?></td>
                                <td><a href="index.php?id=<?php echo $fila[0] ?>" class="btn-small">Editar</a></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Universidad</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Eps</th>
                            <th>Editar</th>
                        </tr>
                    </tfoot>
                </table>

            </div>

        </div>


        <div class="col-sm" id="update-form">
            <h5 class="blue-text">EDITAR INFORMACIÓN</h5><br><br>
            <!-- formulario-->
            <form action="control.php" method="POST" accept-charset="utf-8">



<div class="input-field ">
                        <input type="number" min="1" name="id" required  value="<?php
                                                        echo $id;
                                                        ?>">
                        <label for="id">Cédula</label>
                    </div>

                    <div class="input-field ">
                        <input type="text" name="name" required  value="<?php
                                                        echo $name;
                                                        ?>">
                        <label for="name">Nombres</label>
                    </div>

                    <div class="input-field ">
                        <input type="text" name="lastname" required  value="<?php
                                                        echo $lastname;
                                                        ?>">
                        <label for="lastname">Apellidos</label>
                    </div>

                    <div class="input-field ">
                        <input type="text" name="college" required  value="<?php
                                                        echo $college;
                                                        ?>">
                        <label for="college">Universidad</label>
                    </div>
                    <div class="form-group">
                        <label for="sex">Sexo</label>
                        <select class="form-control" name="sex">
                            <option value="F" <?php if($sex == 'F'){echo("selected");}?>>Femenino</option>
                            <option value="M" <?php if($sex == 'M'){echo("selected");}?>>Masculino</option>
                        </select>
                    </div>
                    <div class="input-field ">
                        <input type="number" min="1" name="age" required  value="<?php
                                                        echo $age;
                                                        ?>">
                        <label for="age">Edad</label>
                    </div>

                    <div class="input-field ">
                        <input type="text" name="eps"  value="<?php
                                                        echo $eps;
                                                        ?>">
                        <label for="eps">EPS</label>
                    </div>

             
                
      <div class="row">
        <div class="btn-space">
          <button type="submit" name="btn-update" class="blue btn-small">Actualizar</button>
        </div>
        <div class="btn-space">
          <button type="submit" name="btn-delete" class="red accent-darken-4 btn-small">Eliminar</button>
        </div>
        <div class="btn-space">
          <a type="submit" href="index.php" class="blue btn-small">Regresar</a>
        </div>
      </div>
            </form>
        </div>
    </div>
</body>

</html>