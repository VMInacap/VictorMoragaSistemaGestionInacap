<?php 

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title>CAUSAS</title>
            <?php            
            require_once 'menu.php';
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
                <div style="background-color: white; padding-left: 100px; display: block"><h2>Causas</h2><br></div>
                <div class="row">
                    <div class="col-sm-2" style="display: block">
                        <form id="frmCausas">
                            <label>Caratula:</label>
                            <input type="text" class="form-control input-sm" name="caratC" id="caratC"><br>
                            <label>Rol:</label>
                            <input type="text" class="form-control input-sm" name="rolC" id="rolC"><br>
                            <label>Materia:</label>
                            <select class="form-control input-sm" name="materiaC" id="materiaC"><?php
                                while ($row1 = mysqli_fetch_array($rs1)) {
                                    echo "<option value=\"" . $row1['id'] . "\">" . $row1['materia'] . "</option>\n";
                                }
                                ?></select><br>
                            <label>Trabajador:</label>
                            <select class="form-control input-sm" name="trabC" id="trabC"><?php
                                while ($row2 = mysqli_fetch_array($rs2)) {
                                    echo "<option value=\"" . $row2['id'] . "\">" . $row2['nombrecompletoT'] . "</option>\n";
                                }
                                ?></select><br>
                            <label>Cliente:</label>
                            <select class="form-control input-sm" name="clienteC" id="clienteC"><?php
                                while ($row3 = mysqli_fetch_array($rs3)) {
                                    echo "<option value=\"" . $row3['id'] . "\">" . $row3['nombrecompletoC'] . "</option>\n";
                                }
                                ?></select><br>
                            <p></p>
							<div style="text-align: center">
                            <span class="btn btn-primary" id="btnAgregaCausa">Agregar</span>							
                                <span class="btn btn-info" data-toggle="modal" data-target="#agregarmateria"  id="btnMateria">Materia</span>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-10">
                        <div id="tablaCausasLoad"></div>
                    </div>
                </div>
            </div>
			            <!-- Modal materia -->
            <div class="modal fade" id="agregarmateria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-body" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Agregar Materia</h4>
                        </div>
                        <div class="modal-body">
                            <form id='frmMateria'>
                                <label>Materia:</label>
                                <input type="text" class="form-control input-sm" name="materia" id="materia">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" id='btnagregarMateria' data-dismiss="modal">Agregar Materia</button>                            
                        </div>
                    </div>
                </div>
            </div>
			<!-- Modal editar -->
            <div class="modal fade" id="editarCausa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar causas</h4>
                        </div>
                        <div class="modal-body">
                            <form id='frmECausas'>
                                <input type="text" hidden="" id='idCausa' name="idCausa">
                                <label>Caratula:</label>
                                <input type="text" class="form-control input-sm" name="editarcarat" id="editarcarat">
                                <label>Rol:</label>
                                <input type="text" class="form-control input-sm" name="editarrol" id="editarrol">
                                <label>Materia:</label>
                                <select class="form-control input-sm" name="editarmateria" id="editarmateria"><?php
								$sql4 = "select id,materia from materias";
								$rs4 = mysqli_query($conexion, $sql4);
                                while ($row1 = mysqli_fetch_array($rs4)) {
                                    echo "<option value=\"" . $row1['id'] . "\">" . $row1['materia'] . "</option>\n";
                                }
                                ?></select> 
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
                            <button type="button" class="btn btn-warning" id='btnEditarCausa' data-dismiss="modal">Editar</button>                            
                        </div>
                    </div>
                </div>
            </div>    
    </body>        
</html>
<script>
        function agregaDatosCausa(idcausa) {
            $.ajax({
                type: "POST", data: "idcau=" + idcausa, url: "../procesos/causas/obtenDatosCausa.php", success: function (r) {
                    dato = jQuery.parseJSON(r);
                    $('#idCausa').val(dato['id']);
                    $('#editarcarat').val(dato['caratula']);
                    $('#editarrol').val(dato['rol']);
                    $('#editarmateria').val(dato['id_materia']);
                    $('#editartrabaj').val(dato['id_trabajador']);
                    $('#editarcliente').val(dato['id_cliente']);
                }
            });
            }
    </script>
    <script>
            function pagoCausa(idCausa){
            alertify.confirm('¿Desea marcar esta causa como pagada?', function () {
                $.ajax({
                type:"POST", data:"idcau=" + idCausa, url:"../procesos/causas/pagoCausas.php", success:function (r) {                    
                    if (r == 1) {                        
                        $('#tablaCausasLoad').load('tablas/tablaCausas.php');
                        alertify.success("Causa marcada como pagada exitosamente");
                    } else {
                        alertify.error("Error");
                    }
                    }
                });
            });
        }
    </script>
	    <script>
            function finCausa(idCausa){
            alertify.confirm('¿Desea marcar esta causa como finalizada?', function () {
                $.ajax({
                type:"POST", data:"idcau=" + idCausa, url:"../procesos/causas/finCausas.php", success:function (r) {                    
                    if (r == 1) {                        
                        $('#tablaCausasLoad').load('tablas/tablaCausas.php');
                        alertify.success("Causa marcada como pagada exitosamente");
                    } else {
                        alertify.error("Error");
                    }
                    }
                });
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#btnEditarCausa').click(function () {
                datos = $('#frmECausas').serialize();
                $.ajax({
                    type: "POST", data: datos, url: "../procesos/causas/editaCausas.php", success: function (r) {
                        if (r == 1) {                            
                            $('#tablaCausasLoad').load('tablas/tablaCausas.php');
                            alertify.success("Causa modificada exitosamente");
                        } else {
                            alertify.error("Error al modificar");
                        }
                    }
                });
            });
        });
    </script>    
<script>
        $('#btnagregarMateria').click(function () {//Que boton es presionado
            vacios = validarFormVacio('frmMateria');
            if (vacios > 0) {
                alertify.alert("Debes llenar todos los campos");
                return false;
            }
            datos = $('#frmMateria').serialize();//De donde saca los datos
            $.ajax({
                type: "POST", data: datos, url: "../procesos/causas/creaMateria.php", success: function (r) {
                    if (r == 1) {
                        history.go();
                    } else {
                        alertify.error("Error al agregar materia");
                    }
                }
            });
        });
    </script>     
<script type="text/javascript">
        $(document).ready(function () {
            $('#tablaCausasLoad').load('tablas/tablaCausas.php');
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
                            $('#tablaCausasLoad').load('tablas/tablaCausas.php');
                            alertify.success("Causa agregada con exito");
                        } else {
                            alertify.error("Error al agregar causa");
                        }
                    }
                });
            });
        });

</script>