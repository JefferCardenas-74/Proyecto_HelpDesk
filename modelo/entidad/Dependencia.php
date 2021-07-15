<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dependencia
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Dependencia {
    
    private $idDependencia;
    private $nombre;
    
    function __construct($idDependencia=null, $nombre=null) {
        $this->idDependencia = $idDependencia;
        $this->nombre = $nombre;
    }

    function getIdDependencia() {
        return $this->idDependencia;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdDependencia($idDependencia) {
        $this->idDependencia = $idDependencia;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
