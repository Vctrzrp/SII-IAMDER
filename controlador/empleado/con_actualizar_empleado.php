<?php
require ("../sesion/con_timezone.php");
require('../sesion/con_session.php');
//Requiero conexión con la BD
require('../../modelo/mod_connex.php');
	//Creo un nuevo objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn= $conexion->conectar();

$emp_ced= trim ($_POST ['cedula']);
$emp_cor= trim ($_POST  ['correo']);
$emp_tel= trim ($_POST  ['telefono']);
$tipemp_cod= trim ($_POST ['tipoempleado']);
$est_cod= trim ($_POST ['estatus']);
$dis_cod=1;

//Requiero modelo empleado
require("../../modelo/mod_empleado.php");
	//Creo un nuevo objeto empleado
	$empleado= new empleado();
		//Instancio la función modificar
		$inserto=$empleado->modificar($emp_ced, $emp_cor, $emp_tel, $tipemp_cod, $est_cod, $dis_cod, $pgconn);
		if ($inserto==true)
			{//Abro if 2
//----------------------------------------------------------------
				//Requiero modelo seguimiento
				require("../../modelo/mod_seguimiento.php");
				//Creo un nuevo objeto seguimiento
				$seguimiento= new seguimiento();
				$seg_des = "Actualizar empleado";
				$seg_fe = date ("Y-m-d");
				$seg_ho = date ("H:i:s");
				$emp_cod = $_SESSION ['emp_cod'];
				$seg_inf = $emp_ced;
				$seg_ip = $_SERVER["REMOTE_ADDR"];
				$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
			$consulta= $empleado->mostrar($pgconn);
			//Cuento el número de filas
			if(pg_num_rows($consulta)>0)
				{//Abro if 3
				//Capturo todo los datos de la fila
				$row=pg_fetch_row($empleado);
				header("Location: ../../vista/vis_empleado_actualizado.php?emp_ced=$emp_ced");
				}//Cierro if 3
			}//Cierro if 2
			 else
				{//Abro else 1
					//Muestro alerta
					$alerta = "No se pudo completar la actualización";
					header("Location: ../../vista/error.php?alerta=$alerta");
				}//Cierro else 1
?>