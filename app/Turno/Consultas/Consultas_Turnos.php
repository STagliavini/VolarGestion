<?php

class Consultas_Turnos{
    public static function insertar_turno($conexion, $turno) {
        $valores= explode("/", $turno->getFecha_turno());
        $id_turno = $turno->getId_turno();
        $piloto_turno = $turno->getPiloto_turno();
        $copiloto_turno = $turno->getCopiloto_turno();
        $salida_turno = $turno->getSalida_turno();
        $llegada_turno = $turno->getLlegada_turno();
        $avion_turno = $turno->getAvion_turno();
        $aclaracion_turno = $turno->getAclaracion_Turno();
        $estado_turno = $turno->getEstado_Turno();
        $fecha_turno = $valores[2].'-'.$valores[1].'-'.$valores[0];
        if($copiloto_turno==''){
            $copiloto_turno=null;
        }
        if (isset($conexion)) {
            try {
                if ($id_turno == -1) {
                    $sql = 'INSERT INTO turno(piloto_turno, copiloto_turno, fecha_turno, salida_turno, llegada_turno, avion_turno, aclaracion_turno, estado_turno) VALUES (:piloto_turno, :copiloto_turno, :fecha_turno, :salida_turno, :llegada_turno, :avion_turno, :aclaracion_turno, :estado_turno)';
                } else {
                    $sql = 'UPDATE turno SET piloto_turno=:piloto_turno, copiloto_turno=:copiloto_turno, fecha_turno=:fecha_turno, salida_turno=:salida_turno, llegada_turno=:llegada_turno, avion_turno=:avion_turno, aclaracion_turno=:aclaracion_turno, estado_turno=:estado_turno WHERE id_turno=:id_turno';
                }
                $sentencia = $conexion->prepare($sql);
                if ($id_turno != -1) {
                    $sentencia->bindParam('id_turno', $id_turno);
                }
                $sentencia->bindParam('piloto_turno', $piloto_turno);
                $sentencia->bindParam('copiloto_turno', $copiloto_turno);
                $sentencia->bindParam('fecha_turno', $fecha_turno);
                $sentencia->bindParam('salida_turno', $salida_turno);
                $sentencia->bindParam('llegada_turno', $llegada_turno);
                $sentencia->bindParam('avion_turno', $avion_turno);
                $sentencia->bindParam('aclaracion_turno', $aclaracion_turno);
                $sentencia->bindParam('estado_turno', $estado_turno);
                $sentencia->execute();
                if ($id_turno != -1) {
                    return 'Actualizado';
                } else {
                    return 'Insertado';
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return 'Error';
            }
        }
    }
    public static function pendienteConfirmed($conexion, $id_turno){
        if (isset($conexion)) {
            try {
                $sql = 'UPDATE turno SET estado_turno=:estado_turno WHERE id_turno=:id_turno';
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam('id_turno', $id_turno);
                $sentencia->bindValue('estado_turno', 1);
                $sentencia->execute();
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return 'Error';
            }
    }
    }
    public static function Cancelled($conexion, $id_turno){
        if (isset($conexion)) {
            try {
                $sql = 'UPDATE turno SET estado_turno=:estado_turno WHERE id_turno=:id_turno';
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam('id_turno', $id_turno);
                $sentencia->bindValue('estado_turno', 2);
                $sentencia->execute();
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return 'Error';
            }
    }
    }
    public static function listadoPendientes($conexion){
        $turnos = array();
        if (isset($conexion)) {
            try {
                if (isset($_POST['piloto_turno'])) {
                    $piloto_turno = $_POST['piloto_turno'];
                }
                if (isset($_POST['copiloto_turno'])) {
                    $copiloto_turno = $_POST['copiloto_turno'];
                }
                if (isset($_POST['fecha_turno'])) {
                    $valores= explode("/", $_POST['fecha_turno']);
                    $fecha_turno = $valores[2].'-'.$valores[1].'-'.$valores[0];
                }
                if (isset($_POST['salida_turno'])) {
                    $salida_turno = $_POST['salida_turno'];
                }
                if (isset($_POST['llegada_turno'])) {
                    $llegada_turno = $_POST['llegada_turno'];
                }
                if (isset($_POST['avion_turno'])) {
                    $avion_turno = $_POST['avion_turno'];
                }
                if (isset($_POST['aclaracion_turno'])) {
                    $aclaracion_turno = $_POST['aclaracion_turno'];
                }
                if(isset($_POST['pagina'])){
                    $pagina=$_POST['pagina'];
                }
                if (isset($_POST['largo0'])) {
                                $largo = $_POST['largo0'];
                            }
                $sql = "select * from turno where estado_turno=0 and (";
                if (isset($piloto_turno)&&$piloto_turno!='') {
                    $sql = $sql . "piloto_turno like :piloto_turno and ";
                }
                else{
                    $sql = $sql . "piloto_turno is not null and ";
                }
                if (isset($copiloto_turno)&&$copiloto_turno!='') {
                    $sql = $sql . "(copiloto_turno like :copiloto_turno) and ";
                }
                else{
                    $sql = $sql . "(copiloto_turno is null or copiloto_turno!='') and ";
                }
                if (isset($fecha_turno)&&$fecha_turno!='') {
                    $sql = $sql . "fecha_turno like :fecha_turno and ";
                }
                else{
                    $sql = $sql . "fecha_turno!='0-0-0' and ";
                }
                if (isset($salida_turno)&&$salida_turno!='') {
                    $sql = $sql . "salida_turno like :salida_turno and ";
                }
                else{
                    $sql = $sql . "salida_turno is not null and ";
                }
                if (isset($llegada_turno)&&$llegada_turno!='') {
                    $sql = $sql . "llegada_turno like :llegada_turno and ";
                }
                else{
                    $sql = $sql . "llegada_turno is not null and ";
                }
                if (isset($avion_turno)&&$avion_turno!='') {
                    $sql = $sql . "avion_turno like :avion_turno and ";
                }
                else{
                    $sql = $sql . "avion_turno!='' and ";
                }
                if (isset($aclaracion_turno)&&$aclaracion_turno!='') {
                    $sql = $sql . "(aclaracion_turno like :aclaracion_turno)) ";
                }
                else{
                    $sql = $sql . "(aclaracion_turno!='' or aclaracion_turno is not null or aclaracion_turno is null)) ";
                }
                $sql=$sql."order by fecha_turno asc, salida_turno asc";
                if(!isset($pagina)){
                    if(isset($largo)){
                        $sql = $sql . " limit 0,".$largo;
                    }
                    else{
                        $sql = $sql . " limit 0,10";
                    }
                }
                else{
                    $sql = $sql . " limit ". $pagina*$largo .",". $largo;
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($piloto_turno)&&$piloto_turno!=''){
                    $sentencia->bindValue('piloto_turno','%'.$piloto_turno.'%');
                }
                if (isset($copiloto_turno)&&$copiloto_turno!=''){
                    $sentencia->bindValue('copiloto_turno','%'.$copiloto_turno.'%');
                }
                if (isset($fecha_turno)&&$fecha_turno!=''){
                    $sentencia->bindValue('fecha_turno','%'.$fecha_turno.'%');
                }
                if (isset($salida_turno)&&$salida_turno!=''){
                    $sentencia->bindValue('salida_turno','%'.$salida_turno.'%');
                }
                if (isset($llegada_turno)&&$llegada_turno!=''){
                    $sentencia->bindValue('llegada_turno','%'.$llegada_turno.'%');
                }
                if (isset($avion_turno)&&$avion_turno!=''){
                    $sentencia->bindValue('avion_turno','%'.$avion_turno.'%');
                }
                if (isset($aclaracion_turno)&&$aclaracion_turno!=''){
                    $sentencia->bindValue('aclaracion_turno','%'.$aclaracion_turno.'%');
                }
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $turnos[] = new Turno($resultado['id_turno'], $resultado['piloto_turno'], $resultado['copiloto_turno'], $resultado['fecha_turno'], $resultado['salida_turno'], $resultado['llegada_turno'], $resultado['avion_turno'], $resultado['aclaracion_turno'], $resultado['estado_turno']);
                }
                return $turnos;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function listadoConfirmados($conexion){
        $turnos = array();
        if (isset($conexion)) {
            try {
                if (isset($_POST['piloto_turno'])) {
                    $piloto_turno = $_POST['piloto_turno'];
                }
                if (isset($_POST['copiloto_turno'])) {
                    $copiloto_turno = $_POST['copiloto_turno'];
                }
                if (isset($_POST['fecha_turno'])) {
                    $valores= explode("/", $_POST['fecha_turno']);
                    $fecha_turno = $valores[2].'-'.$valores[1].'-'.$valores[0];
                }
                if (isset($_POST['salida_turno'])) {
                    $salida_turno = $_POST['salida_turno'];
                }
                if (isset($_POST['llegada_turno'])) {
                    $llegada_turno = $_POST['llegada_turno'];
                }
                if (isset($_POST['avion_turno'])) {
                    $avion_turno = $_POST['avion_turno'];
                }
                if (isset($_POST['aclaracion_turno'])) {
                    $aclaracion_turno = $_POST['aclaracion_turno'];
                }
                if(isset($_POST['pagina'])){
                    $pagina=$_POST['pagina'];
                }
                if (isset($_POST['largo1'])) {
                                $largo = $_POST['largo1'];
                            }
                $sql = "select * from turno where estado_turno=1 and (";
                if (isset($piloto_turno)&&$piloto_turno!='') {
                    $sql = $sql . "piloto_turno like :piloto_turno and ";
                }
                else{
                    $sql = $sql . "piloto_turno is not null and ";
                }
                if (isset($copiloto_turno)&&$copiloto_turno!='') {
                    $sql = $sql . "(copiloto_turno like :copiloto_turno) and ";
                }
                else{
                    $sql = $sql . "(copiloto_turno is null or copiloto_turno!='') and ";
                }
                if (isset($fecha_turno)&&$fecha_turno!='') {
                    $sql = $sql . "fecha_turno like :fecha_turno and ";
                }
                else{
                    $sql = $sql . "fecha_turno!='0-0-0' and ";
                }
                if (isset($salida_turno)&&$salida_turno!='') {
                    $sql = $sql . "salida_turno like :salida_turno and ";
                }
                else{
                    $sql = $sql . "salida_turno is not null and ";
                }
                if (isset($llegada_turno)&&$llegada_turno!='') {
                    $sql = $sql . "llegada_turno like :llegada_turno and ";
                }
                else{
                    $sql = $sql . "llegada_turno is not null and ";
                }
                if (isset($avion_turno)&&$avion_turno!='') {
                    $sql = $sql . "avion_turno like :avion_turno and ";
                }
                else{
                    $sql = $sql . "avion_turno!='' and ";
                }
                if (isset($aclaracion_turno)&&$aclaracion_turno!='') {
                    $sql = $sql . "(aclaracion_turno like :aclaracion_turno)) ";
                }
                else{
                    $sql = $sql . "(aclaracion_turno!='' or aclaracion_turno is not null)) ";
                }
                $sql=$sql."order by fecha_turno asc, salida_turno asc";
                if(!isset($pagina)){
                    if(isset($largo)){
                        $sql = $sql . " limit 0,".$largo;
                    }
                    else{
                        $sql = $sql . " limit 0,10";
                    }
                }
                else{
                    $sql = $sql . " limit ". $pagina*$largo .",". $largo;
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($piloto_turno)&&$piloto_turno!=''){
                    $sentencia->bindValue('piloto_turno','%'.$piloto_turno.'%');
                }
                if (isset($copiloto_turno)&&$copiloto_turno!=''){
                    $sentencia->bindValue('copiloto_turno','%'.$copiloto_turno.'%');
                }
                if (isset($fecha_turno)&&$fecha_turno!=''){
                    $sentencia->bindValue('fecha_turno','%'.$fecha_turno.'%');
                }
                if (isset($salida_turno)&&$salida_turno!=''){
                    $sentencia->bindValue('salida_turno','%'.$salida_turno.'%');
                }
                if (isset($llegada_turno)&&$llegada_turno!=''){
                    $sentencia->bindValue('llegada_turno','%'.$llegada_turno.'%');
                }
                if (isset($avion_turno)&&$avion_turno!=''){
                    $sentencia->bindValue('avion_turno','%'.$avion_turno.'%');
                }
                if (isset($aclaracion_turno)&&$aclaracion_turno!=''){
                    $sentencia->bindValue('aclaracion_turno','%'.$aclaracion_turno.'%');
                }
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $turnos[] = new Turno($resultado['id_turno'], $resultado['piloto_turno'], $resultado['copiloto_turno'], $resultado['fecha_turno'], $resultado['salida_turno'], $resultado['llegada_turno'], $resultado['avion_turno'], $resultado['aclaracion_turno'], $resultado['estado_turno']);
                }
                return $turnos;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function listadoCancelados($conexion){
        $turnos = array();
        if (isset($conexion)) {
            try {
                if (isset($_POST['piloto_turno'])) {
                    $piloto_turno = $_POST['piloto_turno'];
                }
                if (isset($_POST['copiloto_turno'])) {
                    $copiloto_turno = $_POST['copiloto_turno'];
                }
                if (isset($_POST['fecha_turno'])) {
                    $valores= explode("/", $_POST['fecha_turno']);
                    $fecha_turno = $valores[2].'-'.$valores[1].'-'.$valores[0];
                }
                if (isset($_POST['salida_turno'])) {
                    $salida_turno = $_POST['salida_turno'];
                }
                if (isset($_POST['llegada_turno'])) {
                    $llegada_turno = $_POST['llegada_turno'];
                }
                if (isset($_POST['avion_turno'])) {
                    $avion_turno = $_POST['avion_turno'];
                }
                if (isset($_POST['aclaracion_turno'])) {
                    $aclaracion_turno = $_POST['aclaracion_turno'];
                }
                if(isset($_POST['pagina'])){
                    $pagina=$_POST['pagina'];
                }
                if (isset($_POST['largo2'])) {
                                $largo = $_POST['largo2'];
                            }
                $sql = "select * from turno where estado_turno=2 and (";
                if (isset($piloto_turno)&&$piloto_turno!='') {
                    $sql = $sql . "piloto_turno like :piloto_turno and ";
                }
                else{
                    $sql = $sql . "piloto_turno is not null and ";
                }
                if (isset($copiloto_turno)&&$copiloto_turno!='') {
                    $sql = $sql . "(copiloto_turno like :copiloto_turno) and ";
                }
                else{
                    $sql = $sql . "(copiloto_turno is null or copiloto_turno!='') and ";
                }
                if (isset($fecha_turno)&&$fecha_turno!='') {
                    $sql = $sql . "fecha_turno like :fecha_turno and ";
                }
                else{
                    $sql = $sql . "fecha_turno!='0-0-0' and ";
                }
                if (isset($salida_turno)&&$salida_turno!='') {
                    $sql = $sql . "salida_turno like :salida_turno and ";
                }
                else{
                    $sql = $sql . "salida_turno is not null and ";
                }
                if (isset($llegada_turno)&&$llegada_turno!='') {
                    $sql = $sql . "llegada_turno like :llegada_turno and ";
                }
                else{
                    $sql = $sql . "llegada_turno is not null and ";
                }
                if (isset($avion_turno)&&$avion_turno!='') {
                    $sql = $sql . "avion_turno like :avion_turno and ";
                }
                else{
                    $sql = $sql . "avion_turno!='' and ";
                }
                if (isset($aclaracion_turno)&&$aclaracion_turno!='') {
                    $sql = $sql . "(aclaracion_turno like :aclaracion_turno)) ";
                }
                else{
                    $sql = $sql . "(aclaracion_turno!='' or aclaracion_turno is not null)) ";
                }
                $sql=$sql."order by fecha_turno asc, salida_turno asc";
                if(!isset($pagina)){
                    if(isset($largo)){
                        $sql = $sql . " limit 0,".$largo;
                    }
                    else{
                        $sql = $sql . " limit 0,10";
                    }
                }
                else{
                    $sql = $sql . " limit ". $pagina*$largo .",". $largo;
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($piloto_turno)&&$piloto_turno!=''){
                    $sentencia->bindValue('piloto_turno','%'.$piloto_turno.'%');
                }
                if (isset($copiloto_turno)&&$copiloto_turno!=''){
                    $sentencia->bindValue('copiloto_turno','%'.$copiloto_turno.'%');
                }
                if (isset($fecha_turno)&&$fecha_turno!=''){
                    $sentencia->bindValue('fecha_turno','%'.$fecha_turno.'%');
                }
                if (isset($salida_turno)&&$salida_turno!=''){
                    $sentencia->bindValue('salida_turno','%'.$salida_turno.'%');
                }
                if (isset($llegada_turno)&&$llegada_turno!=''){
                    $sentencia->bindValue('llegada_turno','%'.$llegada_turno.'%');
                }
                if (isset($avion_turno)&&$avion_turno!=''){
                    $sentencia->bindValue('avion_turno','%'.$avion_turno.'%');
                }
                if (isset($aclaracion_turno)&&$aclaracion_turno!=''){
                    $sentencia->bindValue('aclaracion_turno','%'.$aclaracion_turno.'%');
                }
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $turnos[] = new Turno($resultado['id_turno'], $resultado['piloto_turno'], $resultado['copiloto_turno'], $resultado['fecha_turno'], $resultado['salida_turno'], $resultado['llegada_turno'], $resultado['avion_turno'], $resultado['aclaracion_turno'], $resultado['estado_turno']);
                }
                return $turnos;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function contRegistros($conexion,$pam){
        if (isset($conexion)) {
            try {
                if (isset($pam[0])) {
                    $piloto_turno = $pam[0];
                }
                if (isset($pam[1])) {
                    $copiloto_turno = $pam[1];
                }
                if (isset($pam[2])) {
                    $valores= explode("/", $pam[2]);
                    $fecha_turno = $valores[2].'-'.$valores[1].'-'.$valores[0];
                }
                if (isset($pam[3])) {
                    $salida_turno = $pam[3];
                }
                if (isset($pam[4])) {
                    $llegada_turno = $pam[4];
                }
                if (isset($pam[5])) {
                    $avion_turno = $pam[5];
                }
                if (isset($pam[6])) {
                    $aclaracion_turno = $pam[6];
                }
                if (isset($pam[7])) {
                    $estado_turno = $pam[7];
                }
                $sql = "select count(*) from turno where estado_turno=:estado_turno and (";
                if (isset($piloto_turno)&&$piloto_turno!='') {
                    $sql = $sql . "piloto_turno like :piloto_turno and ";
                }
                else{
                    $sql = $sql . "piloto_turno is not null and ";
                }
                if (isset($copiloto_turno)&&$copiloto_turno!='') {
                    $sql = $sql . "(copiloto_turno like :copiloto_turno) and ";
                }
                else{
                    $sql = $sql . "(copiloto_turno is null or copiloto_turno!='') and ";
                }
                if (isset($fecha_turno)&&$fecha_turno!='') {
                    $sql = $sql . "fecha_turno like :fecha_turno and ";
                }
                else{
                    $sql = $sql . "fecha_turno!='0-0-0' and ";
                }
                if (isset($salida_turno)&&$salida_turno!='') {
                    $sql = $sql . "salida_turno like :salida_turno and ";
                }
                else{
                    $sql = $sql . "salida_turno is not null and ";
                }
                if (isset($llegada_turno)&&$llegada_turno!='') {
                    $sql = $sql . "llegada_turno like :llegada_turno and ";
                }
                else{
                    $sql = $sql . "llegada_turno is not null and ";
                }
                if (isset($avion_turno)&&$avion_turno!='') {
                    $sql = $sql . "avion_turno like :avion_turno and ";
                }
                else{
                    $sql = $sql . "avion_turno!='' and ";
                }
                if (isset($aclaracion_turno)&&$aclaracion_turno!='') {
                    $sql = $sql . "(aclaracion_turno like :aclaracion_turno)) ";
                }
                else{
                    $sql = $sql . "(aclaracion_turno!='' or aclaracion_turno is not null)) ";
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($piloto_turno)&&$piloto_turno!=''){
                    $sentencia->bindValue('piloto_turno','%'.$piloto_turno.'%');
                }
                if (isset($copiloto_turno)&&$copiloto_turno!=''){
                    $sentencia->bindValue('copiloto_turno','%'.$copiloto_turno.'%');
                }
                if (isset($fecha_turno)&&$fecha_turno!=''){
                    $sentencia->bindValue('fecha_turno','%'.$fecha_turno.'%');
                }
                if (isset($salida_turno)&&$salida_turno!=''){
                    $sentencia->bindValue('salida_turno','%'.$salida_turno.'%');
                }
                if (isset($llegada_turno)&&$llegada_turno!=''){
                    $sentencia->bindValue('llegada_turno','%'.$llegada_turno.'%');
                }
                if (isset($avion_turno)&&$avion_turno!=''){
                    $sentencia->bindValue('avion_turno','%'.$avion_turno.'%');
                }
                if (isset($aclaracion_turno)&&$aclaracion_turno!=''){
                    $sentencia->bindValue('aclaracion_turno','%'.$aclaracion_turno.'%');
                }
                if (isset($estado_turno)){
                    $sentencia->bindParam('estado_turno',$estado_turno);
                }
                $sentencia->execute();
                if ($resultado = $sentencia->fetch()) {
                    return $resultado['count(*)'];
                }
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
}

