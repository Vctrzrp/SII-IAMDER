<?php
require ("../controlador/con_session.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Consulta</title>
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
										<h2><a href="#">Consulta</a></h2>
										<hr>
									</header>
									<div class="info">
										<!-- TITULO EN LA PESTAÑA-->
										<span class="date"><span class="month">Empleados</span>
										<ul class="stats">
										</ul>
									</div>
  		<form action="vis_buscarempleado.php" method="POST"><p>Ingrese el empleado que desea buscar por el número de cédula</p>
				<table width="500" border="1">
  <tr>
	<td width="176">&nbsp;</td>
	<td width="810" align="center" scope="col"><div align="right"><input name="emp_ced" type="text" placeholder="123456" title="Ingrese cédula del empleado" pattern="^[0-9]{6,8}$" required></div></td>
	<td width="386" align="left" scope="col"><input name="Buscar" type="submit" value="Buscar"></td>
  </tr>
</table>
								</article>
						</div>
					</div>
					<?php
require ("menu.php");
?>
					</div>
			</div>
	</body>
</html>