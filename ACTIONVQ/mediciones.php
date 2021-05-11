<?php
	$ru0='../';
	$dbs='DataBase';
	$cl1='mediciones';
	$di1=$cl1.'.php';

	if (isset($_POST['filtrar'])) {
		session_start();
		require_once($ru0.'constant.php');
		if (isset($_SESSION['rol'])) {
			require_once($ru0.DIRMOR.$dbs.'.php');
			require_once($ru0.DIRMOR.$cl1.'.php');
			$_dbs = new $dbs();
			$_cl1 = new $cl1();

			$valor=$_POST['valor'];
			$tipos=(isset($_POST['tipos']) ? $_POST['tipos'] : 0);
			$f_ini=(isset($_POST['f_ini']) ? $_POST['f_ini'] : NULL);
			$f_fin=(isset($_POST['f_fin']) ? $_POST['f_fin'] : NULL);

			if ($valor == 1) {
				$_SESSION['resultado'] = $_cl1->filtrar($_dbs->connect(),$valor,$tipos,null,null);
			}else{
				$_SESSION['resultado'] = $_cl1->filtrar($_dbs->connect(),$valor,null,$f_ini,$f_fin);
			}

			///*
				if (is_array($tipos)) {
					foreach ($tipos as $key => $value) {
						echo $key.' - '.$value;
						echo '<br>';
					}
				}
				echo $f_ini;
				echo '<br>';
				echo $f_fin;
				echo '<br>';
			//*/
			header("Location: ".HOME.$di1);
			exit();
		}else{
			echo '403 PERMISO DENEGADO';
		}
	}
	if (isset($_REQUEST['clear'])) {
		session_start();
		require_once($ru0.'constant.php');
		if (isset($_SESSION['rol'])) {

			unset($_SESSION['resultado']);

			header("Location: ".HOME.$di1);
			exit();
		}else{
			echo '403 PERMISO DENEGADO';
		}
	}