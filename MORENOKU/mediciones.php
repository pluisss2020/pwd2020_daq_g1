<?php
	/**
	 * 
	 */
	class mediciones extends DataBase
	{
		private $table ='mediciones';
		private $tid ='id';
		
		function filtrar($c1,$valor,$tipos,$f_ini,$f_fin){
			$inf = null;$filas=0;$suma=0;$promedio=0;
			$inf.='<thead>';
				$inf.='<tr>';
					$inf.='<th>ID</th>';
					$inf.='<th>Medición</th>';
					$inf.='<th>Valor</th>';
					$inf.='<th>Fecha</th>';
				$inf.='</tr>';
			$inf.='</thead>';
			$inf.='<tbody>';
				if ($valor==1) {
					$sql = "SELECT * FROM ".$this->table." WHERE medicion IN (";
					foreach ($tipos as $key => $value) {
						$sql .= "'".$value."', ";
					}
					$sql = substr($sql, 0, -2).") ;";
				}else{
					$sql = "SELECT * FROM ".$this->table." WHERE (fecha_hora >= '".$f_ini."' AND fecha_hora <= '".$f_fin."') ;";
				}
				$res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
				if ($res) {
					$filas = $res->num_rows;
					if ($filas > 0) {
						while ($row = mysqli_fetch_array($res)) {
							$suma += $row['valor'];
							$inf.='<tr>';
								$inf.='<td>'.$row[$this->tid].'</td>';
								$inf.='<td>'.$row['medicion'].'</td>';
								$inf.='<td>'.$row['valor'].'</td>';
								$inf.='<td>'.$row['fecha_hora'].'</td>';
							$inf.='</tr>';
						}
						$promedio = ($suma / $filas);
						$row=null;
						mysqli_free_result($res);
					}else{
						$inf.='<tr><td colspan="4"><div class="alert alert-warning">No se encontraron coincidencias</div></td></tr>';
					}
				}else{
					$inf.='<tr><td colspan="4"><div class="alert alert-danger">Error: '.$_SESSION['Mysqli_Error'].'</div></td></tr>';
				}
			$inf.='</tbody>';
			$inf.='<tfoot>';
				$inf.='<tr>';
					$inf.='<td colspan="2" class="text-center">PROMEDIO</td>';
					$inf.='<td colspan="2" class="text-left">'.$promedio.'</td>';
				$inf.='</tr>';
			$inf.='</tfoot>';

			mysqli_close($c1);
			return $inf;
		}
	}