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
		<td colspan="6" bgcolor="#D8D7D1" class="style3"><div align="center"><strong>Atleta registrado</strong></div></td>
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
<?php }//Cierro for 1
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Listar atleta registrado";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = $atl_ced;
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