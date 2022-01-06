<?php 

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title>MISCELANEOS</title>
            <?php            
            require_once 'menu.php';
            require_once '../clases/conexion.php';
            $c = new conectar();
            $conexion = $c->conexion();
			$sql2 = "select id,concat(nombre,' ', apepat,' ' ,apemat) as nombrecompletoT from trabajadores where estado=1";
            $rs2 = mysqli_query($conexion, $sql2);
            $sql3 = "select id,concat(nombre,' ', apepat,' ' ,apemat) as nombrecompletoC from clientes";
            $rs3 = mysqli_query($conexion, $sql3);
            ?>
        </head>
        <body>
            <br>
            <div class="container">
                <div style="background-color: white; padding-left: 100px; display: block"><h2>Miscelaneos</h2><br></div>
                <div class="row">
                    <div class="col-sm-2" style="display: block">
                        <form id="frmMisc">
                            <label>Tarea:</label>
                            <input type="text" class="form-control input-sm" name="tareaM" id="tareaM"><br>
                            <label>Observaciones:</label>
                            <textarea class="form-control input-sm" name="obsM" id="obsM"></textarea><br>                            
                            <label>Trabajador:</label>
                            <select class="form-control input-sm" name="trabM" id="trabM"><?php
                                while ($row2 = mysqli_fetch_array($rs2)) {
                                    echo "<option value=\"" . $row2['id'] . "\">" . $row2['nombrecompletoT'] . "</option>\n";
                                }
                                ?></select><br>
                            <label>Cliente:</label>
                            <select class="form-control input-sm" name="clienteM" id="clienteM"><?php
                                while ($row3 = mysqli_fetch_array($rs3)) {
                                    echo "<option value=\"" . $row3['id'] . "\">" . $row3['nombrecompletoC'] . "</option>\n";
                                }
                                ?></select><br>
                            <p></p>
							<div style="text-align: center">
                            <span class="btn btn-primary" id="btnAgregaMisc">Agregar</span>							                                
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-10">
                        <div id="tablaMiscLoad"></div>
                    </div>
                </div>
            </div>			
			<!-- Modal editar -->
            <div class="modal fade" id="editarMisc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Misc</h4>
                        </div>
                        <div class="modal-body">
                            <form id='frmEMisc'>
                                <input type="text" hidden="" id='idMisc' name="idMisc">
                                <label>Tarea:</label>
                                <input type="text" class="form-control input-sm" name="editartarea" id="editartarea">
                                <label>Observaciones:</label>
                                <input type="text" class="form-control input-sm" name="editarobs" id="editarobs">                                
                                <label>Trabajador:</label>
                                <select class="form-control input-sm" name="editartrabaj" id="editartrabaj"><?php
								$sql5 = "select id,concat(nombre,' ', apepat,' ' ,apemat) as nombrecompletoT from trabajadores";
								$rs5 = mysqli_query($conexion, $sql5);
                                while ($row2 = mysqli_fetch_array($rs5)) {
                                    echo "<option value=\"" . $row2['id'] . "\">" . $row2['nombrecompletoT'] . "</option>\n";
                                }
                                ?></select> 
                                <label>Cliente:</label>
                                <select class="form-control input-sm" name="editarcliente" id="editarcliente"><?php
								$sql6 = "select id,concat(nombre,' ', apepat,' ' ,apemat) as nombrecompletoC from clientes";
								$rs6 = mysqli_query($conexion, $sql6);
                                while ($row3 = mysqli_fetch_array($rs6)) {
                                    echo "<option value=\"" . $row3['id'] . "\">" . $row3['nombrecompletoC'] . "</option>\n";
                                }
                                ?></select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" id='btnEditarMisc' data-dismiss="modal">Editar</button>                            
                        </div>
                    </div>
                </div>
            </div>    
    </body>        
</html>
<script>
        function agregaDatosMisc(idmisc) {
            $.ajax({
                type: "POST", data: "idm=" + idmisc, url: "../procesos/misc/obtenDatosMisc.php", success: function (r) {
                    dato = jQuery.parseJSON(r);
                    $('#idMisc').val(dato['id']);
                    $('#editartarea').val(dato['tarea']);
                    $('#editarobs').val(dato['observaciones']);                    
                    $('#editartrabaj').val(dato['id_trabajadorb']);
                    $('#editarcliente').val(dato['id_clienteb']);
                }
            });
            }
    </script>    
    <script>
        $(document).ready(function () {
            $('#btnEditarMisc').click(function () {
                datos = $('#frmEMisc').serialize();
                $.ajax({
                    type: "POST", data: datos, url: "../procesos/misc/editaMiscs.php", success: function (r) {
                        if (r == 1) {                            
                            $('#tablaMiscLoad').load('tablas/tablaMisc.php');
                            alertify.success("Misc modificada exitosamente");
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
            $('#tablaMiscLoad').load('tablas/tablaMisc.php');
            $('#btnAgregaMisc').click(function () {//Que boton es presionado
                vacios = validarFormVacio('frmMisc');
                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos");
                    return false;
                }
                datos = $('#frmMisc').serialize();//De donde saca los datos
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/misc/creaMisc.php",
                    success: function (r) {
                        if (r == 1) {
                            $('#frmMisc')[0].reset();//Permite limpiar el formulario al insertar
                            $('#tablaMiscLoad').load('tablas/tablaMisc.php');
                            alertify.success("Misc agregada con exito");
                        } else {
                            alertify.error("Error al agregar Misc");
                        }
                    }
                });
            });
        });

</script>