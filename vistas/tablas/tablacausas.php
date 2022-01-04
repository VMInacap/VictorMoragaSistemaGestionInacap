<?php
/**
 * Tabla que visualiza los usuarios que esten activos en el sistema y su rol asignado
 */
require_once '../../clases/conexion.php';
$c=new conectar();
$conexion=$c->conexion();
$sql="SELECT causas.id, causas.caratula, causas.rol, causas.ultimo_mov, causas.materia, causas.id_trabajador, causas.id_cliente, causas.pago FROM causas";
$result=  mysqli_query($conexion, $sql);
?>
<table class="table table-hover table-condensed table-bordered" style="text-align: center">
    <caption><label>Causas</label></caption>
    <tr>
        <td><b>Caratula</b></td>
        <td><b>Rol</b></td>
        <td><b>Ultimo movimiento</b></td>
        <td><b>Materia</b></td>
        <td><b>Trabajador asignado</b></td>
        <td><b>Cliente</b></td>
        <td><b>Estado pago</b></td>             
    </tr>
    </b>
    <?php 
    while($tabla=  mysqli_fetch_row($result)):
    ?>
    <tr>
        <td><?php echo $tabla[1] ?></td>
        <td><?php echo $tabla[2] ?></td>
        <td><?php echo $tabla[3] ?></td>
        <td><?php echo $tabla[4] ?></td>
        <td><?php echo $tabla[5] ?></td>
        <td><?php echo $tabla[6] ?></td>
        <td><?php echo $tabla[7] ?></td>
    </tr><?php    endwhile;?>
</table>