<?php

class Consultas_Tipos_Aviones {

    public static function insertar_tipo_avion($conexion, $tipo_avion) {
        $id_tipo_avion = $tipo_avion->getId_tipo_avion();
        $nombre_tipo_avion = $tipo_avion->getNombre_tipo_avion();
        $precio_tipo_avion = $tipo_avion->getPrecio_tipo_avion();
        if (isset($conexion)) {
            try {
                if ($id_tipo_avion == -1) {
                    $sql = 'insert into tipo_avion(nombre_tipo_avion,precio_tipo_avion) values(:nombre_tipo_avion,:precio_tipo_avion)';
                } else {
                    $sql = 'update tipo_avion set nombre_tipo_avion=:nombre_tipo_avion,precio_tipo_avion=:precio_tipo_avion where id_tipo_avion=:id_tipo_avion';
                }
                $sentencia = $conexion->prepare($sql);
                if ($id_tipo_avion != -1) {
                    $sentencia->bindParam('id_tipo_avion', $id_tipo_avion);
                }
                $sentencia->bindParam('nombre_tipo_avion', $nombre_tipo_avion);
                $sentencia->bindParam('precio_tipo_avion', $precio_tipo_avion);
                $sentencia->execute();
                if ($id_tipo_avion != -1) {
                    return 'Actualizado';
                } else {
                    return 'Insertado';
                }
            } catch (Exception $ex) {
                return 'Error';
            }
        }
    }

    public static function existeTipoAvion($conexion, $nombre_tipo_avion) {
        if (isset($conexion)) {
            try {
                $sql = "select * from tipo_avion where nombre_tipo_avion=:nombre_tipo_avion";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("nombre_tipo_avion", $nombre_tipo_avion);
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

    public static function buscarporId($conexion, $id_tipo_avion) {
        if (isset($conexion)) {
            try {
                $sql = "select * from tipo_avion where id_tipo_avion=:id_tipo_avion";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_tipo_avion", $id_tipo_avion);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $tipo_avion = new Tipo_Avion($resultado['id_tipo_avion'], $resultado['nombre_tipo_avion'], $resultado['precio_tipo_avion']);
                    return $tipo_avion;
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
                if (isset($_POST['nombre_tipo_avion'])) {
                    $nombre_tipo_avion = $_POST['nombre_tipo_avion'];
                }
                if (isset($_POST['precio_tipo_avion'])) {
                    $precio_tipo_avion = $_POST['precio_tipo_avion'];
                }
                if(isset($_POST['pagina'])){
                    $pagina=$_POST['pagina'];
                }
                if(isset($_POST['largo'])){
                    $largo=$_POST['largo'];
                }
                $sql = "select * from tipo_avion where ";
                if (isset($nombre_tipo_avion)) {
                    $sql = $sql . "nombre_tipo_avion like :nombre_tipo_avion and ";
                }
                else{
                    $sql = $sql . "nombre_tipo_avion!='' and ";
                }
                if (isset($precio_tipo_avion)) {
                    $sql = $sql . "precio_tipo_avion like :precio_tipo_avion";
                }
                else{
                    $sql = $sql . "precio_tipo_avion!=''";
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
                if (isset($nombre_tipo_avion)){
                    $sentencia->bindValue('nombre_tipo_avion','%'.$nombre_tipo_avion.'%');
                }
                if (isset($precio_tipo_avion)){
                    $sentencia->bindValue('precio_tipo_avion','%'.$precio_tipo_avion.'%');
                }
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $aviones[] = new Tipo_Avion($resultado['id_tipo_avion'], $resultado['nombre_tipo_avion'], $resultado['precio_tipo_avion']);
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
                $sql = "select * from tipo_avion";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $aviones[] = new Tipo_Avion($resultado['id_tipo_avion'], $resultado['nombre_tipo_avion'], $resultado['precio_tipo_avion']);
                }
                return $aviones;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function borrarporId($conexion, $id_tipo_avion) {
        if (isset($conexion)) {
            try {
                $sql = "delete from tipo_avion where id_tipo_avion=:id_tipo_avion";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_tipo_avion", $id_tipo_avion);

                $sqli = "select * from tipo_avion where id_tipo_avion=:id_tipo_avion";
                $sentenciai = $conexion->prepare($sqli);
                $sentenciai->bindParam("id_tipo_avion", $id_tipo_avion);
                $sentenciai->execute();
                $resultado = $sentenciai->fetch();
                if (!empty($resultado)) {
                    $avion = new Tipo_Avion($resultado['id_tipo_avion'], $resultado['nombre_tipo_avion'], $resultado['precio_tipo_avion']);
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
                    $nombre_tipo_avion = $pam[0];
                }
                if (isset($pam[1])) {
                    $precio_tipo_avion = $pam[1];
                }
                $sql = "select count(*) from tipo_avion where ";
                if (isset($nombre_tipo_avion)) {
                    $sql = $sql . "nombre_tipo_avion like :nombre_tipo_avion and ";
                }
                else{
                    $sql = $sql . "nombre_tipo_avion!='' and ";
                }
                if (isset($precio_tipo_avion)) {
                    $sql = $sql . "precio_tipo_avion like :precio_tipo_avion";
                }
                else{
                    $sql = $sql . "precio_tipo_avion!=''";
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($nombre_tipo_avion)){
                    $sentencia->bindValue('nombre_tipo_avion','%'.$nombre_tipo_avion.'%');
                }
                if (isset($precio_tipo_avion)){
                    $sentencia->bindValue('precio_tipo_avion','%'.$precio_tipo_avion.'%');
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
