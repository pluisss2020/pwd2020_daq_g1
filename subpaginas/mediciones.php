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
					<a href="index.php">Inicio</a>
				</li>
				<li>
					<a href="usuarios.php">Usuarios</a>
				</li>
                <li>
                    <a href="#">Mediciones</a>
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
 			<br><h5 class="center-align">Mediciones</h5><br>
 			
            <h6 class="center-align">En esta seccion obtendremos los datos de las mediciones en tiempo real.<br>Podremos visualizarlas y descargarlas en formato XLSX</h6><br>
              
        <br><h5 class="center-align">Tiempo real</h5><br>
			<div class="center-align">
			 <div id="Valores">
             </div>
 			</div><br>

<?php
                include("action/add.php");
               
        //COMIENZO DE LA TABLA
        ?>
             <div class="center-align">
                <div class="row">
                    <div class="col s12">
                        <table>
                            <thead>
                                <tr>
                                    <td>N°</td>
                                    <td>MEDICION</td>
                                    <td>VALOR</td>
                                    <td>FECHA Y HORA</td>
                                    <td>STATUS</td>
                                </tr>
                            </thead>
                       
                        <?php
                            $query="SELECT * FROM mediciones";
                $resultado= $conexion->query($query);
                while($row=$resultado->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['medicion']?></td>
                            <td><?php echo $row['valor']?></td>
                            <td><?php echo $row['fecha_hora']?></td>
                            <td>Ok</td>
                        </tr>
                    <?php } ?>
                     </table>
                     <br><a href="exportar.php" class="waves-effect waves-light btn-small">DESCARGAR XLSX</a>
                    </div>
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