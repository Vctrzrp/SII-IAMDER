<?php
require('../modelo/mod_connex.php');
		$conexion = new Connex();
		$pgconn= $conexion->conectar();
//se capturan los datos del formulario

$emp_cod= $_GET['emp_cod'];
$con_feulac= $_POST['con_feulac'];
$con_estatus= $_POST['estatus'];
$con_obserusu= $_POST['con_obserusu'];
$con_obserges= $_POST['con_obserges'];

require("../modelo/mod_conatel.php");
$registro= new conatel();

			$inserto=$registro->actualizar($con_id,$con_feulac,$con_estatus,$con_obserusu,$con_obserges,$con_gestor, $mysqlconn);


			if ($inserto==true){echo"
<body>
						<meta http-equiv='content-type' content='text/html; charset=utf-8' />
							<link rel='stylesheet' type='text/css' href='../vista/sweetalert/lib/sweet-alert.css'>
							<script type='text/javascript' src='../vista/sweetalert/lib/sweet-alert.min.js' ></script>
							<script type='text/javascript'>swal({title:'', text:'Registro Actualizado', type: 'success',confirmButtonText:'Cerrar'},function(){window.location.href='../vista/consulta_conatel.php'});
			            	</script>
</body>";
				}else{
					echo "
<body>
						<meta http-equiv='content-type' content='text/html; charset=utf-8' />
							<link rel='stylesheet' type='text/css' href='../vista/sweetalert/lib/sweet-alert.css'>
							<script type='text/javascript' src='../vista/sweetalert/lib/sweet-alert.min.js' ></script>
							<script type='text/javascript'>swal({title:'Error!', text:'Registro No Actualizado', type: 'error',confirmButtonText:'Cerrar'},function(){window.location.href='../vista/consulta_conatel.php'});
			            	</script>
</body>";
}?>