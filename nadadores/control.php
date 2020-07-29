<!DOCTYPE html>
<html>

<head>
      <!-- Bootstrap CSS -->

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="stylesheet" href="../galeria/estilos.css">
      <style>
            .error {
                  background-color: #FF9185;
                  font-size: 20px;
                  padding: 10px;
                  text-align: center;

            }

            .correcto {
                  background-color: #AFEB9D;
                  font-size: 35px;
                  padding: 10px;
                  font-weight: bold;
                  text-align: center;

            }

            .mensaje {
                  color: #FFFFFF;
                  font-size: 35px;
                  padding: 10px;
                  font-weight: bold;
                  text-align: center;
            }
      </style>
</head>

<body>


      <?php

/* Inserta registro */

if(isset($_POST['btn-save'])){
      $id=$_POST['id']; 
      $name=$_POST['name'];
      $lastname=$_POST['lastname'];
      $college=$_POST['college'];
      $eps=$_POST['eps'];
      $age=$_POST['age'];
      $field= array();

if (strlen($id)>10) {
      array_push($field,"El campo cédula no puede tener una longitud mayor a 10");
}
if (strlen($name)>50 || strlen($lastname)>50 || strlen($college)>50) {
array_push($field,"El nombre, apellido y universidad puede tener una longitud mayor a 50");
}
if (strlen($age)>2 ) {
      array_push($field,"No acepta nadadores de mas de 99 años ");
      }
if ($age<13 ) {
            array_push($field,"No se aceptan nadadores menores de 13 años");
            }
if(count($field)>0){
      for($i=0; $i< count($field); $i++){
            echo "<div class='error'>";
            echo "<li>".$field[$i]."</div>";
      }
 }
 else{
            include("../conexion/conexion.php");
            $id = $_POST['id'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $college = $_POST['college'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $eps = $_POST['eps'];

            $sql = "INSERT INTO nadador(id,nombres,apellidos,universidad,sexo,edad,eps) VALUES ('$id','$name','$lastname','$college','$sex','$age','$eps')";
            $execute = mysqli_query($conexion, $sql);

            if ($execute) {
                  echo "<div class='correcto'> ¡Registro exitoso!"; 
            }
            else{

                  ?> <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
                  <script type="text/javascript"> $(document).ready(function () { alert("Error en los datos ingresados"); }); </script><?php
                  echo (" <div class='mensaje'> Valide las claves primarias");
                  printf(" <div class='error'> Descripción del error: %s\n", mysqli_error($conexion) );
                  mysqli_close($conexion);
                 
                }

      }
      echo "</div>";
}


/*Actualiza registro */
      if (isset($_REQUEST['btn-update'])) {
            include("../conexion/conexion.php");
            $id = $_POST['id'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $college = $_POST['college'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $eps = $_POST['eps'];

     $field= array();

if (strlen($id)>10) {
      array_push($field,"El campo cédula no puede tener una longitud mayor a 10");
}
if (strlen($name)>50 || strlen($lastname)>50 || strlen($college)>50) {
array_push($field,"El nombre, apellido y universidad puede tener una longitud mayor a 50");
}
if (strlen($age)>2 ) {
      array_push($field,"No acepta nadadores de mas de 99 años ");
      }
if ($age<13 ) {
            array_push($field,"No se aceptan nadadores menores de 13 años");
            }
if(count($field)>0){
      for($i=0; $i< count($field); $i++){
            echo "<div class='error'>";
            echo "<li>".$field[$i]."</div>";
      }
 }else{

            $sql = "UPDATE nadador SET nombres='$name',apellidos='$lastname',universidad='$college',sexo='$sex',edad='$age',eps='$eps' where id='$id'";
            $execute = mysqli_query($conexion, $sql);

            if ($execute) {
                  echo "<div class='correcto'> ¡Los datos fueron actualizados exitosamente!"; 
            }
            else{

                  ?> <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
                  <script type="text/javascript"> $(document).ready(function () { alert("Error en los datos ingresados"); }); </script><?php
                  echo (" <div class='mensaje'> Valide las claves primarias");
                  printf(" <div class='error'> Descripción del error: %s\n", mysqli_error($conexion) );
                  mysqli_close($conexion);
                 
                }
            
      }
      }
/*Elimina registro */
      if (isset($_REQUEST['btn-delete'])) {
            include("../conexion/conexion.php");
            $id = $_POST['id'];
            $sql = "DELETE FROM nadador where id='$id'";
            $execute = mysqli_query($conexion, $sql);

            if ($execute) {
                  header("Location:index.php");
            }
      }

      ?>
      <div class="text-center pt-5" align="center">
            <a type="submit" name="btn-save" href="../nadadores/index.php" class="btn btn-primary"> Volver a nadadores</a>  </br></br>
            <a type="submit" name="btn-save" href="../index.html" class="btn btn-primary"> Volver a página principal</a></br></br>
            <a type="submit" name="btn-save" href="index.php" class="btn btn-primary">Volver a inscripciones por prueba</a>
      </div>

</body>

</html>