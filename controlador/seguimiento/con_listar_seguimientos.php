<?php

//Limito la busqueda 
$TAMANO_PAGINA = 15; 

//examino la página a mostrar y el inicio del registro a mostrar 
if (isset($_GET['pagina'])){  //capturas la pagina en la que estas
   $pagina= $_GET['pagina'];
   }
else {
   $pagina='';
   }
 
if (!$pagina) { 
   	$inicio = 0; 
   	$pagina=1; 
} 
else { 
   	$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
}

require ("../controlador/sesion/con_timezone.php");
//require ("con_ip.php");
//Requiero modelo conexión
require("../modelo/mod_connex.php");
	//Creo un objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn= $conexion->conectar();

//Requiero modelo seguimiento
require("../modelo/mod_seguimiento.php");
	//Creo un objeto seguimiento
	$consulta= new seguimiento();
	//Instancio la función listar
	$listar=$consulta-> listar ($pgconn);
	$contar=$consulta-> contar ($TAMANO_PAGINA, $inicio,$pgconn);
		//Condiciono el número de filas

	$num_total_registros = pg_num_rows($listar);
	//calculo el total de páginas 
	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
/* //----------------------------------------------------------------

		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Listar seguimientos";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = '';
		$seg_ip = $_SERVER ['REMOTE_ADDR']
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//---------------------------------------------------------------- */
		if(pg_num_rows ($contar)>0)
			{//Abro if 1
?>
<!-- Aplico estilo a la tabla -->
<style type="text/css">
	.style1 {color: #000000}
	.style3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
</style>

<!-- Imprimo la tabla -->
<div>
<p>
Se han encontrados un total de <?php echo $num_total_registros;?> registros, organizados por la última interacción dentro del sistema.<br>
Se muestra la cantidad de <?php echo $TAMANO_PAGINA;?> registros por página.<br>
Se encuentra en la página <?php echo $pagina;?> de <?php echo $total_paginas;?>
</p>
<table border="0" bgcolor="#dcdcdc" align="center" id="datatables" width="80%" >
	<thead >
	<tr>
		<th align="center" bgcolor="#D8D7D1" colspan="5"><span class="style3">Historico</span></th>
	</tr>
		<tr bgcolor="#000000" >
			<!--<th align="center" bgcolor="#eeece1"><span class="style3">Código</span></th>-->
			<th align="center" bgcolor="#eeece1"><span class="style3">Descripción</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Fecha</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Hora</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Usuario</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">IP</span></th>
		</tr>
	 </thead>
<?php
	for($i=0; $i<pg_num_rows($contar); $i++)
 		{//Abro for 1
			$row= pg_fetch_array($contar,$i,PGSQL_ASSOC);
			$seg_cod=$row["seg_cod"];
			$seg_des=$row["seg_des"];
			$seg_fe=$row["seg_fe"];
			$seg_ho=$row["seg_ho"];
			$emp_nom=$row["emp_nom"];
			$seg_ip= $row["seg_ip"]; 
?>
<!-- Imprimo los datos por cada fila obtenida -->
<tr>
<!--	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $seg_cod;?></span>-->
	<td align="left" bgcolor="#f7f6f1"><span class="style1"><?php echo $seg_des;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $seg_fe;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $seg_ho;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $emp_nom;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $seg_ip;?></span>
</tr>
<?php }//Cierro for 1
?>
</table>
</div>
<?php }//Cierro if 1
//muestro los distintos índices de las páginas, si es que hay varias páginas 
if ($total_paginas > 1){
	echo "<table><tr><td align='left' width='15%'> <a href='vis_seguimiento.php?pagina=1'><button type='button'>Primera página</button></a></td><td>";
   	for ($i=1;$i<=$total_paginas;$i++){ 
      	if ($pagina == $i) 
         	//si muestro el índice de la página actual, no coloco enlace 
         	echo "<strong>".$pagina."</strong> "; 
      	else
         	//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
         	echo "<a href='vis_seguimiento.php?pagina=". $i ."'>" . $i . "</a> "; 
   	} 
   	echo "<td align='right' width='15%'><a href='vis_seguimiento.php?pagina=". $total_paginas ."'><button type='button'>Última página</button></a></tr></table>";
}
else
{
	echo "<tr><td colspan='4' bgcolor='#eeece1'><div align='center'><strong>No hay registros disponibles</strong></div></td></tr></table>";
}?>