<?php
require ("../controlador/sesion/con_timezone.php");
//Requiero modelo conexión
require ("../modelo/mod_connex.php");
	//Creo un objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn = $conexion->conectar();

//Requiero modelo noticia
require ("../modelo/mod_noticia.php");
	//Creo un objeto atleta	
	$consulta = new noticia();
	//Instancio la función mostrar	
	$mostrar = $consulta-> mostrar ($pgconn);
		if(pg_num_rows($mostrar)>0)
			{//Abro if 1                                                                         
?>
<!-- Aplico estilo a la tabla -->
<style type="text/css">
	.style1 {color: #000000}
	.style3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
</style>

<!-- Imprimo la tabla -->
<table border="2" bgcolor="#dcdcdc" align="center" id="lista_empleado_registrado" >
	<thead>
		<tr bgcolor="#000000" >
			<th align="center" bgcolor="#eeece1"><span class="style3">Encabezado</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Autor</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Fecha</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Empleado</span></th>
		</tr>
	</thead>
<?php
	for($i=0; $i<pg_num_rows($mostrar); $i++)
		{//Abro for 1
			$row= pg_fetch_array($mostrar, $i, PGSQL_ASSOC);
			$not_enc=$row["not_enc"];
			$not_aut=$row["not_aut"];
			$not_fe=$row["not_fe"];
			$emp_nom=$row["emp_nom"];
?>
<tr>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $not_enc;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $not_aut;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $not_fe;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $emp_nom;?></span>
</tr>
<?php }//Cierro for 1
//----------------------------------------------------------------
	//Requiero modelo seguimiento
	require("../modelo/mod_seguimiento.php");
	//Creo un nuevo objeto seguimiento
	$seguimiento= new seguimiento();
	$seg_des = "Listar noticia registrada";
	$seg_fe = date ("Y-m-d");
	$seg_ho = date ("H:i:s");
	$emp_cod = $_SESSION ['emp_cod'];
	$seg_inf = $not_enc;
	$seg_ip = $_SERVER["REMOTE_ADDR"];
	$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
?>
</table>
<?php }//Cierro if 1
else
{
	echo "<table><tr><td colspan='4' bgcolor='#eeece1'><div align='center'><strong>No hay registros disponibles</strong></div></td></tr></table>";
}?>