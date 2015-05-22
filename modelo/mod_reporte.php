<?php
class reporte {
	private $pgconn;

		//function atletas
		public function atletas($pgconn){

		$query= "SELECT atl_nom, COUNT( * ) AS num FROM atleta GROUP BY atl_nom";
		$consulta= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error($pgconn));
		return $consulta;
		}//function con_est

		//Función empleados
		public function empleados($pgconn){

		$query= "SELECT empleado.tipemp_cod, COUNT( * )  AS num, tipo_empleado.tipemp_des FROM empleado, tipo_empleado WHERE empleado.tipemp_cod = tipo_empleado.tipemp_cod GROUP BY empleado.tipemp_cod, tipo_empleado.tipemp_des";
		$consulta= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error($pgconn));

		return $consulta;

		}//function con_est


}//class reporte
?>