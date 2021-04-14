<?php

include_once '../Piloto.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pilotos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorPiloto.php';
include_once '../../Usuario/Consultas/Consultas_Usuarios.php';
include_once '../../Usuario/Usuario.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_piloto=$_POST['id_piloto'];
$piloto= Consultas_Pilotos::buscarporId($conexion, $id_piloto);
echo $piloto->getDni_piloto();
Conexion::cerrar_conexion();
?>

