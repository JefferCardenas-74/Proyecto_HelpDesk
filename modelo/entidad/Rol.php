<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rol
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Rol {
    
    private $idRol;
    private $rol;
    
    function __construct($idRol=null, $rol=null) {
        $this->idRol = $idRol;
        $this->rol = $rol;
    }

    function getIdRol() {
        return $this->idRol;
    }

    function getRol() {
        return $this->rol;
    }

    function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }


    
}
