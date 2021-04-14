<?php

class Pago {

    private $id_pago;
    private $dni_pago;
    private $monto_pago;
    private $fecha_pago;

    function __construct($id_pago, $dni_pago, $monto_pago, $fecha_pago) {
        $this->id_pago = $id_pago;
        $this->dni_pago = $dni_pago;
        $this->monto_pago = $monto_pago;
        $this->fecha_pago = $fecha_pago;
    }

    function getFecha_pago() {
        return $this->fecha_pago;
    }

    function setFecha_pago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }

    function getId_pago() {
        return $this->id_pago;
    }

    function getDni_pago() {
        return $this->dni_pago;
    }

    function getMonto_pago() {
        return $this->monto_pago;
    }

    function setId_pago($id_pago) {
        $this->id_pago = $id_pago;
    }

    function setDni_pago($dni_pago) {
        $this->dni_pago = $dni_pago;
    }

    function setMonto_pago($monto_pago) {
        $this->monto_pago = $monto_pago;
    }

}
