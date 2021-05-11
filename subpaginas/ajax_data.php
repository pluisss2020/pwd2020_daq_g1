<?php
$date1 = date("Y-m-d", strtotime($_POST['date1']));
$date2 = date("Y-m-d", strtotime($_POST['date2']));

if (!empty($_POST['date1']) and  !empty($_POST['date1'])){
	list($dia,$mes,$anio)=explode("/",$_POST['date1']);
	$date1="$anio-$mes-$dia";
	list($dia,$mes,$anio)=explode("/",$_POST['date2']);
	$date2="$anio-$mes-$dia";
	
	$sWhere="WHERE `fecha_hora` BETWEEN '$date1' AND '$date2'";
	
} else {
	$sWhere="";	
}

#Conectare a la base de datos
include("conexion.php");
	
$q_medi = $conn->query("SELECT * FROM `mediciones` $sWhere ORDER BY `id` ASC") or die(mysqli_error());
$v_medi = $q_medi->num_rows;
if($v_medi > 0){
	while($f_medi = $q_medi->fetch_array()){
	?>
	<tr>
		<td><?php echo $f_medi['id']?></td>
		<td><?php echo $f_medi['medicion']?></td>
		<td><?php echo $f_medi['valor']?></td>
		<td><?php echo date("d/m/Y", strtotime($f_medi['fecha_hora']))?></td>
	</tr>
	<?php
	}
}else{
		echo '
		<tr>
			<td colspan = "4" class="text-center">No se encontraron registros</td>
		</tr>
		';
}
	?>