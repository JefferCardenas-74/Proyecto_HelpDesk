<?php
 session_start();
include '../modelo/datos/datosDependecia.php';
include '../modelo/entidad/Dependencia.php';
include '../modelo/datos/conexion.php';


extract($_REQUEST);

error_reporting(1);

$dDependencia = new datosDependecia();

switch($accion){
    
    case 'listarDependencia': 
        
        $resultado = $dDependencia->listarDependecias();
        echo json_encode($resultado);
        break;

    case 'agregarDependencia':

        $dep = new Dependencia(null, $txt_nombreDependencia);
        
        $resultado = $dDependencia->agregarDependencia($dep);
        
        echo json_encode($resultado);
    break;
}

