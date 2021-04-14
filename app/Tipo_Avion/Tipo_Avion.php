<?php
class Tipo_Avion {
    private $id_tipo_avion;
    private $nombre_tipo_avion;
    private $precio_tipo_avion;
    function __construct($id_tipo_avion, $nombre_tipo_avion, $precio_tipo_avion) {
        $this->id_tipo_avion = $id_tipo_avion;
        $this->nombre_tipo_avion = $nombre_tipo_avion;
        $this->precio_tipo_avion = $precio_tipo_avion;
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

    function setId_tipo_avion($id_tipo_avion) {
        $this->id_tipo_avion = $id_tipo_avion;
    }

    function setNombre_tipo_avion($nombre_tipo_avion) {
        $this->nombre_tipo_avion = $nombre_tipo_avion;
    }

    function setPrecio_tipo_avion($precio_tipo_avion) {
        $this->precio_tipo_avion = $precio_tipo_avion;
    }


}
