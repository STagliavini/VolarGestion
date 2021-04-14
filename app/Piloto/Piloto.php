<?php
class Piloto {
    private $id_piloto;
    private $dni_piloto;
    private $apellido_piloto;
    private $nombre_piloto;
    private $nacimiento_piloto;
    private $mail_piloto;
    private $deuda_piloto;
    function __construct($id_piloto, $dni_piloto, $apellido_piloto, $nombre_piloto, $nacimiento_piloto,$mail_piloto,$deuda_piloto) {
        $this->id_piloto = $id_piloto;
        $this->dni_piloto = $dni_piloto;
        $this->apellido_piloto = $apellido_piloto;
        $this->nombre_piloto = $nombre_piloto;
        $this->nacimiento_piloto = $nacimiento_piloto;
        $this->mail_piloto=$mail_piloto;
        $this->deuda_piloto=$deuda_piloto;
    }
    function getDeuda_piloto() {
        return $this->deuda_piloto;
    }

    function setDeuda_piloto($deuda_piloto) {
        $this->deuda_piloto = $deuda_piloto;
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
    function getMail_piloto() {
        return $this->mail_piloto;
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
    function setMail_piloto($mail_piloto) {
        $this->mail_piloto = $mail_piloto;
    }
}
