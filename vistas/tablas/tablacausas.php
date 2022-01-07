<?php
require_once '../../clases/conexion.php';
$c=new conectar();
$conexion=$c->conexion();
$sql="SELECT causas.id, causas.caratula, causas.rol, causas.ultimo_mov, causas.fecha_creacion, materias.materia, concat(trabajadores.nombre,' ', trabajadores.apepat,' ' ,trabajadores.apemat) as nombrecompletoT, concat(clientes.nombre,' ', clientes.apepat,' ' ,clientes.apemat) as nombrecompletoC, causas.pago FROM causas"
." INNER JOIN materias ON materias.id=causas.id_materia INNER JOIN trabajadores ON trabajadores.id=causas.id_trabajador INNER JOIN clientes ON clientes.id=causas.id_cliente where causas.pago=1";
$result=  mysqli_query($conexion, $sql);
?>
<table class="table table-hover table-condensed table-bordered" style="text-align: center">
    <caption><label>Causas</label></caption>
    <tr>
        <td><b>Caratula</b></td>
        <td><b>Rol</b></td>
        <td><b>Ultimo movimiento</b></td>
		<td><b>Fecha de inicio</b></td>
        <td><b>Materia</b></td>
        <td><b>Abogado</b></td>
        <td><b>Cliente</b></td>
        <td><b>Editar</b></td>
        <td><b>Cambiar a pagado</b></td>           
		<td><b>Marcar como finalizada</b></td> 
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
		<td><span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editarCausa" onclick="agregaDatosCausa('<?php echo $tabla[0] ?>')"><span class="glyphicon glyphicon-pencil"></span></span></td>
        <td><span class="btn btn-danger btn-xs" onclick="pagoCausa('<?php echo $tabla[0] ?>')"><span class="glyphicon glyphicon-usd"></span></span></td>
		<td><span class="btn btn-danger btn-xs" onclick="finCausa('<?php echo $tabla[0] ?>')"><span class="glyphicon glyphicon-sunglasses"></span></span></td>
    </tr><?php    endwhile;?>
</table>