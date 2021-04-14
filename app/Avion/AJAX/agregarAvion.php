<?php

include_once '../Avion.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Aviones.php';
include_once '../../config.php';
include_once '../Validator/ValidadorAvion.php';
Conexion::abrir_conexion();
$id_avion=-1;
if(isset($_POST['id_avion'])){
    $id_avion=$_POST['id_avion'];
}
if($id_avion!=-1||!isset($id_avion)){
    $validator = new ValidadorAvion($_POST['id_avion'],$_POST['matricula_avion'], $_POST['nombre_avion'], $_POST['descripcion_avion'],$_POST['tipo_avion']);
}
else{
   $validator = new ValidadorAvion(-1,$_POST['matricula_avion'], $_POST['nombre_avion'], $_POST['descripcion_avion'],$_POST['tipo_avion']);
}
$avion_insertado='';
if ($validator->registroValido()) {
    if($id_avion!=-1||!isset($id_avion)){
        $avion = new Avion($_POST['id_avion'], $validator->getMatricula_avion(), $validator->getNombre_avion(), $validator->getDescripcion_avion(),$validator->getTipo_avion());
    }
    else{
        $avion = new Avion(-1, $validator->getMatricula_avion(), $validator->getNombre_avion(), $validator->getDescripcion_avion(),$validator->getTipo_avion());
    }
    $avion_insertado=Consultas_Aviones::insertar_avion(Conexion::getconexion(), $avion);
    $validator->limpiar();
}
if($avion_insertado=='Actualizado'){
    $validator->setId_avion(-1);
}
include_once '../../../vistas/Formu_Avion/formu_avion_valid.php';
if($avion_insertado=='Insertado'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Avion Insertado!!!!<br>
        Matricula:'.$avion->getMatricula_avion().'.<br>
        Nombre de Avion:'.$avion->getNombre_avion().'.<br>
        Descripcion del avion:'.$avion->getDescripcion_avion().'<br>
        Tipo de Avion:'.$avion->getTipo_avion().'</p>
    </div></div>';
}
else if($avion_insertado=='Actualizado'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Avion Actualizado!!!!<br>
        Matricula:'.$avion->getMatricula_avion().'.<br>
        Nombre de Avion:'.$avion->getNombre_avion().'.<br>
        Descripcion del avion:'.$avion->getDescripcion_avion().'<br>
        Tipo de Avion:'.$avion->getTipo_avion().'</p>
    </div></div>';
}
else if($avion_insertado=='Error'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-danger">Error!!!!</div></div>';
}
Conexion::cerrar_conexion();
?>

