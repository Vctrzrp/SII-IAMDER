<?php
require ("../../modelo/mod_connex.php");
	//Creo un nuevo objeto conexión
	$conexion = new Connex();
	//Instacio la función conectar
	$pgconn= $conexion->conectar();
require ("../../modelo/mod_empleado.php");
	//Creo un nuevo objeto empleado	
	$empleado= new empleado();
	//Instacio la función lista
	$resultado=$empleado->lista($pgconn);
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<table width="" border="1" bgcolor="" align="right" id="listado" >
<thead >
  <tr bgcolor="#dcdcdc" >
	  <th align="center">Código</th>
	  <th align="center">Cédula</th>
	  <th align="center">Nombre</th>
	  <th align="center">Apellido</th>
	  <th align="center">Correo</th>
	  <th align="center">Teléfono</th>
	  <th align="center">Fecha de creación</th>
	  <th align="center">Tipo de empleado</th>
	  <th align="center">Estatus</th>
	  <th align="center">Disciplina</th>
  </tr>
 </thead>
<?php
ob_start();
			 for($i=0; $i<pg_num_rows($resultado); $i++){
			 $row= pg_fetch_array($resultado, $i, PGSQL_ASSOC);
			 $emp_cod=$row["emp_cod"];
			 $emp_ced=$row["emp_ced"];
			 $emp_nom=$row["emp_nom"];
			 $emp_ape=$row["emp_ape"];
			 $emp_cor=$row["emp_cor"];
			 $emp_tel=$row["emp_tel"];
			 $emp_fe=$row["emp_fe"];
			 $tipemp_des=$row["tipemp_des"];
			 $est_des=$row["est_des"];
			 $dis_des=$row["dis_des"];
?>

			<tr>
			<td><?php echo $emp_cod;?></td>
			<td><?php echo $emp_ced;?></td>
			<td><?php echo $emp_nom;?></td>
			<td><?php echo $emp_ape;?></td>
			<td><?php echo $emp_cor;?></td>
			<td><?php echo $emp_tel;?></td>
			<td><?php echo $emp_fe;?></td>
			<td><?php echo $tipemp_des;?></td>
			<td><?php echo $est_des;?></td>
			<td><?php echo $dis_des;?></td>
			</tr>

<?php }?>

</table>
<?php
header("Content-type: application/vnd.ms-excel; name='excel'; chartset=UTF-8");
header("Content-Disposition: filename=data_empleado.xls");
header("Pragma: no-cache");
header("Expires: 0");
ob_end_flush();
?>