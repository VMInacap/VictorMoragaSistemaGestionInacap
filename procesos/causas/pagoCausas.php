<?php
/**
 * Recibe el id seleccionado en la tabla, lo asigna a la variable $idcau y lo envia a 'clases/causas.php'
 */
require_once '../../clases/conexion.php';
require_once '../../clases/causas.php';
$obj=new causas();
$idcau=$_POST['idcau'];
echo $obj->pagoCausa($idcau);