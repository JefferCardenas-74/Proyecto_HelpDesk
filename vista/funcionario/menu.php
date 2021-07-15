<?php
/* 
Autor: N?GMA 
 */
session_start();
$user = $_SESSION['nombreEmpleado'];
extract($_REQUEST);

$rol = $_SESSION['rol'];

if($_SESSION['rol'] === 'Administrador'){

    $ruta = '../administrador/index.php';
    $rederict = 'Cambiar a Administrador';

}else if($_SESSION['rol'] === 'Soporte'){

    $ruta = '../soporte/index.php';
    $rederict = 'Cambiar a Soporte';
}else{

}

?>

<nav class="navbar navbar-expand-lg ">
    
<div class="container-fluid">
    <a class="navbar-brand">Help Desk</a>
    
    <button type="button" class="navbar-toggler" data-target="#menu" data-toggle="collapse">
        <span><i class="fas fa-bars" style="background-color: aqua;"></i></span>
    </button>
    
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ml-lg-auto">
        <li class="navbar-item active">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-target="desplegable" data-toggle="dropdown">Usuario</a>
                <div class="dropdown-menu">
                    <b>&nbsp;&nbsp;<?php echo $user ?></b> <br>
                    <b>&nbsp;&nbsp;<?php echo $rol ?></b>                    
                    <a href="<?php echo $ruta?>" class="dropdown-item"><?php echo $rederict?></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" data-target="desplegable" data-toggle="dropdown">Solicitud</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?page=frmResgistrarSolicitud">Registrar Solicitud</a>
                    <a href="index.php?page=frmConsultarSolicitudes" class="dropdown-item">Consultar solicitudes</a>
                </div>
            </li>
            <li>
                <a href="../salir.php" class="nav-link active">Salir</a>
            </li>
        </ul>
    </div>
    </div>
</nav>



