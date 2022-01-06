<?php
/**
 * Recibe los datos de frmMateria, los traslada a un array $datos y lo envia a 'clases/causas.php'
 */
require_once '../../clases/conexion.php';
require_once '../../clases/causas.php';
$obj=new causas();
$datos=array(    
$_POST['materia']);
echo $obj->agregaMateria($datos);