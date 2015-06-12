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
				 //$dis_des=$row["dis_des"];
?>

<!-- Imprimo el formulario -->
<form action="../controlador/empleado/con_actualizar_empleado.php" method="POST">
<table border="2" bgcolor="#eeece1" align="center" id="empleado_consultado" >
	<thead>
	<td colspan="4" bgcolor="#eeece1"><div align="center"><strong>Informaci&oacute;n del empleado</strong></div></td>
		<tr>
			<td bgcolor="#f7f6f1" width="50%"><div align="right"><strong>Código del empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" width="50%" name="emp_cod"><input type="text" name="codigo" id="codigo" disabled="true" value="<?php echo $emp_cod; ?>" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Cédula del empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" ><input type="text" name="cedula" id="cedula" readonly="true" value="<?php echo $emp_ced; ?>" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Nombre del empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><input type="text" name="nombre" id="nombre" disabled="true" value="<?php echo $emp_nom; ?>" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Apellido del empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><input type="text" name="apellido" id="apellido" disabled="true" value="<?php echo $emp_ape; ?>" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right">* <strong>Correo del empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><input type="email" name="correo" id="correo" placeholder="ejemplo@dominio.com" value="<?php echo $emp_cor;?>" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right">* <strong>Teléfono del empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><input type="text" name="telefono" id="telefono" placeholder="2127813002" value="<?php echo $emp_tel;?>" pattern="^[0-9]{7,10}$"/></td>
		</tr>
		<!--<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Fecha de creación:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" ><input type="text" name="fechacreacion" id="fechacreacion" value="<?php echo $emp_fe;?>" disabled="true"/></td>
		</tr>-->
		<tr>
			<td bgcolor="#f7f6f1"><div align="right">* <strong>Tipo empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><select name="tipoempleado" id="tipoempleado" required>
                <option value="<?php echo $tipemp_cod;?>"><?php echo $tipemp_des;?></option>
                <option value="">--------------------</option>
                <option value="2">Empleado</option>
                <option value="3">Entrenador</option>
                </select></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right">* <strong>Estatus del empleado:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><select name="estatus" id="estatus" required>
                    <option value="<?php echo $est_cod;?>"><?php echo $est_des;?></option>
                    <option value="">--------------------</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                      </select></td>
		</tr>
		<tr>
		<td colspan="4" bgcolor="f7f6f1"><div align="right">* Campos disponibles para actualizar</div></td>
		</tr>
		<tr>
		<td colspan="4" align="center"><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
		</tr>
	</thead>
<?php }//Cierro for 1?>
</form>
<?php }//Cierro if 1?>