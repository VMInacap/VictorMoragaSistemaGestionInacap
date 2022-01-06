<?php
require_once '../../clases/conexion.php';
require_once '../../clases/misc.php';
$obj=new misc();
$fecha=date("Y-m-d");
$datos=array(    
	$_POST['idMisc'],
	$fecha,
    $_POST['editartarea'],
    $_POST['editarobs'],
    $_POST['editartrabaj'],
    $_POST['editarcliente'] 
);
echo $obj->editaMisc($datos);