<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Solicitud
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Solicitud {
    
    private $idSolicitud;
    private $empleado;
    private $fecha;
    private $ticket;
    private $estado;
    private $detalleSolicitud;

    
    
    function __construct($idSolicitud=null, Empleado $empleado=null, $fecha=null, $ticket=null, $estado=null, detalleSolicitud $detalleSolicitud=null) {
        $this->idSolicitud = $idSolicitud;
        $this->empleado = $empleado;
        $this->fecha = $fecha;
        $this->ticket = $ticket;
        $this->estado = $estado;
        $this->detalleSolicitud = $detalleSolicitud;
    }
    
    function setTicket($ticket){
        $this->ticket = $ticket;
    }
    
    function getTicket(){
        return $this->ticket;
    }
    
    function getIdSolicitud() {
        return $this->idSolicitud;
    }

    function getEmpleado() {
        return $this->empleado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDetalleSolicitud() {
        return $this->detalleSolicitud;
    }

    function setIdSolicitud($idSolicitud) {
        $this->idSolicitud = $idSolicitud;
    }

    function setEmpleado($empleado) {
        $this->empleado = $empleado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setDetalleSolicitud($detalleSolicitud) {
        $this->detalleSolicitud = $detalleSolicitud;
    }


    

}
