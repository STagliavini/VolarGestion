<?php

include_once '../Pago.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pagos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorPago.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_pago=$_POST['id_pago'];
$pago= Consultas_Pagos::borrarporId($conexion, $id_pago);
include_once '../../../vistas/Formu_Pago/formu_pago.php';
if(isset($pago)){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Pago Eliminado!!!!<br>
        DNI:'.$pago->getDni_pago().'.<br>
        Monto:'.$pago->getMonto_pago().'.<br>
        Fecha de Pago:'.$pago->getFecha_pago().'</p>
    </div></div>';
}
Conexion::cerrar_conexion();
?>

