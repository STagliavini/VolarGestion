<?php

include_once '../Turno.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Turnos.php';
include_once '../../config.php';
include_once '../../Sesion/ControlSesion.inc.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$turnos = Consultas_Turnos::listadoCancelados($conexion);

if (count($turnos)) {
    foreach ($turnos as $turno) {
            echo '<tr>
                <td>' . $turno->getPiloto_turno() . '</td>
                <td>' . $turno->getCopiloto_turno() . '</td>
                <td>' . $turno->getFecha_turno() . '</td>
                <td>' . $turno->getSalida_turno().'</td>
                <td>' . $turno->getLlegada_turno().'</td>
                <td>' . $turno->getAvion_turno().'</td>
                <td>' . $turno->getAclaracion_turno().'</td>
                <td><form method="POST"><input type="hidden" name="id_turno" value="' . $turno->getId_turno() . '"/><Button class="btn-sm btn-success" type="submit" name="confirmar" id="confirmar" onclick="return confirmarr(' . $turno->getId_turno() . ');"><i class="fas fa-check"></i></Button><Button class="btn-sm btn-danger" type="submit" name="borrar" id="borrar" onclick="return eliminar(' . $turno->getId_turno() . ');"><i class="fa fa-times"></i></Button></form></td>
             </tr>';
    }
}
Conexion::cerrar_conexion();
?>



