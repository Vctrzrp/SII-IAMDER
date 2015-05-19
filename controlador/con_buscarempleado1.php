<?php 
require ("../modelo/mod_connex.php");
$conexion= new connex();
$pgconn= $conexion->conectar();
                               
require("../modelo/mod_empleado.php");
 $consulta= new empleado();
 $listar=$consulta-> buscar ($pgconn);
 
 if(pg_num_rows($listar)>0){                                                                            
 $row= pg_fetch_array($listar, 0, PGSQL_ASSOC);
 $emp_cod    = $row["emp_cod"];
 $emp_ced    = $row["emp_ced"];
 $emp_nom    = $row["emp_nom"];
 $emp_ape    = $row["emp_ape"];
 $emp_cor    = $row["emp_cor"];
 $emp_tel    = $row["emp_tel"];
 $emp_log    = $row["emp_log"];
 $emp_cla    = $row["emp_cla"];
 $emp_fe     = $row["emp_fe"];
 $tipemp_cod = $row["tipemp_cod"];
 $tipemp_des = $row["tipemp_des"];
 $est_cod    = $row["est_cod"];
 $est_des    = $row["est_des"];
 $dis_cod    = $row["dis_cod"];
?>
 <table id="consultaempleado" border="1" align="center">
   <td colspan="4" bgcolor="#eeece1"><div align="center"><strong>Informaci&oacute;n del empleado</strong></div></td>
   </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Código del usuario:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1" id="emp_cod" name="emp_cod"><?php echo $emp_cod?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Cédula del usuario:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1" ><?php echo $emp_ced;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr>
 </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Nombre del usuario:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1"><?php echo $emp_nom;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Apellido del usuario:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1"><?php echo $emp_ape;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Correo del usuario:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1"><?php echo $emp_cor;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Teléfono del usuario:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1"><?php echo $emp_tel;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Fecha de creación:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1" ><?php echo $emp_fe;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr> 
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Tipo empleado:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1"><?php echo $tipemp_des;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Estatus del empleado:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1"><?php echo $est_des;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr>
 <tr>
 <td colspan="4" bgcolor="#eeece1"><div align="right" class="style1">.</div></td>
 </tr>
 <tr>
 <td >&nbsp;</td>
 <td >&nbsp;</td>
 </tr>
 </table>
<?php }?>