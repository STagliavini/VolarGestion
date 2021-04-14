<?php

class Consultas_Usuarios {

    public static function insertar_usuario($conexion, $usuario) {
        $id_usuario = $usuario->getId_usuario();
        $nombre_usuario = $usuario->getNombre_usuario();
        $contrasenia_usuario = $usuario->getContrasenia_usuario();
        $tipo_usuario = $usuario->getTipo_usuario();
        $perfil_usuario=$usuario->getPerfil_Usuario();
        $estado_usuario = $usuario->getEstado_usuario();
        if (isset($conexion)) {
            try {
                if ($id_usuario == -1) {
                    $sql = 'insert into usuario(nombre_usuario,contrasenia_usuario,tipo_usuario,estado_usuario,perfil_usuario) values(:nombre_usuario,:contrasenia_usuario,:tipo_usuario,:estado_usuario,:perfil_usuario)';
                } else {
                    $sql = 'update usuario set contrasenia_usuario=:contrasenia_usuario,tipo_usuario=:tipo_usuario,perfil_usuario=:perfil_usuario,estado_usuario=:estado_usuario where nombre_usuario=:nombre_usuario';
                }
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam('nombre_usuario', $nombre_usuario);
                $sentencia->bindParam('contrasenia_usuario', $contrasenia_usuario);
                $sentencia->bindParam('tipo_usuario', $tipo_usuario);
                $sentencia->bindParam('perfil_usuario', $perfil_usuario);
                $sentencia->bindParam('estado_usuario', $estado_usuario);
                $ejecucion=$sentencia->execute();
                if ($id_usuario != -1) {
                    return 'Actualizado';
                } else {
                    return 'Insertado';
                }
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
    }
    public static function cambiarContrasenia($conexion,$nombre_usuario,$contrasenia){
        if(isset($conexion)){
            try{
                $sql='update usuario set contrasenia_usuario=:contrasenia_usuario where nombre_usuario=:nombre_usuario';
                $sentencia=$conexion->prepare($sql);
                $sentencia->bindParam('contrasenia_usuario',$contrasenia);
                $sentencia->bindParam('nombre_usuario',$nombre_usuario);
                $ejecucion=$sentencia->execute();
                if($ejecucion){
                    return "Actualizada";
                }
            }catch(Exception $ex){
                print $ex->getMessage();
                return 'Error';
            }
        }
    }

    public static function existeUsuario($conexion, $usuario) {
        $nombre_usuario=$usuario->getNombre_Usuario();
        $contrasenia_usuario=$usuario->getContrasenia_Usuario();
        if (isset($conexion)) {
            try {
                $sql = "select * from usuario where nombre_usuario=:nombre_usuario and contrasenia_usuario=:contrasenia_usuario";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("nombre_usuario", $nombre_usuario);
                $sentencia->bindParam("contrasenia_usuario", $contrasenia_usuario);
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
    public static function buscarporNomyCont($conexion, $usuario) {
        $nombre_usuario=$usuario->getNombre_Usuario();
        $contrasenia_usuario=$usuario->getContrasenia_Usuario();
        if (isset($conexion)) {
            try {
                $sql = "select * from usuario where nombre_usuario=:nombre_usuario and contrasenia_usuario=:contrasenia_usuario and estado_usuario=1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("nombre_usuario", $nombre_usuario);
                $sentencia->bindParam("contrasenia_usuario", $contrasenia_usuario);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $usuario=new Usuario($resultado['id_usuario'],$resultado['nombre_usuario'],$resultado['contrasenia_usuario'],$resultado['tipo_usuario'],$resultado['perfil_usuario'],$resultado['estado_usuario']);
                    return $usuario;
                } else {
                    $usuario=new Usuario(-1, "", "", "","", 0);
                    return $usuario;
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
                    $piloto = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'],$resultado['nacimiento_piloto']);
                    return $piloto;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function buscarporNombre($conexion, $nombre_usuario) {
        if (isset($conexion)) {
            try {
                $sql = "select * from usuario u join piloto p where u.nombre_usuario=p.dni_piloto and nombre_usuario=:nombre_usuario";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("nombre_usuario", $nombre_usuario);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id_usuario'], $resultado['nombre_usuario'], $resultado['contrasenia_usuario'], $resultado['tipo_usuario'],$resultado['perfil_usuario'],$resultado['estado_usuario']);
                    $datos=array();
                    $datos[0]=$usuario;
                    $datos[1]=$resultado['nombre_piloto'];
                    return $datos;
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
                if (isset($_POST['pagina'])) {
                    $pagina = $_POST['pagina'];
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
                    $sql = $sql . "nacimiento_piloto like :nacimiento_piloto";
                }
                else{
                    $sql = $sql . "nacimiento_piloto!=''";
                }
                if(!isset($pagina)){
                    $sql = $sql . " limit 0,4";
                }
                else{
                    $sql = $sql . " limit ". $pagina*4 .",". 4;
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
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $pilotos[] = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'],$resultado['nacimiento_piloto']);
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
                    $pilotos[] = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'],$resultado['nacimiento_piloto']);
                }
                return $pilotos;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }
    public static function borrarporNombre($conexion, $nombre_usuario) {
        if (isset($conexion)) {
            try {
                $sql = "delete from usuario where nombre_usuario=:nombre_usuario";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("nombre_usuario", $nombre_usuario);

                $sqli = "select * from usuario where nombre_usuario=:nombre_usuario";
                $sentenciai = $conexion->prepare($sqli);
                $sentenciai->bindParam("nombre_usuario", $nombre_usuario);
                $sentenciai->execute();
                $resultado = $sentenciai->fetch();
                if (!empty($resultado)) {
                    $usuario= new Usuario($resultado['id_usuario'], $resultado['nombre_usuario'], $resultado['contrasenia_usuario'], $resultado['tipo_usuario'],$resultado['perfil_usuario'],$resultado['estado_usuario']);
                    $sentencia->execute();
                    return $usuario;
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
                    $sql = $sql . "nacimiento_piloto like :nacimiento_piloto";
                }
                else{
                    $sql = $sql . "nacimiento_piloto!=''";
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
