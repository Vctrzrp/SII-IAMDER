<?php
//Recibo la cédula del atleta por método POST
$atl_ced= $_POST['atl_ced'];

//Requiero conexión con la BD
require('../modelo/mod_connex.php');
	//Creo un nuevo objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn= $conexion->conectar();

//Requiero el modelo atleta
require("../modelo/mod_atleta.php");
	//Creo un nuevo objeto atleta
	$consulta= new atleta();
	//Instancio la función buscar
	$listar=$consulta-> buscar ($atl_ced, $pgconn);

//Si el número de filas es <=0
if(pg_num_rows($listar)<=0)
{
	//Redirecciono al registro del atleta
	header("Location: ../vista/vis_formulario_atleta.php?atl_ced=$atl_ced");
}else
	{//Abro else 1
	//Muestro una alerta
	$alerta = "Ya existe un atleta con la siguiente cédula: $atl_ced";
	header("Location: ../vista/error.php?alerta=$alerta");
	}//Abro else 2
?>