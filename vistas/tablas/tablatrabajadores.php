<?php
/**
 * Tabla que visualiza los usuarios que esten activos en el sistema y su rol asignado
 */
require_once '../../clases/conexion.php';
$c=new conectar();
$conexion=$c->conexion();
$sql="SELECT trabajadores.id, trabajadores.nombre, trabajadores.apepat, trabajadores.apemat, trabajadores.RUN, trabajadores.telefono, trabajadores.direccion, trabajadores.usuario, roles.rol, locales.nombre_local FROM trabajadores INNER JOIN roles ON trabajadores.id_rol=roles.id INNER JOIN locales ON trabajadores.id_local=locales.id WHERE trabajadores.estado=1";
$result=  mysqli_query($conexion, $sql);
?>
<table class="table table-hover table-condensed table-bordered" style="text-align: center">
    <caption><label>Trabajadores</label></caption>
    <tr>
        <td><b>Nombre</b></td>
        <td><b>Apellido paterno</b></td>
        <td><b>Apellido materno</b></td>
        <td><b>RUN</b></td>
        <td><b>Telefono</b></td>
        <td><b>Direccion</b></td>
        <td><b>Usuario</b></td>      
        <td><b>Rol</b></td>         
        <td><b>Local</b></td>                
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
        <td><?php echo $tabla[8] ?></td>
        <td><?php echo $tabla[9] ?></td>
    </tr><?php    endwhile;?>
</table>