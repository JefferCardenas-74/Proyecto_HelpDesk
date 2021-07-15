<?php

/* 
Autor:N?GMA
 */
session_start();
extract($_REQUEST);

include "../modelo/entidad/Persona.php";
include "../modelo/datos/conexion.php";
include "../modelo/datos/datosSolicitud.php";
include "../modelo/entidad/Cargo.php";
include "../modelo/entidad/Dependencia.php";
include "../modelo/entidad/Empleado.php";
include "../modelo/entidad/Usuario.php";
include "../modelo/entidad/Rol.php";
include "../modelo/entidad/detalleSolicitud.php";
include "../modelo/entidad/Equipo.php";
include "../modelo/entidad/Solicitud.php";
include '../modelo/entidad/TecnicoSolicitud.php';
include '../modelo/entidad/servicioSolicitud.php';
include '../modelo/enviarCorreo.php';



error_reporting(0);

$dSolicitud = new datosSolicitud();



switch ($accion){
    
    case 'Agregar':
        //se guarda el detalle de la solicitud que llega de la vista
        $det = json_decode($datos);
        $detallesSolicitudes = array();
        $cantidad = count($det);
        
        for($i = 0; $i<$cantidad; $i++){
            $detalle = new detalleSolicitud();
            $equipo = new Equipo($det[$i]->idEquipo, $det[$i]->serial);
            $detalle->setEquipo($equipo);
            $detalle->setEstado("Solicitada");
            $detalle->setObservaciones($det[$i]->observaciones);
            $detallesSolicitudes[$i] = $detalle;
        }
        
        $solicitud = new Solicitud();
        
        $ticket = 'sol-'.generarTicket();
        
        $empleado = new Empleado();
        
        $empleado->setIdEmpleado($_SESSION['idEmpleado']);
        
    $solicitud->setEmpleado($empleado);
    $solicitud->setEstado('Solicitada');
    $solicitud->setFecha(date('Y-m-d'));
    $solicitud->setTicket($ticket);
    $solicitud->setDetalleSolicitud($detallesSolicitudes);
    
    $resultado = $dSolicitud->agregar($solicitud);
    echo json_encode($resultado);
    break;
    
    case 'listaSolicitudes':
        
        $solicitudes = $dSolicitud->listarSolicitudesSinAsignar();
        echo json_encode($solicitudes);
        break;
    
    case 'AsignarTecnico':

        $empleado = new Empleado();
        $empleado->setIdEmpleado($idEmpleado);        
        $solicitud = new Solicitud();
        $solicitud->setIdSolicitud($idSolicitud);
        $tecnicoSolicitud = new TecnicoSolicitud($empleado, $solicitud);
        $resultado = $dSolicitud->asignarTecnico($tecnicoSolicitud);

        $correo = new enviarCorreo();

        $email = new stdClass();
        $email->remitente = 'spankorgamer@gmail.com';
        $email->destinatario = $resultado->datos['perCorreo'];
        $email->nombreDestinatario = $resultado->datos['perNombres'] +' '+$resultado->datos['perApellidos'];;
        $email->asunto = "Asignacion de nueva solicitud";
        $email->mensaje = 'La administracion le informa que se le ha asignado una nueva solicitud que debe atender';

        $resultadoCorreo = $correo->enviarCorreo($email);

        if($resultadoCorreo->estado){

            print_r($resultadoCorreo->mensaje);
            
            
        }else{

            print_r($resultadoCorreo->mensaje);
        }

        echo json_encode($resultado);

        break;
    
    case 'AsignadasTecnico':
        
        $idEmpleado = $_SESSION['idEmpleado'];
        $resultado = $dSolicitud->listarSolicitudesAsignadasTecnico($idEmpleado);
        echo json_encode($resultado);
        break;
    
    case 'detalleSolicitud':
        $resultado = $dSolicitud->listarDetalleSolicitud($idSolicitud);
        echo json_encode($resultado);
        break;
    
    case 'registrarSolucion':
        $servicioSolicitud = new servicioSolicitud();
        $empleado = new Empleado();
        $empleado->setIdEmpleado($_SESSION['idEmpleado']);
        $servicioSolicitud->setEmpleado($empleado);
        $detalle = new detalleSolicitud();
        $detalle->setIdDetalle($idDetalleSolicitud);
        $servicioSolicitud->setDetalleSolicitud($detalle);
        $servicioSolicitud->setDescripcionSolucion($solucion);
        $servicioSolicitud->setFechaHora(date('Y-m-d H:i:s'));
        
        $resultado = $dSolicitud->registrarSolucion($servicioSolicitud);
        $actualizaso = $dSolicitud->actualizarEstadoSolicitud($idSolicitud);
        echo json_encode($resultado);
        break;
    
    case 'listarSolicitudesRealizadas':
        
        $idEmpleado = $_SESSION['idEmpleado'];
        $resultado = $dSolicitud->listarSolicitudesRealizadas($idEmpleado);
        echo json_encode($resultado);
        break;
}


function generarTicket(){
    $key = '';
    $patrones = '1234567890';
    $tamaño = strlen($patrones)-1;
    
    for($i = 0; $i < 6; $i++){
        $key .= $patrones{mt_rand(0, $tamaño)};        
    }
    return $key;
    
}





