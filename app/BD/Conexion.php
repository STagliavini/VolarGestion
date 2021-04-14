<?php

class Conexion {

    private static $conexion;

    public static function abrir_conexion() {
        if (!isset(self::$conexion)) {
            try {
                self::$conexion=new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_BASE_DATOS, NOMBRE_USUARIO, PASSWORD);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("SET CHARACTER SET utf8");
            } catch (PDOException $e) {
                print 'ERROR'.$e->getMessage()."<br>";
                die();
            }
        }
    }
    public static function cerrar_conexion(){
        if(isset(self::$conexion)){
            self::$conexion=null;
        }
    }
    public static function getconexion(){
        return self::$conexion;
    }

}

?>