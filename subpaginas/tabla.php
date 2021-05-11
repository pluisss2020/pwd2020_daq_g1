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
	<title>EDIthor │ Usuarios</title>
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
 		
 			
            
			
			<br><h5 class="center-align">Tabla de usuarios</h5><br>
 			
 			<h6 class="center-align">Aca vas a poder ver todos los usuarios registrados con sus<br>respectivos permisos, ya sean administrativos o de usuario.<br>Recorda que los Administradores tienen el valor "1"<br>y los Usuarios poseen el valor "2"</h6><br>
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
                                    <td>USUARIO</td>
                                    <td>CONTRASEÑA</td>
                                    <td>ROL</td>
                                    <td>ACCIONES</td>
                                   <td><a href="usuarios.php" class="waves-effect waves-light btn-small">+</a></td>
                                </tr>
                            </thead>
                       
                        <?php
                            $query="SELECT * FROM usuarios";
                $resultado= $conexion->query($query);
                while($row=$resultado->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['user']?></td>
                            <td><?php echo $row['password']?></td>
                            <td><?php echo $row['rol_id']?></td>
                            <td><a href="modificar.php?id=<?php echo $row['id']; ?>" class="waves-effect waves-light btn-small">EDITAR</a></td>
                            <td><a href="eliminar.php?id=<?php echo $row['id']; ?>" class="waves-effect waves-light btn-small">ELIMINAR</a></td>
                        </tr>
                    <?php } ?>
                     </table>
                    </div>
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
	<script src="js/materialize.min.js" type="text/javascript"></script>
</body>
</html>
<script type="text/javascript">
   