<?php 
    error_reporting(0);
    extract($_REQUEST);
    if(!isset($_SESSION['idEmpleado'])){
        header('location: ../vista/index.php?page=frm_inicioSesion&x=3');
    }
?>

<div class="row">
    <div class="col-lg-12 g-0">
        <div class="table-responsive">

        <form id="frm_agregarDependencia" name="frm_agregarDependencia">
        <table class="table table-bordered w-50" align="center">
            <thead class="bg-info text-center text-white">
                <th colspan="2">
                    AGREGAR DEPENDENCIA
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Nombre de dependencia:
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" id="txt_nombreDependencia" name="txt_nombreDependencia" class="form-control">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="form-group" align="center">
            <input type="button" id="btn_agregarDependencia" class="btn btn-outline-light btn-lg" value="Agregar">
        </div>

        <input type="hidden" id="accion" name="accion" value="agregarDependencia">
        </form>
        
        </div>
    </div>
</div>