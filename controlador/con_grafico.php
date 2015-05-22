<?php
// Se establece la conexión a la base de datos


require('../modelo/mod_connex.php');

require("../modelo/mod_reporte.php");

 function gar(){
 	$conexion = new Connex();
	$mysqlconn= $conexion->conectar();


	$consulta= new reporte();

	$resultado= $consulta->garantia($mysqlconn);
if($resultado){

			 for($i=0; $i<mysqli_num_rows($resultado); $i++){
 $row= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 $a=$row["num"];
 $b=$row["gar_nombges"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);




		echo" $cons,";
			}
			}// if
                         }//end gar
	 function info(){
 	$conexion = new Connex();
	$mysqlconn= $conexion->conectar();
 	/*$equipo= new equipo();
	$registros=$equipo-> reporte($mysqlconn);	*/

	$consulta= new reporte();

	$resultado= $consulta->info($mysqlconn);
if($resultado){

			 for($i=0; $i<mysqli_num_rows($resultado); $i++){
 $row= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 $a=$row["num"];
 $b=$row["in_nomges"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);




		echo" $cons,";
			}
			}// if
                         }//end info

 function inf_n(){
 	$conexion = new Connex();
	$mysqlconn= $conexion->conectar();
 	/*$equipo= new equipo();
	$registros=$equipo-> reporte($mysqlconn);	*/

	$consulta= new reporte();

	$resultado= $consulta->info_n($mysqlconn);
if($resultado){

			 for($i=0; $i<mysqli_num_rows($resultado); $i++){
 $row= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 $a=$row["num"];
 $b=$row["in_niv1"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);




		echo" $cons,";
			}
			}// if
                         }//end inf_n

 function con(){
 	$conexion = new Connex();
	$mysqlconn= $conexion->conectar();


	$consulta= new reporte();

	$resultado= $consulta->con_ges($mysqlconn);
if($resultado){

			 for($i=0; $i<mysqli_num_rows($resultado); $i++){
 $row= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 $a=$row["num"];
 $b=$row["con_gestor"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);

		echo" $cons,";
			}
			}// if
                         }//end con
 function con_asu(){
 	$conexion = new Connex();
	$mysqlconn= $conexion->conectar();


	$consulta= new reporte();

	$resultado= $consulta->con_asu($mysqlconn);
if($resultado){

			 for($i=0; $i<mysqli_num_rows($resultado); $i++){
 $row= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 $a=$row["num"];
 $b=$row["con_asun"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);




		echo" $cons,";
			}
			}// if
                         }//end con_asu

 function con_estatus(){
 	$conexion = new Connex();
	$mysqlconn= $conexion->conectar();


	$consulta= new reporte();

	$resultado= $consulta->con_est($mysqlconn);
if($resultado){

			 for($i=0; $i<mysqli_num_rows($resultado); $i++){
 $row= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 $a=$row["num"];
 $b=$row["con_estatus"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);




		echo" $cons,";
			}
			}// if
                         }//end con
                         
//------------------------------------------------------------------
 function atletas(){
 	$conexion = new Connex();
	$pgconn= $conexion->conectar();

	$consulta= new reporte();

	$resultado= $consulta->atletas($pgconn);
if($resultado){

			 for($i=0; $i<pg_num_rows($resultado); $i++){
 $row= pg_fetch_array($resultado, $i, PGSQL_ASSOC);
 $a=$row["num"];
 $b=$row["atl_nom"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);




		echo" $cons,";
			}
			}// if
                         }//end con

//------------------------------------------------------------------
 function empleados(){
 	$conexion = new Connex();
	$pgconn= $conexion->conectar();

	$consulta= new reporte();

	$resultado= $consulta->empleados($pgconn);
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
 function voz_estatus(){
 	$conexion = new Connex();
	$mysqlconn= $conexion->conectar();


	$consulta= new reporte();

	$resultado= $consulta->voz_est($mysqlconn);
if($resultado){

			 for($i=0; $i<mysqli_num_rows($resultado); $i++){
 $row= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 $a=$row["num"];
 $b=$row["voz_estatus"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);




		echo" $cons,";
			}
			}// if
                         }//end con

function voz_canal(){
 	$conexion = new Connex();
	$mysqlconn= $conexion->conectar();


	$consulta= new reporte();

	$resultado= $consulta->voz_can($mysqlconn);
if($resultado){

			 for($i=0; $i<mysqli_num_rows($resultado); $i++){
 $row= mysqli_fetch_array($resultado, MYSQLI_ASSOC);
 $a=$row["num"];
 $b=$row["voz_canal"];

 $array[$i] = array( 'label'=>$b,'value' =>$a );

	$cons=json_encode($array[$i]);




		echo" $cons,";
			}
			}// if
                         }//end con

?>