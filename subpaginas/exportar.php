<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=mediciontable.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM mediciones";
	$result=mysqli_query($link, $query);
?>

<table border="1">
	<tr style="background-color:red;">
		<th>N°</th>
		<th>MEDICION</th>
		<th>VALOR</th>
		<th>FECHA Y HORA</th>
		<th>STATUS</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['medicion']; ?></td>
					<td><?php echo $row['valor']; ?></td>
					<td><?php echo $row['fecha_hora']; ?></td>
					<td>OK</td>
				</tr>	
			<?php
		}

	?>
</table>