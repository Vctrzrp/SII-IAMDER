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
							<hr>
							<h2>
						</header>
					<div class="info">
						<span class="date"><span class="month">Sesión</span> 
					</div>
				<article class="container" id="top">
					<div class="row">
						<div class="imgT" align="center">
						</div>
					<div class="login"align="center">
						<header>
							<h3> <strong align="left" >Inicie sesión:</strong></h3>
							<p></p>
						</header>
                    <form method="post" action="../controlador/sesion/con_login.php" >
                       	<table align="center"border="2">
                       		<tr>
                          		<td>CÉDULA:</td>
                           		<td weight="5">&nbsp;</td>
                           		<td><input type="text" name="cedula" placeholder="Cédula" id="emp_ced"required></td></tr>
							<tr>
                           		<td>CONTRASEÑA:</td>
                           		<td weight="5" >&nbsp;</td>
                           		<td><input type="password" name="clave" placeholder="******" id="emp_clave"required></td></tr>	
                           		<td id="boton" align="center">&nbsp;</td>
								<td id="boton" align="center">
	                  			<div align="center"><input name="submit" type="submit" value="Enviar"></div></td>
                       		</tr>
                        </table>
                    </form>
			    </div>
			</article>
		</div>
	</div>
	<!-- Sidebar -->
		<div id="sidebar">
			<!-- Logo -->
			<a id="logo" al href="inicio.php" ><img src="images/logot.png"width='140' height='204'/></a>
				<hr>
					<ul id="copyright">
						<li>&copy; Autores:<br>Mar&iacute;a Lombano<br>Carlos Benitez<br>Carlos Garc&iacute;a<br>Victor Zerpa
					</ul>
		</div>
	</div>
	</body>
</html>