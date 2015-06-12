<?php
require ("../controlador/sesion/con_timezone.php");
// Se establece la conexión a la base de datos
require('../modelo/mod_connex.php');
require("../modelo/mod_reporte.php");
//------------------------------------------------------------------
//                         GRÁFICO ATLETAS                         
//------------------------------------------------------------------
 function atletas_sexo(){
 	$conexion = new Connex();
	$pgconn= $conexion->conectar();
	$consulta= new reporte();
	$resultado= $consulta->atletas_sexo($pgconn);
		//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Generar gráfico de atletas por sexo";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = $_SESSION['emp_ced'];
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
		//----------------------------------------------------------------
if($resultado){
 for($i=0; $i<pg_num_rows($resultado); $i++){
 $row= pg_fetch_array($resultado, $i, PGSQL_ASSOC);
 $a=$row["num"];
 $b=$row["atl_sex"];
 $array[$i] = array( 'label'=>$b,'value' =>$a );
	$cons=json_encode($array[$i]);
		echo" $cons,";
			}
			}// if
                         }//end con
 function atletas_disciplina(){
 	$conexion = new Connex();
	$pgconn= $conexion->conectar();
	$consulta= new reporte();
	$resultado= $consulta->atletas_disciplina($pgconn);
if($resultado){
 for($i=0; $i<pg_num_rows($resultado); $i++){
 $row= pg_fetch_array($resultado, $i, PGSQL_ASSOC);
 $a=$row["num"];
 $b=$row["dis_des"];
 $array[$i] = array( 'label'=>$b,'value' =>$a );
	$cons=json_encode($array[$i]);
		echo" $cons,";
			}
			}// if
                         }//end con


//------------------------------------------------------------------
//                         GRÁFICO EMPLEADOS                         
//------------------------------------------------------------------
 function empleados_perfil(){
 	$conexion = new Connex();
	$pgconn= $conexion->conectar();

	$consulta= new reporte();
	$resultado= $consulta->empleados($pgconn);
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Generar gráfico de empleados por perfil";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = $_SESSION['emp_ced'];
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
if($resultado){
 for($i=0; $i<pg_num_rows($resultado); $i++){
 $row= pg_fetch_array($resultado, $i, PGSQL_ASSOC);
 $a=$row["num"];
 $b=$row["tipemp_des"];
 $array[$i] = array( 'label'=>$b,'value' =>$a );
	$cons=json_encode($array[$i]);
		echo" $cons,";
			}
			}// if
    }//end con

//------------------------------------------------------------------
?>