<?php

include_once '../Pago.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pagos.php';
include_once '../../config.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$pagos = Consultas_Pagos::listado($conexion);

if (count($pagos)) {
    foreach ($pagos as $pago) {
        echo '<tr>
                <td>' . $pago->getDni_pago() . '</td>
                <td>' . $pago->getMonto_pago() . '</td>
                <td>' . $pago->getFecha_pago() . '</td>    
                <td><form method="POST"><input type="hidden" name="id_pago" value="' . $pago->getId_pago() . '"/><Button class="btn-sm btn-primary" type="submit" name="modificar" id="modificar" onclick="return verificar(' . $pago->getId_pago() . ');"><i class="fas fa-edit"></i></Button><Button class="btn-sm btn-danger" type="submit" name="borrar" id="borrar" onclick="return eliminar(' . $pago->getId_pago() . ');"><i class="fa fa-times"></i></Button></form><form method="POST" action="app/Pago/AJAX/ExportarPago.php"><input type="hidden" name="id_pago" value="' . $pago->getId_pago() . '"/><Button class="btn-sm btn-success" type="submit" name="exportar" id="exportar"><i class="fas fa-file-pdf"></i></Button></form></td>
             </tr>';
    }
}
Conexion::cerrar_conexion();
?>



