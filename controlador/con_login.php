<?php
//Capturo los datos por el método post
	$emp_ced = $_POST['cedula'];
	$emp_cla = md5($_POST['clave']);
//Asigno la sesión
   $_SESSION['emp_ced']	= $emp_ced;
   $_SESSION['emp_cla']	= $emp_cla;
//Abro la conexión
	require('../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn= $conexion->conectar();
//Autentico el empleado
		require('../modelo/mod_empleado.php');
		$instanciar = new empleado();
		$columna = $instanciar->autenticar($emp_ced,$emp_cla, $pgconn);
//Verifico los datos de la sesión con la base ded atos
	if(pg_num_rows($columna)>0){
		session_start();
		$row = pg_fetch_array($columna,0, PGSQL_ASSOC);
		$_SESSION["emp_ced"]=$row["emp_ced"];
		$_SESSION["tipemp_cod"]=$row["tipemp_cod"];
		$_SESSION["emp_cla"]=$row["emp_cla"];
		$_SESSION["emp_nom"]=$row["emp_nom"];
		$_SESSION["emp_ape"]=$row["emp_ape"];
		$_SESSION["emp_cod"]=$row["emp_cod"];
//Redirecciono si es correcto el usario
		header("Location:../vista/inicio2.php");
}
//Si no es correcto muestro una alerta de error de datos
//Y redirecciono al la página de inicio
	else{
		$alerta = "Sus datos no son correctos";
		header("Location:../vista/error.php?alerta=$alerta");
		;
	}
?>