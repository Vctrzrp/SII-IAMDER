<?php
require ("../controlador/sesion/con_timezone.php");
require ("../modelo/mod_connex.php");
$conexion = new Connex();
$pgconn= $conexion->conectar();

//Inicio session_start
session_start();
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Cerrar sesión";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = $_SESSION ['emp_cod'];
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
	//Destruyo la sesión existente
	$destroy= session_destroy();
//Condiciono si se destruyó la sesión
if($destroy)
{
	//redirecciono a la página de inicio
	header("Location: inicio.php");
}
else
	{
		//Muestro alerta con el error
		$alerta = "No se destruyó la sesión";
		header("Location: ../vista/error.php?alerta=$alerta");
	}
?>
