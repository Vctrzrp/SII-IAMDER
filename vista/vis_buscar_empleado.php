<?php
require ('../controlador/sesion/con_session.php');

$emp_ced= $_POST['emp_ced'];
require('../modelo/mod_connex.php');
$conexion = new Connex();
$pgconn= $conexion->conectar();

require("../modelo/mod_empleado.php");
$consulta= new empleado();
$listar=$consulta-> buscar ($emp_ced, $pgconn);
if(pg_num_rows($listar)<=0){
						echo "
<body>
						<meta http-equiv='content-type' content='text/html; charset=utf-8' />
							<link rel='stylesheet' type='text/css' href='sweetalert/lib/sweet-alert.css'>
							<script type='text/javascript' src='sweetalert/lib/sweet-alert.min.js' ></script>
							<script type='text/javascript'>swal({title:'Error!', text:'No existe cédula dentro del sistema', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../vista/vis_consultarempleado.php'});
			            	</script>
</body>";
						}else{
 $row= pg_fetch_array($listar, 0, PGSQL_ASSOC);
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
	<link rel="icon" href="images/logot.png" type="image" sizes="16x16">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="shortcut icon" type="image/png" href="images/logot.png"  />
    <script type="text/javascript">
function showMe (it,div2,div3,div4,bot, box) {
var vis = (box.checked) ? "initial" : "none";
document.getElementById(it).style.display = vis;
document.getElementById(div2).style.display = vis;
document.getElementById(div3).style.display = vis;
document.getElementById(div4).style.display = vis;
document.getElementById(bot).style.display = vis;
}
</script>

		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
	</head>
	<title>Buscar</title>
	<body class="left-sidebar">
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Content -->
					<div id="content">
						<div class="inner">
							<!-- Post -->
								<article class="box post post-excerpt">
									<header>
									  <h2>Consulta</h2>
									  <hr>
										<h2>
									</header>
									<div class="info">
									<!-- TITULO EN LA PESTAÑA-->
										<span class="date"><span class="month">Empleados</span>
										</ul>
									</div>
									<!--<form align="right">
                                      <label>Actualizar</label>
                                      <div class="slideThree">
									  <input type="checkbox"  id="slideThree" name="check" style="visibility:hidden" onClick="showMe('div1','div2','div3','div4','bot', this)" >
									  <label for="slideThree"></label>
									  </div>
                                    </form>-->
									<form id="actualizar" method="post" action="../controlador/empleado/con_modempleado.php?emp_cod=<?php echo $emp_cod?>">
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
 <td bgcolor="#f7f6f1">&nbsp;</td><input type="hidden" name="emp_ced" value=<?php echo $emp_ced;?>>
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
 <td bgcolor="#f7f6f1">&nbsp;</td><input type="hidden" name="emp_fe" value=<?php echo $emp_fe;?>>
 <td bgcolor="#f7f6f1" ><?php echo $emp_fe;?></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 </tr> 
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Tipo empleado:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1"><?php echo $tipemp_des;?></td>
 <td bgcolor="#f7f6f1">
   		<div id="div2" style="display:none" align="right">
				<select name="tipemp_cod" id="tipemp_cod" Style="width:160px" required>
        			<option value= <?php echo $tipemp_cod;?>>Administrador</option>
        			<option value="2">Empleado</option>
        			<option value="3">Entrenador</option>
     			 </select>
		</div></td>
 </tr>
 <tr>
 <td bgcolor="#f7f6f1"><div align="right"><strong>Estatus del empleado:</strong></div></td>
 <td bgcolor="#f7f6f1">&nbsp;</td>
 <td bgcolor="#f7f6f1"><?php echo $est_des;?></td>
 <td bgcolor="#f7f6f1">
   		<div id="div2" style="display:none" align="right">
				<select name="estatus" id="estatus" Style="width:160px" required>
        			<option value= <?php echo $est_cod;?>>Activo</option>
        			<option value="2">Inactivo</option>
     			 </select>
		</div></td>
 </tr>
 <tr>
 <td colspan="4" bgcolor="#eeece1"><div align="right" class="style1">.</div></td>
 </tr>
 <tr>
 <td >&nbsp;</td>
 <td >&nbsp;</td>
 <td>
   <div id="bot" style="display:none" align="right">
<input type="submit" value="enviar">
<input type="reset" value="borrar">
<td bgcolor=>&nbsp;</td>
</div>
</td>
 </tr>
 </table>
		</form>
	                        </article>
						</div>
					</div>
	<?php
require ("menu.php");
?>
					</div>
			</div>
</body>
<?php }?>