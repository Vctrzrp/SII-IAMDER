<?php
require ("../controlador/sesion/con_timezone.php");
$emp_ced = $_GET['emp_ced'];
//Requiero modelo conexión
require ("../modelo/mod_connex.php");
	//Creo un objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn = $conexion->conectar();

//Requiero modelo empleado
require ("../modelo/mod_empleado.php");
	//Creo un objeto empleado	
	$consulta = new empleado();
	//Instancio la función buscar	
	$buscar = $consulta-> buscar ($emp_ced,$pgconn);
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Listar empleado consultado";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = $emp_ced;
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
		if(pg_num_rows($buscar)>0)
			{//Abro if 1                                                                         
?>
<!-- Aplico estilo a la tabla -->
<style type="text/css">
	.style1 {color: #000000}
	.style3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
</style>

<?php
	for($i=0; $i<pg_num_rows($buscar); $i++)
		{//Abro for 1
			$row= pg_fetch_array($buscar, $i, PGSQL_ASSOC);
				 $emp_cod=$row["emp_cod"];
				 $emp_ced=$row["emp_ced"];
				 $emp_nom=$row["emp_nom"];
				 $emp_ape=$row["emp_ape"];
				 $emp_cor=$row["emp_cor"];
				 $emp_tel=$row["emp_tel"];
				 $emp_cla=$row["emp_cla"];
				 $emp_fe=$row["emp_fe"];
				 $tipemp_cod=$row["tipemp_cod"];
				 $tipemp_des=$row["tipemp_des"];
				 $est_cod=$row["est_cod"];
				 $est_des=$row["est_des"];
				 $dis_cod=$row["dis_cod"];
?>

<!-- Imprimo la tabla -->
<table border="2" bgcolor="#eeece1" align="center" id="empleado_consultado" >
	<thead>
	<td colspan="4" bgcolor="#eeece1"><div align="center"><strong>Empleado actualizado</strong></div></td>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Código del usuario:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" name="emp_cod"><?php echo $emp_cod?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Cédula del usuario:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" ><?php echo $emp_ced;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Nombre del usuario:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $emp_nom;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Apellido del usuario:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $emp_ape;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Correo del usuario:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $emp_cor;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Teléfono del usuario:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $emp_tel;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Fecha de creación:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" ><?php echo $emp_fe;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Tipo empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $tipemp_des;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Estatus del empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $est_des;?></td>
		</tr>
	</thead>
<?php }//Cierro for 1?>

<?php }//Cierro if 1
else
{
	echo "<table><tr><td colspan='4' bgcolor='#eeece1'><div align='center'><strong>No hay registros disponibles</strong></div></td></tr></table>";
}?>