<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TecnicoSolicitud
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class TecnicoSolicitud {
    
    private $idTecnicoSolicitud;
    private $empleado;
    private $solicitud;
    
    public function __construct(Empleado $empleado = null, Solicitud $solicitud = null) {
        
        $this->empleado = $empleado;
        $this->solicitud = $solicitud;        
    }
    
    function getIdTecnicoSolicitud(){
        return $this->idTecnicoSolicitud;
    }
    
    function setIdTecnicoSolicitud($idTecnicoSolicitud){
        $this->idTecnicoSolicitud = $idTecnicoSolicitud;                
    }
    
    function getEmpleado() {
        return $this->empleado;
    }

    function getSolicitud() {
        return $this->solicitud;
    }

    function setEmpleado($empleado) {
        $this->empleado = $empleado;
    }

    function setSolicitud($solicitud) {
        $this->solicitud = $solicitud;
    }


}
