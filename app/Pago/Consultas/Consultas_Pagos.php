<?php

class Consultas_Pagos {

    public static function insertar_pago($conexion, $pago) {
        $id_pago = $pago->getId_pago();
        $dni_pago = $pago->getDni_pago();
        $monto_pago = $pago->getMonto_pago();
        $valores = explode("/", $pago->getFecha_pago());
        $fecha_pago = $valores[2] . '-' . $valores[1] . '-' . $valores[0];
        if (isset($conexion)) {
            try {
                if ($id_pago == -1) {
                    $sql = 'insert into pago(dni_pago,monto_pago,fecha_pago) values(:dni_pago,:monto_pago,:fecha_pago)';
                } else {
                    $sql = 'update pago set monto_pago=:monto_pago,dni_pago=:dni_pago,fecha_pago=:fecha_pago where id_pago=:id_pago';
                }
                $sentencia = $conexion->prepare($sql);
                if ($id_pago != -1) {
                    $sentencia->bindParam('id_pago', $id_pago);
                }
                $sentencia->bindParam('dni_pago', $dni_pago);
                $sentencia->bindParam('monto_pago', $monto_pago);
                $sentencia->bindParam('fecha_pago', $fecha_pago);
                $sentencia->execute();
                if ($id_pago != -1) {
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

    public static function buscarporId($conexion, $id_pago) {
        if (isset($conexion)) {
            try {
                $sql = "select * from pago where id_pago=:id_pago";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_pago", $id_pago);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $pago = new Pago($resultado['id_pago'], $resultado['dni_pago'], $resultado['monto_pago'], $resultado['fecha_pago']);
                    return $pago;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function buscarporId_Recibo($conexion, $id_pago) {
        if (isset($conexion)) {
            try {
                $sql = "select * from pago p join Piloto pi where p.dni_pago=pi.dni_piloto and id_pago=:id_pago";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_pago", $id_pago);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $array = array();
                    $pago = new Pago($resultado['id_pago'], $resultado['dni_pago'], $resultado['monto_pago'], $resultado['fecha_pago']);
                    $piloto = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'], $resultado['nacimiento_piloto'], $resultado['mail_piloto'], $resultado['deuda_piloto']);
                    $array[0] = $pago;
                    $array[1] = $piloto;
                    return $array;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function actDeuda($conexion, $dni_piloto, $deuda_piloto) {
        if (isset($conexion)) {
            try {
                $sql = "update piloto set deuda_piloto=:deuda_piloto where dni_piloto=:dni_piloto";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("dni_piloto", $dni_piloto);
                $sentencia->bindParam("deuda_piloto", $deuda_piloto);
                $insert = $sentencia->execute();
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
                    $piloto = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'], $resultado['nacimiento_piloto'], $resultado['deuda_piloto']);
                    return $piloto;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function listado($conexion) {
        $pagos = array();
        if (isset($conexion)) {
            try {
                if (isset($_POST['dni_pago'])) {
                    $dni_pago = $_POST['dni_pago'];
                }
                if (isset($_POST['monto_pago'])) {
                    $monto_pago = $_POST['monto_pago'];
                }
                if (isset($_POST['fecha_pago'])&&$_POST['fecha_pago']!='') {
                    $fecha_pago = $_POST['fecha_pago'];
                    $valores = explode("/", $fecha_pago);
                    $fecha_pago = $valores[2] . '-' . $valores[1] . '-' . $valores[0];
                }
                if (isset($_POST['pagina'])) {
                    $pagina = $_POST['pagina'];
                }
                if(isset($_POST['largo'])){
                    $largo=$_POST['largo'];
                }
                $sql = "select * from pago where ";
                if (isset($dni_pago)) {
                    $sql = $sql . "dni_pago like :dni_pago and ";
                } else {
                    $sql = $sql . "dni_pago!='' and ";
                }
                if (isset($monto_pago)) {
                    $sql = $sql . "monto_pago like :monto_pago and ";
                } else {
                    $sql = $sql . "monto_pago!='' and ";
                }
                if (isset($fecha_pago)) {
                    $sql = $sql . "fecha_pago like :fecha_pago";
                } else {
                    $sql = $sql . "fecha_pago!=''";
                }
                $sql=$sql." order by fecha_pago asc";
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
                if (isset($dni_pago)) {
                    $sentencia->bindValue('dni_pago', '%' . $dni_pago . '%');
                }
                if (isset($monto_pago)) {
                    $sentencia->bindValue('monto_pago', '%' . $monto_pago . '%');
                }
                if (isset($fecha_pago)) {
                    $sentencia->bindValue('fecha_pago', '%' . $fecha_pago . '%');
                }
                $sentencia->execute();
                while ($resultado = $sentencia->fetch()) {
                    $pagos[] = new Pago($resultado['id_pago'], $resultado['dni_pago'], $resultado['monto_pago'], $resultado['fecha_pago']);
                }
                return $pagos;
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
                    $pilotos[] = new Piloto($resultado['id_piloto'], $resultado['dni_piloto'], $resultado['apellido_piloto'], $resultado['nombre_piloto'], $resultado['nacimiento_piloto'], $resultado['deuda_piloto']);
                }
                return $pilotos;
            } catch (PDOException $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function borrarporId($conexion, $id_pago) {
        if (isset($conexion)) {
            try {
                $sql = "delete from pago where id_pago=:id_pago";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam("id_pago", $id_pago);

                $sqli = "select * from pago where id_pago=:id_pago";
                $sentenciai = $conexion->prepare($sqli);
                $sentenciai->bindParam("id_pago", $id_pago);
                $sentenciai->execute();
                $resultado = $sentenciai->fetch();
                if (!empty($resultado)) {
                    $pago = new Pago($resultado['id_pago'], $resultado['dni_pago'], $resultado['monto_pago'], $resultado['fecha_pago']);
                    $sentencia->execute();
                    return $pago;
                }
            } catch (Exception $ex) {
                print"Error" . $ex->getMessage();
            }
        }
    }

    public static function contRegistros($conexion, $pam) {
        if (isset($conexion)) {
            try {
                if (isset($pam[0])) {
                    $dni_pago = $pam[0];
                }
                if (isset($pam[1])) {
                    $monto_pago = $pam[1];
                }
                if (isset($pam[2])&&$pam[2]!='') {
                    $fecha_pago = $pam[2];
                    $valores = explode("/", $fecha_pago);
                    $fecha_pago = $valores[2] . '-' . $valores[1] . '-' . $valores[0];
                }
                $sql = "select count(*) from pago where ";
                if (isset($dni_pago)) {
                    $sql = $sql . "dni_pago like :dni_pago and ";
                } else {
                    $sql = $sql . "dni_pago!='' and ";
                }
                if (isset($monto_pago)) {
                    $sql = $sql . "monto_pago like :monto_pago and ";
                } else {
                    $sql = $sql . "monto_pago!='' and ";
                }
                if (isset($fecha_pago)) {
                    $sql = $sql . "fecha_pago like :fecha_pago";
                } else {
                    $sql = $sql . "fecha_pago!=''";
                }
                $sentencia = $conexion->prepare($sql);
                if (isset($dni_pago)) {
                    $sentencia->bindValue('dni_pago', '%' . $dni_pago . '%');
                }
                if (isset($monto_pago)) {
                    $sentencia->bindValue('monto_pago', '%' . $monto_pago . '%');
                }
                if (isset($fecha_pago)) {
                    $sentencia->bindValue('fecha_pago', '%' . $fecha_pago . '%');
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
