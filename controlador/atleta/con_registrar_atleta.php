<?php
require ("../sesion/con_timezone.php");
require ("../sesion/con_session.php");
//Requiero conexión con la BD
require('../../modelo/mod_connex.php');
	//Creo un nuevo objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn= $conexion->conectar();

//Se capturan los datos del formulario
$atl_ced= trim ($_POST ['cedula']);
$atl_nom= trim ($_POST ['nombre']);
$atl_ape= trim ($_POST  ['apellido']);
$atl_tel= trim ($_POST  ['telefono']);
$atl_sex= trim ($_POST ['sexo']);
$atl_nac= trim ($_POST ['fechanacimiento']);
$atl_dir= trim ($_POST  ['direccion']);
$atl_est= trim ($_POST  ['estatura']);
$atl_pes= trim ($_POST  ['peso']);
$atl_cam= trim ($_POST ['tallacamisa']);
$atl_pan= trim ($_POST ['tallapantalon']);
$atl_bec= trim ($_POST ['beca']);
$atl_fe = date('Y-m-d');
$dis_cod= trim ($_POST ['disciplina']);
$equ_cod= 1;
$rep_cod= 1;

//Requiero modelo atleta
require("../../modelo/mod_atleta.php");
	//Creo un nuevo objeto atleta
	$atleta= new atleta();

		//Instancio la función agregar
		$inserto=$atleta->agregar($atl_ced,$atl_nom,$atl_ape,$atl_tel,$atl_sex,$atl_nac,$atl_dir,$atl_est,$atl_pes,$atl_cam,$atl_pan,$atl_bec,$atl_fe,$dis_cod,$equ_cod,$rep_cod,$pgconn);
			if ($inserto==true)
			{//Abro if 1
//----------------------------------------------------------------
							//Requiero modelo seguimiento
							require("../../modelo/mod_seguimiento.php");
							//Creo un nuevo objeto seguimiento
							$seguimiento= new seguimiento();
							$seg_des = "Registrar atleta";
							$seg_fe = date ("Y-m-d");
							$seg_ho = date ("H:i:s");
							$emp_cod = $_SESSION ['emp_cod'];
							$seg_inf = $atl_ced;
							$seg_ip = $seg_ip = $_SERVER["REMOTE_ADDR"];
							$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
				$consulta= $atleta->mostrar($pgconn);
				if(pg_num_rows($consulta)>0)
				{//Abro if 2
					$row=pg_fetch_row($atleta);
					header("Location: ../../vista/vis_atleta_registrado.php");
				}//Cierro if 2
			}//Cierro if 1
			 else
				{//Abro else 1
					//Muestro alerta
					$alerta = "No se pudo completar el registro";
					header("Location: ../../vista/error.php?alerta=$alerta");
				}//Cierro else 1
?>