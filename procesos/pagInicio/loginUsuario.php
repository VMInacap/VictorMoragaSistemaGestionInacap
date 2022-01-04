<?php
	session_start();
	require_once "../../clases/conexion.php";
	require_once "../../clases/trabajadores.php";

	$obj=new trabajadores();

	$datos=array(
		$_POST['usuario'],
		$_POST['pass']
	);

	echo $obj->loginUser($datos);

?>