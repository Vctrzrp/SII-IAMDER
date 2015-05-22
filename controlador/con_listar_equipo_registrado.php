<?php
require('../modelo/mod_connex.php');
	$conexion = new Connex();
	$pgconn= $conexion->conectar();

require("../modelo/mod_equipo.php");
 $consulta= new equipo();
 $mostrar=$consulta-> mostrar ($pgconn);
    if(pg_num_rows($mostrar)>0){
?>

<style type="text/css">
<!--
.style1 {color: #000000}
.style3 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; }
-->
</style>


<table width=" " border="2" bgcolor="#dcdcdc" align="center" id="tablaregistro" >
<thead >
  <tr bgcolor="#000000" >
  <th align="center" bgcolor="#eeece1"><span class="style3">Nombre</span></th>
  <th align="center" bgcolor="#eeece1"><span class="style3">Representante</span></th>
  <th align="center" bgcolor="#eeece1"><span class="style3">Disciplina</span></th>
 </tr>
 </thead>
 <?php
 for($i=0; $i<pg_num_rows($mostrar); $i++){
 $row= pg_fetch_array($mostrar,$i,PGSQL_ASSOC);
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
 <?php }?>
