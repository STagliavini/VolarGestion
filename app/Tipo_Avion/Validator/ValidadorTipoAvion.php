<?php

class ValidadorTipoAvion {

    private $id_tipo_avion;
    private $nombre_tipo_avion;
    private $precio_tipo_avion;
    private $error_nombre_tipo_avion;
    private $error_precio_tipo_avion;
    private $aviso_inicio;
    private $aviso_cierre;

    function __construct($id_tipo_avion,$nombre_tipo_avion, $precio_tipo_avion) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";
        $this->nombre_tipo_avion = "";
        $this->precio_tipo_avion = "";
        $this->id_tipo_avion=$id_tipo_avion;
        $this->error_nombre_tipo_avion = $this->validar_nombre_tipo_avion($nombre_tipo_avion);
        $this->error_precio_tipo_avion = $this->validar_precio_tipo_avion($precio_tipo_avion);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function validar_nombre_tipo_avion($nombre_tipo_avion) {
        if ($this->variable_iniciada($nombre_tipo_avion)) {
            if (strlen($nombre_tipo_avion) > 4) {
                return "No debe exceder los 4 caracteres";
            } else {
                if(Consultas_Tipos_Aviones::existeTipoAvion(Conexion::getconexion(), $nombre_tipo_avion)==true&&$this->id_tipo_avion==-1){
                    return "El tipo de avion ya existe";
                }
                else{
                    $this->nombre_tipo_avion = $nombre_tipo_avion;
                }
            }
        } else {
            return "Debe ingresar el tipo de avion";
        }
    }

    public function validar_precio_tipo_avion($precio_tipo_avion) {
        if ($this->variable_iniciada($precio_tipo_avion)) {
            if (strlen($precio_tipo_avion) > 15) {
                return "No debe exceder los 15 caracteres";
            } else {
                if(!is_numeric($precio_tipo_avion)){
                    return "Debe ser un numero";
                }
                else{
                    $this->precio_tipo_avion = $precio_tipo_avion;
                }
            }
        } else {
            return "Debe ingresar el precio del avion";
        }
    }
    function getId_tipo_avion() {
        return $this->id_tipo_avion;
    }

    function getNombre_tipo_avion() {
        return $this->nombre_tipo_avion;
    }

    function getPrecio_tipo_avion() {
        return $this->precio_tipo_avion;
    }
    function getError_nombre_tipo_avion() {
        if($this->error_nombre_tipo_avion!=''){
            return $this->aviso_inicio . $this->error_nombre_tipo_avion . $this->aviso_cierre;
        }
    }

    function getError_precio_tipo_avion() {
        if($this->error_precio_tipo_avion!=''){
            return $this->aviso_inicio . $this->error_precio_tipo_avion . $this->aviso_cierre;
        }
    }

    
    function setId_tipo_avion($id_tipo_avion) {
        $this->id_tipo_avion = $id_tipo_avion;
    }

    function setNombre_tipo_avion($nombre_tipo_avion) {
        $this->nombre_tipo_avion = $nombre_tipo_avion;
    }

    function setPrecio_tipo_avion($precio_tipo_avion) {
        $this->precio_tipo_avion = $precio_tipo_avion;
    }
    function registroValido() {
        if ($this->error_nombre_tipo_avion == '' &&
                $this->error_precio_tipo_avion == '') {
            return true;
        } else {
            return false;
        }
    }

    function limpiar() {
        $this->nombre_tipo_avion = '';
        $this->precio_tipo_avion = '';
    }

}
