<?php
require_once '../../clases/conexion.php';
$c=new conectar();
$conexion=$c->conexion();
$sql="SELECT clientes.id, clientes.nombre, clientes.apepat, clientes.apemat, clientes.RUN, clientes.telefono, clientes.direccion, clientes.email, clientes.estado_civil, causas.pago FROM clientes"
." INNER JOIN causas ON clientes.id=causas.id_cliente WHERE causas.pago=1";
$result=  mysqli_query($conexion, $sql);
?>
<table class="table table-hover table-condensed table-bordered" style="text-align: center">
    <caption><label>Clientes</label></caption>
    <tr>
        <td><b>Nombre</b></td>
        <td><b>Apellido paterno</b></td>
        <td><b>Apellido materno</b></td>
        <td><b>RUN</b></td>
        <td><b>Telefono</b></td>
        <td><b>Direccion</b></td>
        <td><b>Correo</b></td>      
        <td><b>Estado civil</b></td>               
        <td><b>Editar</b></td>        
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
        <td><span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editarCliente" onclick="agregaDatosCliente('<?php echo $tabla[0] ?>')"><span class="glyphicon glyphicon-pencil"></span></span></td>        
    </tr><?php    endwhile;?>
</table>