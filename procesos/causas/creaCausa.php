<?php
/**
 * Recibe los datos de frmCausas, los traslada a un array $datos y lo envia a 'clases/causas.php'
 */
require_once '../../clases/conexion.php';
require_once '../../clases/causas.php';
$obj=new causas();
$fecha=date("Y-m-d");
$fecha2=date("Y-m-d");
$fecha3=date("Y-m-d");
$pago=1;
$datos=array(    
$_POST['caratC'],
$_POST['rolC'],
$fecha,
$fecha2,
$fecha3,
$_POST['materiaC'],
$_POST['trabC'],
$_POST['clienteC'],
$pago);
echo $obj->agregaCausa($datos);