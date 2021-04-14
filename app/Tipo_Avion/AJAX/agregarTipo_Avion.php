<?php

include_once '../Tipo_Avion.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Tipos_Aviones.php';
include_once '../../config.php';
include_once '../Validator/ValidadorTipoAvion.php';
Conexion::abrir_conexion();
$id_tipo_avion=-1;
if(isset($_POST['id_tipo_avion'])){
    $id_tipo_avion=$_POST['id_tipo_avion'];
}
if($id_tipo_avion!=-1||!isset($id_tipo_avion)){
    $validator = new ValidadorTipoAvion($_POST['id_tipo_avion'],$_POST['nombre_tipo_avion'], $_POST['precio_tipo_avion']);
}
else{
   $validator = new ValidadorTipoAvion(-1,$_POST['nombre_tipo_avion'], $_POST['precio_tipo_avion']);
}
$tipo_avion_insertado='';
if ($validator->registroValido()) {
    if($id_tipo_avion!=-1||!isset($id_tipo_avion)){
        $tipo_avion = new Tipo_Avion($_POST['id_tipo_avion'], $validator->getNombre_tipo_avion(), $validator->getPrecio_tipo_avion());
    }
    else{
        $tipo_avion = new Tipo_Avion(-1, $validator->getNombre_tipo_avion(), $validator->getPrecio_tipo_avion());
    }
    $tipo_avion_insertado=Consultas_Tipos_Aviones::insertar_tipo_avion(Conexion::getconexion(), $tipo_avion);
    $validator->limpiar();
}
if($tipo_avion_insertado=='Actualizado'){
    $validator->setId_tipo_avion(-1);
}
include_once '../../../vistas/Formu_Tipo_Avion/formu_tipo_avion_valid.php';
if($tipo_avion_insertado=='Insertado'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Tipo de Avion Insertado!!!!<br>
        Nombre del Tipo de Avion:'.$tipo_avion->getNombre_tipo_avion().'.<br>
        Precio del Tipo de Avion:'.$tipo_avion->getPrecio_tipo_avion().'.<br>
    </div></div>';
}
else if($tipo_avion_insertado=='Actualizado'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Tipo de Avion Actualizado!!!!<br>
        Nombre del Tipo de Avion:'.$tipo_avion->getNombre_tipo_avion().'.<br>
        Precio del Tipo de Avion:'.$tipo_avion->getPrecio_tipo_avion().'.<br>
    </div></div>';
}
else if($tipo_avion_insertado=='Error'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-danger">Error!!!!</div></div>';
}
Conexion::cerrar_conexion();
?>

