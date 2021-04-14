<?php

class Consultas_Vuelos {
    public static function difHoras($salida_vuelo,$llegada_vuelo,$conexion){
        $dif;
        if(isset($conexion)){
            try{
                $sql="select timediff(:salida_vuelo,:llegada_vuelo) as dif";
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam(":salida_vuelo",$salida_vuelo);
                $sentencia->bindParam(":llegada_vuelo",$llegada_vuelo);
                $sentencia->execute();
                $resultado=$sentencia->fetch();
                $dif=$resultado["dif"];
                return $dif;
            }catch(PDOException $ex){
                print"Error al insertar".$ex->getMessage();
            }
        }
    }
    public static function insertar_vuelo($conexion, $vuelo) {
        $valores= explode("/", $vuelo->getFecha_vuelo());
        $id_vuelo = $vuelo->getId_vuelo();
        $fecha_vuelo = $valores[2].'-'.$valores[1].'-'.$valores[0];
        $salida_vuelo = $vuelo->getSalida_vuelo();
        $llegada_vuelo = $vuelo->getLlegada_vuelo();
        $origen_vuelo=$vuelo->getOrigen_vuelo();
        $destino_vuelo=$vuelo->getDestino_vuelo();
        $aterrizajes_vuelo=$vuelo->getAterrizajes_vuelo();
        $piloto_vuelo=$vuelo->getPiloto_vuelo();
        $copiloto_vuelo=$vuelo->getCopiloto_vuelo();
        $duracion_vuelo=$vuelo->getDuracion_vuelo();
        $avion_vuelo=$vuelo->getAvion_vuelo();
        if($copiloto_vuelo==''){
            $copiloto_vuelo=null;
        }
        if (isset($conexion)) {
            try {
                if ($id_vuelo == -1) {
                    $sql = 'INSERT INTO vuelo(fecha_vuelo, salida_vuelo, llegada_vuelo, origen_vuelo, destino_vuelo, aterrizajes_vuelo, piloto_vuelo, copiloto_vuelo, duracion_vuelo, avion_vuelo) VALUES (:fecha_vuelo, :salida_vuelo, :llegada_vuelo, :origen_vuelo, :destino_vuelo, :aterrizajes_vuelo, :piloto_vuelo, :copiloto_vuelo, :duracion_vuelo, :avion_vuelo)';
                } else {
                    $sql = 'UPDATE vuelo SET fecha_vuelo=:fecha_vuelo,salida_vuelo=:salida_vuelo,llegada_vuelo=:llegada_vuelo,origen_vuelo=:origen_vuelo,destino_vuelo=:destino_vuelo,aterrizajes_vuelo=:aterrizajes_vuelo,piloto_vuelo=:piloto_vuelo,copiloto_vuelo=:copiloto_vuelo,duracion_vuelo=:duracion_vuelo,avion_vuelo=:avion_vuelo WHERE id_vuelo=:id_vuelo';
                }
                $sentencia = $conexion->prepare($sql);
                if ($id_vuelo != -1) {
                    $sentencia->bindParam('id_vuelo', $id_vuelo);
                }
                $sentencia->bindParam('fecha_vuelo', $fecha_vuelo);
                $sentencia->bindParam('salida_vuelo', $salida_vuelo);
                $sentencia->bindParam('llegada_vuelo', $llegada_vuelo);
                $sentencia->bindParam('origen_vuelo', $origen_vuelo);
                $sentencia->bindParam('destino_vuelo', $destino_vuelo);
                $sentencia->bindParam('aterrizajes_vuelo', $aterrizajes_vuelo);
                $sentencia->bindParam('piloto_vuelo', $piloto_vuelo);
                $sentencia->bindParam('copiloto_vuelo', $copiloto_vuelo);
                $sentencia->bindParam('duracion_vuelo', $duracion_vuelo);
                $sentencia->bindParam('avion_vuelo', $avion_vuelo);
                $sentencia->execute();
                if ($id_vuelo != -1) {
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

    public static function existeAvion($conexion, $matricula_avion) {
        if (isset($conexion)) {
            try {
                $sql = "select * from avion where matricula_avion=:matricula_avion";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("matricula_avion", $matricula_avion);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    return true;
                } else {
                    return false;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function calDeuda($conexion, $avion_vuelo) {
        if (isset($conexion)) {
            try {
                $sql = "select * from vuelo v join avion a join tipo_avion tp where v.avion_vuelo=a.matricula_avion and "
                        . "a.tipo_avion=tp.nombre_tipo_avion and v.avion_vuelo=:avion_vuelo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("avion_vuelo", $avion_vuelo);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $datos=$resultado['precio_tipo_avion'];
                    return $datos;
                }
            } catch (Exception $ex) {
                return "Error" . $ex->getMessage();
            }
        }
    }
    public static function buscarporId($conexion, $id_vuelo) {
        if (isset($conexion)) {
            try {
                $sql = "select * from vuelo where id_vuelo=:id_vuelo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_vuelo", $id_vuelo);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $vuelo = new Vuelo($resultado['id_vuelo'], $resultado['fecha_vuelo'], $resultado['salida_vuelo'], $resultado['llegada_vuelo'], $resultado['origen_vuelo'], $resultado['destino_vuelo'], $resultado['aterrizajes_vuelo'], $resultado['piloto_vuelo'], $resultado['copiloto_vuelo'], $resultado['duracion_vuelo'], $resultado['avion_vuelo']);
                    return $vuelo;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function listado($conexion) {
        $vuelos = array();
        if (isset($conexion)) {
            try {
                if (isset($_POST['fecha_vuelo'])) {
                    $fecha_vuelo = $_POST['fecha_vuelo'];
                }
                if (isset($_POST['salida_vuelo'])) {
                    $salida_vuelo = $_POST['salida_vuelo'];
                }
                if (isset($_POST['llegada_vuelo'])) {
                    $llegada_vuelo = $_POST['llegada_vuelo'];
                }
                if (isset($_POST['origen_vuelo'])) {
                    $origen_vuelo = $_POST['origen_vuelo'];
                }
                if (isset($_POST['destino_vuelo'])) {
                    $destino_vuelo = $_POST['destino_vuelo'];
                }
                if (isset($_POST['aterrizajes_vuelo'])) {
                    $aterrizajes_vuelo = $_POST['aterrizajes_vuelo'];
                }
                if (isset($_POST['piloto_vuelo'])) {
                    $piloto_vuelo = $_POST['piloto_vuelo'];
                }
                if (isset($_POST['copiloto_vuelo'])) {
                    $copiloto_vuelo = $_POST['copiloto_vuelo'];
                }
                if (isset($_POST['avion_vuelo'])) {
                    $avion_vuelo = $_POST['avion_vuelo'];
                }
                if(isset($_POST['pagina'])){
                    $pagina=$_POST['pagina'];
                }
                if(isset($_POST['largo'])){
                    $largo=$_POST['largo'];
                }
                $sql = "select * from vuelo where ";
                if (isset($fecha_vuelo)&&$fecha_vuelo!='') {
                    $sql = $sql . "fecha_vuelo like :fecha_vuelo and ";
                }
                else{
                    $sql = $sql . "fecha_vuelo!='0-0-0' and ";
                }
                if (isset($salida_vuelo)&&$salida_vuelo!='') {
                    $sql = $sql . "salida_vuelo like :salida_vuelo and ";
                }
                else{
                    $sql = $sql . "salida_vuelo is not null and ";
                }
                if (isset($llegada_vuelo)&&$llegada_vuelo!='') {
                    $sql = $sql . "llegada_vuelo like :llegada_vuelo and ";
                }
                else{
                    $sql = $sql . "llegada_vuelo is not null and ";
                }
                if (isset($origen_vuelo)&&$origen_vuelo!='') {
                    $sql = $sql . "origen_vuelo like :origen_vuelo and ";
                }
                else{
                    $sql = $sql . "origen_vuelo!='' and ";
                }
                if (isset($destino_vuelo)&&$destino_vuelo!='') {
                    $sql = $sql . "destino_vuelo like :destino_vuelo and ";
                }
                else{
                    $sql = $sql . "destino_vuelo!='' and ";
                }
                if (isset($aterrizajes_vuelo)&&$aterrizajes_vuelo!='') {
                    $sql = $sql . "aterrizajes_vuelo like :aterrizajes_vuelo and ";
                }
                else{
                    $sql = $sql . "aterrizajes_vuelo!=0 and ";
                }
                if (isset($piloto_vuelo)&&$piloto_vuelo!='') {
                    $sql = $sql . "piloto_vuelo like :piloto_vuelo and ";
                }
                else{
                    $sql = $sql . "piloto_vuelo is not null and ";
                }
                if (isset($copiloto_vuelo)&&$copiloto_vuelo!='') {
                    $sql = $sql . "copiloto_vuelo like :copiloto_vuelo and ";
                }
                else{
                    $sql = $sql . "copiloto_vuelo is null or copiloto_vuelo!='' and ";
                }
                if (isset($avion_vuelo)&&$avion_vuelo!='') {
                    $sql = $sql . "avion_vuelo like :avion_vuelo";
                }
                else{
                    $sql = $sql . "avion_vuelo!=''";
                }
                $sql=$sql." order by fecha_vuelo asc, salida_vuelo asc";
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
                if (isset($fecha_vuelo)&&$fecha_vuelo!=''){
                    $sentencia->bindValue('fecha_vuelo','%'.$fecha_vuelo.'%');
                }
                if (isset($salida_vuelo)&&$salida_vuelo!=''){
                    $sentencia->bindValue('salida_vuelo','%'.$salida_vuelo.'%');
                }
                if (isset($llegada_vuelo)&&$llegada_vuelo!=''){
                    $sentencia->bindValue('llegada_vuelo','%'.$llegada_vuelo.'%');
                }
                if (isset($origen_vuelo)&&$origen_vuelo!=''){
                    $sentencia->bindValue('origen_vuelo','%'.$origen_vuelo.'%');
                }
                if (isset($destino_vuelo)&&$destino_vuelo!=''){
                    $sentencia->bindValue('destino_vuelo','%'.$destino_vuelo.'%');
                }
                if (isset($aterrizajes_vuelo)&&$aterrizajes_vuelo!=''){
                    $sentencia->bindValue('aterrizajes_vuelo','%'.$aterrizajes_vuelo.'%');
                }
                if (isset($piloto_vuelo)&&$piloto_vuelo!=''){
                    $sentencia->bindValue('piloto_vuelo','%'.$piloto_vuelo.'%');
                }
                if (isset($copiloto_vuelo)&&$copiloto_vuelo!=''){
                    $sentencia->bindValue('copiloto_vuelo','%'.$copiloto_vuelo.'%');
                }
                if (isset($avion_vuelo)&&$avion_vuelo!=''){
                    $sentencia->bindValue('avion_vuelo','%'.$avion_vuelo.'%');
                }
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $vuelos[] = new Vuelo($resultado['id_vuelo'], $resultado['fecha_vuelo'], $resultado['salida_vuelo'], $resultado['llegada_vuelo'], $resultado['origen_vuelo'], $resultado['destino_vuelo'], $resultado['aterrizajes_vuelo'], $resultado['piloto_vuelo'], $resultado['copiloto_vuelo'], $resultado['duracion_vuelo'], $resultado['avion_vuelo']);
                }
                return $vuelos;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function borrarporId($conexion, $id_vuelo) {
        if (isset($conexion)) {
            try {
                $sql = "delete from vuelo where id_vuelo=:id_vuelo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_vuelo", $id_vuelo);

                $sqli = "select * from vuelo where id_vuelo=:id_vuelo";
                $sentenciai = $conexion->prepare($sqli);
                $sentenciai->bindParam("id_vuelo", $id_vuelo);
                $sentenciai->execute();
                $resultado = $sentenciai->fetch();
                if (!empty($resultado)) {
                    $vuelo = new Vuelo($resultado['id_vuelo'], $resultado['fecha_vuelo'], $resultado['salida_vuelo'], $resultado['llegada_vuelo'], $resultado['origen_vuelo'], $resultado['destino_vuelo'], $resultado['aterrizajes_vuelo'], $resultado['piloto_vuelo'], $resultado['copiloto_vuelo'], $resultado['duracion_vuelo'], $resultado['avion_vuelo']);
                    $sentencia->execute();
                    return $vuelo;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function contRegistros($conexion,$pam){
        if (isset($conexion)) {
            try {
                if (isset($pam[0])) {
                    $fecha_vuelo = $pam[0];
                }
                if (isset($pam[1])) {
                    $salida_vuelo = $pam[1];
                }
                if (isset($pam[2])) {
                    $llegada_vuelo = $pam[2];
                }
                if (isset($pam[3])) {
                    $origen_vuelo = $pam[3];
                }
                if (isset($pam[4])) {
                    $destino_vuelo = $pam[4];
                }
                if (isset($pam[5])) {
                    $aterrizajes_vuelo = $pam[5];
                }
                if (isset($pam[6])) {
                    $piloto_vuelo = $pam[6];
                }
                if (isset($pam[7])) {
                    $copiloto_vuelo = $pam[7];
                }
                if (isset($pam[8])) {
                    $avion_vuelo = $pam[8];
                }
                $sql = "select count(*) from vuelo where ";
                if (isset($fecha_vuelo)&&$fecha_vuelo!='') {
                    $sql = $sql . "fecha_vuelo like :fecha_vuelo and ";
                }
                else{
                    $sql = $sql . "fecha_vuelo!='0-0-0' and ";
                }
                if (isset($salida_vuelo)&&$salida_vuelo!='') {
                    $sql = $sql . "salida_vuelo like :salida_vuelo and ";
                }
                else{
                    $sql = $sql . "salida_vuelo is not null and ";
                }
                if (isset($llegada_vuelo)&&$llegada_vuelo!='') {
                    $sql = $sql . "llegada_vuelo like :llegada_vuelo and ";
                }
                else{
                    $sql = $sql . "llegada_vuelo is not null and ";
                }
                if (isset($origen_vuelo)&&$origen_vuelo!='') {
                    $sql = $sql . "origen_vuelo like :origen_vuelo and ";
                }
                else{
                    $sql = $sql . "origen_vuelo!='' and ";
                }
                if (isset($destino_vuelo)&&$destino_vuelo!='') {
                    $sql = $sql . "destino_vuelo like :destino_vuelo and ";
                }
                else{
                    $sql = $sql . "destino_vuelo!='' and ";
                }
                if (isset($aterrizajes_vuelo)&&$aterrizajes_vuelo!='') {
                    $sql = $sql . "aterrizajes_vuelo like :aterrizajes_vuelo and ";
                }
                else{
                    $sql = $sql . "aterrizajes_vuelo!=0 and ";
                }
                if (isset($piloto_vuelo)&&$piloto_vuelo!='') {
                    $sql = $sql . "piloto_vuelo like :piloto_vuelo and ";
                }
                else{
                    $sql = $sql . "piloto_vuelo is not null and ";
                }
                if (isset($copiloto_vuelo)&&$copiloto_vuelo!='') {
                    $sql = $sql . "copiloto_vuelo like :copiloto_vuelo and ";
                }
                else{
                    $sql = $sql . "copiloto_vuelo is null and ";
                }
                if (isset($avion_vuelo)&&$avion_vuelo!='') {
                    $sql = $sql . "avion_vuelo like :avion_vuelo";
                }
                else{
                    $sql = $sql . "avion_vuelo!=''";
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($fecha_vuelo)&&$fecha_vuelo!=''){
                    $sentencia->bindValue('fecha_vuelo','%'.$fecha_vuelo.'%');
                }
                if (isset($salida_vuelo)&&$salida_vuelo!=''){
                    $sentencia->bindValue('salida_vuelo','%'.$salida_vuelo.'%');
                }
                if (isset($llegada_vuelo)&&$llegada_vuelo!=''){
                    $sentencia->bindValue('llegada_vuelo','%'.$llegada_vuelo.'%');
                }
                if (isset($origen_vuelo)&&$origen_vuelo!=''){
                    $sentencia->bindValue('origen_vuelo','%'.$origen_vuelo.'%');
                }
                if (isset($destino_vuelo)&&$destino_vuelo!=''){
                    $sentencia->bindValue('destino_vuelo','%'.$destino_vuelo.'%');
                }
                if (isset($aterrizajes_vuelo)&&$aterrizajes_vuelo!=''){
                    $sentencia->bindValue('aterrizajes_vuelo','%'.$aterrizajes_vuelo.'%');
                }
                if (isset($piloto_vuelo)&&$piloto_vuelo!=''){
                    $sentencia->bindValue('piloto_vuelo','%'.$piloto_vuelo.'%');
                }
                if (isset($copiloto_vuelo)&&$copiloto_vuelo!=''){
                    $sentencia->bindValue('copiloto_vuelo','%'.$copiloto_vuelo.'%');
                }
                if (isset($avion_vuelo)&&$avion_vuelo!=''){
                    $sentencia->bindValue('avion_vuelo','%'.$avion_vuelo.'%');
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
