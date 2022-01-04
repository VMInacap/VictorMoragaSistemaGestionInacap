<?php 

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title>CLIENTES</title>
            <?php            
            require_once 'menu.php';            
            require_once '../clases/conexion.php';
            $c = new conectar();
            $conexion = $c->conexion();
            ?>
        </head>
        <body>
            <br>
            <div class="container">
                <div style="background-color: white; padding-left: 100px; display: block"><h2>Clientes</h2><br></div>
                <div class="row">
                    <div class="col-sm-2" style="display: block">
                        <form id="frmClientes">
                            <label>Nombre:</label>
                            <input type="text" class="form-control input-sm" name="nombreT" id="nombreT"><br>
                            <label>Apellido paterno:</label>
                            <input type="text" class="form-control input-sm" name="apepatT" id="apepatT"><br>
                            <label>Apellido materno:</label>
                            <input type="text" class="form-control input-sm" name="apematT" id="apematT"><br>
                            <label>RUN:</label>
                            <input type="text" class="form-control input-sm" name="RUNT" id="RUNT" placeholder="xxxxxxxx-x"><br>
                            <label>Telefono:</label>
                            <input type="text" class="form-control input-sm" name="telefonoT" id="telefonoT"><br>
                            <label>Direccion:</label>
                            <input type="text" class="form-control input-sm" name="direccionT" id="direccionT"><br>
                            <label>Correo:</label>
                            <input type="text" class="form-control input-sm" name="emailT" id="emailT" placeholder="xxxxxx@hotmail.com"><br>
                            <label>Estado civil:</label>
                            <input type="text" class="form-control input-sm" name="contrasenaT" id="contrasenaT"><br>
                            <p></p>
                            <span class="btn btn-primary" id="btnAgregaTrabajador">Agregar</span>
                        </form>
                    </div>
                    <div class="col-sm-10">
                        <div id="tablaClientesLoad"></div>
                    </div>
                </div>
            </div>
    </body>        
</html>     
<script type="text/javascript">
        $(document).ready(function () {
            $('#tablaClientesLoad').load('tablas/tablaClientes.php');
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