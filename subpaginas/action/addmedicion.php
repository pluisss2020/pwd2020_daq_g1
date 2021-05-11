<?php
//Hace conexión con conexión.php
include("add.php");
//Declara las variables nombre, apellido, correo
  $medicion= $_POST['medicion'];
  $valor= $_POST['valor'];
  $fecha_hora= $_POST['fecha_hora'];
//Inserta en la tabla "usuarios" el nombre, el apellido y el correo las variables declaradas anteriormente
  $query="INSERT INTO mediciones(medicion,valor,fecha_hora) VALUES('$medicion','$valor','$fecha_hora')";
//Abre conexión
  $resultado= $conexion->query($query);
//Si hay conexión los datos se llevarán hacía la tabla
  if($resultado){
    header("Location: ../index.php");
  }
  //Si no hay conexión aparecerá lo siguiente
  else{
    echo "Insercion no exitosa";
  }

?>
