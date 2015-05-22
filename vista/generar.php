<?php
// Si queremos exportar a PDF
$a = $_GET['a'];
    require_once ('../dompdf/dompdf_config.inc.php');
    
    $dompdf = new DOMPDF();
    if ($a != "listado_atletas.pdf")
    {
        $dompdf->load_html( file_get_contents( 'http://localhost.wamp/SII-MVC/vista/listado_empleados.php' ) );
    }
    else
    {
        $dompdf->load_html( file_get_contents( 'http://localhost.wamp/SII-MVC/vista/listado_atletas.php' ) );
    }
    $dompdf->render();
    $dompdf->stream("$a");

?>