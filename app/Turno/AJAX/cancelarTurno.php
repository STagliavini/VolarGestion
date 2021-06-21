<?php

include_once '../Turno.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Turnos.php';
include_once '../../config.php';
include_once '../../Sesion/ControlSesion.inc.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$id_turno=-1;
if(isset($_POST['id_turno'])){
    $id_turno=$_POST['id_turno'];
}
Consultas_Turnos::Cancelled($conexion, $id_turno);
Conexion::cerrar_conexion();
?>



