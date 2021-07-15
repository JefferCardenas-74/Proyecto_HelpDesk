<?php

class datosEmpleado {
    
    private $conexion;
    private $retorno;
    
    public function __construct() {
        $this->conexion = conexion::singleton();
        $this->retorno = new stdClass();                
    }
    
    public function agregar(Usuario $usu){
        try {
            
            //iniciamos la transaccion             
            $this->conexion->beginTransaction();
            //agregar a la tabla persona
            $consulta = "insert into personas values(null,?,?,?,?)";
            $resultado = $this->conexion->prepare($consulta);
            
            $resultado->bindParam(1, $usu->getEmpleado()->getIdentificacion());
            $resultado->bindParam(2, $usu->getEmpleado()->getNombre());
            $resultado->bindParam(3, $usu->getEmpleado()->getApellido());
            $resultado->bindParam(4, $usu->getEmpleado()->getCorreo());
            
            $resultado->execute();
            
            //obtener el id de la persona que se acaba de agregar
            
            $idPersona = $this->conexion->lastInsertId();
            $usu->getEmpleado()->setIdPersona($idPersona);
            
            
            //agregar a la tabla empleado
            
            $consulta = "insert into empleados values(null,?,?,?,?)";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $usu->getEmpleado()->getIdPersona());
            $resultado->bindParam(2, $usu->getEmpleado()->getCargo()->getIdCargo());
            $resultado->bindParam(3, $usu->getEmpleado()->getDependencia()->getIdDependencia());
            $resultado->bindParam(4, $usu->getEmpleado()->getTelefono());
            
            $resultado->execute();
            
            //agregar a la tabla usuario
            
            $consulta = "insert into usuarios values(null,?,?,?)";
            $resultado = $this->conexion->prepare($consulta);
            $resultado->bindParam(1, $usu->getEmpleado()->getIdPersona());
            $resultado->bindParam(2, $usu->getLogin());
            $resultado->bindParam(3, $usu->getPassword());            
            
            $resultado->execute();
            
            
            //obtener el id del usuario que se acaba de agregar
            $idUsuario = $this->conexion->lastInsertId();
            $usu->setIdUsuario($idUsuario);
            
            //agregar a la tabla usuario roles
            $cantidad = count($usu->getListaRoles());
            $consulta = "insert into usuariosroles values(null,?,?,'Activo')";
                        
            for($i = 0; $i < $cantidad; $i++){
                
                $resultado = $this->conexion->prepare($consulta);                                
                $resultado->bindParam(1, $usu->getIdUsuario());
                $resultado->bindParam(2, $usu->getListaRoles()[$i]->getIdRol());                
                $resultado->execute();
                
            }
            
            $this->conexion->commit();
            
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Empleado agregado correctamente.";
            $this->retorno->datos = null;
            
        } catch (PDOException $e) {
            $this->conexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->mensaje = $e->getMessage();
            $this->retorno->datos = null;
        }
        
        return $this->retorno;
            
    }
    
    public function listarEmpleadosTecnicos(){
        
        try {
            
            $consulta = "select empleados.idEmpleado, personas.perNombres, personas.perApellidos, personas.perCorreo "
                    . "from empleados inner join personas on empleados.empPersona = personas.idPersona "
                    . "inner join usuarios on usuarios.usuPersona = personas.idPersona "
                    . "inner join usuariosroles on usuariosroles.usuUsuario = usuarios.idUsuario "
                    . "inner join roles on usuariosroles.usuRol = roles.idRol "
                    . "where roles.rolNombre = 'Soporte'";
            
            $resultado = $this->conexion->query($consulta);
            
            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Lista de Empleados tecnicos';
            $this->retorno->datos = $resultado->fetchAll();
            
        } catch (PDOException $ex) {
            
            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }

    public function listarEmpleados(){

        try{    

            $consulta = "select perIdentificacion, perNombres, perApellidos, perCorreo, carNombre, depNombre "
            ."from empleados inner join personas "
            ."on empleados.empPersona = personas.idPersona "
            ."inner join cargos "
            ."on empleados.empCargo = cargos.idCargo "
            ."inner join dependencias "
            ."on empleados.empDependencia = dependencias.idDependencia";

            $resultado = $this->conexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->mensaje = 'Lista de empleados';
            $this->retorno->datos = $resultado->fetchAll();

        }catch(PDOException $ex){

            $this->retorno->estado = false;
            $this->retorno->mensaje = $ex->getMessage();
            $this->retorno->datos = null;
        }

        return $this->retorno;
    }
     
}
