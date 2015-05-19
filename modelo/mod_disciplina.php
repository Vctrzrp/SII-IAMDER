<?php
class disciplina{
	private $dis_cod;
	private $dis_des;

	public function consultardisciplina (,$pgconn){
		$query = "SELECT dis_des FROM disciplina ";
		$consulta = pg_query ($pgconn, $query) or die ("Error al consultar disciplina ".pg_last_error());
/*		if ($consulta) {
           $mensaje='Consulta realizada';
  	   return $mensaje;	}	
	else {
           $mensaje='Consulta no realizada';
  	   return $mensaje;	}	*/
  	   return $consulta;
	}//Cierro función consultar

}//Cierro clase disciplina
?>