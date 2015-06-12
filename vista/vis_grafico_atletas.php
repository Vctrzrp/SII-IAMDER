<?php
require ("../controlador/sesion/con_session.php");
?>
<!DOCTYPE HTML>

<html>
	<head>
		<link rel="icon" href="images/logot.png" type="image" sizes="16x16">
		<title>Atletas</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

        <script type="text/javascript" src="../fusioncharts/js/fusioncharts.js"></script>
        <script type="text/javascript" src="../fusioncharts/js/themes/fusioncharts.theme.carbon.js"></script>
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
			<div id="wrapper">
					<div id="content">
						<div class="inner">
								<article class="box post post-excerpt">
									<header>
										<h2><a href="#">Estadísticas</a></h2>
										<hr>
										<!--<div align="right"><a href="../controlador/con_excel.php">Exportar Data</a></div>-->
									</header>
									<div class="info">
										<span class="date"><span class="month">Atletas</span>
										<ul class="stats">
										</ul>
									</div>
</span></div></article>
<div>    
<?php 
	require ("../controlador/grafico/con_grafico.php");
?>
</div>

<div id="chartContainer1"><script type="text/javascript"> FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "doughnut3D",
        "renderAt": "chartContainer1",
        "width": "700",
        "height": "321",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Atletas registrados",
              "subCaption": "Agrupados por sexo",
              "theme": ""
           },
          "data": [<?php atletas_sexo();?>]
        }
    });
    revenueChart.render();
})</script>
</div>
<hr>
<div id="chartContainer2"><script type="text/javascript"> FusionCharts.ready(function(){
      var revenueChart2 = new FusionCharts({
        "type": "doughnut3D",
        "renderAt": "chartContainer2",
        "width": "700",
        "height": "321",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Atletas registrados",
              "subCaption": "Agrupados por disciplina",
              "theme": ""
           },
          "data": [<?php atletas_disciplina();?>]
        }
    });
    revenueChart2.render();
})</script>
</div>
						</div>
					</div>
				<?php
require ("menu.php");
?>

	</body>
</html>