<!--<?php
//require ("../controlador/sesion/con_session.php");
?>-->
<?php
$a = $_GET['alerta'];
?>

<!DOCTYPE HTML>
<html>
	<body>
		<meta http-equiv='content-type' content='text/html; charset=utf-8' />
		<link rel='stylesheet' type='text/css' href='../vista/sweetalert/lib/sweet-alert.css'>
		<script type='text/javascript' src='../vista/sweetalert/lib/sweet-alert.min.js' ></script>
		<script type='text/javascript'>swal({title:'Contraseña actualizada', text:'<?php echo $a; ?>', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='salir.php'});
		</script>
	</body>
</html>