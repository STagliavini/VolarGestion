<?php
class Vuelo {
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
    function __construct($id_vuelo, $fecha_vuelo, $salida_vuelo, $llegada_vuelo, $origen_vuelo, $destino_vuelo, $aterrizajes_vuelo, $piloto_vuelo, $copiloto_vuelo, $duracion_vuelo, $avion_vuelo) {
        $this->id_vuelo = $id_vuelo;
        $this->fecha_vuelo = $fecha_vuelo;
        $this->salida_vuelo = $salida_vuelo;
        $this->llegada_vuelo = $llegada_vuelo;
        $this->origen_vuelo = $origen_vuelo;
        $this->destino_vuelo = $destino_vuelo;
        $this->aterrizajes_vuelo = $aterrizajes_vuelo;
        $this->piloto_vuelo = $piloto_vuelo;
        $this->copiloto_vuelo = $copiloto_vuelo;
        $this->duracion_vuelo = $duracion_vuelo;
        $this->avion_vuelo = $avion_vuelo;
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


}
