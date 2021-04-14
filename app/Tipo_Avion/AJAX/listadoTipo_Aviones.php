<?php
include_once '../Tipo_Avion.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Tipos_Aviones.php';
include_once '../../config.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$tipos_aviones = Consultas_Tipos_Aviones::listado($conexion);
if (count($tipos_aviones)) {
    foreach ($tipos_aviones as $tipo_avion) {
        echo '<tr>
                <td>' . $tipo_avion->getNombre_tipo_avion() . '</td>
                <td>' . $tipo_avion->getPrecio_tipo_avion() . '</td>
                <td><form method="POST"><input type="hidden" name="id_tipo_avion" value="' . $tipo_avion->getId_tipo_avion() . '"/><Button class="btn-sm btn-primary" type="submit" name="modificar" id="modificar" onclick="return verificar('.$tipo_avion->getId_tipo_avion().');"><i class="fas fa-edit"></i></Button><Button class="btn-sm btn-danger" type="submit" name="borrar" id="borrar" onclick="return eliminar('.$tipo_avion->getId_tipo_avion().');"><i class="fa fa-times"></i></Button></form></td>
             </tr>';
    }
}
Conexion::cerrar_conexion();
?>



