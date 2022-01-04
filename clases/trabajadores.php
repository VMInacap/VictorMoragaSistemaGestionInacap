<?php
class trabajadores{
public function loginUser($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			$contrasena=md5($datos[1]);

			$_SESSION['usuario']=$datos[0];
			$_SESSION['id']=self::traeID($datos);

			$sql="SELECT * from trabajadores where usuario = '$datos[0]' and contrasena = '$contrasena'"; 
			$result=mysqli_query($conexion,$sql);

			if (mysqli_num_rows($result) > 0) {
				return 1;
			}else{
				return 0;
				
			}
		}

		public function traeID($datos){
					$c=new conectar();
			$conexion=$c->conexion();
			$contrasena=md5($datos[1]);

			$sql="SELECT id 
					from trabajadores 
					where usuario='$datos[0]'
					and contrasena='$contrasena'"; 
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}
	}
?>