<?php
require ("../controlador/sesion/con_timezone.php");
require('../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn= $conexion->conectar();

require("../modelo/mod_equipo.php");
 $consulta= new equipo();
 $listar=$consulta-> listar ($pgconn);
//----------------------------------------------------------------
		//Requiero modelo seguimiento
		require("../modelo/mod_seguimiento.php");
		//Creo un nuevo objeto seguimiento
		$seguimiento= new seguimiento();
		$seg_des = "Listar equipos";
		$seg_fe = date ("Y-m-d");
		$seg_ho = date ("H:i:s");
		$emp_cod = $_SESSION ['emp_cod'];
		$seg_inf = '';
		$seg_ip = $_SERVER["REMOTE_ADDR"];
		$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
    if(pg_num_rows($listar)>0){
?>

<style type="text/css">
<!--
.style1 {color: #000000}
.style3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
-->
</style>


<table width=" " border="2" bgcolor="#dcdcdc" align="center" id="tablaregistro" >
<thead >
	<td colspan="6" bgcolor="#D8D7D1" class="style3"><div align="center"><strong>Equipos registrados</strong></div></td>
  <tr bgcolor="#000000" >
  <th align="center" bgcolor="#eeece1"><span class="style3">Nombre</span></th>
  <th align="center" bgcolor="#eeece1"><span class="style3">Representante</span></th>
  <th align="center" bgcolor="#eeece1"><span class="style3">Disciplina</span></th>
 </tr>
 </thead>
 <?php
 for($i=0; $i<pg_num_rows($listar); $i++){
 $row= pg_fetch_array($listar,$i,PGSQL_ASSOC);
 $equ_des=$row["equ_des"];
 $equ_repnom=$row["equ_repnom"];
 $dis_des=$row["dis_des"]; 
 ?>
 <tr>
 <td align="center" bgcolor="#f7f6f1"><?php echo $equ_des;?>
 <td align="center" bgcolor="#f7f6f1"><?php echo $equ_repnom;?>
 <td align="center" bgcolor="#f7f6f1"><?php echo $dis_des;?>
     <?php }?>
 </span>
 </table>
<?php }//Cierro if 1
else
{
	echo "<table><tr><td colspan='4' bgcolor='#eeece1'><div align='center'><strong>No hay registros disponibles</strong></div></td></tr></table>";
}?>