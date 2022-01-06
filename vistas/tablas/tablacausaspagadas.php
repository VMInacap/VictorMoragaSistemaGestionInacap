<?php
require_once '../../clases/conexion.php';
$c=new conectar();
$conexion=$c->conexion();
$sql="SELECT causas.id, causas.caratula, causas.rol, causas.ultimo_mov, materias.materia, concat(trabajadores.nombre,' ', trabajadores.apepat,' ' ,trabajadores.apemat) as nombrecompletoT, concat(clientes.nombre,' ', clientes.apepat,' ' ,clientes.apemat) as nombrecompletoC, causas.pago FROM causas"
." INNER JOIN materias ON materias.id=causas.id_materia INNER JOIN trabajadores ON trabajadores.id=causas.id_trabajador INNER JOIN clientes ON clientes.id=causas.id_cliente where causas.pago=0";
$result=  mysqli_query($conexion, $sql);
?>
<table class="table table-hover table-condensed table-bordered" style="text-align: center">
    <caption><label>Causas Pagadas</label></caption>
    <tr>
        <td><b>Caratula</b></td>
        <td><b>Rol</b></td>
        <td><b>Ultimo movimiento</b></td>
        <td><b>Materia</b></td>
        <td><b>Abogado</b></td>
        <td><b>Cliente</b></td>
        <td><b>Estado pago</b></td>               
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
		<td><span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editarCausa" onclick="agregaDatosCausa('<?php echo $tabla[0] ?>')"><span class="glyphicon glyphicon-pencil"></span></span></td>        
    </tr><?php    endwhile;?>
</table>