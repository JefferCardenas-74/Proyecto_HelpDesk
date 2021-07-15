<?php
session_start();

extract($_REQUEST);

include '../modelo/datos/datosUsuario.php';
include '../modelo/entidad/Usuario.php';
include '../modelo/datos/Conexion.php';

error_reporting(0);

$dUsuario = new datosUsuario();

switch($accion){

    case 'iniciarSesion':

        $user = new Usuario();

        $user->setLogin($txt_user);
        $user->setPassword($txt_pass);

        $resultado = $dUsuario->iniciarSesion($user);

        if($resultado->estado){
            $_SESSION['idEmpleado'] = $resultado->datos->idEmpleado;
            $_SESSION['nombreEmpleado'] = $resultado->datos->perNombres.' '.$resultado->datos->perApellidos;
            $_SESSION['correo'] = $resultado->datos->perCorreo;
            $_SESSION['rol'] = $resultado->datos->rolNombre;

            switch($resultado->datos->rolNombre){
                
                case 'Administrador':
                    header('location: ../vista/administrador/');
                break;

                case 'Funcionario':
                    header('location: ../vista/funcionario/');
                break;

                case 'Soporte':
                    header('location: ../vista/soporte/');
                break;
            
            }

        }else{

            header('location: ../vista/?page=frm_inicioSesion&x=2');
        }

    break;
}
