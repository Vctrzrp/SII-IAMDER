<?php
require ("../sesion/con_session.php");
require ("../sesion/con_timezone.php");
$atl_ced= $_GET['atl_ced'];
require('../../modelo/mod_connex.php');
$conexion = new Connex();
$pgconn= $conexion->conectar();

require("../../modelo/mod_atleta.php");
$consulta= new atleta();
$mostrar=$consulta-> buscar ($atl_ced, $pgconn);
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Consultar empleado";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = $atl_ced;
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod,$seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
if(pg_num_rows($mostrar)<=0)
{
	$alerta = "No existe la siguiente cédula dentro del sistema: $atl_ced";
	header("Location: ../../vista/error.php?alerta=$alerta");
}
else
{
	header("Location: ../../vista/vis_atleta_consultado.php?atl_ced=$atl_ced");
}
?>