<?php ?>

<div class="row g-0">

    <div class="col-lg-5">
        <div class="px-lg-5 py-lg-4 p4">            

            <h2 class="font-weight-bold">INICIO DE SESION</h2>

            <form name="frm_inicioSesion" id="frm_inicioSesion" method="POST" action="../controlador/usuarioControl.php">

            <input type="hidden" name="accion" id="accion" value="iniciarSesion">
                <div class="mb-5">
                    <label class="form-label font-weight-bold">Usuario</label>
                    <input type="text" id="txt_user" name="txt_user" class="form-control border-0 " placeholder="Ingrese el usuario" required>
                </div>
                <div class="mb-5">
                    <label class="form-label font-weight-bold">Contraseña</label>
                    <input type="password" id="txt_pass" name="txt_pass" class="form-control border-0 " placeholder="Ingrese la contraseña" required>
                </div>
                <button type="submit" class="btn btn-outline-light w-100">Iniciar Sesion</button>
            </form>
        </div>
    </div>

    <div class="col-lg-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="../resorces/img1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="../resorces/img2.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</div>

<p align="center">
    <?php 
        try{
            if(@$x==1){
                echo 'Usuario Inactivo, comuniquese con el administrador';
            }
            if(@$x==2){
                echo 'Credenciales no validas, verifique.';
            }
            if(@$x==3){
                echo 'Debe iniciar sesion para ingresar';
            }
            if(@$x==4){
                echo 'Sesion cerrada';
            }
        }catch(Exception $ex){
            
        }
    ?>
</p>