<?php
require ("../controlador/sesion/con_timezone.php");
//Requiero modelo conexión
require ('../modelo/mod_connex.php');
	//Creo un objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn = $conexion->conectar();

//Requiero modelo empleado
require ("../modelo/mod_empleado.php");
	//Creo un objeto atleta	
	$consulta = new empleado();
	//Instancio la función lista	
	$lista = $consulta-> lista ($pgconn);
		//Condiciono el número de filas	
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Listar empleados";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = '';
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
		if(pg_num_rows($lista)>0)
			{//Abro if 1
?>
<!-- Aplico estilo a la tabla -->
<style type="text/css">
	.style1 {color: #000000}
	.style3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
</style>

<!-- Imprimo la tabla -->
<table border="0" bgcolor="#dcdcdc" align="center" id="lista_empleados" width="80%" >
	<thead>
		<td colspan="7" bgcolor="#D8D7D1" class="style3"><div align="center"><strong>Empleados registrados</strong></div></td>
		<tr bgcolor="#000000" >
			<th align="center" bgcolor="#eeece1"><span class="style3">Cédula</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Nombre</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Apellido</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Estatus</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Perfil</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Consultar</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Editar</span></th>
		</tr>
	</thead>
<?php
	for($i=0; $i<pg_num_rows($lista); $i++)
		{//Abro for 1
			$row= pg_fetch_array($lista,$i,PGSQL_ASSOC);
				$emp_nom = $row["emp_nom"];
				$emp_ape = $row["emp_ape"];
				$emp_ced = $row["emp_ced"];
				$est_des = $row["est_des"];
				$tipemp_des = $row["tipemp_des"];
?>

<tr>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $emp_ced;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $emp_nom;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $emp_ape;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $est_des;?></span>
	<td align="center" bgcolor="#f7f6f1"><span class="style1"><?php echo $tipemp_des;?></span>
	<td align="center" bgcolor="#f7f6f1" width="8%"><span class="style1"><a href="../controlador/empleado/con_consultar_empleado.php?emp_ced=<?php echo $emp_ced;?>"><img src="../vista/images/consultar.png" width="16" height="16"></a></span>
	<td align="center" bgcolor="#f7f6f1" width="8%"><span class="style1"><a href="../vista/vis_actualizar_empleado.php?emp_ced=<?php echo $emp_ced;?>"><img src="../vista/images/editar.png"  width="16" height="16"></a></span>	
</tr>
<?php }//Cierro for 1?>
</table>
<?php }//Cierro if 1
else
{
	echo "<table><tr><td colspan='7' bgcolor='#eeece1'><div align='center'><strong>No hay registros disponibles</strong></div></td></tr></table>";
}?>