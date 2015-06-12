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
		<script type='text/javascript'>swal({title:'¡Error!', text:'<?php echo $a; ?>', type: 'error',confirmButtonText:'Cerrar'},function(){window.history.back()});
		</script>
	</body>
</html>