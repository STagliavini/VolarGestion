<?php
class Avion {
    private $id_avion;
    private $matricula_avion;
    private $nombre_avion;
    private $descripcion_avion;
    private $tipo_avion;
    function __construct($id_avion, $matricula_avion, $nombre_avion, $descripcion_avion,$tipo_avion) {
        $this->id_avion = $id_avion;
        $this->matricula_avion = $matricula_avion;
        $this->nombre_avion = $nombre_avion;
        $this->descripcion_avion = $descripcion_avion;
        $this->tipo_avion=$tipo_avion;
    }
    function getTipo_avion() {
        return $this->tipo_avion;
    }

    function setTipo_avion($tipo_avion) {
        $this->tipo_avion = $tipo_avion;
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
}
