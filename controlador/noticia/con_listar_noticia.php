<?php
require ("../controlador/sesion/con_timezone.php");
//Requiero modelo conexión
require ('../modelo/mod_connex.php');
	//Creo un objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn = $conexion->conectar();

//Requiero modelo noticia
require ("../modelo/mod_noticia.php");
	//Creo un objeto atleta	
	$consulta = new noticia();
	//Instancio la función lista	
	$lista = $consulta-> listar ($pgconn);
		//Condiciono el número de filas	
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Listar noticia";
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
		<tr bgcolor="#000000" >
			<th align="center" bgcolor="#eeece1"><span class="style3">Imagen</span></th>			
			<th align="center" bgcolor="#eeece1"><span class="style3">Encabezado</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Descripción</span></th>
			<th align="center" bgcolor="#eeece1"><span class="style3">Autor</span></th>
<!--			<th align="center" bgcolor="#eeece1"><span class="style3">Fecha</span></th>-->
			<th align="center" bgcolor="#eeece1"><span class="style3">Consultar</span></th>
		</tr>
	</thead>
<?php
	for($i=0; $i<pg_num_rows($lista); $i++)
		{//Abro for 1
			$row= pg_fetch_array($lista,$i,PGSQL_ASSOC);
				$not_enc = $row["not_enc"];
				$not_img = $row["not_img"];
				$not_des = $row["not_des"];
				$not_aut = $row["not_aut"];
				$not_fe = $row["not_fe"];
?>

<tr>

	<td align="justify" bgcolor="#f7f6f1" width="10%"><span class="style1"><img src="<?php $a = substr ($not_img,3); echo $a;?> " height="90" width="90"></span>
	<td align="center" bgcolor="#f7f6f1" width="20%"><span class="style1"><?php echo substr($not_enc, 0,80);?></span>
	<td align="justify" bgcolor="#f7f6f1" width="50%"><span class="style1"><?php echo substr($not_des, 0,150).'...';?></span>
<!--	<td align="center" bgcolor="#f7f6f1" width="13%"><span class="style1"><?php echo $not_aut;?></span>-->
	<td align="center" bgcolor="#f7f6f1" width="10%"><span class="style1"><?php echo $not_fe;?></span>
	<td align="center" bgcolor="#f7f6f1" width="10%"><span class="style1"><a href="#"><img src="../vista/images/consultar.png" width="16" height="16"></a></span>

</tr>
<?php }//Cierro for 1?>
</table>
<?php }//Cierro if 1
else
{
	echo "<table><tr><td colspan='4' bgcolor='#eeece1'><div align='center'><strong>No hay registros disponibles</strong></div></td></tr></table>";
}?>