<?php

class ValidadorPago {

    private $id_pago;
    private $dni_pago;
    private $monto_pago;
    private $fecha_pago;
    private $error_dni_pago;
    private $error_monto_pago;
    private $error_fecha_pago;
    private $aviso_inicio;
    private $aviso_cierre;

    function __construct($id_pago, $dni_pago, $monto_pago,$fecha_pago) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";
        $this->id_pago = $id_pago;
        $this->dni_pago = "";
        $this->monto_pago = "";
        $this->fecha_pago = "";
        $this->error_dni_pago = $this->validar_dni_pago($dni_pago);
        $this->error_monto_pago = $this->validar_monto_pago($monto_pago);
        $this->error_fecha_pago=$this->validar_fecha_pago($fecha_pago);
    }
    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    public function validar_monto_pago($monto_pago){
        if ($this->variable_iniciada($monto_pago)) {
            if (strlen($monto_pago) > 15) {
                return "No debe exceder los 15 caracteres";
            } else {
                if(!is_numeric($monto_pago)){
                    return "Debe ser un numero";
                }
                else{
                    $this->monto_pago = $monto_pago;
                }
            }
        } else {
            return "Debe ingresar el precio del avion";
        }
    }
    public function validar_dni_pago($dni_pago) {
        if ($this->variable_iniciada($dni_pago)) {
            if (strlen($dni_pago) > 8) {
                return "No debe exceder los 8 caracteres";
            } else {
                if (is_numeric($dni_pago)) {
                    $this->dni_pago = $dni_pago;
                }
                else{
                    return "Debe ser numerico";
                }
            }
        } else {
            return "Debe ingresar el dni del piloto";
        }
    }

    public function validar_apellido_piloto($apellido_piloto) {
        if ($this->variable_iniciada($apellido_piloto)) {
            if (strlen($apellido_piloto) > 50) {
                return "No debe exceder los 50 caracteres";
            } else {
                $this->apellido_piloto = $apellido_piloto;
            }
        } else {
            return "Debe ingresar el apellido del piloto";
        }
    }

    public function validar_nombre_piloto($nombre_piloto) {
        if ($this->variable_iniciada($nombre_piloto)) {
            if (strlen($nombre_piloto) > 50) {
                return "No debe exceder los 50 caracteres";
            } else {
                $this->nombre_piloto = $nombre_piloto;
            }
        } else {
            return "Debe ingresar el nombre del piloto";
        }
    }

    public function validar_fecha_pago($fecha_pago) {
        if ($this->variable_iniciada($fecha_pago)) {
            $valores = explode("/", $fecha_pago);
            if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
                $this->fecha_pago = $fecha_pago;
            } else {
                return "Debe ingresar un formato valido(dd/MM/yyyy)";
            }
        } else {
            return "Debe ingresar la fecha de pago";
        }
    }
    function getFecha_pago() {
        return $this->fecha_pago;
    }

    function getError_fecha_pago() {
        if ($this->error_fecha_pago != "") {
            return $this->aviso_inicio . $this->error_fecha_pago . $this->aviso_cierre;
        }
    }

    function setFecha_pago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }

    function setError_fecha_pago($error_fecha_pago) {
        $this->error_fecha_pago = $error_fecha_pago;
    }

        function getId_pago() {
        return $this->id_pago;
    }

    function getDni_pago() {
        return $this->dni_pago;
    }

    function getMonto_pago() {
        return $this->monto_pago;
    }

    function getError_dni_pago() {
        if ($this->error_dni_pago != "") {
            return $this->aviso_inicio . $this->error_dni_pago . $this->aviso_cierre;
        }
    }

    function getError_monto_pago() {
        if ($this->error_monto_pago != "") {
            return $this->aviso_inicio . $this->error_monto_pago . $this->aviso_cierre;
        }
    }

    function getAviso_inicio() {
        return $this->aviso_inicio;
    }

    function getAviso_cierre() {
        return $this->aviso_cierre;
    }

    function setId_pago($id_pago) {
        $this->id_pago = $id_pago;
    }

    function setDni_pago($dni_pago) {
        $this->dni_pago = $dni_pago;
    }

    function setMonto_pago($monto_pago) {
        $this->monto_pago = $monto_pago;
    }

    function setError_dni_pago($error_dni_pago) {
        $this->error_dni_pago = $error_dni_pago;
    }

    function setError_monto_pago($error_monto_pago) {
        $this->error_monto_pago = $error_monto_pago;
    }

    function setAviso_inicio($aviso_inicio) {
        $this->aviso_inicio = $aviso_inicio;
    }

    function setAviso_cierre($aviso_cierre) {
        $this->aviso_cierre = $aviso_cierre;
    }

        function registroValido() {
        if ($this->error_dni_pago == '' &&
                $this->error_monto_pago == ''&&
                $this->error_fecha_pago=='') {
            return true;
        } else {
            return false;
        }
    }

    function limpiar() {
        $this->dni_pago = '';
        $this->monto_pago = '';
        $this->fecha_pago = '';
    }

}
