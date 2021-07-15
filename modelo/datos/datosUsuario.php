<?php 

class datosUsuario {
        
        private $conexion;
        private $retorno;

        public function __construct(){
            $this->conexion = Conexion::singleton();
            $this->retorno = new stdClass();
        }

        public function iniciarSesion(Usuario $user){
            try{

                $consulta = 'select * from usuarios inner join personas on usuPersona = idPersona inner join empleados on empPersona = idPersona inner join usuariosroles on usuUsuario = idUsuario inner join roles on usuRol = idRol where usuLogin = ? and usuPassword = ?';

                $resultado = $this->conexion->prepare($consulta);
                $resultado->bindParam(1, $user->getLogin());
                $resultado->bindParam(2, $user->getPassword());
                $resultado->execute();

                if($resultado->rowCount() > 0){
                    
                    $this->retorno->estado = true;
                    $this->retorno->mensaje = 'Datos del empleado';
                    $this->retorno->datos = $resultado->fetchObject();

                }else{

                    $this->retorno->estado = false;
                    $this->retorno->mensaje = 'Revisar las credenciales de ingreso.';
                    $this->retorno->datos = null;
                }

            }catch(PDOException $ex){

                    $this->retorno->estado = false;
                    $this->retorno->mensaje = $ex->getMessage();
                    $this->retorno->datos = null;
            }
            return $this->retorno;
        }
}
