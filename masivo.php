<?php
include_once 'app/Pago/Pago.php';
include_once 'app/BD/Conexion.php';
include_once 'app/Pago/Consultas/Consultas_Pagos.php';
include_once 'app/config.php';
Conexion::abrir_conexion();
for($i=0;$i<10000;$i++){
$pago=new Pago(-1,41362635,3000,'29/9/2020');
Consultas_Pagos::insertar_pago(Conexion::getconexion(),$pago);
}
Conexion::cerrar_conexion();
?>