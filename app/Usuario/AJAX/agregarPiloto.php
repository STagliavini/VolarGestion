<?php

include_once '../Piloto.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pilotos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorPiloto.php';
Conexion::abrir_conexion();
$id_piloto=-1;
if(isset($_POST['id_piloto'])){
    $id_piloto=$_POST['id_piloto'];
}
if($id_piloto!=-1||!isset($id_piloto)){
    $validator = new ValidadorPiloto($_POST['id_piloto'],$_POST['dni_piloto'], $_POST['apellido_piloto'], $_POST['nombre_piloto'],$_POST['nacimiento_piloto']);
}
else{
   $validator = new ValidadorPiloto(-1,$_POST['dni_piloto'], $_POST['apellido_piloto'], $_POST['nombre_piloto'],$_POST['nacimiento_piloto']);
}
$piloto_insertado='';
if ($validator->registroValido()) {
    if($id_piloto!=-1||!isset($id_piloto)){
        $piloto = new Piloto($_POST['id_piloto'], $validator->getDni_piloto(), $validator->getApellido_piloto(), $validator->getNombre_piloto(),$validator->getNacimiento_piloto());
    }
    else{
        $piloto = new Piloto(-1, $validator->getDni_piloto(), $validator->getApellido_piloto(), $validator->getNombre_piloto(),$validator->getNacimiento_piloto());
    }
    $piloto_insertado=Consultas_Pilotos::insertar_piloto(Conexion::getconexion(), $piloto);
    $validator->limpiar();
}
if($piloto_insertado=='Actualizado'){
    $validator->setId_piloto(-1);
}
include_once '../../../vistas/Formu_Piloto/formu_piloto_valid.php';
if($piloto_insertado=='Insertado'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Piloto Insertado!!!!<br>
        DNI:'.$piloto->getDni_piloto().'.<br>
        Apellido:'.$piloto->getApellido_piloto().'.<br>
        Nombre:'.$piloto->getNombre_piloto().'<br>
        Fecha de Nacimiento:'.$piloto->getNacimiento_piloto().'</p>
    </div></div>';
}
else if($piloto_insertado=='Actualizado'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Piloto Actualizado!!!!<br>
        DNI:'.$piloto->getDni_piloto().'.<br>
        Apellido:'.$piloto->getApellido_piloto().'.<br>
        Nombre:'.$piloto->getNombre_piloto().'<br>
        Fecha de Nacimiento:'.$piloto->getNacimiento_piloto().'</p>
    </div></div>';
}
else if($piloto_insertado=='Error'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-danger">Error!!!!</div></div>';
}
Conexion::cerrar_conexion();
?>

