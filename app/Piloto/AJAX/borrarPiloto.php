<?php

include_once '../Piloto.php';
include_once '../../Usuario/Usuario.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pilotos.php';
include_once '../../Usuario/Consultas/Consultas_Usuarios.php';
include_once '../../config.php';
include_once '../Validator/ValidadorPiloto.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_piloto=$_POST['id_piloto'];
$piloto=Consultas_Pilotos::buscarporId($conexion, $id_piloto);
if(isset($piloto)){
    $usuario= Consultas_Usuarios::borrarporNombre($conexion, $piloto->getDni_piloto());
}
$piloto= Consultas_Pilotos::borrarporId($conexion, $id_piloto);
include_once '../../../vistas/Formu_Piloto/formu_piloto.php';
if(isset($piloto)){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Piloto Eliminado!!!!<br>
        DNI:'.$piloto->getDni_piloto().'.<br>
        Apellido:'.$piloto->getApellido_piloto().'.<br>
        Nombre:'.$piloto->getNombre_piloto().'<br>
        Fecha de Nacimiento:'.$piloto->getNacimiento_piloto().'</p>
    </div></div>';
}
if(isset($usuario)){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Usuario Eliminado!!!!<br>
    </div></div>';
}
Conexion::cerrar_conexion();
?>

