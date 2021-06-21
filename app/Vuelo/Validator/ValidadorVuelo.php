<?php

class ValidadorVuelo {

    private $id_vuelo;
    private $fecha_vuelo;
    private $salida_vuelo;
    private $llegada_vuelo;
    private $origen_vuelo;
    private $destino_vuelo;
    private $aterrizajes_vuelo;
    private $piloto_vuelo;
    private $copiloto_vuelo;
    private $duracion_vuelo;
    private $avion_vuelo;
    private $error_fecha_vuelo;
    private $error_salida_vuelo;
    private $error_llegada_vuelo;
    private $error_origen_vuelo;
    private $error_destino_vuelo;
    private $error_aterrizajes_vuelo;
    private $error_piloto_vuelo;
    private $error_copiloto_vuelo;
    private $error_avion_vuelo;

    function __construct($id_vuelo, $fecha_vuelo, $salida_vuelo, $llegada_vuelo, $origen_vuelo, $destino_vuelo, $aterrizajes_vuelo, $piloto_vuelo, $copiloto_vuelo, $duracion_vuelo, $avion_vuelo) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";
        $this->id_vuelo = $id_vuelo;
        $this->fecha_vuelo = "";
        $this->salida_vuelo = "";
        $this->llegada_vuelo = "";
        $this->origen_vuelo = "";
        $this->destino_vuelo = "";
        $this->aterrizajes_vuelo = "";
        $this->piloto_vuelo = "";
        $this->copiloto_vuelo = "";
        $this->duracion_vuelo = $duracion_vuelo;
        $this->avion_vuelo = "";
        $this->error_fecha_vuelo = $this->validar_fecha_vuelo($fecha_vuelo);
        $this->error_salida_vuelo = $this->validar_salida_vuelo($salida_vuelo);
        $this->error_llegada_vuelo = $this->validar_llegada_vuelo($llegada_vuelo);
        $this->error_origen_vuelo = $this->validar_origen_vuelo($origen_vuelo);
        $this->error_destino_vuelo = $this->validar_destino_vuelo($destino_vuelo);
        $this->error_aterrizajes_vuelo = $this->validar_aterrizajes_vuelo($aterrizajes_vuelo);
        $this->error_piloto_vuelo = $this->validar_piloto_vuelo($piloto_vuelo);
        $this->error_copiloto_vuelo = $this->validar_copiloto_vuelo($copiloto_vuelo);
        $this->error_avion_vuelo = $this->validar_avion_vuelo($avion_vuelo);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function validar_fecha_vuelo($fecha_vuelo) {
        if ($this->variable_iniciada($fecha_vuelo)) {
            $valores = explode("/", $fecha_vuelo);
            if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
                $this->fecha_vuelo = $fecha_vuelo;
            } else {
                return "Debe ingresar un formato valido(dd/MM/yyyy)";
            }
        } else {
            return "Debe ingresar la fecha de vuelo";
        }
    }

    public function validar_salida_vuelo($salida_vuelo) {
        if ($this->variable_iniciada($salida_vuelo)) {
            $valores = explode(":", $salida_vuelo);
            if (is_numeric($valores[0]) && is_numeric($valores[1])) {
                if (($valores[0] >= 0 && $valores[0] <= 23) && ($valores[1] >= 0 && $valores[1] <= 59)) {
                    $this->salida_vuelo = $salida_vuelo;
                }
            } else {
                return"Deben ser numeros";
            }
        } else {
            return "Debe ingresar la hora de salida";
        }
    }

    public function validar_llegada_vuelo($llegada_vuelo) {
        if ($this->variable_iniciada($llegada_vuelo)) {
            $valores = explode(":", $llegada_vuelo);
            if (is_numeric($valores[0]) && is_numeric($valores[1])) {
                if (($valores[0] >= 0 && $valores[0] <= 23) && ($valores[1] >= 0 && $valores[1] <= 59)) {
                    $this->llegada_vuelo = $llegada_vuelo;
                }
            } else {
                return"Deben ser numeros";
            }
        } else {
            return "Debe ingresar la hora de llegada";
        }
    }

    public function validar_origen_vuelo($origen_vuelo) {
        if ($this->variable_iniciada($origen_vuelo)) {
            if (strlen($origen_vuelo) > 7) {
                return "No debe exceder los 7 caracteres";
            } else {
                $this->origen_vuelo = $origen_vuelo;
            }
        } else {
            return "Debe ingresar el aeropuerto de origen";
        }
    }

    public function validar_destino_vuelo($destino_vuelo) {
        if ($this->variable_iniciada($destino_vuelo)) {
            if (strlen($destino_vuelo) > 7) {
                return "No debe exceder los 7 caracteres";
            } else {
                $this->destino_vuelo = $destino_vuelo;
            }
        } else {
            return "Debe ingresar el aeropuerto de destino";
        }
    }

    public function validar_aterrizajes_vuelo($aterrizajes_vuelo) {
        if ($this->variable_iniciada($aterrizajes_vuelo)) {
            if (strlen($aterrizajes_vuelo) > 11 || $aterrizajes_vuelo < 1) {
                return "No debe exceder los 11 caracteres. Minimo de 1 aterrizaje";
            } else {
                $this->aterrizajes_vuelo = $aterrizajes_vuelo;
            }
        } else {
            return "Debe ingresar el numero de aterrizajes";
        }
    }

    public function validar_piloto_vuelo($piloto_vuelo) {
        if ($this->variable_iniciada($piloto_vuelo)) {
            if (strlen($piloto_vuelo) > 20) {
                return "No debe exceder los 20 caracteres";
            } else {
                $this->piloto_vuelo = $piloto_vuelo;
            }
        } else {
            return "Debe ingresar el piloto";
        }
    }

    public function validar_copiloto_vuelo($copiloto_vuelo) {
        if ($this->variable_iniciada($copiloto_vuelo)) {
            if (strlen($copiloto_vuelo) > 20) {
                return "No debe exceder los 20 caracteres";
            } else {
                $this->copiloto_vuelo = $copiloto_vuelo;
            }
        } else {
            $this->copiloto_vuelo = $copiloto_vuelo;
        }
    }

    public function validar_avion_vuelo($avion_vuelo) {
        if ($this->variable_iniciada($avion_vuelo)) {
            if (strlen($avion_vuelo) > 7) {
                return "No debe exceder los 7 caracteres";
            } else {
                $this->avion_vuelo = $avion_vuelo;
            }
        } else {
            return "Debe ingresar el avion";
        }
    }

    function getId_vuelo() {
        return $this->id_vuelo;
    }

    function getFecha_vuelo() {
        return $this->fecha_vuelo;
    }

    function getSalida_vuelo() {
        return $this->salida_vuelo;
    }

    function getLlegada_vuelo() {
        return $this->llegada_vuelo;
    }

    function getOrigen_vuelo() {
        return $this->origen_vuelo;
    }

    function getDestino_vuelo() {
        return $this->destino_vuelo;
    }

    function getAterrizajes_vuelo() {
        return $this->aterrizajes_vuelo;
    }

    function getPiloto_vuelo() {
        return $this->piloto_vuelo;
    }

    function getCopiloto_vuelo() {
        return $this->copiloto_vuelo;
    }

    function getDuracion_vuelo() {
        return $this->duracion_vuelo;
    }

    function getAvion_vuelo() {
        return $this->avion_vuelo;
    }

    function getError_fecha_vuelo() {
        if ($this->error_fecha_vuelo != "") {
            return $this->aviso_inicio . $this->error_fecha_vuelo . $this->aviso_cierre;
        }
    }

    function getError_salida_vuelo() {
        if ($this->error_salida_vuelo != "") {
            return $this->aviso_inicio . $this->error_salida_vuelo . $this->aviso_cierre;
        }
    }

    function getError_llegada_vuelo() {
        if ($this->error_llegada_vuelo != "") {
            return $this->aviso_inicio . $this->error_llegada_vuelo . $this->aviso_cierre;
        }
    }

    function getError_origen_vuelo() {
        if ($this->error_origen_vuelo != "") {
            return $this->aviso_inicio . $this->error_origen_vuelo . $this->aviso_cierre;
        }
    }

    function getError_destino_vuelo() {
        if ($this->error_destino_vuelo != "") {
            return $this->aviso_inicio . $this->error_destino_vuelo . $this->aviso_cierre;
        }
    }

    function getError_aterrizajes_vuelo() {
        if ($this->error_aterrizajes_vuelo != "") {
            return $this->aviso_inicio . $this->error_aterrizajes_vuelo . $this->aviso_cierre;
        }
    }

    function getError_piloto_vuelo() {
        if ($this->error_piloto_vuelo != "") {
            return $this->aviso_inicio . $this->error_piloto_vuelo . $this->aviso_cierre;
        }
    }

    function getError_copiloto_vuelo() {
        if ($this->error_copiloto_vuelo != "") {
            return $this->aviso_inicio . $this->error_copiloto_vuelo . $this->aviso_cierre;
        }
    }

    function getError_avion_vuelo() {
        if ($this->error_avion_vuelo != "") {
            return $this->aviso_inicio . $this->error_avion_vuelo . $this->aviso_cierre;
        }
    }

    function setId_vuelo($id_vuelo) {
        $this->id_vuelo = $id_vuelo;
    }

    function setFecha_vuelo($fecha_vuelo) {
        $this->fecha_vuelo = $fecha_vuelo;
    }

    function setSalida_vuelo($salida_vuelo) {
        $this->salida_vuelo = $salida_vuelo;
    }

    function setLlegada_vuelo($llegada_vuelo) {
        $this->llegada_vuelo = $llegada_vuelo;
    }

    function setOrigen_vuelo($origen_vuelo) {
        $this->origen_vuelo = $origen_vuelo;
    }

    function setDestino_vuelo($destino_vuelo) {
        $this->destino_vuelo = $destino_vuelo;
    }

    function setAterrizajes_vuelo($aterrizajes_vuelo) {
        $this->aterrizajes_vuelo = $aterrizajes_vuelo;
    }

    function setPiloto_vuelo($piloto_vuelo) {
        $this->piloto_vuelo = $piloto_vuelo;
    }

    function setCopiloto_vuelo($copiloto_vuelo) {
        $this->copiloto_vuelo = $copiloto_vuelo;
    }

    function setDuracion_vuelo($duracion_vuelo) {
        $this->duracion_vuelo = $duracion_vuelo;
    }

    function setAvion_vuelo($avion_vuelo) {
        $this->avion_vuelo = $avion_vuelo;
    }

    function setError_fecha_vuelo($error_fecha_vuelo) {
        $this->error_fecha_vuelo = $error_fecha_vuelo;
    }

    function setError_salida_vuelo($error_salida_vuelo) {
        $this->error_salida_vuelo = $error_salida_vuelo;
    }

    function setError_llegada_vuelo($error_llegada_vuelo) {
        $this->error_llegada_vuelo = $error_llegada_vuelo;
    }

    function setError_origen_vuelo($error_origen_vuelo) {
        $this->error_origen_vuelo = $error_origen_vuelo;
    }

    function setError_destino_vuelo($error_destino_vuelo) {
        $this->error_destino_vuelo = $error_destino_vuelo;
    }

    function setError_aterrizajes_vuelo($error_aterrizajes_vuelo) {
        $this->error_aterrizajes_vuelo = $error_aterrizajes_vuelo;
    }

    function setError_piloto_vuelo($error_piloto_vuelo) {
        $this->error_piloto_vuelo = $error_piloto_vuelo;
    }

    function setError_copiloto_vuelo($error_copiloto_vuelo) {
        $this->error_copiloto_vuelo = $error_copiloto_vuelo;
    }

    function setError_avion_vuelo($error_avion_vuelo) {
        $this->error_avion_vuelo = $error_avion_vuelo;
    }

    function registroValido() {
        if ($this->error_aterrizajes_vuelo == '' &&
                $this->error_avion_vuelo == '' &&
                $this->error_copiloto_vuelo == '' &&
                $this->error_destino_vuelo == '' &&
                $this->error_fecha_vuelo == '' &&
                $this->error_llegada_vuelo == '' &&
                $this->error_origen_vuelo == '' &&
                $this->error_piloto_vuelo == '' &&
                $this->error_salida_vuelo == '') {
            return true;
        } else {
            return false;
        }
    }

    function limpiar() {
        $this->aterrizajes_vuelo = '';
        $this->avion_vuelo = '';
        $this->copiloto_vuelo = '';
        $this->destino_vuelo = '';
        $this->fecha_vuelo = '';
        $this->llegada_vuelo = '';
        $this->origen_vuelo = '';
        $this->piloto_vuelo = '';
        $this->salida_vuelo = '';
    }

}
