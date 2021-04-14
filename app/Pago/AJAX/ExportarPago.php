<?php

require 'C:\xampp\htdocs\VolarGestion\vendor\autoload.php';
include_once "../../config.php";
include_once "../../Piloto/Piloto.php";
include_once "../../BD/Conexion.php";
include_once "../../Redireccion/Redireccion.inc.php";
include_once "../Consultas/Consultas_Pagos.php";
include_once "../Pago.php";

use PHPJasper\PHPJasper;

if (isset($_POST['id_pago'])) {
    $id_pago = $_POST['id_pago'];
}
Conexion::abrir_conexion();
$array = Consultas_Pagos::buscarporId_Recibo(Conexion::getconexion(), $id_pago);
Conexion::cerrar_conexion();
$apellidoynombre = $array[1]->getApellido_piloto() . ', ' . $array[1]->getNombre_piloto();
$input = 'C:\xampp\htdocs\VolarGestion\reports\Recibo.jasper';
$output = 'C:\xampp\htdocs\VolarGestion\reports\report1';
$valores = explode("-", $array[0]->getFecha_pago());
$fecha_pago = $valores[2] . ' de ';
$texto_mes = '';
switch ($valores[1]) {
    case 1:$texto_mes = 'Enero';
        break;
    case 2:$texto_mes = 'Febrero';
        break;
    case 3:$texto_mes = 'Marzo';
        break;
    case 4:$texto_mes = 'Abril';
        break;
    case 5:$texto_mes = 'Mayo';
        break;
    case 6:$texto_mes = 'Junio';
        break;
    case 7:$texto_mes = 'Julio';
        break;
    case 8:$texto_mes = 'Agosto';
        break;
    case 9:$texto_mes = 'Septiembre';
        break;
    case 10:$texto_mes = 'Octubre';
        break;
    case 11:$texto_mes = 'Noviembre';
        break;
    case 12:$texto_mes = 'Diciembre';
        break;
}
$fecha_pago=$fecha_pago.$texto_mes;
$fecha_pago=$fecha_pago.' de '.$valores[0];
$options = [
    'format' => ['pdf'],
    'locale' => 'en',
    'params' => [
        'apellidoynombre' => $apellidoynombre,
        'monto_pago' => $array[0]->getMonto_pago() . ' Pesos',
        'id_pago' => $array[0]->getId_pago(),
        'fecha_pago' => $fecha_pago
    ],
    'db_connection' => ['driver' => 'mysql',
        'username' => 'admin',
        'password' => 'root',
        'host' => 'localhost',
        'database' => 'volar_gestion',
        'port' => '3306']
];
$jasper = new PHPJasper;

$jasper->process(
        $input, $output, $options
)->execute();
Redireccion::redirigir(RUTA_RE);
?>

