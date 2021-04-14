<?php

include_once '../Piloto.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pilotos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorPiloto.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_piloto=$_POST['id_piloto'];
$piloto= Consultas_Pilotos::buscarporId($conexion, $id_piloto);
$valores=explode("-",$piloto->getNacimiento_piloto());
$fecha=$valores[2].'/'.$valores[1].'/'.$valores[0];
$validator = new ValidadorPiloto($piloto->getId_piloto(), $piloto->getDni_piloto(), $piloto->getApellido_piloto(), $piloto->getNombre_piloto(),$fecha);
include_once '../../../vistas/Formu_Piloto/formu_piloto_valid.php';
Conexion::cerrar_conexion();
?>

