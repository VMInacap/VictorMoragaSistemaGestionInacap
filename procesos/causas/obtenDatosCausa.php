<?php
/**
 * Recibe el id de la causa seleccionada en la tabla, lo asigna a la variable $idcausa y lo envia a 'clases/causas.php' para poder recibir los datos correspondientes a la id
 */
require_once '../../clases/conexion.php';
require_once '../../clases/causas.php';
$obj=new causas();
$idcausa=$_POST['idcau'];

echo json_encode($obj->obtenDatosCausa($idcausa));