<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Servivio
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Servivio {
    
    private $idServicio;
    private $solicitud;
    private $tecnico;
    private $fecha;
    private $descripcion;
    
    function __construct($idServicio=null, Solicitud $solicitud=null, Empleado $tecnico=null, $fecha=null, $descripcion=null) {
        $this->idServicio = $idServicio;
        $this->solicitud = $solicitud;
        $this->tecnico = $tecnico;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
    }

    function getIdServicio() {
        return $this->idServicio;
    }

    function getSolicitud() {
        return $this->solicitud;
    }

    function getTecnico() {
        return $this->tecnico;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdServicio($idServicio) {
        $this->idServicio = $idServicio;
    }

    function setSolicitud($solicitud) {
        $this->solicitud = $solicitud;
    }

    function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
