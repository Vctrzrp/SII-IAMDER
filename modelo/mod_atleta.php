<?php
class atleta {
	private $atl_ced;
	private $atl_nom;
	private $atl_ape;
	private $atl_tel;
	private $atl_sex;
	private $atl_nac;
	private $atl_dir;
	private $atl_est;
	private $atl_pes;
	private $atl_cam;
	private $atl_pan;
	private $atl_bec;
	private $atl_fe;
	private $dis_cod;
	private $equ_cod;
	private $rep_cod;

/* ---------------------------*/
	//Agregar
	public function agregar ($atl_ced, $atl_nom, $atl_ape, $atl_tel, $atl_sex, $atl_nac, $atl_dir, $atl_est, $atl_pes, $atl_cam, $atl_pan, $atl_bec, $atl_fe, $dis_cod, $equ_cod, $rep_cod, $pgconn){
		$query = "INSERT INTO atleta (atl_ced, atl_nom, atl_ape, atl_tel, atl_sex, atl_nac, atl_dir, atl_est, atl_pes, atl_cam, atl_pan, atl_bec, atl_fe, dis_cod, equ_cod, rep_cod)
		VALUES ('$atl_ced', '$atl_nom', '$atl_ape', '$atl_tel', '$atl_sex', '$atl_nac', '$atl_dir', '$atl_est', '$atl_pes', '$atl_cam', '$atl_pan', '$atl_bec', '$atl_fe', '$dis_cod', '$equ_cod', '$rep_cod')";
		$consulta = pg_query($pgconn, $query) or die("Error al agregar: ".pg_last_error());
		return $consulta;
	}//Cierro función agregar

/* ---------------------------*/
	//Modificar
	public function modificar ($atl_ced, $atl_tel, $atl_sex, $atl_est, $atl_pes, $atl_cam, $atl_pan, $atl_bec, $dis_cod, $equ_cod, $pgconn){
		$query = "UPDATE atleta SET atl_ced ='$atl_ced', atl_tel = '$atl_tel', atl_sex = '$atl_sex', atl_est = '$atl_est', atl_pes = '$atl_pes', atl_cam = '$atl_cam', atl_pan = '$atl_pan', atl_bec = '$atl_bec', dis_cod='$dis_cod', equ_cod = '$equ_cod' WHERE atl_ced = '$atl_ced'";
		$consulta = pg_query($pgconn, $query) or die("Consulta err&oacute;nea al modificar: ".pg_last_error());
		if ($consulta) {
           $mensaje='Modificaci&oacute;n realizada';
  	   return $mensaje;	}	
	else {
           $mensaje='Modificaci&oacute;n no realizada';
  	   return $mensaje;	}		
  	}//Ciero función modificar


/* ---------------------------*/
	//Consultar
	public function consultar ($atl_ced, $pgconn)
	{
		$query = "SELECT * FROM atleta WHERE atl_ced = '$atl_ced'";
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al consultar: ".pg_last_error());
		return $consulta;
	}//Cierro función consultar

/* ---------------------------*/
//Función buscar
		public function buscar($atl_ced, $pgconn)
		{//Abro función buscar
		$query= "SELECT atleta.*, equipo.equ_des, disciplina.dis_des FROM atleta, equipo, disciplina WHERE atl_ced = '$atl_ced' AND atleta.equ_cod = equipo.equ_cod AND atleta.dis_cod = disciplina.dis_cod
";
		$consulta= pg_query($pgconn, $query) or die ("Error al buscar: ".pg_last_error($pgconn));
		if($consulta)
		{//Abro if
			return ($consulta);
			}//Cierro if
		}//Cierro función buscar

/* ---------------------------*/
	//Listar
	public function listar ($pgconn){
		$query = "SELECT atleta.atl_ced, atleta.atl_nom , atleta.atl_ape, disciplina.dis_des FROM atleta, disciplina WHERE atleta.dis_cod = disciplina.dis_cod ORDER BY atl_ced::integer ASC";
		$consulta = pg_query($pgconn, $query) or die("Error al listar ".pg_last_error());
		return $consulta;
	}//Cierro función listar

/* ---------------------------*/
//Mostrar	
	public function mostrar($pgconn)
	{
		$query = "SELECT atl_nom, atl_ape , atl_ced, atl_sex FROM atleta ORDER BY atl_cod DESC LIMIT 1";
		$consulta= pg_query($pgconn, $query) or die ("Error al mostrar: ".pg_last_error($consulta));
		if($consulta)
		{
			return ($consulta);
		}//Cierro if
	}//Cierro función mostrar
}//Cierro clase atleta
?>