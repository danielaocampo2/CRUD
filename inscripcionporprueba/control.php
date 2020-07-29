<!DOCTYPE html>
<html>
<head>
      <!-- Bootstrap CSS -->

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="stylesheet" href="../galeria/estilos.css">
      <style>
            .error {
                  background-color: #FF9185;
                  font-size: 20px;
                  padding: 10px;
                  text-align:center;

            }

            .correcto {
                  background-color:#AFEB9D;
                  font-size: 35px;
                  padding: 10px;
                  font-weight: bold;
                  text-align:center;

            }
            .mensaje{
                  color:#FFFFFF;
                  font-size: 35px;
                  padding: 10px;
                  font-weight: bold;
                  text-align:center;
            }
      </style>
</head>

<body>

<?php

/*Insertar registro */
if(isset($_POST['btn-save'])){
 
            $time=$_POST['time'];
            $position=$_POST['position'];
            $points=$_POST['points'];
            $field= array();

     if (strlen($time)>7) {
      array_push($field,"El tiempo no puede tener una longitud mayor a 7");
      }
      if (strlen($position)>2) {
            array_push($field,"La posición no admite una longitud mayor a 2");
            }
      if (strlen($points)>1) {
            array_push($field,"El máximo puntaje es 9");
            }
      if(count($field)>0){
            for($i=0; $i< count($field); $i++){
                  echo "<div class='error'>";
                  echo "<li>".$field[$i]."</div>";
            }
       }
       else{
         include("../conexion/conexion.php");
         $swimmer = $_POST['swimmer'];    
         $date=$_POST['date'];
         $competition=$_POST['competition'];
         $test=$_POST['test'];
         $time=$_POST['time'];
         $position=$_POST['position'];
         $points=$_POST['points'];
         $state=$_POST['state'];

         $sql="INSERT INTO inscripcionporprueba(nadador ,fecha,competicion,prueba,tiempo,posicion,puntos,estado) VALUES ('$swimmer','$date','$competition','$test','$time','$position','$points','$state')";
         $execute=mysqli_query($conexion,$sql);

         if($execute){
            echo "<div class='correcto'> ¡Registro exitoso!"; 
         }else{

            ?> <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
            <script type="text/javascript"> $(document).ready(function () { alert("Error en los datos ingresados"); }); </script><?php
            echo (" <div class='mensaje'> Valide las claves primarias");
            printf(" <div class='error'> Descripción del error: %s\n", mysqli_error($conexion) );
            mysqli_close($conexion);
           
          }

       }
       echo "</div>";
    }

/*Actualizar registro */
if(isset($_REQUEST['btn-update'])){
      include("../conexion/conexion.php");
         $id=$_POST['id'];
         $swimmer = $_POST['swimmer'];    
         $date=$_POST['date'];
         $competition=$_POST['competition'];
         $test=$_POST['test'];
         $time=$_POST['time'];
         $position=$_POST['position'];
         $points=$_POST['points'];
         $state=$_POST['state'];
         $sql="UPDATE inscripcionporprueba SET nadador='$swimmer',fecha='$date',competicion='$competition',prueba='$test',tiempo='$time',posicion='$position',puntos='$points',estado='$state' where id='$id'";
         $execute=mysqli_query($conexion,$sql);
         if($execute)
         {
            header("Location:index.php");
         }
}
/* Eliminar registro*/ 
if(isset($_REQUEST['btn-delete'])){
      include("../conexion/conexion.php");
      $id=$_POST['id'];
      $sql="DELETE FROM inscripcionporprueba where id='$id'";
      $execute=mysqli_query($conexion,$sql);
      if($execute)
         {
            header("Location:index.php");

         }

     }

?>
<div class="text-center pt-5" align="center">

      <a type="submit" name="btn-save" href="../nadadores/index.php" class="btn btn-primary"> Volver a
            nadadores</a> </br></br>
      <a type="submit" name="btn-save" href="../index.html" class="btn btn-primary"> Volver a página principal</a>
      </br> </br>
      <a type="submit" name="btn-save" href="index.php" class="btn btn-primary">Volver a inscripciones por
            prueba</a>


</div>

</body>

</html>