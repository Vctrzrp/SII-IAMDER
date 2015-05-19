<?php
class equipo{
	private $equ_des;
	private $equ_repced;
	private $equ_repnom;
	private $equ_vic;
	private $equ_der;
	private $equ_emp;
	private $equ_jue;
	private $dis_cod;

/* ---------------------------*/
	//Agregar
	public function agregar($equ_des,$equ_repced, $equ_repnom, $equ_vic, $equ_der, $equ_emp, $equ_jue, $dis_cod, $pgconn){
		$query = "INSERT INTO equipo (equ_des, equ_repced, equ_repnom, equ_vic, equ_der, equ_emp, equ_jue, dis_cod)
		VALUES ('$equ_des','$equ_repced','$equ_repnom', '$equ_vic', '$equ_der', '$equ_emp', '$equ_jue', '$dis_cod')";
		$consulta = pg_query($pgconn, $query) or die ("Error al agregar: ".pg_last_error());
		return $consulta;
	}//Cierra función agregar

/* ---------------------------*/
	//Modificar
	public function modificar($equ_cod, $equ_des, $equ_repced, $equ_repnom, $equ_vic, $equ_der, $equ_emp, $equ_jue, $pgconn){
		$query = "UPDATE equipo SET equ_des = '$equ_des', equ_vic = '$equ_vic', equ_der = '$equ_der', equ_emp = '$equ_emp', equ_jue = '$equ_jue' WHERE equ_cod = '$equ_cod'";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al modificar: ".pg_last_error()) ;
		return $consulta;
	}//Cierro función modificar

/* ---------------------------*/
	//Consultar
	public function consultar ($equ_des,$pgconn){
		$query = "SELECT * FROM equipo WHERE equ_des = '$equ_des'";
		$consulta = pg_query($pgconn) or die ("Consulta err&oacute;nea al consultar: ".pg_last_error());
		return $consulta;
	}//Cierro función consultar

/* ---------------------------*/
	//Listar
	public function listar ($pgconn){
		$query = "SELECT equipo.equ_des, equipo.equ_repnom , disciplina.dis_des FROM equipo, disciplina WHERE equipo.dis_cod = disciplina.dis_cod";
		$consulta = pg_query($pgconn, $query) or die("Error al listar: ".pg_last_error());
		return $consulta;
	}//Cierro función listar

/* ---------------------------*/
//Función mostrar	
	public function mostrar($pgconn)
	{
		$query= "SELECT equipo.equ_des, equipo.equ_repnom , disciplina.dis_des FROM equipo, disciplina WHERE equipo.dis_cod = disciplina.dis_cod ORDER BY equ_cod DESC LIMIT 1 ";
		$consulta= pg_query($pgconn, $query) or die ("Error al mostrar: ".pg_last_error($consulta));
		if($consulta)
		{
			return ($consulta);
		}//Cierro if
	}//Cierro función mostrar
}//Cierro clase equipo
?>