<?php
/**
 * Clase causas se encarga de agregar, modificar, eliminar y recuperar causas, además de obtener el id para todas las operaciones que lo requieran
 */
class causas{   

	function agregaMateria($datos){
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "Insert into materias (materia)"
                . " values('$datos[0]')";
        return mysqli_query($conexion, $sql);
    }
    /**
     * Agrega una causa a la base de datos
     * @param type $datos Trae los elementos de frmCausas y es convertido en un array datos en el proceso agregaCausa
     * @return type Recibe la información y se ingresa en un string sql como values para después enviar el string a la base de datos
     */
    function agregaCausa($datos){        
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "Insert into causas (caratula,rol,ultimo_mov,id_materia,id_trabajador,id_cliente,pago)"
                . " values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";
        return mysqli_query($conexion, $sql);
    }
    /**
     * Se recibe el id para enviar los datos correspondientes de la causa elegida para modificar
     * @param type $idclient Se obtiene el valor del id de la causa elegida y se usa como condición where
     * @return type Se entrega el resultado de un select usando el idclient para enviar al frmECliente y rellenar sus campos
     */
    public function obtenDatosCliente($idclient) {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "select id,nombre,apepat,apemat,telefono,direccion,email,estado_civil from causas where id='$idclient'";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "id" => $ver[0],
            "nombre" => $ver[1],
            "apepat" => $ver[2],
            "apemat" => $ver[3],
            "telefono" => $ver[4],
            "direccion" => $ver[5],
            "email" => $ver[6],
            "estado_civil" => $ver[7],
        );
        return $datos;
    }
    /**
     * Editar una causa en la base de datos
     * @param type $datos Trae los elementos de frmECausas y es convertido en un array datos en el proceso editaCliente
     * @return type Recibe la información y se ingresa en un string sql para despues enviar el string a la base de datos
     */
    public function editaCliente($datos) {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "update causas set nombre='$datos[1]',apepat='$datos[2]',apemat='$datos[3]',telefono='$datos[4]',direccion='$datos[5]',email='$datos[6]',estado_civil='$datos[7]' where id='$datos[0]'";
        return mysqli_query($conexion, $sql);
    }
    /**
     * Se realiza una eliminacion logica mediante un update
     * @param type $idclient Se obtiene el valor del id de la causas elegida y se usa como condicion where
     * @return type Recibe la información y se ingresa en un string sql para despues enviar el string a la base de datos
     */
    public function eliminaCliente($idclient) {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "delete from causas where id='$idclient'";
        return mysqli_query($conexion, $sql);
    }
    /**
     * Se realiza un update que modifica la columna estado de la causa elegida
     * @param type $idclient Se obtiene el valor del id de la causa elegida y se usa como condicion where
     * @return type Recibe la información y se ingresa en un string sql para despues enviar el string a la base de datos
     */
    public function recuperaCliente($idclient) {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "update causas set estado=1 where id='$idclient'";
        return mysqli_query($conexion, $sql);
    }
}