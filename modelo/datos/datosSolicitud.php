<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datosSolicitud
 *
 * @author N?GMA    
 */
class datosSolicitud {
    
    private $conexion;
    private $retorno;
    
    public function __construct() {
        //los dobles dos-puntos son para acceder a elementos static o constantes
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();
    }
    
    public function agregar(Solicitud $solicitud){
        
        try{
            $this->conexion->beginTransaction();
            
            //insert en la tabla solicitudes
            $consulta = 'insert into solicitudes values(null,?,?,?,?)';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $solicitud->getTicket());
            $resultado->bindParam(2, $solicitud->getEmpleado()->getIdEmpleado());
            $resultado->bindParam(3, $solicitud->getFecha());
            $resultado->bindParam(4, $solicitud->getEstado());
            $resultado->execute();
            
            $idSolicitud = $this->conexion->lastInsertId();
            
            $consulta = 'insert into detallesolicitudes values(null,?,?,?,?)';
            $resultado = $this->conexion->prepare($consulta);
            
            foreach ($solicitud->getDetalleSolicitud() as $detalle){
                $resultado->bindParam(1, $idSolicitud);
                $resultado->bindParam(2, $detalle->getEquipo()->getIdEquipo());
                $resultado->bindParam(3, $detalle->getObservaciones());
                $resultado->bindParam(4, $detalle->getEstado());
                $resultado->execute();
            }
            $this->conexion->commit();
            
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Solicitud agregada';
            $this->retorno->datos = null;
        } catch (PDOException $ex) {
            
            $this->conexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        
        return $this->retorno;
    }
    
    public function listarSolicitudesSinAsignar(){
        
        try{
            
            $consulta = 'select idSolicitud, solTicket, solFechaHora, perNombres, perApellidos from solicitudes '
                    . 'inner join empleados on solicitudes.solEmpleado = empleados.idEmpleado '
                    . 'inner join personas on empleados.empPersona = personas.idPersona '
                    . 'where solEstado = "Solicitada"';
            $resultado = $this->conexion->query($consulta);
            
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Lista de Solicitudes';
            $this->retorno->datos = $resultado->fetchAll();
                    
        } catch (PDOException $ex) {
            $this->retorno->estado =false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;            
        }
        
        return $this->retorno;
    }
    
    public function asignarTecnico(TecnicoSolicitud $tecnico){
        try {
            
            $this->conexion->beginTransaction();
            //insertar en la tabla tecnicos asignados
            $consulta = 'insert into tecnicosasignadossolicitudes values(null, ?, ?)';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $tecnico->getSolicitud()->getIdSolicitud());
            $resultado->bindParam(2, $tecnico->getEmpleado()->getIdEmpleado());
            $resultado->execute();
            
            //actualizar el estado de la solicitud a proceso
            $consulta = 'update solicitudes set solEstado="Proceso" where idSolicitud=?';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $tecnico->getSolicitud()->getIdSolicitud());
            $resultado->execute();

