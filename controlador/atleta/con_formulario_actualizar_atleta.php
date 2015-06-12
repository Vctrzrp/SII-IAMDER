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
				 $dis_cod=$row["dis_cod"];
				 $dis_des=$row["dis_des"];
				 $equ_cod=$row["equ_cod"];
				 $equ_des=$row["equ_des"];
?>

<!-- Imprimo el formulario -->
<form action="../controlador/atleta/con_actualizar_atleta.php" method="POST">
<table border="2" bgcolor="#eeece1" align="center" id="empleado_consultado" >
	<thead>
	<td colspan="4" bgcolor="#eeece1"><div align="center"><strong>Informaci&oacute;n del atleta</strong></div></td>
		<tr>
			<td bgcolor="#f7f6f1" width="50%"><div align="right"><strong>Código del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" width="50%" name="atl_cod"><input type="text" name="codigo" id="codigo" disabled="true" value="<?php echo $emp_cod; ?>" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Cédula del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" ><input type="text" name="cedula" id="cedula" readonly="true" value="<?php echo $atl_ced; ?>" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Nombre del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><input type="text" name="nombre" id="nombre" disabled="true" value="<?php echo $atl_nom; ?>" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Apellido del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><input type="text" name="apellido" id="apellido" disabled="true" value="<?php echo $atl_ape; ?>" required/></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right">*<strong>Teléfono del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><input type="text" name="telefono" id="telefono" placeholder="2127813002" value="<?php echo $atl_tel;?>" pattern="^[0-9]{7,10}$"/></td>
		</tr>
		<tr>
            <td bgcolor="#f7f6f1"><div align="right">*<strong>Sexo:&nbsp;</strong></div></td>
            <td bgcolor="#f7f6f1"><select name="sexo" id="sexo" required>
                <option value="<?php echo $atl_sex;?>"><?php echo $atl_sex;?></option>
           		<option value="">------------</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
                </select></td>
		</tr>
		<tr>
			<td bgcolor="#f7f6f1"><div align="right">* <strong>Fecha de nacimiento:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1"><input type="text" name="fecha" id="fecha" disabled="true" value="<?php echo $atl_nac;?>" pattern="^[0-9]{7,10}$"/></td>
		</tr>
        <tr>
            <td bgcolor="#f7f6f1"><div align="right">*<strong>Dirección:&nbsp;</strong></div></td>
            <td bgcolor="#f7f6f1"><input type="text" name="direccion" id="direccion" title="Ingrese dirección del atleta" value="<?php echo $atl_dir;?>" required/></td>
        </tr>
        <tr>
            <td bgcolor="#f7f6f1"><div align="right">*<strong>Est&aacute;tura:&nbsp;</strong></div></td>
            <td bgcolor="#f7f6f1"><input type="text" name="estatura" id="estatura" placeholder="1,70 M" title="Ingrese estátura del atleta" value="<?php echo $atl_est;?>"/></td>
        </tr>
        <tr>
          <td bgcolor="#f7f6f1"><div align="right">*<strong>Peso:&nbsp;</strong></div></td>
          <td bgcolor="#f7f6f1"><input type="text" name="peso" id="peso" placeholder="80 Kg" title="Ingrese peso del atleta" value="<?php echo $atl_pes;?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#f7f6f1"><div align="right">*<strong> Talla de camisa:&nbsp;</strong></div></td>
          <td bgcolor="#f7f6f1"><select name="tallacamisa" id="tallacamisa">
            <option value="<?php echo $atl_cam;?>"><?php echo $atl_cam;?></option>
            <option value="">------------</option>
            <option value="14">14</option>
            <option value="16">16</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
           </select></td>
        </tr>
        <tr>
          <td bgcolor="#f7f6f1"><div align="right">*<strong> Talla de Pantalon:&nbsp;</strong></div></td>
          <td bgcolor="#f7f6f1"><select name="tallapantalon" id="tallapantalon">
            <option value="<?php echo $atl_pan;?>"><?php echo $atl_pan;?></option>
            <option value="">------------</option>
            <option value="12">12</option>
            <option value="14">14</option>
            <option value="16">16</option>
            <option value="18">18</option>
            <option value="30">30</option>
            <option value="32">32</option>
            <option value="34">34</option>
            <option value="36">36</option>
            <option value="38">38</option>
           </select></td>
        </tr>
        <tr>
        <tr>
          <td bgcolor="#f7f6f1"><div align="right">*<strong>Beca:&nbsp;</strong></div></td>
          <td bgcolor="#f7f6f1"><select name="beca" id="beca" required>
            <option value="<?php echo $atl_bec;?>"><?php echo $atl_bec;?></option>
            <option value="">------------</option>
            <option value="Activa">Activa</option>
            <option value="Inactiva">Inactiva</option>
           </select></td>
        </tr>
		<!--<tr>
			<td bgcolor="#f7f6f1"><div align="right"><strong>Fecha de creación del atleta:&nbsp;</strong></div></td>
			<td bgcolor="#f7f6f1" ><input type="text" name="fechacreacion" id="fechacreacion" disabled="true" value="<?php echo $atl_fe;?>" disabled="true"/></td>
		</tr>-->
        <tr>
            <td bgcolor="#f7f6f1"><div align="right">*<strong>Disciplina:&nbsp;</strong></div></td>
            <td bgcolor="#f7f6f1"><select name="disciplina" id="disciplina" required>
                <option value="<?php echo $dis_cod;?>"><?php echo $dis_des;?></option>
           		<option value="">------------</option>
                <option value="1">Fútbol</option>
                <option value="2">Béisbol</option>
                <option value="3">Softball</option>
                <option value="4">Baloncesto</option>
                <option value="5">Tenis de mesa</option>
                </select></td>
        </tr>
        <tr>
          <td bgcolor="#f7f6f1"><div align="right">*<strong>Equipo:&nbsp;</strong></div></td>
            <td bgcolor="#f7f6f1"><select name="equipo" id="equipo" required>
                <option value="<?php echo $equ_cod;?>"><?php echo $equ_des;?></option>
           		<option value="">------------</option>
                <option value="1">Fútbol</option>
                <option value="2">Béisbol</option>
                <option value="3">Softball</option>
                <option value="4">Baloncesto</option>
                <option value="5">Tenis de mesa</option>
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