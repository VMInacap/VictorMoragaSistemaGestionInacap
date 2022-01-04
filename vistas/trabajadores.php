<?php 

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title>TRABAJADORES</title>
            <?php            
            require_once 'menu.php';
            require_once 'barralateral.php';
            require_once '../clases/conexion.php';
            $c = new conectar();
            $conexion = $c->conexion();
            $sql = "select id,rol from roles";
            $rs = mysqli_query($conexion, $sql);
            $sql2="select id,cargo from cargos";
            $rs2=mysqli_query($conexion,$sql2);
            $sql3="select id,nombre_local from locales";
            $rs3=mysqli_query($conexion,$sql3);
            ?>
        </head>
        <body>
            <br>
            <div class="container">
                <div style="padding-left: 100px"><h2>Trabajadores</h2><br></div>
                <div class="row">
                    <div class="col-sm-1">
                        
                    </div>
                    <div class="col-sm-10">
                        <div id="tablaTrabajadoresLoad"></div>
                    </div>
                </div>
            </div>
    </body>        
</html>     
<script type="text/javascript">
        $(document).ready(function () {
            $('#tablaTrabajadoresLoad').load('tablas/tablaTrabajadores.php');
            $('#btnAgregaTrabajador').click(function () {//Que boton es presionado
                vacios = validarFormVacio('frmTrabajadores');
                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos");
                    return false;
                }
                datos = $('#frmTrabajadores').serialize();//De donde saca los datos
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/trabajadores/creaTrabajador.php",
                    success: function (r) {
                        if (r == 1) {
                            $('#frmTrabajadores')[0].reset();//Permite limpiar el formulario al insertar
                            $('#tablaTrabajadoresLoad').load('tablas/tablaTrabajadores.php');
                            alertify.success("Trabajador agregado con exito");
                        } else {
                            alertify.error("Error al agregar trabajador");
                        }
                    }
                });
            });
        });

</script>