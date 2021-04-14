<?php

class ValidadorContrasenia {

    private $nombre_usuario;
    private $nueva_contrasenia;
    private $repetir_contrasenia;
    private $error_repetir_contrasenia;
    private $error_nueva_contrasenia;
    private $error_general;
    private $aviso_inicio;
    private $aviso_cierre;

    function __construct($nombre_usuario, $nueva_contrasenia, $repetir_contrasenia) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";
        $this->nombre_usuario = $nombre_usuario;
        $this->nueva_contrasenia = "";
        $this->repetir_contrasenia = "";
        $this->error_nueva_contrasenia = $this->validar_nueva_contrasenia($nueva_contrasenia);
        $this->error_repetir_contrasenia = $this->validar_repetir_contrasenia($repetir_contrasenia);
        $this->error_general=$this->validar_error_general($nueva_contrasenia, $repetir_contrasenia);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    function validar_nueva_contrasenia($nueva_contrasenia){
        if($this->variable_iniciada($nueva_contrasenia)){
            $this->nueva_contrasenia=$nueva_contrasenia;
        }
        else{
            return "Debe ingresar la nueva contrasenia";
        }
    }
    function validar_repetir_contrasenia($repetir_contrasenia){
        if($this->variable_iniciada($repetir_contrasenia)){
            $this->repetir_contrasenia=$repetir_contrasenia;
        }
        else{
            return "Debe repetir la nueva contrasenia";
        }
    }
    function validar_error_general($nueva_contrasenia,$repetir_contrasenia){
        if($nueva_contrasenia!=$repetir_contrasenia){
            return "Las contrasenias deben coincidir";
        }
    }
    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getNueva_contrasenia() {
        return $this->nueva_contrasenia;
    }

    function getRepetir_contrasenia() {
        return $this->repetir_contrasenia;
    }

    function getError_repetir_contrasenia() {
        if($this->error_repetir_contrasenia!=''){
            return $this->aviso_inicio.$this->error_repetir_contrasenia.$this->aviso_cierre;
        }
    }

    function getError_nueva_contrasenia() {
        if($this->error_nueva_contrasenia!=''){
            return $this->aviso_inicio.$this->error_nueva_contrasenia.$this->aviso_cierre;
        }
    }

    function getError_general() {
        if($this->error_general!=''){
            return $this->aviso_inicio.$this->error_general.$this->aviso_cierre;
        }
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setNueva_contrasenia($nueva_contrasenia) {
        $this->nueva_contrasenia = $nueva_contrasenia;
    }

    function setRepetir_contrasenia($repetir_contrasenia) {
        $this->repetir_contrasenia = $repetir_contrasenia;
    }

    function setError_repetir_contrasenia($error_repetir_contrasenia) {
        $this->error_repetir_contrasenia = $error_repetir_contrasenia;
    }

    function setError_nueva_contrasenia($error_nueva_contrasenia) {
        $this->error_nueva_contrasenia = $error_nueva_contrasenia;
    }

    function setError_general($error_general) {
        $this->error_general = $error_general;
    }

        function getAviso_inicio() {
        return $this->aviso_inicio;
    }

    function getAviso_cierre() {
        return $this->aviso_cierre;
    }

    function setAviso_inicio($aviso_inicio) {
        $this->aviso_inicio = $aviso_inicio;
    }

    function setAviso_cierre($aviso_cierre) {
        $this->aviso_cierre = $aviso_cierre;
    }

    function registroValido() {
        if ($this->error_nueva_contrasenia == '' &&
                $this->error_repetir_contrasenia == '' &&
                $this->error_general == '') {
            return true;
        } else {
            return false;
        }
    }

    function limpiar() {
        $this->nueva_contrasenia = '';
        $this->repetir_contrasenia = '';
    }

}
