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
	<link href="../css/styles.css" media="screen,projection" rel="stylesheet" type="text/css"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<script src="../js/index.js" type="text/javascript"></script>
</head>
<body>
	<nav>
		<div class="nav-wrapper cyan darken-2">
			<a class="brand-logo" href="index.html"><img src="../img/logo.png" id="logo"></a>
			<ul class="right hide-on-med-and-down" id="nav-mobile">
				<li>
					<a href="#">Inicio</a>
				</li>
				<li>
					<a href="usuarios.php">Usuarios</a>
				</li>
			</ul>
		</div>
	</nav>

		<div class="banner">
				<div class="banner-container">
        			
                </div>
 		</div>
 		
 		<section class="container">
 			<h5 class="center-align">¿Que es EDITHOR?</h5><br>
 			
             <h6 class="center-align">EDITHOR Es un sitio web desarrollado en php, css, js <br>por el grupo numero 1 de la materia PWD, en este sitio web<br>queremos que todo sea comodo para la vista del usuario.</h6>
			
			<br><h5 class="center-align">¿Que funciones va a cumplir?</h5><br>
 			
 			<h6 class="center-align">EDITHOR va a cumplir todos los puntos pautados de la materia.<br>La idea del sitio web es que nunca pierda el estilo y siempre sea<br>comodo a la vista del usuario y no sea molesto de utilizar.</h6>
 			
 			<br><h5 class="center-align">Informacion</h5><br>

 			<h6 class="center-align">11/12/20 Por el momento realizamos la interfaz de la pagina.<br>Tenemos planeado terminar esta pagina de una forma rapida<br>creemos que nos tomara 2 dias para completar todo lo restante.</h6><br>
 		
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