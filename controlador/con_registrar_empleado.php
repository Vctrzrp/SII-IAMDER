<?php
//Requiero conexión con la BD
require('../modelo/mod_connex.php');
	//Creo un nuevo objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn= $conexion->conectar();

//Se capturan los datos del formulario
$emp_ced= trim ($_POST ['cedula']);
$emp_nom= trim ($_POST ['nombre']);
$emp_ape= trim ($_POST  ['apellido']);
$emp_cor= trim ($_POST  ['correo']);
$emp_tel= trim ($_POST  ['telefono']);
$emp_cla= trim ($_POST  ['clave']);
$emp_conficlave= trim ($_POST  ['conficlave']);
$emp_fe= trim ($_POST  ['fechacreacion']);
$tipemp_cod= trim ($_POST  ['tipoempleado']);
$est_cod=1; //Defino un estatus activo para el empleado
$dis_cod=1;

//Requiero modelo empleado
require("../modelo/mod_empleado.php");
	//Creo un nuevo objeto empleado
	$empleado= new empleado();

	//se valida la clave
	if($emp_cla!=$emp_conficlave)
		{//Abro if 1
			$alerta = "Las contraseñas no coinciden";
			header("Location:../vista/error.php?alerta=$alerta");
		}//Cierro if 1
	else
		{//Abro else 1

		//Instancio la función agregar
		$inserto=$empleado->agregar($emp_ced,$emp_nom,$emp_ape,$emp_cor,$emp_tel,$emp_cla,$emp_fe,$tipemp_cod,$est_cod,$dis_cod,$pgconn);
		if ($inserto==true)
			{//Abro if 2
			$consulta= $empleado->mostrar($pgconn);
			//Cuento el número de filas
			if(pg_num_rows($consulta)>0)
				{//Abro if 3
				//Capturo todo los datos de la fila
				$row=pg_fetch_row($empleado);
				header("Location: ../vista/vis_empleado_registrado.php");
				}//Cierro if 3
			}//Cierro if 2
			 else
				{//Abro else 2
					//Muestro alerta
					$alerta = "No se pudo completar el registro";
					header("Location: ../vista/error.php?alerta=$alerta");
				}//Cierro else 2
		}//Cierro else 1
?>