<?php
require_once '../../clases/conexion.php';
require_once '../../clases/misc.php';
$obj=new misc();
$fecha=date("Y-m-d");
$datos=array(    
$fecha,
$_POST['tareaM'],
$_POST['obsM'],
$_POST['trabM'],
$_POST['clienteM']);
echo $obj->agregaMisc($datos);