            //traer el correo del empleado tecnico para enviarle un correo
            $consulta = "select empleados.idEmpleado, personas.perNombres, personas.perApellidos, personas.perCorreo "
            . "from empleados inner join personas on empleados.empPersona = personas.idPersona "
            . "inner join usuarios on usuarios.usuPersona = personas.idPersona "
            . "inner join usuariosroles on usuariosroles.usuUsuario = usuarios.idUsuario "
            . "inner join roles on usuariosroles.usuRol = roles.idRol "
            . "where roles.rolNombre = 'Soporte' and empleados.idEmpleado = ?";

            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $tecnico->getEmpleado()->getIdEmpleado());
            $resultado->execute();
            
            $this->conexion->commit();
            $this->retorno->mensaje = 'Tecnico asignado con exito';
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetch();
            
        } catch (PDOException $ex) {
            
            $this->conexion->rollBack();
            
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }
    
    public function listarSolicitudesAsignadasTecnico($idEmpleado){
        try {
            
            $consulta = 'SELECT idSolicitud, solTicket, perNombres, perApellidos, depNombre, solFechaHora '
                    . 'from solicitudes inner join tecnicosasignadossolicitudes on tecnicosasignadossolicitudes.tecSolicitud = solicitudes.idSolicitud '
                    . 'inner join empleados as e1 on tecnicosasignadossolicitudes.tecEmpleado = e1.idEmpleado '
                    . 'inner join personas on e1.empPersona = personas.idPersona '
                    . 'inner join empleados as e2 on solicitudes.solEmpleado = e2.idEmpleado '
                    . 'inner join dependencias on e2.empDependencia = dependencias.idDependencia '
                    . 'where solicitudes.solEstado="Proceso" and e1.idEmpleado = ?';
            $resultado = $this->conexion->prepare($consulta);
            
            $resultado->bindParam(1, $idEmpleado);
            $resultado->execute();
            
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Lista de solicitudes asignadas';
            $this->retorno->datos = $resultado->fetchAll();
                        
        } catch (PDOException $ex) {
            
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        
        return $this->retorno;
    }
    
    public function listarDetalleSolicitud($idSolicitud){
        try {
            $consulta = 'select * from solicitudes '
                    . 'inner join detallesolicitudes on detSolicitud=idSolicitud '
                    . 'inner join equipos on detEquipo=idEquipo '
                    . 'inner join tipoequipos on equiTipo=idTipoEquipo '
                    . 'where idSolicitud=? and detEstado="Solicitada"';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idSolicitud);
            $resultado->execute();
            
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Lista de detalle de la solicitud';
            $this->retorno->datos = $resultado->fetchAll();
            
        } catch (PDOException $ex) {
            
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }
    
    public function registrarSolucion(servicioSolicitud $servicioSolicitud){
        try{
            $this->conexion->beginTransaction();
            $consulta = 'insert into serviciosolicitudes values(null, ?, ?, ?, ?)';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $servicioSolicitud->getDetalleSolicitud()->getIdDetalle());
            $resultado->bindParam(2, $servicioSolicitud->getEmpleado()->getIdEmpleado());
            $resultado->bindParam(3, $servicioSolicitud->getDescripcionSolucion());
            $resultado->bindParam(4, $servicioSolicitud->getFechaHora());
            $resultado->execute();
            
            $consulta = 'update detallesolicitudes set detEstado="Atendida"'
                    . ' where idDetalleSolicitud=?';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $servicioSolicitud->getDetalleSolicitud()->getIdDetalle());
            $resultado->execute();
            
            $this->conexion->commit();
            
            $this->retorno->estado = true;
            $this->retorno->mesaje = 'se ha retgistrado la solucion';
            $this->retorno->datos = null;
            
        } catch (PDOException $ex) {
            
            $this->conexion->rollBack();
            
            $this->retorno->estado = false;
            $this->retorno->mesaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        
        return $this->retorno;
    }
    
    public function actualizarEstadoSolicitud($idSolicitud){
        try {
            $this->conexion->beginTransaction();
            $consulta = 'select count(detSolicitud) as cantidad '
                    . 'from detallesolicitudes '
                    . 'where detEstado="Solicitada" and detSolicitud=?';
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idSolicitud);
            $resultado->execute();
            $cantidad = $resultado->fetchObject()->cantidad;
            
            if($cantidad == 0){
                $consulta = 'update solicitudes set solEstado="Atendida" '
                        . 'where idSolicitud=?';
                $resultado = $this->conexion->prepare($consulta);
                $resultado->bindParam(1, $idSolicitud);
                $resultado->execute();
            }
            
            $this->conexion->commit();
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Se actualizo es estado de la solicitud';
            $this->retorno->datos = null;
            
        } catch (PDOException $ex) {
            
            $this->conexion->rollBack();
            
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
    }
    
    public function listarSolicitudesRealizadas($idEmpleado){

        try{

            $consulta = 'SELECT solTicket, solFechaHora, detObservacion, solEstado '
            .'from solicitudes inner join detallesolicitudes '
            .'on detallesolicitudes.detSolicitud = solicitudes.idSolicitud '
            .'where solEmpleado = ?';

            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $idEmpleado);
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Lista de solicitudes realizadas';
            $this->retorno->datos = $resultado->fetchAll();

        }catch(PDOException $ex){

            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }

        return $this->retorno;
    }
}
