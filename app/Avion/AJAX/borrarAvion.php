<?php

include_once '../Avion.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Aviones.php';
include_once '../../config.php';
include_once '../Validator/ValidadorAvion.php';
Conexion::abrir_conexion();
$conexion= Conexion::getconexion();
$id_avion=$_POST['id_avion'];
$avion= Consultas_Aviones::borrarporId($conexion, $id_avion);
include_once '../../../vistas/Formu_Avion/formu_avion.php';
if(isset($avion)){
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Avion Eliminado!!!!<br>
        Matricula:'.$avion->getMatricula_avion().'.<br>
        Nombre de Avion:'.$avion->getNombre_avion().'.<br>
        Descripcion del avion:'.$avion->getDescripcion_avion().'<br>
        Tipo de Avion:'.$avion->getTipo_avion().'</p>
    </div></div>';
}
Conexion::cerrar_conexion();
?>

