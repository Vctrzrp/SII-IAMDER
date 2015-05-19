<?php
class representante{
	private $rep_ced;
	private $rep_nom;
	private $rep_ape;
	private $rep_par;

/* ---------------------------*/
	//Agregar
	public function agregar ($rep_ced, $rep_nom, $rep_ape, $rep_par, $pgconn){
		$query = "INSERT INTO representante (rep_ced, rep_nom, rep_ape, rep_par)
		VALUES ('$rep_ced', '$rep_nom', '$rep_ape', '$rep_par')";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al agregar: ".pg_last_error());
		return $consulta;
	}//Cierro función agregar

/* ---------------------------*/
	//Modificar
	public function modificar ($rep_cod, $rep_ced, $rep_nom, $rep_ape, $rep_par, $pgconn){
		$query = "UPDATE representante SET rep_ced = '$rep_ced', rep_nom = '$rep_nom', rep_ape = '$rep_ape', rep_par = '$rep_par' WHERE rep_cod = '$rep_cod' ";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al modificar: ".pg_last_error());
		return $consulta;
	}//Cierro función modificar

/* ---------------------------*/
	//Consultar
	public function consultar ($rep_ced,$pgconn){
		$query = "SELECT * FROM representante WHERE rep_ced = '$rep_ced' ";
		$consulta = pg_query ($pgconn, $query) or die ("Consulta err&oacute;nea al consultar: ".pg_last_error());
	}//Cierro función consultar

/* ---------------------------*/
	//Listar
	public function listar ($pgconn){
		$query "SELECT * FROM representante";
		$consulta = pg_query($pgconn, $query) or die("Consulta err&oacute;nea al listar: ".pg_last_error());
		return $consulta;
	}
}//Cierro clase representante
?>