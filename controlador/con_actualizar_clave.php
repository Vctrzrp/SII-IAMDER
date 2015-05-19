<?php
//Conecto a la base de datos
	require('../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn= $conexion->conectar();
//Capturo los datos del formulario
  $emp_log= $_POST['login'];
  $emp_cla= $_POST['clave'];
  $conficlave= $_POST['conficlave'];
 //Requiero modelo empleado
require('../modelo/mod_empleado.php');
		$registro = new empleado();
		//Comparo si las claves son correctas
		if($emp_cla!=$conficlave)
		{//Abro if para comparar claves
		$alerta = "Las claves no coinciden";
		header("Location:../vista/error.php?alerta=$alerta");
		}//Cierro if para comparar claves
		else
		{//Abro else de comparación de claves
		$inserto=$registro->actualizar($emp_log,$emp_cla, $pgconn);
			if ($inserto==true)
			{//Abro if de condición
			$alerta = "Inicie sesión con su nueva contraseña";
			header("Location:../vista/success.php?alerta=$alerta");
			}//Cierro if de condición
			else
			{//Abro else de condición
			$alerta = "Sus datos no son correctos";
			header("Location:../vista/error.php?alerta=$alerta");
				}//Cierro else de condición
		}//Cierro else de comparación de claves
?>