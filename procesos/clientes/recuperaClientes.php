<?php
/**
 * Recibe el id del cliente seleccionado en la tabla, lo asigna a la variable $idclient y lo envia a 'clases/clientes.php'
 */
require_once '../../clases/conexion.php';
require_once '../../clases/clientes.php';
$obj=new clientes();
$idclient=$_POST['idclient'];
echo $obj->recuperaCliente($idclient);