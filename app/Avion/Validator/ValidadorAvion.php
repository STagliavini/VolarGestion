<?php

class ValidadorAvion {

    private $id_avion;
    private $matricula_avion;
    private $nombre_avion;
    private $descripcion_avion;
    private $tipo_avion;
    private $error_matricula_avion;
    private $error_nombre_avion;
    private $error_descripcion_avion;
    private $error_tipo_avion;
    private $aviso_inicio;
    private $aviso_cierre;

    function __construct($id_avion,$matricula_avion, $nombre_avion, $descripcion_avion,$tipo_avion) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";
        $this->matricula_avion = "";
        $this->nombre_avion = "";
        $this->descripcion_avion = "";
        $this->tipo_avion=$tipo_avion;
        $this->id_avion=$id_avion;
        $this->error_matricula_avion = $this->validar_matricula_avion($matricula_avion);
        $this->error_nombre_avion = $this->validar_nombre_avion($nombre_avion);
        $this->error_descripcion_avion = $this->validar_descripcion_avion($descripcion_avion);
        $this->error_tipo_avion=$this->validar_tipo_avion($tipo_avion);
    }
    function getTipo_avion() {
        return $this->tipo_avion;
    }

    function setTipo_avion($tipo_avion) {
        $this->tipo_avion = $tipo_avion;
    }
    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    public function validar_tipo_avion($tipo_avion){
        if ($this->variable_iniciada($tipo_avion)){
            $this->tipo_avion=$tipo_avion;
        }
        else{
            return "Debes seleccionar un tipo de avion";
        }
    }
    public function validar_matricula_avion($matricula_avion) {
        if ($this->variable_iniciada($matricula_avion)) {
            if (strlen($matricula_avion) > 7) {
                return "No debe exceder los 7 caracteres";
            } else {
                if(Consultas_Aviones::existeAvion(Conexion::getconexion(), $matricula_avion)==true&&$this->id_avion==-1){
                    return "El avion ya existe";
                }
                else{
                    $this->matricula_avion = $matricula_avion;
                }
            }
        } else {
            return "Debe ingresar la matricula del avion";
        }
    }

    public function validar_nombre_avion($nombre_avion) {
        if ($this->variable_iniciada($nombre_avion)) {
            if (strlen($nombre_avion) > 30) {
                return "No debe exceder los 30 caracteres";
            } else {
                $this->nombre_avion = $nombre_avion;
            }
        } else {
            return "Debe ingresar el nombre del avion";
        }
    }

    public function validar_descripcion_avion($descripcion_avion) {
        if ($this->variable_iniciada($descripcion_avion)) {
            if (strlen($descripcion_avion) > 100) {
                return "No debe exceder los 100 caracteres";
            } else {
                $this->descripcion_avion = $descripcion_avion;
            }
        } else {
            $this->descripcion_avion = $descripcion_avion;
        }
    }

    function getId_avion() {
        return $this->id_avion;
    }

    function getMatricula_avion() {
        return $this->matricula_avion;
    }

    function getNombre_avion() {
        return $this->nombre_avion;
    }

    function getDescripcion_avion() {
        return $this->descripcion_avion;
    }

    function getError_matricula_avion() {
        if($this->error_matricula_avion!=""){
            return $this->aviso_inicio . $this->error_matricula_avion . $this->aviso_cierre;
        }
        
    }

    function getError_nombre_avion() {
        if($this->error_nombre_avion!=''){
            return $this->aviso_inicio . $this->error_nombre_avion . $this->aviso_cierre;
        }
    }

    function getError_descripcion_avion() {
        if($this->error_descripcion_avion!=''){
            return $this->aviso_inicio . $this->error_descripcion_avion . $this->aviso_cierre;
        }
    }
    function getError_tipo_avion() {
        if($this->error_tipo_avion!=''){
            return $this->aviso_inicio . $this->error_tipo_avion . $this->aviso_cierre;
        }
    }

    
    function setId_avion($id_avion) {
        $this->id_avion = $id_avion;
    }

    function setMatricula_avion($matricula_avion) {
        $this->matricula_avion = $matricula_avion;
    }

    function setNombre_avion($nombre_avion) {
        $this->nombre_avion = $nombre_avion;
    }

    function setDescripcion_avion($descripcion_avion) {
        $this->descripcion_avion = $descripcion_avion;
    }

    function setError_matricula_avion($error_matricula_avion) {
        $this->error_matricula_avion = $error_matricula_avion;
    }

    function setError_nombre_avion($error_nombre_avion) {
        $this->error_nombre_avion = $error_nombre_avion;
    }

    function setError_descripcion_avion($error_descripcion_avion) {
        $this->error_descripcion_avion = $error_descripcion_avion;
    }
    function registroValido() {
        if ($this->error_descripcion_avion == '' &&
                $this->error_matricula_avion == '' &&
                $this->error_nombre_avion == ''&&
                $this->error_tipo_avion == '') {
            return true;
        } else {
            return false;
        }
    }

    function limpiar() {
        $this->descripcion_avion = '';
        $this->matricula_avion = '';
        $this->nombre_avion = '';
        $this->tipo_avion='';
    }

}
