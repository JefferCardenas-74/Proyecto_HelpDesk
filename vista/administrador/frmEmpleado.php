<?php 
    //session_start();
    error_reporting(0);
    extract($_REQUEST);
    if(!isset($_SESSION['idEmpleado'])){
        header('location: ../vista/index.php?page=frm_inicioSesion&x=3');
    }
?>

<div class="row g-0">
    <div class="col-lg-12">
            <form id="frm" name="frm">
            <div class="table-responsive">
                <table class="table table-bordered" style="width: 85%" align="center">
                    <thead class="bg-info text-center text-white">
                        <tr>
                            <th colspan="4">
                                REGISTRAR EMPLEADO
                            </th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Identificacion:
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control"  id="txt_id" name="txt_id">
                                </div>                        
                            </td>
                            <td>
                                Cargo:
                            </td>
                            <td>
                                <select name="cb_cargo" id="cb_cargo" class="form-control">
                                    <option value="0">Seleccione</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre:
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="txt_nombre" name="txt_nombre">
                                </div>                        
                            </td>
                            <td>
                                Dependencia:
                            </td>
                            <td>
                                <select class="form-control" id="cb_dependencia" name="cb_dependencia">
                                    <option value="0">Selecione</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Apellido:
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="txt_apellido" name="txt_apellido">
                                </div>
                            </td>
                            <td>
                                Telefono:
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="txt_telefono" name="txt_telefono">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Correo:
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="txt_correo" name="txt_correo">
                                </div>
                            </td>
                            <td>
                                Constraseña:
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="txt_pass" name="txt_pass">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Rol:
                            </td>
                            <td colspan="3">
                                <select class="form-control" id="cb_rol" name="cb_rol">
                                    <option value="0">Seleccione</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                    </table>    
                </div>

                <div class="form-group" align="center">
                    <input type="button" class="btn btn-outline-light btn-lg" id="btn_regEmpleado" value="Registrar">
                </div>                

                <input type="hidden" id="accion" name="accion">
            </form>
    </div>
</div>