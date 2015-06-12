<?php
class seguimiento{
	private $seg_des;
	private $seg_fe;
	private $seg_ho;
	private $emp_cod;
	private $seg_inf;
	private $seg_ip;
	private $pgconn;

/* ---------------------------*/
	//Agregar
	public function agregar($seg_des, $seg_fe, $seg_ho, $emp_cod, $seg_inf, $seg_ip, $pgconn){
		$query = "INSERT INTO seguimiento (seg_des, seg_fe, seg_ho, emp_cod, seg_inf, seg_ip)
		VALUES ('$seg_des', '$seg_fe', '$seg_ho', '$emp_cod', '$seg_inf', '$seg_ip')";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al agregar: ".pg_last_error());
		return $consulta;
	}//Cierra función agregar

/* ---------------------------*/
/*	//Consultar
	public function consultar ($equ_des,$pgconn){
		$query = "SELECT * FROM equipo WHERE equ_des = '$equ_des'";
		$consulta = pg_query($pgconn) or die ("Consulta err&oacute;nea al consultar: ".pg_last_error());
		return $consulta;
	}//Cierro función consultar
*/

/* ---------------------------*/
	//Listar
	public function listar ($pgconn){
		$query = "SELECT seguimiento.*, empleado.emp_nom FROM seguimiento, empleado WHERE seguimiento.emp_cod = empleado.emp_cod ORDER BY seg_cod DESC";
		$consulta = pg_query($pgconn, $query) or die("Consulta err&oacute;nea al listar: ".pg_last_error());
		return $consulta;
	}//Cierro función listar

/* ---------------------------*/
	//Contar
	public function contar ($TAMANO_PAGINA, $inicio, $pgconn){
		$query = "SELECT seguimiento.*, empleado.emp_nom FROM seguimiento, empleado WHERE seguimiento.emp_cod = empleado.emp_cod ORDER BY seg_cod DESC LIMIT ".$TAMANO_PAGINA." OFFSET ".$inicio;
		$consulta = pg_query($pgconn, $query) or die("Consulta err&oacute;nea al listar: ".pg_last_error());
		return $consulta;
	}//Cierro función listar
}//Cierro clase seguimiento
?>