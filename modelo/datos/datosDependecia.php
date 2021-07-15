<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datosDependecia
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class datosDependecia {
    
    private $conexion;
    private $retorno;
    
    public function __construct() {
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }
    
    public function listarDependecias(){
        try {
            
            $consulta = 'SELECT * FROM dependencias';
            $resultado = $this->conexion->query($consulta);
            
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Lista de dependencias';
            $this->retorno->datos = $resultado->fetchAll();
            
        } catch (PDOException $ex) {
            
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        
        return $this->retorno;
    }

    public function agregarDependencia (Dependencia $dependencia){

        print_r($dependencia);
        try{
            $consulta = 'insert into dependencias values(null, ?)';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $dependencia->getNombre());
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Dependencia agregada con exito';
            $this->retorno->datos = null;

        }catch(PDOException $ex){

            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }
            
}
