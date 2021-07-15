<?php 
    session_start();
    session_unset();
    session_destroy();

    header('location: index.php?page=frm_inicioSesion&x=4');
