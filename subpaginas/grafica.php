<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: ../index.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: ../index.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<link href="../img/favicon.png" rel="icon" type="image/png">
	<title>EDIthor</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../css/materialize.min.css" media="screen,projection" rel="stylesheet" type="text/css">
	<link href="../css/style.css" media="screen,projection" rel="stylesheet" type="text/css">
	<script src="../js/jquery-3.4.1.min.js" type="text/javascript">
	</script>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="../css/main.css" media="screen,projection" rel="stylesheet" type="text/css"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<script src="../js/index.js" type="text/javascript"></script>
</head>
<body>
	<nav>
		<div class="nav-wrapper cyan darken-2">
			<a class="brand-logo" href="index.html"><img src="../img/logo.png" id="logo"></a>
			<ul class="right hide-on-med-and-down" id="nav-mobile">
				<li>
					<a href="../subpaginas/">Inicio</a>
				</li>
				<li>
					<a href="usuarios.php">Usuarios</a>
				</li>
                <li>
                    <a href="mediciones.php">Mediciones</a>
                </li>
                <li>
                    <a href="cerrarsesion.php">Salir</a>
                </li>
            </ul>

        </div>

    </nav>

    <div class="banner">
        <div class="banner-container">

        </div>
    </div>

    <section class="container">




     <br><h5 class="center-align">Graficas de mediciones</h5><br>

     <h6 class="center-align">Bienvenido/a al apartado de graficas, en esta seccion podras observar los datos de una forma mas comoda y sencilla a la vista, seguimos trabajando para<br>mejorar tu experiencia en nuestro proyecto, gracias por utilizar EDITHOR</h6><br>
     <?php
     include("action/add.php");

        //COMIENZO DE LA TABLA
     ?>
                        <div class="center-align">
                            <div class="row">
                                <div id="cargalineal"></div>
                            </div>
                            <div class="row">
                                <div id="cargabarra"></div>
                            </div>
                        </div>
                            <br>
 			 <!--<div id="Valores">
            </div> Próximamente-->
        </section>

        <footer>
            <div class="footer-container">
                <h2>Grupo N°1 - PWD</h2>
            </div>
        </footer>
        <script src="../js/materialize.min.js" type="text/javascript"></script>
        <script src="../js/plotly-latest.min.js" type="text/javascript"></script>
    </body>
    </html>
    <script type="text/javascript">
        $(document).ready(function(){
            $('cargalineal'.load('lineal.php');
            $('cargabarra'.load('barra.php');
        });
    </script>
