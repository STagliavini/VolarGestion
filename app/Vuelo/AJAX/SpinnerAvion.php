<?php
include_once '../../Avion/Avion.php';
include_once '../../BD/Conexion.php';
include_once '../../Avion/Consultas/Consultas_Aviones.php';
include_once '../../config.php';
include_once '../Validator/ValidadorVuelo.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$aviones = Consultas_Aviones::listarTodos($conexion);
echo'<option value="">--Seleccione--</option>';
if (count($aviones)) {
    foreach ($aviones as $avion) {
        if(isset($validator)){
            if($validator->getAvion_vuelo()==$avion->getMatricula_avion()){
                echo'<option value="'.$avion->getMatricula_avion().'" selected>'.$avion->getMatricula_avion().'</option>';
            }
            else{
                echo'<option value="'.$avion->getMatricula_avion().'">'.$avion->getMatricula_avion().'</option>';
            }
        }
        else{
            echo'<option value="'.$avion->getMatricula_avion().'">'.$avion->getMatricula_avion().'</option>';
        }
    }
}
Conexion::cerrar_conexion();
?>

