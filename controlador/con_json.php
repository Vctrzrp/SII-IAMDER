<?php
		$query= "SELECT * FROM atletas";
		$consulta= pg_query($pgconn, $query) or die ("Error al mostrar gráfica: ".pg_last_error($pgconn));

		if($consulta)
		{
			 for($i=0; $i<pg_num_rows($consulta); $i++)
			 {
				 $row= pg_fetch_array($consulta, $i, PGSQL_ASSOC);
				 $a=$row["atl_cod"];
				 $b=$row["atl_nom"];
 					$array[$i] = array( 'label'=>$b,'value' =>$a );
					$cons=json_encode($array[$i]);
					echo" $cons";
			}
		}// if obtener
?>