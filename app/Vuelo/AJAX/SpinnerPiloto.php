<?php
include_once '../../Piloto/Piloto.php';
include_once '../../BD/Conexion.php';
include_once '../../Piloto/Consultas/Consultas_Pilotos.php';
include_once '../../config.php';
include_once '../Validator/ValidadorVuelo.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$pilotos = Consultas_Pilotos::listarTodos($conexion);
echo'<option value="">--Seleccione--</option>';
if (count($pilotos)) {
    foreach ($pilotos as $piloto) {
        if(isset($validator)){
            if($validator->getPiloto_vuelo()==$piloto->getDni_piloto()){
                echo'<option value="'.$piloto->getDni_piloto().'" selected>'.$piloto->getDni_piloto().'-'.$piloto->getApellido_piloto().' '.$piloto->getNombre_piloto().'</option>';
            }
            else{
                echo'<option value="'.$piloto->getDni_piloto().'">'.$piloto->getDni_piloto().'-'.$piloto->getApellido_piloto().' '.$piloto->getNombre_piloto().'</option>';
            }
        }
        else{
            echo'<option value="'.$piloto->getDni_piloto().'">'.$piloto->getDni_piloto().'-'.$piloto->getApellido_piloto().' '.$piloto->getNombre_piloto().'</option>';
        }
    }
}
Conexion::cerrar_conexion();
?>

