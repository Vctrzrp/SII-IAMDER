<?php
class reporte {
	private $pgconn;

		//function atletas por sexo
		public function atletas_sexo($pgconn){
		$query= "SELECT atl_sex, COUNT( * )  AS num FROM atleta WHERE atl_sex = atl_sex GROUP BY atl_sex";
		$consulta= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error($pgconn));
		return $consulta;
		}//function atletas por sexo

		//function atletas por disciplina
		public function atletas_disciplina($pgconn){
		$query= "SELECT atleta.dis_cod, COUNT( * )  AS num, disciplina.dis_des  FROM disciplina, atleta WHERE atleta.dis_cod = disciplina.dis_cod  GROUP BY atleta.dis_cod, disciplina.dis_des";
		$consulta= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error($pgconn));
		return $consulta;
		}//function atletas_disciplina

		//Función empleados por perfil
		public function empleados($pgconn){
		$query= "SELECT empleado.tipemp_cod, COUNT( * )  AS num, tipo_empleado.tipemp_des FROM empleado, tipo_empleado WHERE empleado.tipemp_cod = tipo_empleado.tipemp_cod GROUP BY empleado.tipemp_cod, tipo_empleado.tipemp_des";
		$consulta= pg_query($pgconn, $query) or die ("Consulta Errónea: ".pg_last_error($pgconn));
		return $consulta;
		}//function empleados por perfil


}//class reporte
?>