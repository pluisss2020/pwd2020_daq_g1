<?php
//Hace conexión con conexión.php
include("add.php");
//Declara las variables nombre, apellido, correo
  $user= $_POST['user'];
  $password= $_POST['password'];
  $rol_id= $_POST['rol_id'];
//Inserta en la tabla "usuarios" el nombre, el apellido y el correo las variables declaradas anteriormente
  $query="INSERT INTO usuarios(user,password,rol_id) VALUES('$user','$password','$rol_id')";
//Abre conexión
  $resultado= $conexion->query($query);
//Si hay conexión los datos se llevarán hacía la tabla
  if($resultado){
    header("Location: ../usuarios.php");
  }
  //Si no hay conexión aparecerá lo siguiente
  else{
    echo "Insercion no exitosa";
  }

?>
