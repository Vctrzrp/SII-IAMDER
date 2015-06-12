<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Pdf con header y footer en cada página</title>
    <style type="text/css">
.fuente {
  font-family: Tahoma, Geneva, sans-serif;
}
.pie2 {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 11px;
}
.fuente {
  font-size: 12px;
}
.fuente {
  font-size: 36px;
}
.fuente {
  font-size: 12px;
}
.pie1 {
  font-size: 14px;
  font-family: "Bookman Old Style";
}
.pie0 {
  font-family: "Bookman Old Style";
}
.pie-1 {
  font-family: "Bradley Hand ITC";
  font-size: 22px;
  color: #F00;
}
        /* estilos para el footer y el numero de pagina */
        @page { margin: 180px 50px; }
        #header {
	position: fixed;
	left: 0px;
	top: -180px;
	right: 0px;
	height: 160px;
	background-color: #FFF;
	color: #000;
	text-align: center;
        }
        #footer {
	position: fixed;
	left: 0px;
	bottom: -100px;
	right: 0px;
	height: 110px;
	background-color: #FFFFFF;
	color: #000;
        }
    </style>
</head>
<body>
    <!--header para cada pagina-->
    <div id="header">
<table width="90%" border="0" align="center">
  <tr>
    <td width="10%"><img src="images/logo.png" width="90" height="154"/></td>
    <td align="left" colspan="2"><span class="fuente"><b>REPÚBLICA BOLIVARIANA DE VENEZUELA<br />
ALCALDÍA DEL MUNICIPIO PAZ CASTILLO<br />
INSTITUTO AUTÓNOMO MUNICIPAL<br />
DE DEPORTES Y RECREACIÓN<br />
SANTA LUCIA - ESTADO MIRANDA<b></span><br />
</td>
  </tr>
  </table>

    <!--footer para cada pagina-->
    <div id="footer">
            <table align="center"><tr><td colspan="3" align="center"><span class="pie-1"><b>V</b></span><b><span class="pie0">amos</span> <span class="pie-1">J<span class="pie0"></span></span><span class="pie0">untos a </span><span class="pie-1">G</span><span class="pie0">anar</b></span><br />
      <span class="pie1"><b>“Pueblo Victorioso”</b></span><br />
<span class="pie2">Santa Lucía, Municipio Paz Castillo, Estado Miranda Av. 24 de Julio,<br />
Gimnasio Mary Rodríguez, frente a Elecentro. Teléfonos: 0414-1741519 / 0414-9001564,<br />
Correo Electrónico <a href="mailto:iamder@hotmail.es">iamder@hotmail.es/ </a> Facebook: <a href="http://www.facebook.com/iamder.pazcastillo/"> www.facebook.com/iamder.pazcastillo/</a>
twitter: <a href="http://www.twitter.com/iamderpc">@iamderpc 
</a></span></td></tr>
  </tr>
</table>
    </div>
    <div id="content"><h3 align="center"> Listado de atletas registrados</h3> <br><?php require ("../controlador/atleta/con_atletas_pdf.php");?></div>
</body>
</html>