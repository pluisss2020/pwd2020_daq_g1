<?php
//Hace conexión con la base de datos
include("conexion.php");
//Declara las variables
  $id= $_REQUEST['id'];
  $medicion= $_POST['medicion'];
  $valor= $_POST['valor'];
  $fecha_hora= $_POST['fecha_hora'];
//Acá nos dice básicamente: reemplaza los datos de la tabla "usuarios" donde el dato "nombre" sea "$nombre"(la variable que creeamos arriba, osea, que se reemplazara por esta, lo mismo con los demás.)
  $query="UPDATE mediciones SET medicion='$medicion', valor='$valor', fecha_hora='$fecha_hora' WHERE id='$id'";
  $resultado= $conexion->query($query);
//Si tiene exito nos llevara a tabla.php donde estaran los datos modificados
  if($resultado){
    header("Location: mediciones.php");
  }
  //Sino nos dará el siguiente error
  else{
    echo "Insercion no exitosa";
  }

?>
