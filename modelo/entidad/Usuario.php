<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Usuario {
    
    private $idUsuario;
    private $empleado;
    private $login;
    private $password;
    private $listaRoles;
    
    public function __construct($idUsuario=null, Empleado $empleado=null, $login=null,
                                  $password=null, $listaRoles=null) {
        $this->idUsuario = $idUsuario;
        $this->empleado = $empleado;
        $this->login = $login;
        $this->password = $password;
        $this->listaRoles = $listaRoles;                
    }
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    
    public function  setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;                
    }
    
    function getEmpleado() {
        return $this->empleado;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function getListaRoles() {
        return $this->listaRoles;
    }

    function setEmpleado($empleado) {
        $this->empleado = $empleado;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setListaRoles($listaRoles) {
        $this->listaRoles = $listaRoles;
    }


}
