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

            <h1 align="center">SOPORTE</h1>

            <p>Tareas que puede realizar el Soporte</p>

            <ul>
                <li>
                    Atender solicitudes asignadas 
                </li>
            </ul>
    </div>
</div>