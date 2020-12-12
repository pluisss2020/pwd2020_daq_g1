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
 		
 			
            
			
			<br><h5 class="center-align">Modificar</h5><br>
 			
 			<h6 class="center-align">Bienvenido a la sección de modificación, es muy sensilla de<br>utilizar, simplemente escribi los campos que<br>quieras cambiar y listo.<br>
 			<div class="center-align">
 			 <div class="row">
                <br><br>
        <?php
      //Declara variable ID
        $id=$_REQUEST['id'];
        //Hace conexión con la base de datos
        include("conexion.php");
        //Selecciona la ID de la tabla usuarios para modificar a partir de ella
        $query="SELECT * FROM usuarios WHERE id='$id'";
        $resultado= $conexion->query($query);
        $row=$resultado->fetch_assoc();
        ?>
        <form action="modificar_proceso.php?id=<?php echo $row['id']; ?>" method="POST">
        <div class="input-field col s12">

          <input class="validate" id="text" name="user" value="<?php echo $row['user']; ?>"> <label class="active" for="first_name">Usuario</label>
        </div>
        <div class="input-field col s12">
          <input class="validate" id="text" name="password" value="<?php echo $row['password']; ?>"> <label class="active" for="first_name">Contraseña</label>
        </div>
        <div class="input-field col s12">
          <input class="validate" id="text" name="rol_id" value="<?php echo $row['rol_id']; ?>"> <label class="active" for="first_name">Rango</label>
        </div>
        <input type="submit" value="MODIFICAR" class="waves-effect waves-light btn nicebtn objpadding cyan darken-1"/>
         
        </form>


    </div>

 		</div>
 			 <!--<div id="Valores">
             </div> Próximamente-->
 		</section>
		
				 <footer>
            <div class="footer-container">
                <h2>Grupo N°1 - PWD</h2>
            </div>
        </footer>
	<script src="js/materialize.min.js" type="text/javascript"></script>
</body>
</html>
<script type="text/javascript">
     $(document).ready(function(){
       setInterval(function(){
        $('#Valores').load('value.php');
     },2000
    );                              
});
     
     function tiempo(){
         time = new Date();
         hora = time.getHours();
         minutos = time.getMinutes();
         segundos = time.getSeconds();
         
         comprobarHora = new String(hora);
         if(comprobarHora.length == 1){
             hora = "0" + comprobarHora;
         }
         comprobarMin = new String(minutos);
         if(comprobarMin.length == 1){
             minutos = "0" + minutos;
         }
         comprobarSeg = new String(segundos);
         if(comprobarSeg.length == 1){
             segundos = "0" + segundos;
         }
         mostrarHora = hora + ":" + minutos + ":" + segundos;
         return mostrarHora;
     }
     function ActualizarTime(){
         horaActual = "Hora actual: " + tiempo();
         miReloj = document.getElementById("reloj");
         miReloj.innerHTML = horaActual;
     }
     setInterval(ActualizarTime, 1000);
</script>