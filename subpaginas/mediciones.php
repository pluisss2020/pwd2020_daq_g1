<?php
    session_start();
    $rut='../';
    $pagina='Mediciones';
    $action='mediciones.php';
    require_once($rut.'constant.php');
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
	<title>EDIthor │ Tiempo Real</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../css/materialize.min.css" media="screen,projection" rel="stylesheet" type="text/css">
	<link href="../css/style.css" media="screen,projection" rel="stylesheet" type="text/css">
	<script src="../js/jquery-3.4.1.min.js" type="text/javascript">
	</script>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="../css/main.css" media="screen,projection" rel="stylesheet" type="text/css"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<script src="../js/index.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
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
			 <!-- Aquí puedes escribir tu comentario <div id="Valores">
             </div>-->
 			</div>

<?php
                include("action/add.php");
               
        //COMIENZO DE LA TABLA
        ?>
             <div class="center-align">
                <div class="row">
                    <div class="col s12">
                        


        <script type="text/javascript">

        function tiempoReal()
        {
            var tabla = $.ajax({
                url:'tablaConsulta.php',
                dataType:'text',
                async:false
            }).responseText;

            document.getElementById("tablaConsulta").innerHTML = tabla;
        }
        setInterval(tiempoReal, 5000);

        </script>
                <section id="tablaConsulta">
                 </section>


                     <br><a href="exportar.php" class="waves-effect waves-light btn-small">DESCARGAR XLSX</a>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12 pb-4">
                        <h5 class="center-align">¿Que Medición desea Buscar?</h5><br>
                    </div>
                        
                    <div class="col-sm-12">
                        <form class="row" method="POST" action="<?= ACTI.$action; ?>">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Temperatura" id="chk_1" name="tipos[]">
                                    <label class="form-check-label" for="chk_1">
                                        Temperatura
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Humedad" id="chk_2" name="tipos[]">
                                    <label class="form-check-label" for="chk_2">
                                        Humedad
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Gases" id="chk_3" name="tipos[]">
                                    <label class="form-check-label" for="chk_3">
                                        Gases
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <br>
                                    <input type="hidden" name="valor" value="1">
                                    <button type="submit" name="filtrar" class="btn btn-success">Buscar <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                        
                    <div class="col-sm-12">
                        <form class="row" method="POST" action="<?= ACTI.$action; ?>">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-control-label">Fecha Inicio</label>
                                    <input type="date" name="f_ini">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-control-label">Fecha Fin</label>
                                    <input type="date" name="f_fin">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <br>
                                    <input type="hidden" name="valor" value="2">
                                    <button type="submit" name="filtrar" class="btn btn-success">Buscar <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (isset($_SESSION['resultado'])): ?>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-12 pb-4">
                          <h5 class="center-align">Resultado de Búsqueda</h5>
                          <br>
                          <a href="<?= ACTI.$action; ?>?clear=yes" class="btn btn-danger">Eliminar Búsqueda <i class="fa fa-trash"></i></a>
                        </div>
                            
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-hover">
                                <?= $_SESSION['resultado']; ?>
                            </table>
                        </div>
                    </div>
                <?php endif ?>
             </div>
 			
 		
 			 <!--<div id="Valores">
             </div> Próximamente-->
             <div id="reloj" style="display: none;"></div>
 		</section>
		
				 <footer>
            <div class="footer-container">
                <h2>Grupo N°1 - PWD</h2>
            </div>
        </footer>
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

<script type="text/javascript">
        function tiempoReal2()
        {
            var tabla = $.ajax({
                url:'mediciones.php',
                dataType:'text',
                async:false
            }).responseText;

            document.getElementById("miTabla").innerHTML = tabla;
        }
        setInterval(tiempoReal, 1000);
</script>


<script type="text/javascript">
    $(document).ready(function(){
       setInterval(function(){
        $('#Valores').load('value.php');
         },2000
        );
        $('#example1').DataTable({
          "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          },
          "lengthMenu": [ 10, 25, 50, 75, 100, 250, 500 ],
          "responsive": false,
          "autoWidth": true,
          "length": true,
          "select": true,
          dom: 'lBfrtip',
          buttons: {
            buttons: [
              'excel'
            ]
          }
        });
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

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

</body>
</html>