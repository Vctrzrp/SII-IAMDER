<?php 
//Requiero modelo conexión
require('../modelo/mod_connex.php');
	//Creo un objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn= $conexion->conectar();
                               
//Requiero modelo atleta
require("../modelo/mod_atleta.php");
	//Creo un objeto atleta
	$consulta= new atleta();
	//Instancio la función mostrar
	$mostrar=$consulta-> mostrar ($pgconn);
		//Condiciono el número de filas
		if(pg_num_rows($mostrar)>0)
			{//Abro if 1                                                                
?>
<!-- Aplico estilo a la tabla -->
<style type="text/css">
	.style1 {color: #000000}
	.style3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
</style>

<!-- Imprimo la tabla -->
<table border="2" bgcolor="#dcdcdc" align="center" id="lista_atleta_registrado" >
	<thead>
		<tr bgcolor="#000000" >
			<th align="center" bgcolor="#eeece1"><span class="style3">Nombre</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Apellido</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Cédula</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Sexo</span></th>
		</tr>
	</thead>
<?php
	for($i=0; $i<pg_num_rows($mostrar); $i++)
 		{//Abro for 1
			$row= pg_fetch_array($mostrar, $i, PGSQL_ASSOC);
			$atl_nom=$row["atl_nom"];
			$atl_ape=$row["atl_ape"];
			$atl_ced=$row["atl_ced"];
			$atl_sex=$row["atl_sex"]; 
?>
<!-- Imprimo los datos por cada fila obtenida -->
<tr>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $atl_nom;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $atl_ape;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $atl_ced;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $atl_sex;?></span>
</tr>
<?php }//Cierro for 1?>
</table>
<?php }//Cierro if 1?>