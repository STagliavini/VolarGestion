<?php

include_once '../Avion.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Aviones.php';
include_once '../../config.php';
include_once '../Validator/ValidadorAvion.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_avion=$_POST['id_avion'];
$avion= Consultas_Aviones::buscarporId($conexion, $id_avion);
$validator = new ValidadorAvion($avion->getId_avion(),$avion->getMatricula_avion(), $avion->getNombre_avion(), $avion->getDescripcion_avion(),$avion->getTipo_avion());
include_once '../../../vistas/Formu_Avion/formu_avion_valid.php';
Conexion::cerrar_conexion();
?>

