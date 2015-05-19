<?php
//Inicio session_start
session_start();
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
