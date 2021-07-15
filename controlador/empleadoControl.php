<?php
 session_start();

 extract($_REQUEST);

include "../modelo/entidad/Persona.php";
include "../modelo/datos/conexion.php";
include "../modelo/datos/datosEmpleado.php";
include "../modelo/entidad/Cargo.php";
include "../modelo/entidad/Dependencia.php";
include "../modelo/entidad/Empleado.php";
include "../modelo/entidad/Usuario.php";
include "../modelo/entidad/Rol.php";

error_reporting(1);

$dEmpleado = new datosEmpleado();

switch ($accion) {

    case "Agregar":

        $cargo = new Cargo($cb_cargo, null);

        $dependencia = new Dependencia($cb_dependencia,null);
        
        //$emp = new Empleado($idEmpleado, $cargo, $dependencia, $telefono, $idPersona, $identificacion, $nombre, $apellido, $correo);
        
        $empleado = new Empleado(null, $cargo, $dependencia, $txt_telefono, null, $txt_id, $txt_nombre, $txt_apellido, $txt_correo);
        
        //Administrador - funcionario
        //soporte - funcionario
        //funcionario 

        if ($cb_rol == 1) {

            $rol1 = new Rol($cb_rol,null);

            $listaRol[0] = $rol1;
            
            $rol2 = new Rol(2, null);
            
            $listaRol[1] = $rol2;
            
        }else if($cb_rol == 3){
            
            $rol1 = new Rol($cb_rol,null);

            $listaRol[0] = $rol1;
            
            $rol2 = new Rol(2, null);
            
            $listaRol[1] = $rol2;
            
        }else{
            
            $rol1 = new Rol($cb_rol, null);
            $listaRol[0] = $rol1;
        }
        
        //$usu = new Usuario($idUsuario, $empleado, $login, $password, $listaRoles);
        
        $usuario = new Usuario(null, $empleado, $txt_correo, $txt_pass, $listaRol);
                
        $resultado = $dEmpleado->agregar($usuario);

        echo json_encode($resultado);
        break;
        
    case 'ListarTecnicos':
        
        $resultado = $dEmpleado->listarEmpleadosTecnicos();
        echo json_encode($resultado);
        break;

    case 'listarEmpleados':

        $resultado = $dEmpleado->listarEmpleados();
        echo json_encode($resultado);
        break;
}
