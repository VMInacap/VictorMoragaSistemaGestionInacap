<?php
require_once '../../clases/conexion.php';
$c=new conectar();
$conexion=$c->conexion();
$sql="SELECT misc.id, misc.ultimo_mov, misc.tarea, misc.observaciones, concat(trabajadores.nombre,' ', trabajadores.apepat,' ' ,trabajadores.apemat) as nombrecompletoT, concat(clientes.nombre,' ', clientes.apepat,' ' ,clientes.apemat) as nombrecompletoC FROM misc"
." INNER JOIN trabajadores ON trabajadores.id=misc.id_trabajadorb INNER JOIN clientes ON clientes.id=misc.id_clienteb";
$result=  mysqli_query($conexion, $sql);
?>
<table class="table table-hover table-condensed table-bordered" style="text-align: center">
    <caption><label>Causas</label></caption>
    <tr>
        <td><b>Ultimo movimiento</b></td>
        <td><b>Tarea</b></td>
		<td><b>Observaciones</b></td> 
        <td><b>Trabajador</b></td>
        <td><b>Cliente</b></td>                     
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
		<td><span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editarMisc" onclick="agregaDatosMisc('<?php echo $tabla[0] ?>')"><span class="glyphicon glyphicon-pencil"></span></span></td>        
    </tr><?php    endwhile;?>
</table>