<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalleSolicitud
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class detalleSolicitud {
        
     private $idDetalle;
     private $equipo;
     private $observaciones;
     private $estado;
     
     function __construct($idDetalle=null, Equipo $equipo=null, $observaciones=null, $estado=null) {
         $this->idDetalle = $idDetalle;
         $this->equipo = $equipo;
         $this->observaciones = $observaciones;
         $this->estado=$estado;               
     }
     
     function setEstado($estado){
         $this->estado = $estado;
     }
     
     function getEstado(){
         return $this->estado;
     }
     
     function getIdDetalle() {
         return $this->idDetalle;
     }

     function getFecha() {
         return $this->fecha;
     }

     function getEquipo() {
         return $this->equipo;
     }

     function getObservaciones() {
         return $this->observaciones;
     }

     function setIdDetalle($idDetalle) {
         $this->idDetalle = $idDetalle;
     }

     function setFecha($fecha) {
         $this->fecha = $fecha;
     }

     function setEquipo($equipo) {
         $this->equipo = $equipo;
     }

     function setObservaciones($observaciones) {
         $this->observaciones = $observaciones;
     }



}
