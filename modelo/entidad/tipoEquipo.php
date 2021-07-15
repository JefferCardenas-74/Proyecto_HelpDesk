<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoEquipo
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class tipoEquipo {
    
    private $idTipo;
    private $nombre;
    
    function __construct($idTipo=null, $nombre=null) {
        $this->idTipo = $idTipo;
        $this->nombre = $nombre;
    }
    
    function getIdTipo() {
        return $this->idTipo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }



}
