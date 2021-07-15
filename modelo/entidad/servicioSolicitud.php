<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of servicioSolicitud
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class servicioSolicitud {
    private $idServicioSolicitud;
    private $detalleSolicitud;
    private $empleado;
    private $descripcionSolucion;
    private $fechaHora;
    
    public function __construct(detalleSolicitud $detalleSolicitud = null, Empleado $empleado = null, $descripcionSolucion = null, $fechaHora = null) {
        $this->detalleSolicitud = $detalleSolicitud;
        $this->empleado = $empleado;
        $this->descripcionSolucion = $descripcionSolucion;
        $this->fechaHora = $fechaHora;
    }
    
    function getIdServicioSolicitud() {
        return $this->idServicioSolicitud;
    }

    function getDetalleSolicitud() {
        return $this->detalleSolicitud;
    }

    function getEmpleado() {
        return $this->empleado;
    }

    function getDescripcionSolucion() {
        return $this->descripcionSolucion;
    }

    function getFechaHora() {
        return $this->fechaHora;
    }

    function setIdServicioSolicitud($idServicioSolicitud) {
        $this->idServicioSolicitud = $idServicioSolicitud;
    }

    function setDetalleSolicitud($detalleSolicitud) {
        $this->detalleSolicitud = $detalleSolicitud;
    }

    function setEmpleado($empleado) {
        $this->empleado = $empleado;
    }

    function setDescripcionSolucion($descripcionSolucion) {
        $this->descripcionSolucion = $descripcionSolucion;
    }

    function setFechaHora($fechaHora) {
        $this->fechaHora = $fechaHora;
    }


    
}
