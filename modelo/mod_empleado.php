<?php
class empleado{ //Abro clase empleado
	private $emp_ced;
	private $emp_nom;
	private $emp_ape;
	private $emp_cor;
	private $emp_tel;
	private $emp_cla;
	private $emp_fe;
	private $tipemp_cod;
	private $est_cod;
	private $dis_cod;
	private $pgconn;

//Función agregar
	public function agregar($emp_ced, $emp_nom, $emp_ape, $emp_cor, $emp_tel, $emp_cla, $emp_fe, $tipemp_cod, $est_cod, $dis_cod, $pgconn)
	{
		$query = "INSERT INTO empleado (emp_ced, emp_nom, emp_ape, emp_cor, emp_tel, emp_cla, emp_fe, tipemp_cod, est_cod, dis_cod)
		VALUES ('$emp_ced', '$emp_nom', '$emp_ape', '$emp_cor', '$emp_tel', md5('$emp_cla'), '$emp_fe', '$tipemp_cod', '$est_cod', '$dis_cod')";
		$consulta= pg_query($pgconn,$query) or die ("Error al agregar: ".pg_last_error($consulta));
		return $consulta;
	}//Cierro función agregar

//Función autenticar
		public function autenticar($emp_ced, $emp_cla, $pgconn)
	{
		$query= "SELECT * FROM empleado WHERE emp_ced='$emp_ced' AND emp_cla='$emp_cla'	";
		$consulta= pg_query($pgconn, $query) or die ("CONSULTA ERRADA: ".pg_last_error($consulta));
		if($consulta)
		{//Abro if autenticar
		return $consulta;
		}//Cierro if autenticar
	}//Cierro función autenticar

//Función actualizar
		public function actualizar($emp_ced,$emp_cla,$pgconn)
	{
		$query= "UPDATE empleado SET emp_cla=md5('$emp_cla') where emp_ced='$emp_ced'";
		$consulta= pg_query($pgconn, $query) or die ("Error al actualizar: ".pg_last_error($pgconn));
		if($consulta)
		{//Abro if actualizar
		return ($consulta);
		}//Cierro if actualizar
	}//Cierro función actualizar

//Función verificar cedula
		public function verificarCedula($emp_ced, $pgconn)
		{//Abro función verificar
		$query= "SELECT * FROM empleado WHERE emp_ced='$emp_ced'";
		$consulta= pg_query($pgconn, $query) or die ("Error al verificar: ".pg_last_error($pgconn));
		if($consulta)
		{//Abro if
			return ($consulta);
			}//Cierro if
		}//Cierro función verificar cedula

//Función buscar
		public function buscar($emp_ced, $pgconn)
		{//Abro función buscar
		$query= "SELECT empleado.*, tipo_empleado.tipemp_des, estatu.est_des FROM empleado, tipo_empleado, estatu WHERE emp_ced='$emp_ced' AND empleado.tipemp_cod = tipo_empleado.tipemp_cod AND empleado.est_cod = estatu.est_cod";
		$consulta= pg_query($pgconn, $query) or die ("Error al buscar: ".pg_last_error($pgconn));
		if($consulta)
		{//Abro if
			return ($consulta);
			}//Cierro if
		}//Cierro función buscar

//Función lista
		public function lista($pgconn)
		{
			$query= "SELECT empleado.*, tipo_empleado.tipemp_des, estatu.est_des, disciplina.dis_des FROM empleado, tipo_empleado, estatu, disciplina WHERE empleado.tipemp_cod = tipo_empleado.tipemp_cod AND empleado.est_cod = estatu.est_cod AND empleado.dis_cod = disciplina.dis_cod ORDER BY empleado.emp_ced::integer ASC";
			$consulta= pg_query($pgconn, $query) or die ("Error al listar: ".pg_last_error($consulta));
		if($consulta)
			{//Abro if
			return ($consulta);
			}//Cierro if
		}//Cierro función
	
//Función modificar
		public function modificar($emp_ced, $emp_cor, $emp_tel, $tipemp_cod, $est_cod, $dis_cod, $pgconn)
		{
			$query= "UPDATE empleado SET emp_cor='$emp_cor', emp_tel='$emp_tel', tipemp_cod = '$tipemp_cod', est_cod = '$est_cod' WHERE emp_ced = '$emp_ced' ";
			$consulta= pg_query($pgconn, $query) or die ("Error al modificar: ".pg_last_error($consulta));
		if($consulta)
			{//Abro if
			return ($consulta);
			}//Cierro if
		}//Cierro función

//Función mostrar	
	public function mostrar($pgconn)
	{
		$query= "SELECT emp_nom, emp_ape , emp_ced, emp_cla FROM empleado ORDER BY emp_cod DESC LIMIT 1";
		$consulta= pg_query($pgconn, $query) or die ("Error al mostrar: ".pg_last_error($consulta));
		if($consulta)
		{
			return ($consulta);
		}//Cierro if
	}//Cierro función mostrar


}//Cierro clase empleado
?>
