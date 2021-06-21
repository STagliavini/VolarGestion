<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidadorTurno
 *
 * @author Santiago Tagliavini
 */
class ValidadorTurno {
    private $id_turno;
    private $piloto_turno;
    private $copiloto_turno;
    private $fecha_turno;
    private $salida_turno;
    private $llegada_turno;
    private $avion_turno;
    private $aclaracion_turno;
    private $estado_turno;
    private $error_piloto_turno;
    private $error_avion_turno;
    private $error_fecha_turno;
    private $error_salida_turno;
    private $error_llegada_turno;
    private $error_aclaracion_turno;
    private $aviso_inicio;
    private $aviso_cierre;
    function __construct($id_turno, $piloto_turno, $copiloto_turno, $fecha_turno, $salida_turno, $llegada_turno, $avion_turno, $aclaracion_turno, $estado_turno) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";
        $this->id_turno = $id_turno;
        $this->piloto_turno = "";
        $this->copiloto_turno = $copiloto_turno;
        $this->fecha_turno = "";
        $this->salida_turno = "";
        $this->llegada_turno = "";
        $this->avion_turno = "";
        $this->aclaracion_turno = "";
        $this->estado_turno = $estado_turno;
        $this->error_piloto_turno = $this->validar_piloto_turno($piloto_turno);
        $this->error_avion_turno = $this->validar_avion_turno($avion_turno);
        $this->error_fecha_turno = $this->validar_fecha_turno($fecha_turno);
        $this->error_salida_turno = $this->validar_salida_turno($salida_turno);
        $this->error_llegada_turno = $this->validar_llegada_turno($llegada_turno);
        $this->error_aclaracion_turno = $this->validar_aclaracion_turno($aclaracion_turno);
    }
    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    private function validar_piloto_turno($piloto_turno){
        if ($this->variable_iniciada($piloto_turno)) {
            if (strlen($piloto_turno) > 20) {
                return "No debe exceder los 20 caracteres";
            } else {
                $this->piloto_turno = $piloto_turno;
            }
        } else {
            return "Debe ingresar el piloto";
        }
    }
    private function validar_fecha_turno($fecha_turno){
        if ($this->variable_iniciada($fecha_turno)) {
            $valores = explode("/", $fecha_turno);
            if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
                $this->fecha_turno = $fecha_turno;
            } else {
                return "Debe ingresar un formato valido(dd/MM/yyyy)";
            }
        } else {
            return "Debe ingresar la fecha del turno";
        }
    }
    private function validar_salida_turno($salida_turno){
        if ($this->variable_iniciada($salida_turno)) {
            $valores = explode(":", $salida_turno);
            if (is_numeric($valores[0]) && is_numeric($valores[1])) {
                if (($valores[0] >= 0 && $valores[0] <= 23) && ($valores[1] >= 0 && $valores[1] <= 59)) {
                    $this->salida_turno = $salida_turno;
                }
            } else {
                return"Deben ser numeros";
            }
        } else {
            return "Debe ingresar la hora de salida";
        }
    }
    private function validar_llegada_turno($llegada_turno){
        if ($this->variable_iniciada($llegada_turno)) {
            $valores = explode(":", $llegada_turno);
            if (is_numeric($valores[0]) && is_numeric($valores[1])) {
                if (($valores[0] >= 0 && $valores[0] <= 23) && ($valores[1] >= 0 && $valores[1] <= 59)) {
                    $this->llegada_turno = $llegada_turno;
                }
            } else {
                return"Deben ser numeros";
            }
        } else {
            return "Debe ingresar la hora de llegada";
        }
    }
    private function validar_aclaracion_turno($aclaracion_turno){
        if ($this->variable_iniciada($aclaracion_turno)) {
            if(strlen($aclaracion_turno)>200){
                return "No debe exceder los 200 caracteres";
            }
            else{
                $this->aclaracion_turno = $aclaracion_turno;
            }
        } else {
            $this->aclaracion_turno = $aclaracion_turno;
        }
    }
    private function validar_avion_turno($avion_turno){
        if ($this->variable_iniciada($avion_turno)) {
            $this->avion_turno = $avion_turno;
        } else {
            return "Debe ingresar el avion";
        }
    }
    function getId_turno() {
        return $this->id_turno;
    }

    function getPiloto_turno() {
        return $this->piloto_turno;
    }

    function getCopiloto_turno() {
        return $this->copiloto_turno;
    }

    function getFecha_turno() {
        return $this->fecha_turno;
    }

    function getSalida_turno() {
        return $this->salida_turno;
    }

    function getLlegada_turno() {
        return $this->llegada_turno;
    }

    function getAvion_turno() {
        return $this->avion_turno;
    }

    function getAclaracion_turno() {
        return $this->aclaracion_turno;
    }

    function getEstado_turno() {
        return $this->estado_turno;
    }
    function getError_avion_turno() {
        if ($this->error_avion_turno != "") {
            return $this->aviso_inicio . $this->error_avion_turno . $this->aviso_cierre;
        }
    }
    function getError_piloto_turno() {
        if ($this->error_piloto_turno != "") {
            return $this->aviso_inicio . $this->error_piloto_turno . $this->aviso_cierre;
        }
    }
    function getError_fecha_turno() {
        if ($this->error_fecha_turno != "") {
            return $this->aviso_inicio . $this->error_fecha_turno . $this->aviso_cierre;
        }
    }

    function getError_salida_turno() {
        if ($this->error_salida_turno != "") {
            return $this->aviso_inicio . $this->error_salida_turno . $this->aviso_cierre;
        }
    }

    function getError_llegada_turno() {
        if ($this->error_llegada_turno != "") {
            return $this->aviso_inicio . $this->error_llegada_turno . $this->aviso_cierre;
        }
    }

    function getError_aclaracion_turno() {
        if ($this->error_aclaracion_turno != "") {
            return $this->aviso_inicio . $this->error_aclaracion_turno . $this->aviso_cierre;
        }
    }

    function setId_turno($id_turno) {
        $this->id_turno = $id_turno;
    }

    function setPiloto_turno($piloto_turno) {
        $this->piloto_turno = $piloto_turno;
    }

    function setCopiloto_turno($copiloto_turno) {
        $this->copiloto_turno = $copiloto_turno;
    }

    function setFecha_turno($fecha_turno) {
        $this->fecha_turno = $fecha_turno;
    }

    function setSalida_turno($salida_turno) {
        $this->salida_turno = $salida_turno;
    }

    function setLlegada_turno($llegada_turno) {
        $this->llegada_turno = $llegada_turno;
    }

    function setAvion_turno($avion_turno) {
        $this->avion_turno = $avion_turno;
    }

    function setAclaracion_turno($aclaracion_turno) {
        $this->aclaracion_turno = $aclaracion_turno;
    }

    function setEstado_turno($estado_turno) {
        $this->estado_turno = $estado_turno;
    }

    function setError_fecha_turno($error_fecha_turno) {
        $this->error_fecha_turno = $error_fecha_turno;
    }

    function setError_salida_turno($error_salida_turno) {
        $this->error_salida_turno = $error_salida_turno;
    }

    function setError_llegada_turno($error_llegada_turno) {
        $this->error_llegada_turno = $error_llegada_turno;
    }

    function setError_aclaracion_turno($error_aclaracion_turno) {
        $this->error_aclaracion_turno = $error_aclaracion_turno;
    }
function registroValido() {
        if ($this->error_piloto_turno == '' &&
                $this->error_avion_turno == '' &&
                $this->error_fecha_turno == '' &&
                $this->error_salida_turno == '' &&
                $this->error_llegada_turno == '' &&
                $this->error_aclaracion_turno == '') {
            return true;
        } else {
            return false;
        }
    }

    function limpiar() {
        $this->error_piloto_turno = '' ;
        $this->error_avion_turno = '' ;
        $this->error_fecha_turno = '' ;
        $this->error_salida_turno = '' ;
        $this->error_llegada_turno = '' ;
        $this->error_aclaracion_turno = '';
    }

}
