<?php
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$host="localhost";
$usuario="root";
$contraseña="";
$base="pwd_g1";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> 
		mysqli_connect_error());
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$resMediciones=$conexion->query("SELECT * FROM mediciones");


///TABLA DONDE SE DESPLIEGAN LOS REGISTROS //////////////////////////////
echo '<table>
			<thead>
				<tr class="active">
					<th>ID</th>
					<th>MEDICION</th>
					<th>VALOR</th>
					<th>FECHA y HORA</th>
					<th>ACCION</th>
				</tr>
			</thead>';
				while ($filaMediciones = $resMediciones->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$filaMediciones['id'].'</td>
						 <td>'.$filaMediciones['medicion'].'</td>
						 <td>'.$filaMediciones['valor'].'</td>
						 <td>'.$filaMediciones['fecha_hora'].'</td>
						 <td><a href="nuevovalor.php?id='.$filaMediciones['id'].'" class="waves-effect waves-light btn-small" target="_blank">NUEVO VALOR</a></td>
						 </tr>';
				}
				echo '</table>';
?>