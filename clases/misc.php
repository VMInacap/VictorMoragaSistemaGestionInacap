<?php
class misc{   

    function agregaMisc($datos){        
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "Insert into misc (ultimo_mov, tarea, observaciones, id_trabajadorb,id_clienteb)"
                . " values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')";
        return mysqli_query($conexion, $sql);
    }

    public function obtenDatosMisc($idmisc) {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "select id,tarea, observaciones, id_trabajadorb,id_clienteb from misc where id='$idmisc'";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "id" => $ver[0],
            "tarea" => $ver[1],
            "observaciones" => $ver[2],
            "id_trabajadorb" => $ver[3],
            "id_clienteb" => $ver[4]
        );
        return $datos;
    }

    public function editaMisc($datos) {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "update misc set ultimo_mov='$datos[1]',tarea='$datos[2]',observaciones='$datos[3]',id_trabajadorb='$datos[4]',id_clienteb='$datos[5]' where id='$datos[0]'";
        return mysqli_query($conexion, $sql);
    }

}