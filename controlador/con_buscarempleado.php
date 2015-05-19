<?php
require ('../controlador/con_session.php');

$emp_ced= $_POST['emp_ced'];
require('../modelo/mod_connex.php');
$conexion = new Connex();
$pgconn= $conexion->conectar();

require("../modelo/mod_empleado.php");
$consulta= new empleado();
$listar=$consulta-> buscar ($emp_ced, $pgconn);
if(pg_num_rows($listar)<=0){
						echo "
<body>
						<meta http-equiv='content-type' content='text/html; charset=utf-8' />
							<link rel='stylesheet' type='text/css' href='sweetalert/lib/sweet-alert.css'>
							<script type='text/javascript' src='sweetalert/lib/sweet-alert.min.js' ></script>
							<script type='text/javascript'>swal({title:'Error!', text:'No existe cédula dentro del sistema', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../vista/vis_consultarempleado.php'});
			            	</script>
</body>";
						}else{
							header("Location: ../vista/vis_empleadoconsultado.php");
						}
?>