<?php
require ("../controlador/con_session.php");
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="icon" href="images/logot.png" type="image" sizes="16x16">
    <title>Noticias</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="bootstrap/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
     tinymce.init({
      selector: "textarea"
    });
    </script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      #container{
      width: 50%;
     }
    </style>
    <!-- --> 
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
                    <h2><a href="#">Registro de noticias</a></h2>
                    <hr>
                  </header>
                  <div class="info">
                    <!-- TITULO EN LA PESTAÑA-->
                    <span class="date"><span class="month">Noticias</span> <!--<span class="day">14</span><span class="year">, 2014</span></span>-->
                  </div>
                  <form id="form1" name="form1" method="POST" action="../controlador/con_registrar_noticia.php" enctype="multipart/form-data">
  <div align="center">
    <h2>Rellene el formulario para registrar los datos en el sistema</h2>
    <p>&nbsp;</p>
    <table width="500" border="1">
  <tr>
    <th width="41" scope="col">&nbsp;</th>
    <td width="298" scope="col"><div align="right"><strong>Encabezado:&nbsp;</strong></div></td>
    <td width="466" scope="col"><input type="text" name="encabezado" id="encabezado" placeholder="Encabezado" title="Ingrese encabezado de la noticia" required /></td>
    <th width="385" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th width="41" scope="col">&nbsp;</th>
    <td width="298" scope="col"><div align="right"><strong>Imagen:&nbsp;</strong></div></td>
    <td width="466" scope="col"><input type="file" name="img" id="img"/></td>
    <th width="385" scope="col">&nbsp;</th>
  </tr>
    <tr>
    <th width="41" scope="col">&nbsp;</th>
    <td width="298" scope="col"><div align="right"><strong>Descripción de la noticia:&nbsp;</strong></div></td>
    <td width="466" scope="col"><textarea id="cuerpo" name ="cuerpo" ></textarea></td>
    <th width="385" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th width="41" scope="col">&nbsp;</th>
    <td width="298" scope="col"><div align="right"><strong>Autor:&nbsp;</strong></div></td>
    <td width="466" scope="col"><input type="text" name="autor" id="autor" placeholder="Autor" required /></td>
    <th width="385" scope="col">&nbsp;</th>
  </tr>
  <tr>
 <tr>
  <td colspan="4" align="center">&nbsp;</td>
 </tr>
    <td colspan="4" align="center"><input type="submit" name="enviar" id="enviar" value="Enviar" />
    </tr>
</table>
    <p>&nbsp;</p>
    </div>
</form></p>
                </article>
            </div>
          </div>
        <!-- Menu -->
        <?php
require ("menu.php");
?>
  </body>
</html>