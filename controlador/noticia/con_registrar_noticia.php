<?php
require ("../sesion/con_timezone.php");
require ("../sesion/con_session.php");
//Abro conexión a la base de datos
require("../../modelo/mod_connex.php");
$conexion= new connex();
$pgconn= $conexion->conectar();
//Se capturan los datos del formulario
$not_enc= trim ($_POST ['encabezado']);
$not_des= trim ($_POST  ['cuerpo']);
$not_aut= trim ($_POST  ['autor']);
$not_fe = date("Y-m-d h:i:sa");
$emp_cod=       $_SESSION['emp_cod'];

$temp = $_FILES ['img']['tmp_name'];

if (is_uploaded_file($temp))
{//if 1
	if (($_FILES['img']['type'] == 'image/jpeg') || ($_FILES ['img']['type'] =='image/png'))
	{//if 2
		$not_img = "../../vista/noticia/imagenes/".$_FILES['img']['name'];
		if (move_uploaded_file($temp, $not_img))
		{
			/*------------------------------------------------*/
			require ("../../modelo/mod_noticia.php");
			$noticia= new noticia();
				$inserto=$noticia->agregar($not_enc,$not_img,$not_des,$not_aut,$not_fe,$emp_cod,$pgconn);
						if ($inserto==true)
						{
//----------------------------------------------------------------
							//Requiero modelo seguimiento
							require("../../modelo/mod_seguimiento.php");
							//Creo un nuevo objeto seguimiento
							$seguimiento= new seguimiento();
							$seg_des = "Registrar noticia";
							$seg_fe = date ("Y-m-d");
							$seg_ho = date ("H:i:s");
							$emp_cod = $_SESSION ['emp_cod'];
							$seg_inf = $not_enc;
							$seg_ip = $_SERVER["REMOTE_ADDR"];
							$inserto=$seguimiento->agregar ($seg_des,$seg_fe,$seg_ho,$emp_cod, $seg_inf, $seg_ip, $pgconn);
//----------------------------------------------------------------
							$consulta= $noticia->mostrar($pgconn);
							if(pg_num_rows($consulta)>0)
							{
								$row=pg_fetch_row($noticia);
								header("Location: ../../vista/vis_noticia_registrada.php");
							}
						}else
							{
								$alerta="No se pudo agregar la noticia.";
								header("Location: ../../vista/error.php?alerta=$alerta");
							}
			/*---------------------------------------------*/
			echo "El archivo ha sido cargado con éxito";
		}
		else
		{//else 1
			$alerta = "Error al mover la imagen de $temp";
			header("Location: ../../vista/error.php?alerta=$alerta");
		}//else 1
	}//if 2
	else
	{//else 2
		$alerta = "El archivo de tipo ".$_FILES['img']['type']." no es permitido.";
		header("Location: ../../vista/error.php?alerta=$alerta");	
	}//else 2
}//if 1
else
{//else 3
	$alerta = "El archivo no fué subido al servidor.";
	header("Location: ../../vista/error.php?alerta=$alerta");
}//else 3

?>