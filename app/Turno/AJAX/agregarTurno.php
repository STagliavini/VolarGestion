<?php

include_once '../Turno.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Turnos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorTurno.php';
Conexion::abrir_conexion();
$id_turno=-1;
if(isset($_POST['id_turno'])){
    $id_turno=$_POST['id_turno'];
}
if($id_turno!=-1||!isset($id_turno)){
    $validator = new ValidadorTurno($_POST['id_turno'],$_POST['piloto_turno'], $_POST['copiloto_turno'], $_POST['fecha_turno'],$_POST['salida_turno'],$_POST['llegada_turno'],$_POST['avion_turno'],$_POST['aclaracion_turno'],0);
}
else{
   $validator = new ValidadorTurno(-1,$_POST['piloto_turno'], $_POST['copiloto_turno'], $_POST['fecha_turno'],$_POST['salida_turno'],$_POST['llegada_turno'],$_POST['avion_turno'],$_POST['aclaracion_turno'],0);
}
$turno_insertado='';
if ($validator->registroValido()) {
    if($id_turno!=-1||!isset($id_turno)){
        $turno = new Turno($_POST['id_avion'],$validator->getPiloto_turno(),$validator->getCopiloto_turno(),$validator->getFecha_turno(),$validator->getSsalida_turno(),$validator->getLlegada_turno(),$validator->getAvion_turno(),$validator->getAclaracion_turno(),$validator->getEstado_turno());
    }
    else{
        $turno = new Turno(-1, $validator->getPiloto_turno(),$validator->getCopiloto_turno(),$validator->getFecha_turno(),$validator->getSalida_turno(),$validator->getLlegada_turno(),$validator->getAvion_turno(),$validator->getAclaracion_turno(),$validator->getEstado_turno());
    }
    $turno_insertado=Consultas_Turnos::insertar_turno(Conexion::getconexion(), $turno);
    $validator->limpiar();
}
if($turno_insertado=='Actualizado'){
    $validator->setId_Turno(-1);
}
include_once '../../../vistas/Formu_Turno/formu_turno_valid.php';
if($turno_insertado=='Insertado'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Turno pendiente de confirmacion!!!!<br>
        Fecha:'.$turno->getFecha_turno().'.<br>
        Hora de salida:'.$turno->getSalida_turno().'.<br>
        Hora de llegada:'.$turno->getLlegada_turno().'<br>
        Piloto:'.$turno->getPiloto_turno().'</p>
    </div></div>';
}
else if($turno_insertado=='Actualizado'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Turno pendiente de confirmacion!!!!<br>
        Fecha:'.$turno->getFecha_turno().'.<br>
        Hora de salida:'.$turno->getSalida_turno().'.<br>
        Hora de llegada:'.$turno->getLlegada_turno().'<br>
        Piloto:'.$turno->getPiloto_turno().'</p>
    </div></div>';
}
else if($turno_insertado=='Error'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-danger">Error!!!!</div></div>';
}
Conexion::cerrar_conexion();
?>

