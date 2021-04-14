<?php

include_once '../Avion.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Aviones.php';
include_once '../../config.php';
include_once '../../Sesion/ControlSesion.inc.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$aviones = Consultas_Aviones::listado($conexion);

if (count($aviones)) {
    foreach ($aviones as $avion) {
        echo '<tr>
                <td>' . $avion->getMatricula_avion() . '</td>
                <td>' . $avion->getNombre_avion() . '</td>
                <td>' . $avion->getDescripcion_avion() . '</td>
                <td>' . $avion->getTipo_avion().'</td>
                <td><form method="POST"><input type="hidden" name="id_avion" value="' . $avion->getId_avion() . '"/><Button class="btn-sm btn-primary" type="submit" name="modificar" id="modificar" onclick="return verificar(' . $avion->getId_avion() . ');"><i class="fas fa-edit"></i></Button><Button class="btn-sm btn-danger" type="submit" name="borrar" id="borrar" onclick="return eliminar(' . $avion->getId_avion() . ');"><i class="fa fa-times"></i></Button></form></td>
             </tr>';
    }
}
Conexion::cerrar_conexion();
?>



