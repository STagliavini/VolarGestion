<?php
class Usuario {
    private $id_usuario;
    private $nombre_usuario;
    private $contrasenia_usuario;
    private $tipo_usuario;
    private $perfil_usuario;
    private $estado_usuario;
    function __construct($id_usuario, $nombre_usuario, $contrasenia_usuario, $tipo_usuario, $perfil_usuario,$estado_usuario) {
        $this->id_usuario = $id_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->contrasenia_usuario = $contrasenia_usuario;
        $this->tipo_usuario = $tipo_usuario;
        $this->perfil_usuario=$perfil_usuario;
        $this->estado_usuario = $estado_usuario;
    }
    function getId_usuario() {
        return $this->id_usuario;
    }
    function getPerfil_usuario() {
        return $this->perfil_usuario;
    }

    function setPerfil_usuario($perfil_usuario) {
        $this->perfil_usuario = $perfil_usuario;
    }

        function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getContrasenia_usuario() {
        return $this->contrasenia_usuario;
    }

    function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    function getEstado_usuario() {
        return $this->estado_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setContrasenia_usuario($contrasenia_usuario) {
        $this->contrasenia_usuario = $contrasenia_usuario;
    }

    function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    function setEstado_usuario($estado_usuario) {
        $this->estado_usuario = $estado_usuario;
    }


}
