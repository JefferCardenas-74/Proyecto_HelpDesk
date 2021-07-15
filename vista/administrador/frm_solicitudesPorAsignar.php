<?php 

    //session_start();
    error_reporting(0);
    extract($_REQUEST);
    if(!isset($_SESSION['idEmpleado'])){
        header('location: ../vista/index.php?page=frm_inicioSesion&x=3');
    }
?>

<h4 align="center">LISTA DE SOLICITUDES POR ASIGNAR TECNICO</h4>
<br>

<div class="row">
    <div class="col-lg-12">

        <table id="tblSolicitudes" class="display nowrap" cellspacing="0" style="width: 85%" align="center">
            <thead>
                <tr style="text-align: center">
                    <th width="20%">Ticket</th>
                    <th width="40%">Empleado</th>
                    <th width="20%">Fecha</th>
                    <th width="20%">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr id="fila" class="primeraFila">
                    <td id="sSerial"></td>
                    <td id="sEmpleado"></td>
                    <td id="sFecha"></td>
                    <th align="center">
                        <button id="btnMostrarModal" class="btn btn-success">Asignar Tecnico</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<p align="center">
<div id="mensaje"></div>
</p>
<div class="modal w-100" id="modalAsignarTecnico">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">Asignar Tecnico</h4>
                <button type="button" id="btn_cerrar" class="text-white close" data-dismiss="modal">&times;;</button>
            </div>
            <div class="modal-body">
                <table align="center" class="table table-bordered w-100">
                    <thead> </thead>
                    <tbody>
                        <tr>
                            <td>
                                Seleccione Empleado
                                <select name="cb_empleado" id="cb_empleado" class="form-control">
                                    <option value="0">Seleccione</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-success" data-dismiss="modal" id="btnAsignarTecnico">
                    Asignar
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    No
                </button>
            </div>
        </div>
    </div>
</div>

