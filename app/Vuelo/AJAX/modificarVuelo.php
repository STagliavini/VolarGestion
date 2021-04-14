<?php

include_once '../Vuelo.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Vuelos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorVuelo.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_vuelo=$_POST['id_vuelo'];
$vuelo= Consultas_Vuelos::buscarporId($conexion, $id_vuelo);
$valores=explode("-",$vuelo->getFecha_vuelo());
$fecha=$valores[2].'/'.$valores[1].'/'.$valores[0];
$validator = new ValidadorVuelo($vuelo->getId_vuelo(), $fecha, $vuelo->getSalida_vuelo(), $vuelo->getLlegada_vuelo(), $vuelo->getOrigen_vuelo(), $vuelo->getDestino_vuelo(), $vuelo->getAterrizajes_vuelo(), $vuelo->getPiloto_vuelo(), $vuelo->getCopiloto_vuelo(), $vuelo->getDuracion_vuelo(), $vuelo->getAvion_vuelo());
include_once '../../../vistas/Formu_Vuelo/formu_vuelo_valid.php';
Conexion::cerrar_conexion();
?>

