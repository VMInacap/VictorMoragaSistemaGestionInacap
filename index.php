<!DOCTYPE html>
<html>
<head>
	<title>OJEDA Y ASOCIADOS</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body style="background-color: gray">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Inicio de Sesión</div>
					<div class="panel panel-body">
						<center><p>
							<img src="img/login.png" weight="100" height="100">
						</p></center>
						<form id="frmLogin">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario" placeholder="Usuario">
							<label>Contraseña</label>
							<input type="password" class="form-control input-sm" name="pass" id="pass" placeholder="Contraseña">
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>							
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#entrarSistema').click(function(){


	vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos");
				return false;
			}

datos=$('#frmLogin').serialize();
			$.ajax({
				type:"POST", 
				data:datos,
				url:"procesos/pagInicio/loginUsuario.php",
				success:function(r){
					

					if (r==1) {
						window.location="vistas/inicio.php";
					}else{
						alert("No se pudo acceder");						
					}
			}
		});
	});
});

</script>