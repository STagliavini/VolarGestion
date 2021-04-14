<?php
include_once '../../Tipo_Avion/Tipo_Avion.php';
include_once '../../BD/Conexion.php';
include_once '../../Tipo_Avion/Consultas/Consultas_Tipos_Aviones.php';
include_once '../../config.php';
include_once '../Validator/ValidadorAvion.php';
Conexion::abrir_conexion();
$conexion = Conexion::getconexion();
$tipos_aviones = Consultas_Tipos_Aviones::listarTodos($conexion);
echo'<option value="">--Seleccione--</option>';
if (count($tipos_aviones)) {
    foreach ($tipos_aviones as $tipo_avion) {
        if(isset($validator)){
            if($validator->getTipo_avion()==$tipo_avion->getNombre_tipo_avion()){
                echo'<option value="'.$tipo_avion->getNombre_tipo_avion().'" selected>'.$tipo_avion->getNombre_tipo_avion().'</option>';
            }
            else{
                echo'<option value="'.$tipo_avion->getNombre_tipo_avion().'">'.$tipo_avion->getNombre_tipo_avion().'</option>';
            }
        }
        else{
            echo'<option value="'.$tipo_avion->getNombre_tipo_avion().'">'.$tipo_avion->getNombre_tipo_avion().'</option>';
        }
    }
}
Conexion::cerrar_conexion();
?>

