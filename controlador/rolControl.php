<?php
 session_start();
include '../modelo/datos/conexion.php';
include '../modelo/datos/datosRol.php';
include '../modelo/entidad/Rol.php';

error_reporting(1);

extract($_REQUEST);

$dRol = new datosRol();

switch($accion){
    
    case 'listarRol':
        $resultado = $dRol->listarRol();
        echo json_encode($resultado);
        break;
}