<?php

include_once '../Tipo_Avion.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Tipos_Aviones.php';
include_once '../../config.php';
include_once '../Validator/ValidadorTipoAvion.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_tipo_avion=$_POST['id_tipo_avion'];
$tipo_avion= Consultas_Tipos_Aviones::buscarporId($conexion, $id_tipo_avion);
$validator = new ValidadorTipoAvion($tipo_avion->getId_tipo_avion(),$tipo_avion->getNombre_tipo_avion(), $tipo_avion->getPrecio_tipo_avion());
include_once '../../../vistas/Formu_Tipo_Avion/formu_tipo_avion_valid.php';
Conexion::cerrar_conexion();
?>

