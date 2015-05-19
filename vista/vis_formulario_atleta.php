<?php
require ("../controlador/con_session.php");
$cedula = $_GET['atl_ced'];
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="icon" href="images/logot.png" type="image" sizes="16x16">
    <title>Atleta</title>
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
            <h2><a href="#">Registro de atletas</a></h2>
            <hr>
          </header>
        <div class="info">
          <!-- TITULO EN LA PESTAÑA-->
          <span class="date"><span class="month">Atleta</span> <!--<span class="day">14</span><span class="year">, 2014</span></span>-->
        </div>
      <form id="form1" name="form1" method="post" action="../controlador/con_registrar_atleta.php">
        <div align="center">
          <h2 align="left">Rellene el formulario para registrar sus datos en el sistema</h2>
          <p>&nbsp;</p>
            <table width="500" border="1">
                  <tr>
                    <td width="298" scope="col"><div align="right"><strong>C&eacute;dula / N&uacute;mero de partida de nacimiento&nbsp;</strong></div></td>
                    <td width="466" scope="col"><input type="text" name="cedula" id="cedula" readonly="true" value="<?php echo $cedula; ?>" title="Ingrese cédula del atleta" pattern="^[0-9]{6,8}$" required/></td>
                  </tr>
                  <tr>
                    <td width="298" scope="col"><div align="right"><strong>(*) Nombre:&nbsp;</strong></div></td>
                    <td width="466" scope="col"><input type="text" name="nombre" id="nombre" placeholder="Nombre" title="Ingrese nombre del atleta" required /></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>(*) Apellido:&nbsp;</strong></div></td>
                    <td><input type="text" name="apellido" id="apellido" placeholder="Apellido" title="Ingrese apellido del atleta" required /></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>(*) Tel&eacute;fono:&nbsp;</strong></div></td>
                    <td><input type="text" name="telefono" id="telefono" placeholder="2127813002" title="Ingrese un número telefónico" pattern="^[0-9]{7,10}$" required/></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>(*) Sexo:&nbsp;</strong></div></td>
                    <td><select name="sexo" id="sexo" required>
                      <option value="">Seleccione</option>
                      <option value="Femenino">Femenino</option>
                      <option value="Masculino">Masculino</option>
                     </select></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>(*) Fecha de nacimiento:&nbsp;</strong></td>
                    <td><input type="date" name="fechanacimiento" id="fechanacimiento"/></td>
                  </tr>  
                  <tr>
                    <td><div align="right"><strong>(*) Direcci&oacute;n:&nbsp;</strong></div></td>
                    <td><input type="text" name="direccion" id="direccion" placeholder="Gran avenida..." title="Ingrese dirección del atleta" required/></td>
                  </tr>
                  <!-- --REPRESENTANTE--
                  <tr>
                    <td width="298" scope="col"><div align="right"><strong>C&eacute;dula del representante:&nbsp;</strong></div></td>
                    <td width="466" scope="col"><input type="text" name="cedularep" id="cedularep" placeholder="8383454" title="Ingrese cédula del representante" pattern="^[0-9]{6,8}$" /></td>
                  </tr>
                  <tr>
                    <td width="298" scope="col"><div align="right"><strong>Nombre del representante:&nbsp;</strong></div></td>
                    <td width="466" scope="col"><input type="text" name="nombrerep" id="nombrerep" placeholder="Nombre" title="Ingrese nombre del representante" required /></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>Apellido del representante:&nbsp;</strong></div></td>
                    <td><input type="text" name="apellidorep" id="apellidorep" placeholder="Apellido" title="Ingrese apellido del representante" required /></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>Parentesco del representante:&nbsp;</strong></div></td>
                    <td><input type="text" name="parentescorep" id="parentescorep" placeholder="Abuel@, T&iacute;@, Padre, Madre" title="Ingrese parentesco del representante" required /></td>
                  </tr>-->
                  <tr>
                    <td><div align="right"><strong>Est&aacute;tura:&nbsp;</strong></div></td>
                    <td><input type="text" name="estatura" id="estatura" placeholder="1,70 M " title="Ingrese estátura del atleta"/></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>Peso:&nbsp;</strong></div></td>
                    <td><input type="text" name="peso" id="peso" placeholder="80 Kg" title="Ingrese peso del atleta" /></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong> Talla de camisa:&nbsp;</strong></div></td>
                    <td><select name="tallacamisa" id="tallacamisa">
                      <option value="">Seleccione</option>
                      <option value="14">14</option>
                      <option value="16">16</option>
                      <option value="S">S</option>
                      <option value="M">M</option>
                      <option value="L">L</option>
                      <option value="XL">XL</option>
                     </select></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong> Talla de Pantalon:&nbsp;</strong></div></td>
                    <td><select name="tallapantalon" id="tallapantalon">
                      <option value="">Seleccione</option>
                      <option value="12">12</option>
                      <option value="14">14</option>
                      <option value="16">16</option>
                      <option value="18">18</option>
                      <option value="30">30</option>
                      <option value="32">32</option>
                      <option value="34">34</option>
                      <option value="36">36</option>
                      <option value="38">38</option>
                     </select></td>
                  </tr>
                  <tr>
                  <tr>
                    <td><div align="right"><strong>(*) Beca:&nbsp;</strong></div></td>
                    <td><select name="beca" id="beca" required>
                      <option value="">Seleccione</option>
                      <option value="Activa">Activa</option>
                      <option value="Inactiva">Inactiva</option>
                     </select></td>
                  </tr>
                    <td><div align="right"><strong>(*) Fecha de registro:&nbsp;</strong></div></td>
                    <td><input type="text" name="fechacreacion" id="fechacreacion" value="<?php echo date('Y-m-d'); ?>" readonly="true"/></td>
                  </tr>
                  <tr>
                    <td><div align="right"><strong>Disciplina:&nbsp;</strong></div></td>
                    <td><select name="disciplina" id="disciplina" required>
                      <option value="">Seleccione</option>
                      <option value="1">B&eacute;isbol</option>
                      <option value="2">F&uacute;tbol</option>
                      <option value="3">Softball</option>
                      <option value="4">Baloncesto</option>
                      <option value="5">Tenis de mesa</option>
                     </select></td>
                  </tr>
                  <tr>      
                  <tr>
                    <td colspan="4" align="right">(*) Campos obligatorios</td>
                  </tr>
                  <tr>
                    <td colspan="4" align="center"><input type="submit" name="enviar" id="enviar" value="Enviar" />
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
  </body>
</html>