<?php

/*
    Author: NIGMA
 *  */
session_start();
extract($_REQUEST);

include '../modelo/datos/conexion.php';
include '../modelo/datos/datosEquipo.php';

error_reporting(1);

$dEquipo = new datosEquipo();

switch($accion){
    
    case 'Consultar':
        
        $resultado = $dEquipo->consultarPorSerial($serial);
        echo json_encode($resultado);
        break;                
}