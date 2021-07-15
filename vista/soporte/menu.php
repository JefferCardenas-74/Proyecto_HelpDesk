<?php 
    extract($_REQUEST);
    $user = $_SESSION['nombreEmpleado'];
    $rol = $_SESSION['rol'];
?>

<nav class="navbar navbar-expand-lg">

<div class="container-fluid">
    <a class="navbar-brand text-white">Help Desk</a>

    <button type="button" class="navbar-toggler" data-target="#menu" data-toggle="collapse">
        <span><i class="fas fa-bars" style="background-color: aqua;"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ml-lg-auto">
        <li class="navbar-item active">
                <a href="index.php" class="nav-link">Home</a>
            </li>            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" data-target="despegable" data-toggle="dropdown">Usuario</a>
                <div class="dropdown-menu">
                    <b>&nbsp;&nbsp;<?php echo $user?></b> <br>
                    <b>&nbsp;&nbsp;<?php echo $rol ?></b> 
                    <a class="dropdown-item" href="../funcionario/index.php">Cambiar a Funcionario</a>
                </div>
            </li>     
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" data-target="despegable" data-toggle="dropdown">Solicitudes</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?page=frm_SolicitudesAsignadas">Asignadas</a>                    
                </div>
            </li>  
            <li>
                <a href="../salir.php" class="nav-link active">Salir</a>
            </li>
        </ul>
    </div>
    </div>
</nav>


