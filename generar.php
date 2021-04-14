<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="generar.php">
            <input type="submit" value="Generar" name="generar"/>
        </form>
        <?php
        require __DIR__ . '/vendor/autoload.php';
        include_once "app/config.php";
        include_once "app/Piloto/Piloto.php";
        include_once "app/BD/Conexion.php";
        include_once "app/Redireccion/Redireccion.inc.php";
        include_once "app/Piloto/Consultas/Consultas_Pilotos.php";
        use PHPJasper\PHPJasper;
         Conexion::abrir_conexion();
         $piloto= Consultas_Pilotos::buscarporDni(Conexion::getconexion(), 41362635);
         Conexion::cerrar_conexion();
         $apellidoynombre=$piloto->getApellido_piloto().', '.$piloto->getNombre_piloto();
$input = 'C:\xampp\htdocs\VolarGestion\reports\Recibo.jasper';
        $output = 'C:\xampp\htdocs\VolarGestion\reports\report1';
        $options = [
            'format' => ['pdf'],
            'locale' => 'en',
            'params' => [
                'apellidoynombre'=>''.$apellidoynombre.''
            ],
            'db_connection' => ['driver' => 'mysql',
                'username' => 'admin',
                'password' => 'root',
                'host' => 'localhost',
                'database' => 'volar_gestion',
                'port' => '3306']
        ];
        if (isset($_POST['generar'])) {
            $jasper = new PHPJasper;

            $jasper->process(
                    $input, $output, $options
            )->execute();
            Redireccion::redirigir(RUTA_RE);
        }
        ?>
    </body>
</html>
