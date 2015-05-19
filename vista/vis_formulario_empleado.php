<?php
require ("../controlador/con_session.php");
$cedula = $_GET['emp_ced'];
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="icon" href="images/logot.png" type="image" sizes="16x16">
    <title>Empleado</title>
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
              <h2>Registro de empleados</h2>
              <hr>
            </header>            
          <div class="info">
            <!-- TITULO EN LA PESTAÑA-->
            <span class="date"><span class="month">Empleado</span> <!--<span class="day">14</span><span class="year">, 2014</span></span>-->
          </div>
        <form id="form1" name="form1" method="post" action="../controlador/con_registrar_empleado.php">
          <div align="center">
            <h2 align="left">Ingrese los siguientes datos para el registro del empleado</h2>
            <p>&nbsp;</p>
              <table width="500" border="1">
                <tr>
                  <th width="41" scope="col">&nbsp;</th>
                  <td width="298" scope="col"><div align="right"><strong>C&eacute;dula:&nbsp;</strong></div></td>
                  <td width="466" scope="col"><input type="text" name="cedula" id="cedula" placeholder="Cédula" readonly="true" value="<?php echo $cedula; ?>" title="Ingrese cédula del empleado" pattern="^[0-9]{6,8}$" required/></td>
                  <th width="385" scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <th width="41" scope="col">&nbsp;</th>
                  <td width="298" scope="col"><div align="right"><strong>Nombre:&nbsp;</strong></div></td>
                  <td width="466" scope="col"><input type="text" name="nombre" id="nombre" placeholder="Nombre" title="Ingrese nombre del empleado" required /></td>
                  <th width="385" scope="col">&nbsp;</th>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"><strong>Apellido:&nbsp;</strong></div></td>
                  <td><input type="text" name="apellido" id="apellido" placeholder="Apellido" title="Ingrese apellido del empleado" required /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"><strong>Correo:&nbsp;</strong></div></td>
                  <td><input type="email" name="correo" id="correo" placeholder="ejemplo@dominio.com" title="ejemplo@gmail.com" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" required/></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"><strong>Tel&eacute;fono:&nbsp;</strong></div></td>
                  <td><input type="text" name="telefono" id="telefono" placeholder="2127813002" title="Ingrese un número telefónico" pattern="^[0-9]{7,10}$"/></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"><strong>Clave:&nbsp;</strong></div></td>
                  <td><input type="password" name="clave" id="clave" placeholder="*******" title="Debe tener letras y números" pattern="^[a-zA-Z0-9]{4,10}$" required/> </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"><strong>Confirme su clave:&nbsp;</strong></div></td>
                  <td><input type="password" name="conficlave" id="conficlave" placeholder="*******" title="Debe tener letras y números" pattern="^[a-zA-Z0-9]{4,10}$" required/></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"><strong>Fecha de registro:&nbsp;</strong></div></td>
                  <td><input type="text" name="fechacreacion" id="fechacreacion" readonly="true" value="<?php echo date('Y-m-d'); ?>" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="right"><strong>Perfil:&nbsp;</strong></div></td>
                  <td><select name="tipoempleado" id="tipoempleado" required>
                    <option value="">Seleccione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                    <option value="3">Entrenador</option>
                      </select>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td colspan="4" align="center">&nbsp;</td>
                </tr>
                  <td colspan="4" align="center"><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
                </tr>
              </table>
            </div>
          </form>
        </article>
      </div>
    </div>
  <!-- Menu -->
  <?php
  require ("menu.php");
  ?>
  </div>
  </body>
</html>