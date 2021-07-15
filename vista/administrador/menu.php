<?php
/*
 * Autor: N?GMA 
 */
//session_start();
$user = $_SESSION['nombreEmpleado'];
$rol = $_SESSION['rol'];

extract($_REQUEST);

?>

<nav class="navbar navbar-expand-lg ">
    
<div class="container-fluid"> 
    <a class="navbar-brand ">Help Desk</a>
    
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
                    <a href="../funcionario/index.php" class="dropdown-item">Cambiar a rol Funcionario</a>                                        
                </div>
            </li>            
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-target="EmpDespegable" data-toggle="dropdown">Empleado</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?page=frmEmpleado">Registrar Empleado</a>
                    <a class="dropdown-item" href="index.php?page=frm_listarEmpleados">Listar Empleados</a>
                </div>
            </li>         
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" data-target="despegable" data-toggle="dropdown">Solicitudes</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?page=frm_solicitudesPorAsignar">Solicitudes sin asignar tecnico</a>
                </div>
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" data-target="despegable" data-toggle="dropdown">Dependencias</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?page=frm_agregarDependencia">Agregar Dependencia</a>
                </div>
            </li> 
            <li>
                <a class="nav-link active" href="../salir.php">Salir</a>
            </li>
        </ul>
    </div>
    </div>
    
</nav>
