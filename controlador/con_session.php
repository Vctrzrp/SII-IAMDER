<?php
//Creo una sesión
session_start();
//Limito un tiempo de ianctivo
$inactivo =21600;
//Almaceno los datos para la sesión
$_SESSION['emp_ced'];
$_SESSION['tipemp_cod'];
$_SESSION['emp_cla'];
//Verifico si no existe sesión
//para redireccionar al inicio
if(!isset($_SESSION['emp_ced'])){
	header('Location: inicio.php');
	 }
//Si no, actualizo el tiempo cada vez que
//haga interacción en el sistema
	 else{
		}
if(isset($_SESSION['time']))
{
	$vida_session=time() - $_SESSION['time'];
		if($vida_session > $inactivo)
			{
//Al cerrar sesión la destruyo
			session_destroy();
				header('Location: inicio.php');}

}
//Tiempo que destruyo la sesión
$_SESSION['time'] = time ();
?>