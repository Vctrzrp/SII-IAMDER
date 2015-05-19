<?php
class galeria{
	private $gal_des;
	private $gal_img;
	private $gal_fe;

/* ---------------------------*/
	//Agregar
	public function agregar ($gal_des, $gal_img, $gal_fe, $pgconn){
		$query = "INSERT INTO galeria (gal_des, gal_img, gal_fe)
		VALUES ('$gal_des', '$gal_img', '$gal_fe')";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al agregar: ".pg_last_error());
		return $consulta;
	}//Cierro función agregar

/* ---------------------------*/
	//Modificar
	public function modificar ($gal_cod, $gal_des, $gal_img, $gal_fe, $pgconn){
		$query = "UPDATE galeria SET gal_des = '$gal_des', gal_img = '$gal_img', gal_fe = '$gal_fe' WHERE gal_cod = '$gal_cod'";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al modificar: ".pg_last_error());
		return $consulta;
	}//Cierro función modificar

/* ---------------------------*/
	//Consultar
	public function consultar ($gal_des,$pgconn){
		$query = "SELECT * FROM galeria WHERE gal_des = '$gal_des'";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al consultar: ".pg_last_error());
		return $consulta;
	}//Cierro función consultar
/* ---------------------------*/
	//Listar
	public function listar ($pgconn){
		$query "SELECT * FROM galeria";
		$consulta = pg_query($pgconn, $query) or die("Consulta err&oacute;nea al listar: ".pg_last_error());
		return $consulta;
	}//Cierro función listar
}//Cierro clase galeria
?>