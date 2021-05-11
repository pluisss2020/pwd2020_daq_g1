<?php
$conn = new mysqli("localhost", "root", "", "pwd_g1");
if(!$conn){
	die("Fatal Error: No se pudo contectar a la base de datos!");
}
?>