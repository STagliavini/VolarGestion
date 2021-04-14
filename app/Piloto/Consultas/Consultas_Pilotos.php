<?php

class Consultas_Pilotos {

    public static function insertar_piloto($conexion, $piloto) {
        $id_piloto = $piloto->getId_piloto();
        $dni_piloto = $piloto->getDni_piloto();
        $apellido_piloto = $piloto->getApellido_piloto();
        $nombre_piloto = $piloto->getNombre_piloto();
        $valores= explode("/", $piloto->getNacimiento_piloto());
        $nacimiento_piloto = $valores[2].'-'.$valores[1].'-'.$valores[0];
        $mail_piloto=$piloto->getMail_piloto();
        $deuda_piloto = $piloto->getDeuda_Piloto();
        if (isset($conexion)) {
            try {
                if ($id_piloto == -1) {
                    $sql = 'insert into piloto(dni_piloto,apellido_piloto,nombre_piloto,nacimiento_piloto,mail_piloto,deuda_piloto) values(:dni_piloto,:apellido_piloto,:nombre_piloto,:nacimiento_piloto,:mail_piloto,:deuda_piloto)';
                } else {
                    $sql = 'update piloto set dni_piloto=:dni_piloto,apellido_piloto=:apellido_piloto,nombre_piloto=:nombre_piloto,nacimiento_piloto=:nacimiento_piloto,mail_piloto=:mail_piloto,deuda_piloto=:deuda_piloto where id_piloto=:id_piloto';
                }
                $sentencia = $conexion->prepare($sql);
                if ($id_piloto != -1) {
                    $sentencia->bindParam('id_piloto', $id_piloto);
                }
                $sentencia->bindParam('dni_piloto', $dni_piloto);
                $sentencia->bindParam('apellido_piloto', $apellido_piloto);
                $sentencia->bindParam('nombre_piloto', $nombre_piloto);
                $sentencia->bindParam('nacimiento_piloto', $nacimiento_piloto);
                $sentencia->bindParam('mail_piloto', $mail_piloto);
                $sentencia->bindParam('deuda_piloto', $deuda_piloto);
                $sentencia->execute();
                if ($id_piloto != -1) {
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

    public static function existePiloto($conexion, $dni_avion) {
        if (isset($conexion)) {
            try {
                $sql = "select * from piloto where dni_piloto=:dni_piloto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("dni_piloto", $dni_avion);
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

    public static function buscarporId($conexion, $id_piloto) {
        if (isset($conexion)) {
            try {
                $sql = "select * from piloto where id_piloto=:id_piloto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_piloto", $id_piloto);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $piloto = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'],$resultado['nacimiento_piloto'],$resultado['mail_piloto'],$resultado['deuda_piloto']);
                    return $piloto;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function actDeuda($conexion, $dni_piloto,$deuda_piloto) {
        if (isset($conexion)) {
            try {
                $sql = "update piloto set deuda_piloto=:deuda_piloto where dni_piloto=:dni_piloto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("dni_piloto", $dni_piloto);
                $sentencia->bindParam("deuda_piloto", $deuda_piloto);
                $insert=$sentencia->execute();
                if ($insert) {
                    return "Exito";
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function buscarporDni($conexion, $dni_piloto) {
        if (isset($conexion)) {
            try {
                $sql = "select * from piloto where dni_piloto=:dni_piloto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("dni_piloto", $dni_piloto);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $piloto = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'],$resultado['nacimiento_piloto'],$resultado['mail_piloto'],$resultado['deuda_piloto']);
                    return $piloto;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    
    public static function listado($conexion) {
        $pilotos = array();
        if (isset($conexion)) {
            try {
                if (isset($_POST['dni_piloto'])) {
                    $dni_piloto = $_POST['dni_piloto'];
                }
                if (isset($_POST['apellido_piloto'])) {
                    $apellido_piloto = $_POST['apellido_piloto'];
                }
                if (isset($_POST['nombre_piloto'])) {
                    $nombre_piloto = $_POST['nombre_piloto'];
                }
                if (isset($_POST['nacimiento_piloto'])) {
                    $nacimiento_piloto = $_POST['nacimiento_piloto'];
                }
                if (isset($_POST['mail_piloto'])) {
                    $mail_piloto = $_POST['mail_piloto'];
                }
                if (isset($_POST['deuda_piloto'])) {
                    $deuda_piloto = $_POST['deuda_piloto'];
                }
                if (isset($_POST['pagina'])) {
                    $pagina = $_POST['pagina'];
                }
                if(isset($_POST['largo'])){
                    $largo=$_POST['largo'];
                }
                $sql = "select * from piloto where ";
                if (isset($dni_piloto)) {
                    $sql = $sql . "dni_piloto like :dni_piloto and ";
                }
                else{
                    $sql = $sql . "dni_piloto!='' and ";
                }
                if (isset($apellido_piloto)) {
                    $sql = $sql . "apellido_piloto like :apellido_piloto and ";
                }
                else{
                    $sql = $sql . "apellido_piloto!='' and ";
                }
                if (isset($nombre_piloto)) {
                    $sql = $sql . "nombre_piloto like :nombre_piloto and ";
                }
                else{
                    $sql = $sql . "nombre_piloto!='' and ";
                }
                if (isset($nacimiento_piloto)) {
                    $sql = $sql . "nacimiento_piloto like :nacimiento_piloto and ";
                }
                else{
                    $sql = $sql . "nacimiento_piloto!='' and ";
                }
                if (isset($mail_piloto)) {
                    $sql = $sql . "mail_piloto like :mail_piloto and ";
                }
                else{
                    $sql = $sql . "mail_piloto!='vacio' and ";
                }
                if (isset($deuda_piloto)) {
                    $sql = $sql . "deuda_piloto like :deuda_piloto";
                }
                else{
                    $sql = $sql . "deuda_piloto!=-1";
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
                if (isset($dni_piloto)){
                    $sentencia->bindValue('dni_piloto','%'.$dni_piloto.'%');
                }
                if (isset($apellido_piloto)){
                    $sentencia->bindValue('apellido_piloto','%'.$apellido_piloto.'%');
                }
                if (isset($nombre_piloto)){
                    $sentencia->bindValue('nombre_piloto','%'.$nombre_piloto.'%');
                }
                if (isset($nacimiento_piloto)){
                    $sentencia->bindValue('nacimiento_piloto','%'.$nacimiento_piloto.'%');
                }
                if (isset($mail_piloto)){
                    $sentencia->bindValue('mail_piloto','%'.$mail_piloto.'%');
                }
                if (isset($deuda_piloto)){
                    $sentencia->bindValue('deuda_piloto','%'.$deuda_piloto.'%');
                }
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $pilotos[] = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'],$resultado['nacimiento_piloto'],$resultado['mail_piloto'],$resultado['deuda_piloto']);
                }
                return $pilotos;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
public static function listarTodos($conexion) {
        $pilotos = array();
        if (isset($conexion)) {
            try {
                $sql = "select * from piloto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $pilotos[] = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'],$resultado['nacimiento_piloto'],$resultado['mail_piloto'],$resultado['deuda_piloto']);
                }
                return $pilotos;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function borrarporId($conexion, $id_piloto) {
        if (isset($conexion)) {
            try {
                $sql = "delete from piloto where id_piloto=:id_piloto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_piloto", $id_piloto);

                $sqli = "select * from piloto where id_piloto=:id_piloto";
                $sentenciai = $conexion->prepare($sqli);
                $sentenciai->bindParam("id_piloto", $id_piloto);
                $sentenciai->execute();
                $resultado = $sentenciai->fetch();
                if (!empty($resultado)) {
                    $piloto = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'],$resultado['nacimiento_piloto'],$resultado['mail_piloto'],$resultado['deuda_piloto']);
                    $sentencia->execute();
                    return $piloto;
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
                    $dni_piloto = $pam[0];
                }
                if (isset($pam[1])) {
                    $apellido_piloto = $pam[1];
                }
                if (isset($pam[2])) {
                    $nombre_piloto = $pam[2];
                }
                if (isset($pam[3])) {
                    $nacimiento_piloto = $pam[3];
                }
                if (isset($pam[4])) {
                    $deuda_piloto = $pam[4];
                }
                $sql = "select count(*) from piloto where ";
                if (isset($dni_piloto)) {
                    $sql = $sql . "dni_piloto like :dni_piloto and ";
                }
                else{
                    $sql = $sql . "dni_piloto!='' and ";
                }
                if (isset($apellido_piloto)) {
                    $sql = $sql . "apellido_piloto like :apellido_piloto and ";
                }
                else{
                    $sql = $sql . "apellido_piloto!='' and ";
                }
                if (isset($nombre_piloto)) {
                    $sql = $sql . "nombre_piloto like :nombre_piloto and ";
                }
                else{
                    $sql = $sql . "nombre_piloto!='' and ";
                }
                if (isset($nacimiento_piloto)) {
                    $sql = $sql . "nacimiento_piloto like :nacimiento_piloto and ";
                }
                else{
                    $sql = $sql . "nacimiento_piloto!='' and ";
                }
                if (isset($mail_piloto)) {
                    $sql = $sql . "mail_piloto like :mail_piloto and ";
                }
                else{
                    $sql = $sql . "mail_piloto!='vacio' and ";
                }
                if (isset($deuda_piloto)) {
                    $sql = $sql . "deuda_piloto like :deuda_piloto";
                }
                else{
                    $sql = $sql . "deuda_piloto!=-1";
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($dni_piloto)){
                    $sentencia->bindValue('dni_piloto','%'.$dni_piloto.'%');
                }
                if (isset($apellido_piloto)){
                    $sentencia->bindValue('apellido_piloto','%'.$apellido_piloto.'%');
                }
                if (isset($nombre_piloto)){
                    $sentencia->bindValue('nombre_piloto','%'.$nombre_piloto.'%');
                }
                if (isset($nacimiento_piloto)){
                    $sentencia->bindValue('nacimiento_piloto','%'.$nacimiento_piloto.'%');
                }
                if (isset($mail_piloto)){
                    $sentencia->bindValue('mail_piloto','%'.$mail_piloto.'%');
                }
                if (isset($deuda_piloto)){
                    $sentencia->bindValue('deuda_piloto','%'.$deuda_piloto.'%');
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
