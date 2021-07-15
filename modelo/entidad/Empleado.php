<?php


class Empleado extends Persona {
        
    private $idEmpleado;
    private $cargo;
    private $dependencia;
    private $telefono;
    
    public function __construct($idEmpleado=null, Cargo $cargo=null, Dependencia $dependencia=null,$telefono=null,
            $idPersona=null, $identificacion=null, $nombre=null, $apellido=null, $correo=null){
        
        parent::__construct($idPersona, $identificacion, $nombre, $apellido, $correo);

        $this->idEmpleado = $idEmpleado;
        $this->cargo = $cargo;
        $this->dependencia = $dependencia;
        $this->telefono = $telefono;
    }
    
    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getCargo() {
        return $this->cargo;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

        function getDependencia() {
        return $this->dependencia;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

  
    function setDependencia($dependencia) {
        $this->dependencia = $dependencia;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }


}
