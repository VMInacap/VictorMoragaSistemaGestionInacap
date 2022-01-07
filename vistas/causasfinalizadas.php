<?php 

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title>CAUSAS</title>
            <?php            
            require_once 'menu.php';
			require_once 'barralateral.php'; 
            require_once '../clases/conexion.php';
            $c = new conectar();
            $conexion = $c->conexion();
            $sql1 = "select id,materia from materias";
            $rs1 = mysqli_query($conexion, $sql1);
			$sql2 = "select id,concat(nombre,' ', apepat,' ' ,apemat) as nombrecompletoT from trabajadores where estado=1";
            $rs2 = mysqli_query($conexion, $sql2);
            $sql3 = "select id,concat(nombre,' ', apepat,' ' ,apemat) as nombrecompletoC from clientes";
            $rs3 = mysqli_query($conexion, $sql3);
            ?>
        </head>
        <body>
            <br>
            <div class="container">
                <div style="background-color: white; padding-left: 100px; display: block"><h2>Causas Finalizadas</h2><br></div>
                <div class="row">      
					<div class="col-sm-1" style="display: block"></div>
                    <div class="col-sm-10">
                        <div id="tablaCausasfinLoad"></div>
                    </div>
                </div>
            </div>   
    </body>        
</html>       
<script type="text/javascript">
        $(document).ready(function () {
            $('#tablaCausasfinLoad').load('tablas/tablacausasterminadas.php');
            $('#btnAgregaCausa').click(function () {//Que boton es presionado
                vacios = validarFormVacio('frmCausas');
                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos");
                    return false;
                }
                datos = $('#frmCausas').serialize();//De donde saca los datos
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/causas/creaCausa.php",
                    success: function (r) {
                        if (r == 1) {
                            $('#frmCausas')[0].reset();//Permite limpiar el formulario al insertar
                            $('#tablaCausasfinLoad').load('tablas/tablacausasterminadas.php');
                            alertify.success("Causa agregada con exito");
                        } else {
                            alertify.error("Error al agregar causa");
                        }
                    }
                });
            });
        });

</script>