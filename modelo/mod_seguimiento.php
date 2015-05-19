<?php
class seguimiento{
	private $seg_des;
	private $seg_fe;
	private $seg_ho;

/* ---------------------------*/
	//Agregar
	public function agregar($seg_des, $seg_fe, $seg_ho, $pgconn){
		$query = "INSERT INTO seguimiento (seg_des, seg_fe, seg_ho)
		VALUES ('$seg_des', '$seg_fe', '$seg_ho')";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al agregar: ".pg_last_error();
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
		$query "SELECT * FROM seguimiento";
		$consulta = pg_query($pgconn, $query) or die("Consulta err&oacute;nea al listar: ".pg_last_error());
		return $consulta;
	}//Cierro función listar
}//Cierro clase seguimiento
?>