<?php
//Abro conexión a la base de datos
require("../modelo/mod_connex.php");
$conexion= new connex();
$pgconn= $conexion->conectar();
//Se capturan los datos del formulario
$equ_des	= ($_POST ['nombre']);
$equ_repced = trim ($_POST ['cedula']);
$equ_repnom = trim ($_POST  ['nombrerep']);
$equ_vic	=0;
$equ_der	=0;
$equ_emp	=0;
$equ_jue	=0;
$dis_cod	= trim ($_POST ['disciplina']);
//Requiero el módelo del equipo
require("../modelo/mod_equipo.php");
$equipo= new equipo();
//Inserto nuevo equipo
	$inserto=$equipo->agregar($equ_des,$equ_repced,$equ_repnom,$equ_vic,$equ_der,$equ_emp,$equ_jue,$dis_cod,$pgconn);
			if ($inserto==true){
				//Ejecuto función mostrar del modelo equipo
				$consulta= $equipo->mostrar($pgconn);
				if(pg_num_rows($consulta)>0)
					{
					$row=pg_fetch_row($equipo);
					//Redirecciono a mostrar el equipo registrado si es realizado.
					header("Location: ../vista/vis_equiporegistrado.php");
					}
				}else
					{
					//Si no inserto muestro mensaje.
					header("Location: ../vista/errordatos.php");
					}
?>