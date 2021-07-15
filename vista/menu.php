<?php
/*
 * Autor: N?GMA 
 */

extract($_REQUEST);

?>

<nav class="navbar navbar-expand-lg">
    
<div class="container-fluid">
    <a class="navbar-brand ">
        HELP DESK
    </a>
    
    <button type="button" class="navbar-toggler" data-target="#menu" data-toggle="collapse">
        <span><i class="fas fa-bars" style="background-color: aqua;"></i></span>
    </button>
    
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ml-lg-auto">            
            <li class="navbar-item active">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="navbar-item">
                <a href="index.php?page=frm_inicioSesion" class="nav-link">Iniciar sesion</a>
            </li>         
        </ul>
    </div>
    </div>
</nav>
