<?php
require ("../controlador/con_session.php");
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>grafico</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script type="text/javascript" src="../fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="../fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
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
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<!--
		Note: Set the body element's class to "left-sidebar" to position the sidebar on the left.
		Set it to "right-sidebar" to, you guessed it, position it on the right.
	-->
	<body class="left-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Content -->
					<div id="content">
						<div class="inner">

							<!-- Post -->
								<article class="box post post-excerpt">
									<header>
										<!--
											Note: Titles and subtitles will wrap automatically when necessary, so don't worry
											if they get too long. You can also remove the <p> entirely if you don't
											need a subtitle.
										-->
										<h2><a href="#">Gráfico</a></h2>
										<hr>
										<!--<p>A free, fully responsive HTML5 site template by HTML5 UP</p>-->
									</header>
									<div class="info">

										<span class="date"><span class="month">Gráfico</span></span>
						</div></article>
				<div id="chartContainer"><script type="text/javascript"> FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "column3D",
        "renderAt": "chartContainer",
        "width": "500",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Empleados registados",
              "subCaption": " ",
              "xAxisName": "Gestor",
              "yAxisName": "",
              "theme": "fint"
           },
          "data": [
            <?php
require("../controlador/con_json.php");
?>
           ]
        }
    });

    revenueChart.render();
})</script></div></div>

<?php
require ("menu.php");
?>


					</div>

			</div>

	</body>
</html>