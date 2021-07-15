<?php
 session_start();
include '../modelo/datos/datosCargo.php';
include '../modelo/datos/conexion.php';
include '../modelo/entidad/Cargo.php';

extract($_REQUEST);

error_reporting(1);

$dCargo = new datosCargo();

switch($accion){
    case 'listarCargo':
        $resultado = $dCargo->listarCargo();
        echo json_encode($resultado);
        break;
        
}
