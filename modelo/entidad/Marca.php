<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Marca
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Marca {
    
    private $idMarca;
    private $marca;
    
    function __construct($idMarca=null, $marca=null) {
        $this->idMarca = $idMarca;
        $this->marca = $marca;
    }

    function getIdMarca() {
        return $this->idMarca;
    }

    function getMarca() {
        return $this->marca;
    }

    function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }


}
