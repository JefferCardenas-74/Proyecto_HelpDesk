<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datosEquipo
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class datosEquipo {
    
    private $conexion;
    private $retorno;
    
    public function __construct() {
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }
    
    public function consultarPorSerial($serial){
        
        try{
            $consulta = 'select * from equipos '
                    . 'inner join marcas on equipos.equiMarca = marcas.idMarca '
                    . 'inner join tipoequipos on equipos.equiTipo = tipoequipos.idTipoEquipo '
                    . 'inner join dependencias on equipos.equiDependencia = dependencias.idDependencia '
                    . 'where equipos.equiSerial = ? ';
            
            $resultado= $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $serial);
            $resultado->execute();
            if($resultado->rowCount()>0){
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchObject();
            }else{
                $this->retorno->estado = false;
                $this->retorno->datos = null;
            }
            
            $this->retorno->mensaje = 'Datos del equipo';
            
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;                   
        }
        return $this->retorno;
    }
}
