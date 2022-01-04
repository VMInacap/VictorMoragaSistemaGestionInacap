<?php 

?>
<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title>PERFIL</title>
            <?php            
            require_once 'menu.php';
            require_once 'barralateral.php';
            require_once '../clases/conexion.php';
            $c = new conectar();
            $conexion = $c->conexion();
            $sql4="SELECT trabajadores.id, trabajadores.nombre, trabajadores.apepat, trabajadores.apemat, trabajadores.RUN, trabajadores.telefono, trabajadores.direccion, trabajadores.usuario, roles.rol, cargos.cargo, locales.nombre_local FROM trabajadores INNER JOIN roles ON trabajadores.id_rol=roles.id INNER JOIN cargos ON trabajadores.id_cargo=cargos.id INNER JOIN locales ON trabajadores.id_local=locales.id WHERE trabajadores.estado=1";
            $result=  mysqli_query($conexion, $sql4);
            ?>
        </head>
        <body>            
            <div class="container">
                <div style="padding-left: 100px"><h2>Mi cuenta</h2><br></div>
                <div class="row">
                    <div class="col-sm-1">
                        
                    </div>            
            </div>
            <br>
            <div class="container" style="padding-left: 100px">
                <?php 
    while($tabla=  mysqli_fetch_row($result)):
    ?>
                <div class="row"> 

                    <div class="col-sm-4"><h3>Nombre:</h3>
                        <div class="bg-info"><h4><?php echo $tabla[1] ?> <?php echo $tabla[2] ?> <?php echo $tabla[3] ?></h4></div></div>
                    <div class="col-sm-4"><h3>RUT:</h3>
                        <div class="bg-info"><h4><?php echo $tabla[4] ?></h4></div></div>
                        <div class="col-sm-4"><h3>Telefono:</h3>
                        <div class="bg-info"><h4><?php echo $tabla[5] ?></h4></div></div>
                        <div class="col-sm-4"><h3>Dirección:</h3>
                        <div class="bg-info"><h4><?php echo $tabla[6] ?></h4></div></div>
                        <div class="col-sm-4"><h3>Cargo:</h3>
                        <div class="bg-info"><h4><?php echo $tabla[9] ?></h4></div></div>
                        <div class="col-sm-4"><h3>Local:</h3>
                        <div class="bg-info"><h4><?php echo $tabla[10] ?></h4></div></div>
                    </div>
                <?php    endwhile;?>
            </div>
    </body>        
</html>     
