<?php

include_once '../Tipo_Avion.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Tipos_Aviones.php';
include_once '../../config.php';
include_once '../Validator/ValidadorTipoAvion.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_tipo_avion=$_POST['id_tipo_avion'];
$tipo_avion= Consultas_Tipos_Aviones::borrarporId($conexion, $id_tipo_avion);
include_once '../../../vistas/Formu_Tipo_Avion/formu_tipo_avion.php';
if(isset($tipo_avion)){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Tipo de Avion Eliminado!!!!<br>
        Nombre del Tipo de Avion:'.$tipo_avion->getNombre_tipo_avion().'.<br>
        Precio del Tipo de Avion:'.$tipo_avion->getPrecio_tipo_avion().'.<br>
    </div></div>';
}
Conexion::cerrar_conexion();
?>

