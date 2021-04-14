<?php

include_once '../Pago.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pagos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorPago.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_pago=$_POST['id_pago'];
$pago= Consultas_Pagos::buscarporId($conexion, $id_pago);
$valores=explode("-",$pago->getFecha_pago());
$fecha=$valores[2].'/'.$valores[1].'/'.$valores[0];
$validator = new ValidadorPago($pago->getId_pago(), $pago->getDni_pago(), $pago->getMonto_pago(),$fecha);
include_once '../../../vistas/Formu_Pago/formu_pago_valid.php';
Conexion::cerrar_conexion();
?>

