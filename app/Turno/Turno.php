<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Turno
 *
 * @author Santiago Tagliavini
 */
class Turno {
    private $id_turno;
    private $piloto_turno;
    private $copiloto_turno;
    private $fecha_turno;
    private $salida_turno;
    private $llegada_turno;
    private $avion_turno;
    private $aclaracion_turno;
    private $estado_turno;
    function __construct($id_turno, $piloto_turno, $copiloto_turno, $fecha_turno, $salida_turno, $llegada_turno, $avion_turno, $aclaracion_turno, $estado_turno) {
        $this->id_turno = $id_turno;
        $this->piloto_turno = $piloto_turno;
        $this->copiloto_turno = $copiloto_turno;
        $this->fecha_turno = $fecha_turno;
        $this->salida_turno = $salida_turno;
        $this->llegada_turno = $llegada_turno;
        $this->avion_turno = $avion_turno;
        $this->aclaracion_turno = $aclaracion_turno;
        $this->estado_turno = $estado_turno;
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


}
