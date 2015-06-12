<?php
require ("../controlador/sesion/con_timezone.php");
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
	//Instancio la función listar
	$listar=$consulta-> listar ($pgconn);
		//Condiciono el número de filas
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Listar atletas";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = '';
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
		if(pg_num_rows($listar)>0)
			{//Abro if 1
?>
<!-- Aplico estilo a la tabla -->
<style type="text/css">
	.style1 {color: #000000}
	.style3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
</style>

<!-- Imprimo la tabla -->
<table border="0" bgcolor="#dcdcdc" align="center" id="lista_atletas" width="80%" >
	<thead >
		<td colspan="6" bgcolor="#D8D7D1" class="style3"><div align="center"><strong>Atletas registrados</strong></div></td>
		<tr bgcolor="#000000" >
			<th align="center" bgcolor="#eeece1"><span class="style3">Cédula</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Nombre</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Apellido</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Disciplina</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Consultar</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Editar</span></th>
		</tr>
	 </thead>
<?php
 	for($i=0; $i<pg_num_rows($listar); $i++)
 		{//Abro for 1
			$row= pg_fetch_array($listar,$i,PGSQL_ASSOC);
			$atl_ced=$row["atl_ced"];
			$atl_nom=$row["atl_nom"];
			$atl_ape=$row["atl_ape"];
			$dis_des=$row["dis_des"]; 
?>
<!-- Imprimo los datos por cada fila obtenida -->
<tr>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $atl_ced;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $atl_nom;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $atl_ape;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $dis_des;?></span>
	<td align="center" bgcolor="#f7f6f1" width="8%"><span class="style1"><a href="../controlador/atleta/con_consultar_atleta.php?atl_ced=<?php echo $atl_ced;?>"><img src="../vista/images/consultar.png" width="16" height="16"></a></span>
	<td align="center" bgcolor="#f7f6f1" width="8%"><span class="style1"><a href="../vista/vis_actualizar_atleta.php?atl_ced=<?php echo $atl_ced;?>"><img src="../vista/images/editar.png"  width="16" height="16"></a></span>
</tr>
<?php }//Cierro for 1?>
</table>
<?php }//Cierro if 1
else
{
	echo "<table><tr><td colspan='4' bgcolor='#eeece1'><div align='center'><strong>No hay registros disponibles</strong></div></td></tr></table>";
}?>