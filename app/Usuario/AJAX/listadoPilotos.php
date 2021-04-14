<?php

include_once '../Piloto.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pilotos.php';
include_once '../../config.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$pilotos = Consultas_Pilotos::listado($conexion);

if (count($pilotos)) {
    foreach ($pilotos as $piloto) {
        echo '<tr>
                <td>' . $piloto->getDni_piloto() . '</td>
                <td>' . $piloto->getApellido_piloto() . '</td>
                <td>' . $piloto->getNombre_piloto() . '</td>
                <td>' . $piloto->getNacimiento_piloto().'</td>
                <td><form method="POST"><input type="hidden" name="id_piloto" value="' . $piloto->getId_piloto() . '"/><Button class="btn btn-primary" type="submit" name="modificar" id="modificar" onclick="return verificar(' . $piloto->getId_piloto() . ');"><i class="fas fa-edit"></i></Button></form><form method="POST"><input type="hidden" name="id_piloto" value="' . $piloto->getId_piloto() . '"/><Button class="btn btn-primary" type="submit" name="borrar" id="borrar" onclick="return eliminar(' . $piloto->getId_piloto() . ');">Borrar</Button></form></td>
             </tr>';
    }
}
Conexion::cerrar_conexion();
?>



