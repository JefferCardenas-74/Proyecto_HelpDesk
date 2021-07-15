<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datosCargo
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class datosCargo {
    
    private $conexion;
    private $retorno;
    
    public function __construct() {
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }
    
    public function listarCargo(){
        
        try {
            $consulta = 'select * from cargos';
            $resultado = $this->conexion->query($consulta);
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'lista de cargos';
            $this->retorno->datos = $resultado->fetchAll();
            
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        
        return $this->retorno;
    }
}
