<?php

include_once '../Pago.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pagos.php';
include_once '../../Piloto/Consultas/Consultas_Pilotos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorPago.php';
Conexion::abrir_conexion();
$id_pago = -1;
if (isset($_POST['id_pago'])) {
    $id_pago = $_POST['id_pago'];
}
if ($id_pago != -1 || !isset($id_pago)) {
    $validator = new ValidadorPago($_POST['id_pago'], $_POST['dnii_pago'], $_POST['monto_pago'],$_POST['fecha_pago']);
} else {
    $validator = new ValidadorPago(-1, $_POST['dni_pago'], $_POST['monto_pago'],$_POST['fecha_pago']);
}
$pago_insertado = '';
if ($validator->registroValido()) {
    if ($id_pago != -1 || !isset($id_pago)) {
        $pago = new Pago($_POST['id_pago'], $validator->getDni_pago(), $validator->getMonto_pago(),$validator->getFecha_pago());
    } else {
        $pago = new Pago(-1, $validator->getDni_pago(), $validator->getMonto_pago(),$validator->getFecha_pago());
    }
    $pago_insertado = Consultas_Pagos::insertar_pago(Conexion::getconexion(), $pago);
    $validator->limpiar();
}
if ($pago_insertado == 'Actualizado') {
    $validator->setId_pago(-1);
}
include_once '../../../vistas/Formu_Pago/formu_pago_valid.php';
if ($pago_insertado == 'Insertado') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Pago Insertado!!!!<br>
        DNI:' . $pago->getDni_pago() . '.<br>
        Monto:' . $pago->getMonto_pago() . '<br>
        Fecha de Pago:'.$pago->getFecha_pago().'</p>
    </div></div>';
    Conexion::cerrar_conexion();
    Conexion::abrir_conexion();
    $piloto = Consultas_Pilotos::buscarporDni(Conexion::getconexion(), $pago->getDni_pago());
    $deuda = $piloto->getDeuda_piloto() - $pago->getMonto_pago();
    $actu = Consultas_Pilotos::actDeuda(Conexion::getconexion(), $pago->getDni_pago(), $deuda);
    if ($actu) {
        echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Deuda Actualizada:' . ($piloto->getDeuda_piloto() - $pago->getMonto_pago()) . '</div></div>';
    }
    Conexion::cerrar_conexion();
} else if ($pago_insertado == 'Actualizado') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Pago Actualizado!!!!<br>
        DNI:' . $pago->getDni_pago() . '.<br>
        Monto:' . $pago->getMonto_pago() . '<br>
        Fecha de Pago:'.$pago->getFecha_pago().'</p>
    </div></div>';
} else if ($pago_insertado == 'Error') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-danger">Error!!!!</div></div>';
}
Conexion::cerrar_conexion();
?>

