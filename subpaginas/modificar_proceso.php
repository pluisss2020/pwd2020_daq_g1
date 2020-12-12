<?php
//Hace conexión con la base de datos
include("conexion.php");
//Declara las variables
  $id= $_REQUEST['id'];
  $user= $_POST['user'];
  $password= $_POST['password'];
  $rol_id= $_POST['rol_id'];
//Acá nos dice básicamente: reemplaza los datos de la tabla "usuarios" donde el dato "nombre" sea "$nombre"(la variable que creeamos arriba, osea, que se reemplazara por esta, lo mismo con los demás.)
  $query="UPDATE usuarios SET user='$user', password='$password', rol_id='$rol_id' WHERE id='$id'";
  $resultado= $conexion->query($query);
//Si tiene exito nos llevara a tabla.php donde estaran los datos modificados
  if($resultado){
    header("Location: tabla.php");
  }
  //Sino nos dará el siguiente error
  else{
    echo "Insercion no exitosa";
  }

?>
