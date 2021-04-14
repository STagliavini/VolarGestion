<?php
include_once '../Usuario.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Usuarios.php';
include_once '../../config.php';
include_once '../../Sesion/ControlSesion.inc.php';
include_once '../Validator/ValidadorContrasenia.php';
Conexion::abrir_conexion();
if(ControlSesion::sesion_iniciada()){
    $nombre_usuario=$_SESSION['nombre_usuario'];
}
$validator=new ValidadorContrasenia($nombre_usuario, $_POST['nueva_contrasenia'], $_POST['repetir_contrasenia']);
$contrasenia_cambiada='';
if($validator->registroValido()){
    $contrasenia_cambiada=Consultas_Usuarios::cambiarContrasenia(Conexion::getconexion(), $validator->getNombre_usuario(), $validator->getRepetir_contrasenia());
    $validator->limpiar();
}
include_once '../../../vistas/Formu_Cambiar_Contrasenia/formu_cambiar_contrasenia_valid.php';
if($contrasenia_cambiada=='Actualizada'){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Contrasenia Cambiada!!!!</p>
    </div></div>';
}
else{
    if($contrasenia_cambiada=='Error'){
        echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-danger">Error!!!!</div></div>';
    }
}
Conexion::cerrar_conexion();
?>

