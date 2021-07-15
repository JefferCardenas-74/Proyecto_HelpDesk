<?php

session_start();
error_reporting(0);
extract($_REQUEST);
if(!isset($_SESSION['idEmpleado'])){
    header('location: ../index.php?page=frm_inicioSesion&x=3');
}

?>

<div class="jumbotron jumbotron-fluid" id="contenido">
  <div class="container">
        <div>
            <h1 align="center">ADMINISTRADOR</h1>

            <p>Tareas que puede realizar el Administrador</p>

            <ul>
                <li>
                    Registrar Empleado 
                </li>
                <li>
                    Listar Empleados
                </li>
                <li>
                    Asignar Tecnicos para las solicitudes
                </li>
                <li>
                    Agregar Dependencia
                </li>
            </ul>
        </div>
    </div>
</div>