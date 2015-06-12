<?php
require ("../sesion/con_session.php");
require ("../sesion/con_timezone.php");
//Conecto a la base de datos
	require('../../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn= $conexion->conectar();
//Capturo los datos del formulario
  $emp_ced= $_POST['cedula'];
  $emp_cla= $_POST['clave'];
  $conficlave= $_POST['conficlave'];
 //Requiero modelo empleado
require('../../modelo/mod_empleado.php');
		$registro = new empleado();
		//Comparo si las claves son correctas
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Actualizar clave";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = $emp_ced;
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
		if($emp_cla!=$conficlave)
		{//Abro if para comparar claves
		$alerta = "Las claves no coinciden";
		header("Location:../../vista/error.php?alerta=$alerta");
		}//Cierro if para comparar claves
		else
		{//Abro else de comparación de claves
		$inserto=$registro->actualizar($emp_log,$emp_cla, $pgconn);
			if ($inserto==true)
			{//Abro if de condición
			$alerta = "Inicie sesión con su nueva contraseña";
			header("Location:../../vista/success.php?alerta=$alerta");
			}//Cierro if de condición
			else
			{//Abro else de condición
			$alerta = "Sus datos no son correctos";
			header("Location:../../vista/error.php?alerta=$alerta");
				}//Cierro else de condición
		}//Cierro else de comparación de claves
?>