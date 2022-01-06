<?php
/**
 * Recibe los datos de frmECausas, los traslada a un array $datos y lo envia a 'clases/causas.php'
 */
require_once '../../clases/conexion.php';
require_once '../../clases/causas.php';
$obj=new causas();
$fecha=date("Y-m-d");
$datos=array(
    $_POST['idCausa'],
    $_POST['editarcarat'],
    $_POST['editarrol'],
	$fecha,
    $_POST['editarmateria'],
    $_POST['editartrabaj'],
    $_POST['editarcliente'] 
);
echo $obj->editaCausa($datos);