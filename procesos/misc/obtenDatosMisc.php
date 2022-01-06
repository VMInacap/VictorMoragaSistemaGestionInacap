<?php
require_once '../../clases/conexion.php';
require_once '../../clases/misc.php';
$obj=new misc();
$idmisc=$_POST['idm'];

echo json_encode($obj->obtenDatosMisc($idmisc));