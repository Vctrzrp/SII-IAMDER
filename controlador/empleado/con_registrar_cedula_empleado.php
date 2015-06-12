<?php
require ("../sesion/con_timezone.php");
//Recibo la cédula del empleado por método POST
$emp_ced= $_POST['emp_ced'];

//Requiero conexión con la BD
require('../../modelo/mod_connex.php');
	//Creo un nuevo objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn= $conexion->conectar();

//Requiero el modelo empleado
require("../../modelo/mod_empleado.php");
	//Creo un nuevo objeto empleado
	$consulta= new empleado();
	//Instancio la función verificarCedula
	$verificar=$consulta-> verificarCedula ($emp_ced, $pgconn);

//Si el número de filas es <=0
if(pg_num_rows($verificar)<=0)
{
	//Redirecciono al registro del empleado
	header("Location: ../../vista/vis_formulario_empleado.php?emp_ced=$emp_ced");
}else
	{//Abro else 1
	//Muestro una alerta
	$alerta = "Ya existe un empleado con la siguiente cédula: $emp_ced";
	header("Location: ../../vista/error.php?alerta=$alerta");
	}//Abro else 2
?>