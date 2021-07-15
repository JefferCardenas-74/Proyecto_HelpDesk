<?php

/* 
 * Autor:N?GMA
 */
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
            <h1 align="center">FUNCIONARIO</h1>

            <p>Tareas que puede realizar el Funcionario</p>

            <ul>
                <li>
                    Realizar solicitudes 
                </li>
                <li>
                    Listar solicitudes realizadas
                </li>
            </ul>
        </div>
    </div>
</div>