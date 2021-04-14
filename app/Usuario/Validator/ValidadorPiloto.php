<?php

class ValidadorPiloto {

    private $id_piloto;
    private $dni_piloto;
    private $apellido_piloto;
    private $nombre_piloto;
    private $nacimiento_piloto;
    private $error_dni_piloto;
    private $error_apellido_piloto;
    private $error_nombre_piloto;
    private $error_nacimiento_piloto;
    private $aviso_inicio;
    private $aviso_cierre;

    function __construct($id_piloto, $dni_piloto, $apellido_piloto, $nombre_piloto, $nacimiento_piloto) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";
        $this->id_piloto = $id_piloto;
        $this->dni_piloto = "";
        $this->apellido_piloto = "";
        $this->nombre_piloto = "";
        $this->nacimiento_piloto = "";
        $this->error_dni_piloto = $this->validar_dni_piloto($dni_piloto);
        $this->error_apellido_piloto = $this->validar_apellido_piloto($apellido_piloto);
        $this->error_nombre_piloto = $this->validar_nombre_piloto($nombre_piloto);
        $this->error_nacimiento_piloto = $this->validar_nacimiento_piloto($nacimiento_piloto);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function validar_dni_piloto($dni_piloto) {
        if ($this->variable_iniciada($dni_piloto)) {
            if (strlen($dni_piloto) > 8) {
                return "No debe exceder los 8 caracteres";
            } else {
                if (is_numeric($dni_piloto)) {
                    if (Consultas_Pilotos::existePiloto(Conexion::getconexion(), $dni_piloto) == true && $this->id_piloto == -1) {
                        return "El piloto ya existe";
                    } else {
                        $this->dni_piloto = $dni_piloto;
                    }
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

    public function validar_nacimiento_piloto($nacimiento_piloto) {
        if ($this->variable_iniciada($nacimiento_piloto)) {
            $valores = explode("/", $nacimiento_piloto);
            if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
                $this->nacimiento_piloto = $nacimiento_piloto;
            } else {
                return "Debe ingresar un formato valido(dd/MM/yyyy)";
            }
        } else {
            return "Debe ingresar el nacimiento del piloto";
        }
    }

    function getId_piloto() {
        return $this->id_piloto;
    }

    function getDni_piloto() {
        return $this->dni_piloto;
    }

    function getApellido_piloto() {
        return $this->apellido_piloto;
    }

    function getNombre_piloto() {
        return $this->nombre_piloto;
    }

    function getNacimiento_piloto() {
        return $this->nacimiento_piloto;
    }

    function getError_dni_piloto() {
        if ($this->error_dni_piloto != "") {
            return $this->aviso_inicio . $this->error_dni_piloto . $this->aviso_cierre;
        }
    }

    function getError_apellido_piloto() {
        if ($this->error_apellido_piloto != "") {
            return $this->aviso_inicio . $this->error_apellido_piloto . $this->aviso_cierre;
        }
    }

    function getError_nombre_piloto() {
        if ($this->error_nombre_piloto != "") {
            return $this->aviso_inicio . $this->error_nombre_piloto . $this->aviso_cierre;
        }
    }

    function getError_nacimiento_piloto() {
        if ($this->error_nacimiento_piloto != "") {
            return $this->aviso_inicio . $this->error_nacimiento_piloto . $this->aviso_cierre;
        }
    }

    function getAviso_inicio() {
        return $this->aviso_inicio;
    }

    function getAviso_cierre() {
        return $this->aviso_cierre;
    }

    function setId_piloto($id_piloto) {
        $this->id_piloto = $id_piloto;
    }

    function setDni_piloto($dni_piloto) {
        $this->dni_piloto = $dni_piloto;
    }

    function setApellido_piloto($apellido_piloto) {
        $this->apellido_piloto = $apellido_piloto;
    }

    function setNombre_piloto($nombre_piloto) {
        $this->nombre_piloto = $nombre_piloto;
    }

    function setNacimiento_piloto($nacimiento_piloto) {
        $this->nacimiento_piloto = $nacimiento_piloto;
    }

    function setError_dni_piloto($error_dni_piloto) {
        $this->error_dni_piloto = $error_dni_piloto;
    }

    function setError_apellido_piloto($error_apellido_piloto) {
        $this->error_apellido_piloto = $error_apellido_piloto;
    }

    function setError_nombre_piloto($error_nombre_piloto) {
        $this->error_nombre_piloto = $error_nombre_piloto;
    }

    function setError_nacimiento_piloto($error_nacimiento_piloto) {
        $this->error_nacimiento_piloto = $error_nacimiento_piloto;
    }

    function setAviso_inicio($aviso_inicio) {
        $this->aviso_inicio = $aviso_inicio;
    }

    function setAviso_cierre($aviso_cierre) {
        $this->aviso_cierre = $aviso_cierre;
    }

    function registroValido() {
        if ($this->error_dni_piloto == '' &&
                $this->error_apellido_piloto == '' &&
                $this->error_nombre_piloto == '' &&
                $this->error_nacimiento_piloto == '') {
            return true;
        } else {
            return false;
        }
    }

    function limpiar() {
        $this->dni_piloto = '';
        $this->apellido_piloto = '';
        $this->nombre_piloto = '';
        $this->nacimiento_piloto = '';
    }

}
