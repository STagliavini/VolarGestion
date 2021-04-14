<?php

class Consultas_Aviones {

    public static function insertar_avion($conexion, $avion) {
        $id_avion = $avion->getId_avion();
        $matricula_avion = $avion->getMatricula_avion();
        $nombre_avion = $avion->getNombre_avion();
        $descripcion_avion = $avion->getDescripcion_avion();
        $tipo_avion=$avion->getTipo_avion();
        if (isset($conexion)) {
            try {
                if ($id_avion == -1) {
                    $sql = 'insert into avion(matricula_avion,nombre_avion,descripcion_avion,tipo_avion) values(:matricula_avion,:nombre_avion,:descripcion_avion,:tipo_avion)';
                } else {
                    $sql = 'update avion set matricula_avion=:matricula_avion,nombre_avion=:nombre_avion,descripcion_avion=:descripcion_avion,tipo_avion=:tipo_avion where id_avion=:id_avion';
                }
                $sentencia = $conexion->prepare($sql);
                if ($id_avion != -1) {
                    $sentencia->bindParam('id_avion', $id_avion);
                }
                $sentencia->bindParam('matricula_avion', $matricula_avion);
                $sentencia->bindParam('nombre_avion', $nombre_avion);
                $sentencia->bindParam('descripcion_avion', $descripcion_avion);
                $sentencia->bindParam('tipo_avion', $tipo_avion);
                $sentencia->execute();
                if ($id_avion != -1) {
                    return 'Actualizado';
                } else {
                    return 'Insertado';
                }
            } catch (Exception $ex) {
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

    public static function buscarporId($conexion, $id_avion) {
        if (isset($conexion)) {
            try {
                $sql = "select * from avion where id_avion=:id_avion";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_avion", $id_avion);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $avion = new Avion($resultado['id_avion'], $resultado['matricula_avion'], $resultado['nombre_avion'], $resultado['descripcion_avion'],$resultado['tipo_avion']);
                    return $avion;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function listado($conexion) {
        $aviones = array();
        if (isset($conexion)) {
            try {
                if (isset($_POST['matricula_avion'])) {
                    $matricula_avion = $_POST['matricula_avion'];
                }
                if (isset($_POST['nombre_avion'])) {
                    $nombre_avion = $_POST['nombre_avion'];
                }
                if (isset($_POST['descripcion_avion'])) {
                    $descripcion_avion = $_POST['descripcion_avion'];
                }
                if (isset($_POST['tipo_avion'])) {
                    $tipo_avion = $_POST['tipo_avion'];
                }
                if (isset($_POST['pagina'])) {
                    $pagina = $_POST['pagina'];
                }
                if (isset($_POST['largo'])) {
                    $largo = $_POST['largo'];
                }
                $sql = "select * from avion where ";
                if (isset($matricula_avion)) {
                    $sql = $sql . "matricula_avion like :matricula_avion and ";
                }
                else{
                    $sql = $sql . "matricula_avion!='' and ";
                }
                if (isset($nombre_avion)) {
                    $sql = $sql . "nombre_avion like :nombre_avion and ";
                }
                else{
                    $sql = $sql . "nombre_avion!='' and ";
                }
                if (isset($descripcion_avion)) {
                    $sql = $sql . "descripcion_avion like :descripcion_avion and ";
                }
                else{
                    $sql = $sql . "descripcion_avion!='' and ";
                }
                if (isset($tipo_avion)&&$tipo_avion!='') {
                    $sql = $sql . "tipo_avion like :tipo_avion";
                }
                else{
                    $sql = $sql . "tipo_avion!=''";
                }
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
                if (isset($matricula_avion)){
                    $sentencia->bindValue('matricula_avion','%'.$matricula_avion.'%');
                }
                if (isset($nombre_avion)){
                    $sentencia->bindValue('nombre_avion','%'.$nombre_avion.'%');
                }
                if (isset($descripcion_avion)){
                    $sentencia->bindValue('descripcion_avion','%'.$descripcion_avion.'%');
                }
                if (isset($tipo_avion)&&$tipo_avion!=''){
                    $sentencia->bindValue('tipo_avion','%'.$tipo_avion.'%');
                }
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $aviones[] = new Avion($resultado['id_avion'], $resultado['matricula_avion'], $resultado['nombre_avion'], $resultado['descripcion_avion'],$resultado['tipo_avion']);
                }
                return $aviones;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
public static function listarTodos($conexion) {
        $aviones = array();
        if (isset($conexion)) {
            try {
                $sql = "select * from avion";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $aviones[] = new Avion($resultado['id_avion'], $resultado['matricula_avion'], $resultado['nombre_avion'], $resultado['descripcion_avion'],$resultado['tipo_avion']);
                }
                return $aviones;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function borrarporId($conexion, $id_avion) {
        if (isset($conexion)) {
            try {
                $sql = "delete from avion where id_avion=:id_avion";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_avion", $id_avion);

                $sqli = "select * from avion where id_avion=:id_avion";
                $sentenciai = $conexion->prepare($sqli);
                $sentenciai->bindParam("id_avion", $id_avion);
                $sentenciai->execute();
                $resultado = $sentenciai->fetch();
                if (!empty($resultado)) {
                    $avion = new Avion($resultado['id_avion'], $resultado['matricula_avion'], $resultado['nombre_avion'], $resultado['descripcion_avion'],$resultado['tipo_avion']);
                    $sentencia->execute();
                    return $avion;
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
                    $matricula_avion = $pam[0];
                }
                if (isset($pam[1])) {
                    $nombre_avion = $pam[1];
                }
                if (isset($pam[2])) {
                    $descripcion_avion = $pam[2];
                }
                if (isset($pam[3])) {
                    $tipo_avion = $pam[3];
                }
                $sql = "select count(*) from avion where ";
                if (isset($matricula_avion)) {
                    $sql = $sql . "matricula_avion like :matricula_avion and ";
                }
                else{
                    $sql = $sql . "matricula_avion!='' and ";
                }
                if (isset($nombre_avion)) {
                    $sql = $sql . "nombre_avion like :nombre_avion and ";
                }
                else{
                    $sql = $sql . "nombre_avion!='' and ";
                }
                if (isset($descripcion_avion)) {
                    $sql = $sql . "descripcion_avion like :descripcion_avion and ";
                }
                else{
                    $sql = $sql . "descripcion_avion!='' and ";
                }
                if (isset($tipo_avion)&&$tipo_avion!='') {
                    $sql = $sql . "tipo_avion like :tipo_avion";
                }
                else{
                    $sql = $sql . "tipo_avion!=''";
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($matricula_avion)){
                    $sentencia->bindValue('matricula_avion','%'.$matricula_avion.'%');
                }
                if (isset($nombre_avion)){
                    $sentencia->bindValue('nombre_avion','%'.$nombre_avion.'%');
                }
                if (isset($descripcion_avion)){
                    $sentencia->bindValue('descripcion_avion','%'.$descripcion_avion.'%');
                }
                if (isset($tipo_avion)&&$tipo_avion!=''){
                    $sentencia->bindValue('tipo_avion','%'.$tipo_avion.'%');
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
