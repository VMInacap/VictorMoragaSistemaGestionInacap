<?php
/**
 * Recibe los datos de frmEClientes, los traslada a un array $datos y lo envia a 'clases/clientes.php'
 */
require_once '../../clases/conexion.php';
require_once '../../clases/clientes.php';
$obj=new clientes();

$datos=array(
    $_POST['idCliente'],
    $_POST['editarnombreC'],
    $_POST['editarapepatC'],
    $_POST['editarapematC'],
    $_POST['editartelefonoC'],
    $_POST['editardireccionC'],
    $_POST['editaremailC'],
    $_POST['editarestcivC']  
);
echo $obj->editaCliente($datos);