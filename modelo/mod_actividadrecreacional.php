<?php
class actividadrecreacional{
	private $actrec_des;
	private $actrec_dir;
	private $actrec_fe;
	private $actrec_fot;
/* ---------------------------*/
	//Agregar
	public function agregar($actrec_des, $actrec_dir, $actrec_fe, $actrec_fot, $pgconn){

		$query = "INSERT INTO actividad_recreacional (actrec_des, actrec_dir, actrec_fe, actrec_fot)
		VALUES ('$actrec_cod', '$actrec_des', '$actrec_dir', '$actrec_fe', '$actrec_fot')";

		$consulta = pg_query($pgconn, $query) or die("Consulta err&oacute;nea al agregar: ".pg_last_error());
		return $consulta;
	}//Cierro función agregar
/* ---------------------------*/
	//Modificar
	public function modificar ($actrec_cod, $pgconn){
		$query = "UPDATE actividad_recreacional SET actrec_des = '$actrec_des', actrec_dir = '$actrec_dir', actrec_fe = '$actrec_fe', actrec_fot = '$actrec_fot'";
		
		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al modificar: ".pg_last_error());
		if ($consulta) {
           $mensaje='Modificaci&oacute;n realizada';
  	   return $mensaje;	}	
	else {
           $mensaje='Modificaci&oacute;n no realizada';
  	   return $mensaje;	}

	}//Cierro función modificar
/* ---------------------------*/
	//Consultar
	public function consultar ($actrec_cod, $pgconn){
		$query = "SELECT * FROM actividad_recreacional WHERE actrec_cod = '$actrec_cod'";

		$consulta = pg_query($pgconn, $query) or die ("Consulta err&oacute;nea al consultar: ".pg_last_error());
		return $consulta;
	}//Cierro función consultar

}//Cierro clase actividadrecreacional
?>