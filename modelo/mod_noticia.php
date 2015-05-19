<?php
class noticia{
	private $not_enc;
	private $not_img;
	private $not_des;
	private $not_aut;
	private $not_fe;
	private $emp_cod;

/* ---------------------------*/
	//Agregar
	public function agregar ($not_enc, $not_img, $not_des, $not_aut, $not_fe, $emp_cod, $pgconn){
		$query = "INSERT INTO noticia (not_enc, not_img, not_des, not_aut, not_fe, emp_cod)
		VALUES ('$not_enc', '$not_img', '$not_des', '$not_aut', '$not_fe', '$emp_cod')";
		$consulta = pg_query($pgconn, $query) or die ("Error al agregar".pg_last_error());
		return $consulta;
	}//Cierro función agregar

/* ---------------------------*/
	//Modificar
	public function modificar ($not_cod, $not_enc, $not_img, $not_des, $not_aut, $not_fe, $pgconn){
		$query = "UPDATE noticia SET not_enc = '$not_enc', not_img = '$not_img', not_des = '$not_des', not_aut = '$not_aut', not_fe = '$not_fe' WHERE not_cod = '$not_cod'";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al modificar: ".pg_last_error());
		return $consulta;
	}//Cierro función modificar

/* ---------------------------*/
	//Consultar
	public function consultar ($not_des,$pgconn){
		$query = "SELECT * FROM noticia WHERE not_des = 'not_des'";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al consultar: ".pg_last_error());
		return $consulta;
	}//Cierro función consultar
/* ---------------------------*/
	//Listar
	public function listar ($pgconn){
		$query = "SELECT * FROM noticia";
		$consulta = pg_query($pgconn, $query) or die("Consulta err&oacute;nea al listar: ".pg_last_error());
		return $consulta;
	}//Cierro función listar

//Función mostrar	
	public function mostrar($pgconn)
	{
		$query= "SELECT noticia.not_enc, noticia.not_aut , noticia.not_fe, empleado.emp_nom  FROM noticia, empleado WHERE noticia.emp_cod = empleado.emp_cod ORDER BY not_cod DESC LIMIT 1";
		$consulta= pg_query($pgconn, $query) or die ("Error al mostrar: ".pg_last_error($consulta));
		if($consulta)
		{
			return ($consulta);
		}//Cierro if
	}//Cierro función mostrar
}//Cierro clase noticia
?>