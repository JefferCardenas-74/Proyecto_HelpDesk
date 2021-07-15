<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datosRol
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class datosRol {
    private $conexion;
    private $retorno;
    
    public function __construct() {
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }
    
    public function listarRol(){
        
        try {
            
            $consulta = 'select * from roles';
            $resultado = $this->conexion->query($consulta);
            
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Lista de Roles';
            $this->retorno->datos = $resultado->fetchAll();
            
        } catch (PDOException $ex) {
            
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        
        return $this->retorno;
    }
}
