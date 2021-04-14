<?php

include_once '../Vuelo.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Vuelos.php';
include_once '../../config.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$vuelos = Consultas_Vuelos::listado($conexion);
if (count($vuelos)) {
    foreach ($vuelos as $vuelo) {
        echo '<tr>
                <td>' . $vuelo->getAvion_vuelo() . '</td>
                <td>' . $vuelo->getFecha_vuelo() . '</td>
                <td>' . $vuelo->getSalida_vuelo() . '</td>
                <td>' . $vuelo->getLlegada_vuelo() . '</td>
                <td>' . $vuelo->getOrigen_vuelo() . '</td>
                <td>' . $vuelo->getDestino_vuelo() . '</td>
                <td>' . $vuelo->getDuracion_vuelo().'</td>
                <td>' . $vuelo->getPiloto_vuelo().'</td>
                <td>' . $vuelo->getCopiloto_vuelo().'</td>
                <td>' . $vuelo->getAterrizajes_vuelo().'</td>
             <td><form method="POST"><input type="hidden" name="id_vuelo" value="' . $vuelo->getId_vuelo() . '"/><Button class="btn-sm btn-primary" type="submit" name="modificar" id="modificar" onclick="return verificar(' . $vuelo->getId_vuelo() . ');"><i class="fas fa-edit"></i></Button><Button class="btn-sm btn-danger" type="submit" name="borrar" id="borrar" onclick="return eliminar(' . $vuelo->getId_vuelo() . ');"><i class="fa fa-times"></i></Button></form></td>
             </tr>';
    }
}
Conexion::cerrar_conexion();
?>



