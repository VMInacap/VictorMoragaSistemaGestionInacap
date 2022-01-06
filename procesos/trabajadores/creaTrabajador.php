<?php
/**
 * Recibe los datos de frmClientes, los traslada a un array $datos y lo envia a 'clases/clientes.php'
 */
require_once '../../clases/conexion.php';
require_once '../../clases/clientes.php';
$obj=new clientes();
$datos=array(    
$_POST['nombreC'],
$_POST['apepatC'],
$_POST['apematC'],
$_POST['RUNC'],
$_POST['telefonoC'],
$_POST['direccionC'],
$_POST['emailC'],
$_POST['estcivC']);
echo $obj->agregaCliente($datos);