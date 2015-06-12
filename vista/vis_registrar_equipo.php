<?php
require ("../controlador/sesion/con_session.php");
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="icon" href="images/logot.png" type="image" sizes="16x16">
    <title>Equipos</title>
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
                    <h2><a href="#">Registro de equipos</a></h2>                
                    <hr>
                  </header>
                  <div class="info">
                    <!-- TITULO EN LA PESTAÑA-->
                    <span class="date"><span class="month">Equipo</span>
                  </div>
                  <form id="form1" name="form1" method="post" action="../controlador/equipo/con_registrar_equipo.php">
  <div align="center">
    <h2>Rellene el formulario para registrar sus datos en el sistema</h2>
    <p>&nbsp;</p>
    <table width="500" border="1">
  <tr>
    <th width="41" scope="col">&nbsp;</th>
    <td width="298" scope="col"><div align="right"><strong>Nombre del equipo:&nbsp;</strong></div></td>
    <td width="466" scope="col"><input type="text" name="nombre" id="nombre" placeholder="Nombre del equipo" title="Ingrese nombre del equipo" required/></td>
    <th width="385" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th width="41" scope="col">&nbsp;</th>
    <td width="298" scope="col"><div align="right"><strong>C&eacute;dula del representante:&nbsp;</strong></div></td>
    <td width="466" scope="col"><input type="text" name="cedula" id="cedula" placeholder="Cédula" title="Ingrese cédula del representante" pattern="^[0-9]{6,8}$" required/></td>
    <th width="385" scope="col">&nbsp;</th>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"><strong>Nombre del representante:&nbsp;</strong></div></td>
    <td><input type="text" name="nombrerep" id="nombrerep" placeholder="Nombre y apellido del representante" title="Ingrese nombre del representante" required /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th >&nbsp;</th>
    <td ><div align="right"><strong>Cantidad de jugadores:&nbsp;</strong></div></td>
    <td ><input type="text" name="cantidad" id="cantidad" placeholder="10" title="Ingrese cantidad de jugadores" required/></td>
    <th >&nbsp;</th>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"><strong>Correo del equipo:&nbsp;</strong></div></td>
    <td><input type="email" name="correo" id="correo" placeholder="ejemplo@dominio.com" title="ejemplo@gmail.com" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"><strong>Tel&eacute;fono de contacto:&nbsp;</strong></div></td>
    <td><input type="text" name="telefono" id="telefono" placeholder="2127813002" title="Ingrese un número telefónico" pattern="^[0-9]{7,10}$" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"><strong>Disciplina del equipo:&nbsp;</strong></div></td>
    <td><select name="disciplina" id="disciplina" required>
          <option value="">Seleccione</option>
          <option value="1">F&uacute;tbol</option>
          <option value="2">B&eacute;isbol</option>
          <option value="3">Softball</option>
          <option value="4">Baloncesto</option>
          <option value="5">Tenis de mesa</option>
     </select></td>
  </tr>

<tr>
  <td colspan="4" align="center">&nbsp;</td>
</tr>
<tr>
    <td colspan="4" align="center"><input type="submit" name="enviar" id="enviar" value="Enviar" />
</tr>
</table>
    </div>
</form>
</article>
        <!-- Menu -->
        <?php
require ("menu.php");
?>
  </body>
</html>