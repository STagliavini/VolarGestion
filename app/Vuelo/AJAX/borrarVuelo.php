<?php

include_once '../Vuelo.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Vuelos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorVuelo.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_vuelo=$_POST['id_vuelo'];
$vuelo= Consultas_Vuelos::borrarporId($conexion, $id_vuelo);
include_once '../../../vistas/Formu_Vuelo/formu_vuelo.php';
if(isset($vuelo)){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Vuelo Eliminado!!!!<br>
        Avion:' . $vuelo->getAvion_vuelo(). '.<br>
        Fecha:' . $vuelo->getFecha_vuelo() . '.<br>
        Salida: ' . $vuelo->getSalida_vuelo() . '<br>
        Llegada:' . $vuelo->getLlegada_vuelo() . '<br>
        Origen:'.$vuelo->getOrigen_vuelo().'<br>
        Destino:'.$vuelo->getDestino_vuelo().'<br>
        Timpo de Vuelo:'.$vuelo->getDuracion_vuelo().'<br>
        Piloto:'.$vuelo->getPiloto_vuelo().'<br>
        Copiloto:'.$vuelo->getCopiloto_vuelo().'<br>
        Aterrizajes:'.$vuelo->getAterrizajes_vuelo().'</p>
    </div></div>';
}
Conexion::cerrar_conexion();
?>

