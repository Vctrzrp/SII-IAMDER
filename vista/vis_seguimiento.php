<?php
require ("../controlador/sesion/con_session.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Seguimiento</title>
		<link rel="icon" href="images/logot.png" type="image" sizes="16x16">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

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
						<h2>Historial de eventos dentro del sistema</h2>
						<hr>
					</header>
				<div class="info">
					<!-- TITULO EN LA PESTAÑA-->
					<span class="date"><span class="month">Auditoría</span>
				</div>
                <div align="top">
					<?php
						require ("../controlador/seguimiento/con_listar_seguimientos.php");
					?>
				</div>
				</article>
			</div>
			</div>
		<!-- Sidebar -->
		<?php
			require ("menu.php");
		?>
		</div>
	</body>
</html>