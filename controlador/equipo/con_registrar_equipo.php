<?php
require ("../sesion/con_timezone.php");
require ("../sesion/con_session.php");

//Abro conexión a la base de datos
require("../../modelo/mod_connex.php");
$conexion= new connex();
$pgconn= $conexion->conectar();
//Se capturan los datos del formulario
$equ_des	= ($_POST ['nombre']);
$equ_repced = trim ($_POST ['cedula']);
$equ_repnom = trim ($_POST  ['nombrerep']);
$equ_can = trim ($_POST['cantidad']);
$equ_cor = trim ($_POST['correo']);
$equ_tel = trim ($_POST ['telefono']);
$equ_vic	=0;
$equ_der	=0;
$equ_emp	=0;
$equ_jue	=0;
$dis_cod	= trim ($_POST ['disciplina']);
//Requiero el módelo del equipo
require("../../modelo/mod_equipo.php");
$equipo= new equipo();
//Inserto nuevo equipo
	$inserto=$equipo->agregar($equ_des,$equ_repced,$equ_repnom,$equ_can, $equ_cor, $equ_tel,$equ_vic,$equ_der,$equ_emp,$equ_jue,$dis_cod,$pgconn);
			if ($inserto==true){
				//Ejecuto función mostrar del modelo equipo
//----------------------------------------------------------------
				//Requiero modelo seguimiento
				require("../../modelo/mod_seguimiento.php");
				//Creo un nuevo objeto seguimiento
				$seguimiento= new seguimiento();
				$seg_des = "Registrar equipo";
				$seg_fe = date ("Y-m-d");
				$seg_ho = date ("H:i:s");
				$emp_cod = $_SESSION ['emp_cod'];
				$seg_inf = $equ_des;
				$seg_ip = $_SERVER["REMOTE_ADDR"];
				$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
				$consulta= $equipo->mostrar($pgconn);
				if(pg_num_rows($consulta)>0)
					{
					$row=pg_fetch_row($equipo);
					//Redirecciono a mostrar el equipo registrado si es realizado.
					header("Location: ../../vista/vis_equipo_registrado.php");
					}
				}else
					{
					$alerta = "No se pudo completar el registro";
					header("Location: ../../vista/error.php?alerta=$alerta");
					}
?>