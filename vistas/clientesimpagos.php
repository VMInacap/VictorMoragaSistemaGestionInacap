<?php 

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title>CLIENTES</title>
            <?php            
            require_once 'menu.php';            
			require_once 'barralateral.php'; 
            require_once '../clases/conexion.php';
            $c = new conectar();
            $conexion = $c->conexion();
            ?>
        </head>
        <body>
            <br>
            <div class="container">
                <div style="background-color: white; padding-left: 100px; display: block"><h2>Clientes Morosos</h2><br></div>
                <div class="row">
                    <div class="col-sm-1" style="display: block">
                    </div>
                    <div class="col-sm-10">
                        <div id="tablaClientesILoad"></div>
                    </div>
                </div>
            </div>
                        <!-- Modal editar -->
            <div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar clientes</h4>
                        </div>
                        <div class="modal-body">
                            <form id='frmEClientes'>
                                <input type="text" hidden="" id='idCliente' name="idCliente">
                                <label>Nombre:</label>
                                <input type="text" class="form-control input-sm" name="editarnombreC" id="editarnombreC">
                                <label>Apellido paterno:</label>
                                <input type="text" class="form-control input-sm" name="editarapepatC" id="editarapepatC">
                                <label>Apellido materno:</label>
                                <input type="text" class="form-control input-sm" name="editarapematC" id="editarapematC">
                                <label>Telefono:</label>
                                <input type="text" class="form-control input-sm" name="editartelefonoC" id="editartelefonoC">  
                                <label>Direcciòn:</label>
                                <input type="text" class="form-control input-sm" name="editardireccionC" id="editardireccionC">
                                <label>Correo:</label>
                                <input type="text" class="form-control input-sm" name="editaremailC" id="editaremailC">
                                <label>Estado civil:</label>
                                <input type="text" class="form-control input-sm" name="editarestcivC" id="editarestcivC">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" id='btnEditarCliente' data-dismiss="modal">Editar</button>                            
                        </div>
                    </div>
                </div>
            </div>
    </body>        
</html>
<script>
        function agregaDatosCliente(idcliente) {
            $.ajax({
                type: "POST", data: "idclient=" + idcliente, url: "../procesos/clientes/obtenDatosCliente.php", success: function (r) {
                    dato = jQuery.parseJSON(r);
                    $('#idCliente').val(dato['id']);
                    $('#editarnombreC').val(dato['nombre']);
                    $('#editarapepatC').val(dato['apepat']);
                    $('#editarapematC').val(dato['apemat']);
                    $('#editartelefonoC').val(dato['telefono']);
                    $('#editardireccionC').val(dato['direccion']);
                    $('#editaremailC').val(dato['email']);
                    $('#editarestcivC').val(dato['estado_civil']);
                }
            });
            }
    </script>
    <script>
        $(document).ready(function () {
            $('#btnEditarCliente').click(function () {
                datos = $('#frmEClientes').serialize();
                $.ajax({
                    type: "POST", data: datos, url: "../procesos/clientes/editaClientes.php", success: function (r) {
                        if (r == 1) {                            
                            $('#tablaClientesILoad').load('tablas/tablaclientesimp.php');
                            alertify.success("Cliente modificado exitosamente");
                        } else {
                            alertify.error("Error al modificar");
                        }
                    }
                });
            });
        });
    </script>     
<script type="text/javascript">
        $(document).ready(function () {
            $('#tablaClientesILoad').load('tablas/tablaclientesimp.php');
            $('#btnAgregaCliente').click(function () {//Que boton es presionado
                vacios = validarFormVacio('frmClientes');
                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos");
                    return false;
                }
                datos = $('#frmClientes').serialize();//De donde saca los datos
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/clientes/creaCliente.php",
                    success: function (r) {
                        if (r == 1) {
                            $('#frmClientes')[0].reset();//Permite limpiar el formulario al insertar
                            $('#tablaClientesILoad').load('tablas/tablaclientesimp.php');
                            alertify.success("Cliente agregado con exito");
                        } else {
                            alertify.error("Error al agregar cliente");
                        }
                    }
                });
            });
        });
</script>