<?php

include_once '../Vuelo.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Vuelos.php';
include_once '../../Piloto/Consultas/Consultas_Pilotos.php';
include_once '../../Piloto/Piloto.php';
include_once '../../Avion/Consultas/Consultas_Aviones.php';
include_once '../../Avion/Avion.php';
include_once '../../Tipo_Avion/Consultas/Consultas_Tipos_Aviones.php';
include_once '../../Tipo_Avion/Tipo_Avion.php';
include_once '../../config.php';
include_once '../Validator/ValidadorVuelo.php';
Conexion::abrir_conexion();
$id_vuelo = -1;
if (isset($_POST['id_vuelo'])) {
    $id_vuelo = $_POST['id_vuelo'];
}
if ($id_vuelo != -1 || !isset($id_vuelo)) {
    $validator = new ValidadorVuelo($id_vuelo, $_POST['fecha_vuelo'], $_POST['salida_vuelo'], $_POST['llegada_vuelo'], $_POST['origen_vuelo'], $_POST['destino_vuelo'], $_POST['aterrizajes_vuelo'], $_POST['piloto_vuelo'], $_POST['copiloto_vuelo'], 0, $_POST['avion_vuelo']);
} else {
    $validator = new ValidadorVuelo(-1, $_POST['fecha_vuelo'], $_POST['salida_vuelo'], $_POST['llegada_vuelo'], $_POST['origen_vuelo'], $_POST['destino_vuelo'], $_POST['aterrizajes_vuelo'], $_POST['piloto_vuelo'], $_POST['copiloto_vuelo'], 0, $_POST['avion_vuelo']);
}
$vuelo_insertado = '';
if ($validator->registroValido()) {
    $tiempo_total;
    $diferencia = Consultas_Vuelos::difHoras($validator->getLlegada_vuelo(), $validator->getSalida_vuelo(), Conexion::getconexion());
    $hora_decimal = (float) ($diferencia[0] . $diferencia[1]);
    $minuto_decimal = (float) ($diferencia[3] . $diferencia[4]);
    if ($minuto_decimal >= 58) {
        $hora_decimal = $hora_decimal + 1;
        $minuto_decimal = 0;
    } else {
        if ($minuto_decimal < 3) {
            $minuto_decimal = 0;
        } else if ($minuto_decimal >= 3 && $minuto_decimal <= 8) {
            $minuto_decimal = 1;
        } else if ($minuto_decimal >= 9 && $minuto_decimal <= 14) {
            $minuto_decimal = 2;
        } else if ($minuto_decimal >= 15 && $minuto_decimal <= 20) {
            $minuto_decimal = 3;
        } else if ($minuto_decimal >= 21 && $minuto_decimal <= 26) {
            $minuto_decimal = 4;
        } else if ($minuto_decimal >= 27 && $minuto_decimal <= 33) {
            $minuto_decimal = 5;
        } else if ($minuto_decimal >= 34 && $minuto_decimal <= 39) {
            $minuto_decimal = 6;
        } else if ($minuto_decimal >= 40 && $minuto_decimal <= 45) {
            $minuto_decimal = 7;
        } else if ($minuto_decimal >= 46 && $minuto_decimal <= 51) {
            $minuto_decimal = 8;
        } else if ($minuto_decimal >= 52 && $minuto_decimal <= 57) {
            $minuto_decimal = 9;
        }
    }
    $tiempo_total = $hora_decimal . "." . $minuto_decimal;
    if ($id_vuelo != -1 || !isset($id_vuelo)) {
        $vuelo = new Vuelo($id_vuelo, $_POST['fecha_vuelo'], $_POST['salida_vuelo'], $_POST['llegada_vuelo'], $_POST['origen_vuelo'], $_POST['destino_vuelo'], $_POST['aterrizajes_vuelo'], $_POST['piloto_vuelo'], $_POST['copiloto_vuelo'], $tiempo_total, $_POST['avion_vuelo']);
        $vuelo_anterior = Consultas_Vuelos::buscarporId(Conexion::getconexion(), $id_vuelo);
        $datos = Consultas_Vuelos::calDeuda(Conexion::getconexion(), $vuelo_anterior->getAvion_vuelo());
        $deuda = $datos * $vuelo_anterior->getDuracion_vuelo();
        $piloto = Consultas_Pilotos::buscarporDni(Conexion::getconexion(), $vuelo_anterior->getPiloto_vuelo());
        $deuda = $piloto->getDeuda_piloto()-$deuda;
        $actu = Consultas_Pilotos::actDeuda(Conexion::getconexion(), $vuelo_anterior->getPiloto_vuelo(), $deuda);
    } else {
        $vuelo = new Vuelo(-1, $_POST['fecha_vuelo'], $_POST['salida_vuelo'], $_POST['llegada_vuelo'], $_POST['origen_vuelo'], $_POST['destino_vuelo'], $_POST['aterrizajes_vuelo'], $_POST['piloto_vuelo'], $_POST['copiloto_vuelo'], $tiempo_total, $_POST['avion_vuelo']);
    }
    $vuelo_insertado = Consultas_Vuelos::insertar_vuelo(Conexion::getconexion(), $vuelo);
    $validator->limpiar();
}
if ($vuelo_insertado == 'Actualizado') {
    $validator->setId_vuelo(-1);
}
include_once '../../../vistas/Formu_Vuelo/formu_vuelo_valid.php';
if ($vuelo_insertado == 'Insertado') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Vuelo Insertado!!!!<br>
        Avion:' . $vuelo->getAvion_vuelo() . '.<br>
        Fecha:' . $vuelo->getFecha_vuelo() . '.<br>
        Salida: ' . $vuelo->getSalida_vuelo() . '<br>
        Llegada:' . $vuelo->getLlegada_vuelo() . '<br>
        Origen:' . $vuelo->getOrigen_vuelo() . '<br>
        Destino:' . $vuelo->getDestino_vuelo() . '<br>
        Timpo de Vuelo:' . $vuelo->getDuracion_vuelo() . '<br>
        Piloto:' . $vuelo->getPiloto_vuelo() . '<br>
        Copiloto:' . $vuelo->getCopiloto_vuelo() . '<br>
        Aterrizajes:' . $vuelo->getAterrizajes_vuelo() . '</p>
    </div></div>';
    Conexion::cerrar_conexion();
    Conexion::abrir_conexion();
    $datos = Consultas_Vuelos::calDeuda(Conexion::getconexion(), $vuelo->getAvion_vuelo());
    $deuda = $datos * $vuelo->getDuracion_vuelo();
    $piloto = Consultas_Pilotos::buscarporDni(Conexion::getconexion(), $vuelo->getPiloto_vuelo());
    $deuda = $deuda + $piloto->getDeuda_piloto();
    $actu = Consultas_Pilotos::actDeuda(Conexion::getconexion(), $vuelo->getPiloto_vuelo(), $deuda);
    if ($actu) {
        echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Deuda Agregada:' . $datos * $vuelo->getDuracion_vuelo() . '</div></div>';
    }
    Conexion::cerrar_conexion();
} else if ($vuelo_insertado == 'Actualizado') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Vuelo Actualizado!!!!<br>
        Avion:' . $vuelo->getAvion_vuelo() . '.<br>
        Fecha:' . $vuelo->getFecha_vuelo() . '.<br>
        Salida: ' . $vuelo->getSalida_vuelo() . '<br>
        Llegada:' . $vuelo->getLlegada_vuelo() . '<br>
        Origen:' . $vuelo->getOrigen_vuelo() . '<br>
        Destino:' . $vuelo->getDestino_vuelo() . '<br>
        Timpo de Vuelo:' . $vuelo->getDuracion_vuelo() . '<br>
        Piloto:' . $vuelo->getPiloto_vuelo() . '<br>
        Copiloto:' . $vuelo->getCopiloto_vuelo() . '<br>
        Aterrizajes:' . $vuelo->getAterrizajes_vuelo() . '</p>
    </div></div>';
    Conexion::abrir_conexion();
    $datos = Consultas_Vuelos::calDeuda(Conexion::getconexion(), $vuelo->getAvion_vuelo());
    $deuda = $datos * $vuelo->getDuracion_vuelo();
    $piloto = Consultas_Pilotos::buscarporDni(Conexion::getconexion(), $vuelo->getPiloto_vuelo());
    $deuda = $deuda + $piloto->getDeuda_piloto();
    $actu = Consultas_Pilotos::actDeuda(Conexion::getconexion(), $vuelo->getPiloto_vuelo(), $deuda);
    if ($actu) {
        echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Deuda Actualizada:' . $datos * $vuelo->getDuracion_vuelo() . '</div></div>';
    }
    Conexion::cerrar_conexion();
} else if ($vuelo_insertado == 'Error') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-danger">Error!!!!</div></div>';
}
Conexion::cerrar_conexion();
?>

