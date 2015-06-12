<?php
require ("../controlador/sesion/con_timezone.php");
$atl_ced = $_GET['atl_ced'];
//Requiero modelo conexión
require ("../modelo/mod_connex.php");
	//Creo un objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn = $conexion->conectar();

//Requiero modelo atleta
require ("../modelo/mod_atleta.php");
	//Creo un objeto atleta	
	$consulta = new atleta();
	//Instancio la función buscar	
	$buscar = $consulta-> buscar ($atl_ced,$pgconn);
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Listar atleta consultado";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = $atl_ced;
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
				 $atl_cod=$row["atl_cod"];
				 $atl_ced=$row["atl_ced"];
				 $atl_nom=$row["atl_nom"];
				 $atl_ape=$row["atl_ape"];
				 $atl_tel=$row["atl_tel"];
				 $atl_sex=$row["atl_sex"];
				 $atl_nac=$row["atl_nac"];
				 $atl_dir=$row["atl_dir"];
				 $atl_est=$row["atl_est"];
				 $atl_pes=$row["atl_pes"];
				 $atl_cam=$row["atl_cam"];
				 $atl_pan=$row["atl_pan"];
				 $atl_bec=$row["atl_bec"];
				 $atl_fe=$row["atl_fe"];
				 $dis_des=$row["dis_des"];
				 $equ_des=$row["equ_des"];
?>

<!-- Imprimo la tabla -->
<table border="2" align="center" id="empleado_consultado" >
	<thead>
	<tr>
	<td><p align="left"><span class="style1"><a href="javascript:history.back(-1);" title="Ir la página anterior"> << Volver</a></span></td>
	<td><p align="right"><span class="style1"><a href="../vista/vis_actualizar_atleta.php?atl_ced=<?php echo $atl_ced;?>"><img src="../vista/images/editar.png" width="16" height="16"> Editar atleta</a></span></td>
	</tr>
	<td colspan="2" bgcolor="#eeece1"><div align="center"><strong>Informació del atleta</strong></div></td>
		<tr>
			<td bgcolor="#f7f6f1" width="50%"><div align="right"><strong>Código del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" width="50%" name="atl_cod"><?php echo $atl_cod?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Cédula del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" ><?php echo $atl_ced;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Nombre del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_nom;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Apellido del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_ape;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Teléfono del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_tel;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Sexo del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_sex;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Fecha de nacimiento:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" ><?php echo $atl_nac;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Dirección del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_dir;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Estatura del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_est;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Peso del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_pes;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Talla de camisa:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_cam;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Talla de pantalon:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_pan;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Beca del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_bec;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Fecha de creación del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $atl_fe;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Disciplina del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $dis_des;?></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Equipo del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><?php echo $equ_des;?></td>
		</tr>
	</thead>
<?php }//Cierro for 1?>
</table>
<?php }//Cierro if 1
else
{
	echo "<table><tr><td colspan='2' bgcolor='#eeece1'><div align='center'><strong>No hay registros disponibles</strong></div></td></tr></table>";
}?>