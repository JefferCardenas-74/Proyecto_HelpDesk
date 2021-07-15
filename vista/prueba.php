<?php 

include '../modelo/datos/conexion.php';

$conexion = conexion::singleton();
$retorno = new stdClass();

$consulta = "select empleados.idEmpleado, personas.perNombres, personas.perApellidos, personas.perCorreo "
. "from empleados inner join personas on empleados.empPersona = personas.idPersona "
. "inner join usuarios on usuarios.usuPersona = personas.idPersona "
. "inner join usuariosroles on usuariosroles.usuUsuario = usuarios.idUsuario "
. "inner join roles on usuariosroles.usuRol = roles.idRol "
. "where roles.rolNombre = 'Soporte' and empleados.idEmpleado = 37";

$resultado = $conexion->query($consulta);
$retorno->estado = true;
$retorno->mensaje = 'algo';
$retorno->datos = $resultado->fetch();

print_r($retorno->datos['perCorreo']);
