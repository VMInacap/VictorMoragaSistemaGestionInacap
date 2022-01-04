<?php 

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title>TRABAJADORES</title>
            <?php            
            require_once 'menu.php';
            require_once '../clases/conexion.php';
            $c = new conectar();
            $conexion = $c->conexion();
            $sql4="SELECT trabajadores.id, trabajadores.nombre, trabajadores.apepat, trabajadores.apemat, trabajadores.RUN, trabajadores.telefono, trabajadores.direccion, trabajadores.usuario, roles.rol, cargos.cargo, locales.nombre_local FROM trabajadores INNER JOIN roles ON trabajadores.id_rol=roles.id INNER JOIN cargos ON trabajadores.id_cargo=cargos.id INNER JOIN locales ON trabajadores.id_local=locales.id WHERE trabajadores.estado=1";
            $result=  mysqli_query($conexion, $sql4);
            ?>
        </head>
        <body>
            <br>
            <div class="container">
                <h2>Trabajadores</h2><br>
                <div class="row">
                    
                    <div class="col-sm-10">
                        <div id=""><table class="table table-hover table-condensed table-bordered" style="text-align: center">
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
        <td><b>Cargo</b></td>
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
        <td><?php echo $tabla[10] ?></td>
    </tr><?php    endwhile;?>
</table></div>
                    </div>
                </div>
            </div>
    </body>        
</html>     
