<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cargo
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Cargo {
    
    private $idCargo;
    private $nombre;
    
    function __construct($idCargo=null, $nombre=null) {
        $this->idCargo = $idCargo;
        $this->nombre = $nombre;
    }
    
    function getIdCargo() {
        return $this->idCargo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
