<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Equipo
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Equipo {
    
    private $idEquipo;
    private $serial;
    private $tipo;
    private $marca;
    private $dependencia;
    
    function __construct($idEquipo=null, $serial=null, $tipo=null, $marca=null, Dependencia $dependencia=null) {
        
        $this->idEquipo = $idEquipo;
        $this->serial = $serial;
        $this->tipo = $tipo;
        $this->marca = $marca;
        $this->dependencia = $dependencia;
    }
    
    function getIdEquipo() {
        return $this->idEquipo;
    }

    function getSerial() {
        return $this->serial;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getMarca() {
        return $this->marca;
    }

    function getDependencia() {
        return $this->dependencia;
    }

    function setIdEquipo($idEquipo) {
        $this->idEquipo = $idEquipo;
    }

    function setSerial($serial) {
        $this->serial = $serial;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setDependencia($dependencia) {
        $this->dependencia = $dependencia;
    }



}
