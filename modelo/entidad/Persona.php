<?php


class Persona {
    
    private $idPersona;
    private $identificacion;
    private $nombre;
    private $apellido;
    private $correo;
    
    function __construct($idPersona=null, $identificacion=null, $nombre=null, $apellido=null, $correo=null) {
        $this->idPersona = $idPersona;
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
    }
    
    function getIdPersona() {
        return $this->idPersona;
    }

    function getIdentificacion() {
        return $this->identificacion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }



}
