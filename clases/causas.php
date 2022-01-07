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
        $sql = "Insert into causas (caratula,rol,ultimo_mov,fecha_creacion,fecha_termino,id_materia,id_trabajador,id_cliente,pago)"
                . " values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]')";
        return mysqli_query($conexion, $sql);		
    }
    /**
     * Se recibe el id para enviar los datos correspondientes de la causa elegida para modificar
     * @param type $idclient Se obtiene el valor del id de la causa elegida y se usa como condición where
     * @return type Se entrega el resultado de un select usando el idclient para enviar al frmECliente y rellenar sus campos
     */
    public function obtenDatosCausa($idcausa) {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "select id,caratula,rol,id_materia,id_trabajador,id_cliente from causas where id='$idcausa'";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "id" => $ver[0],
            "caratula" => $ver[1],
            "rol" => $ver[2],
            "id_materia" => $ver[3],
            "id_trabajador" => $ver[4],
            "id_cliente" => $ver[5]
        );
        return $datos;
    }
    /**
     * Editar una causa en la base de datos
     * @param type $datos Trae los elementos de frmECausas y es convertido en un array datos en el proceso editaCausa
     * @return type Recibe la información y se ingresa en un string sql para despues enviar el string a la base de datos
     */
    public function editaCausa($datos) {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "update causas set caratula='$datos[1]',rol='$datos[2]',ultimo_mov='$datos[3]',id_materia='$datos[4]',id_trabajador='$datos[5]',id_cliente='$datos[6]' where id='$datos[0]'";
        return mysqli_query($conexion, $sql);
    }
    /**
     * Se realiza una eliminacion logica mediante un update
     * @param type $idclient Se obtiene el valor del id de la causas elegida y se usa como condicion where
     * @return type Recibe la información y se ingresa en un string sql para despues enviar el string a la base de datos
     */
    public function pagoCausa($idcau) {
        $c = new conectar();
        $conexion = $c->conexion();		
        $sql = "update causas set pago=0 where id='$idcau'";
        return mysqli_query($conexion, $sql);
    }
	public function finCausa($idcau) {
        $c = new conectar();
        $conexion = $c->conexion();
		$fechafin=date("Y-m-d");
        $sql = "update causas set fecha_termino='$fechafin', pago=2 where id='$idcau'";
        return mysqli_query($conexion, $sql);
    }
}