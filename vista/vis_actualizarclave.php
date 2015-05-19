<?php
require ("../controlador/con_session.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Inicio</title>
	<link rel="icon" href="images/logot.png" type="image" sizes="16x16">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
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
<body class="left-sidebar">
	<!-- Wrapper -->
		<div id="wrapper">
			<!-- Content -->
				<div id="content">
					<div class="inner">
						<!-- Post -->
							<article class="box post post-excerpt">
								<header>							
									<h2>Cambiar clave</h2>
									<hr>			
								</header>
								<div class="info">							
									<span class="date"><span class="month">Usuario</span> 
									<ul class="stats">										
									</ul>
								</div>
								<article class="container" id="top">
					<div class="row">
					<div class="imgT" align="center">
					</div>
					<div class="login"align="center">
					<header>
							<h3> <strong>Ingrese los siguientes datos:</strong></h3>
					  </header>
<?php
$emp_login=$_SESSION['emp_log'];
if($_SESSION['tipemp_cod']=='1') 
	{ ?>

                            	<form method="post" action="../controlador/con_actualizar_clave.php" >
                             	<table align="center"border="2">
                             		<tr>
                             		<td align="right"><strong>&nbsp;</strong>
                             		</tr>
                             		<tr>
                             		<!--<td align="right"><strong>Login:&nbsp;</strong></td>-->
                             		<td><input  type="hidden" name="login" id="login" placeholder=<?php echo $emp_login;?> value="<?php echo $emp_login;?>"></td>
                             		</tr>
									<tr>
                            		<td align="right"><strong>Contraseña:&nbsp;</strong></td>
                            		<td><input type="password" name="clave" id="clave" placeholder="******" title="Debe tener letras y números" pattern="^[a-zA-Z0-9]{4,10}$" required></td>
                            		</tr>
                            		<tr>
                            		<td align="right"><strong>Confirmar Contraseña:&nbsp;</strong></td>
                            		<td><input type="password" name="conficlave" id="conficlave" placeholder="******" title="Debe tener letras y números" pattern="^[a-zA-Z0-9]{4,10}$" required></td>
                            		</tr>
									<tr>
							  		<td colspan="2" heigth="5">&nbsp;</td>
							  		<tr>
                            		<td id="boton" align="center">&nbsp;</td>
									<td id="boton" align="center">
                              			<div align="center"><input name="submit" type="submit" value="Enviar"></div>
                              		</td>
                              		</tr>
                                </table>
                            </form>
<?php 
	} 
?>
					    </div>
									</article>
						</div>
					</div>
				<!-- Sidebar -->
					<?php require ("menu.php");?>
					</div>
			</div>
	</body>
</html>