<?php 
    
    session_start();
    error_reporting(0);
    extract($_REQUEST);
    if(!isset($_SESSION['idEmpleado'])){
        header('location: ../vista/index.php?page=frm_inicioSesion&x=3');
    }
?>
<h4 align="center">SOLICITUDES ASIGNADAS</h4>

<table class="display" id="tbl_solicitudesAsignadas" style="width: 85%" aling="center">
    <thead>
        <tr style="text-align: center">
            <th width="20%">Ticket</th>
            <th width="30%">Empleado</th>
            <th width="20%">Oficina</th>
            <th width="20%">Fecha</th>            
            <th width="10%">Detalle</th>
        </tr>
    </thead>
    <tbody>
        <tr id="fila" class="primerFila">
            <td id="sTicket"></td>
            <td id="sEmpleado"></td>
            <td id="sOficina"></td>
            <td id="sFecha"></td>
            <th aling="center">
                <button id="btn_modal" class="btn btn-success">Ver detalle</button>
            </th>            
        </tr>
    </tbody>
</table>

<p align="center">
<div id="mensaje"></div>
</p>
<!--ver detalles de la solicitud-->
<div class="modal w-100" id="modal_detalleSolicitudes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">Detalle de la solicitud</h4>
                <button type="button" id="btn_cerrar" class="text-white close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table align="center" id="tbl_detalle" class="table table-bordered w-100">
                    <thead>
                        <tr style="text-align: center">
                            <th width="20%">Serial</th>
                            <th width="20%">Tipo Equipo</th>
                            <th width="40%">Observaciones</th>
                            <th width="20%">Solucion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="filaDetalle" class="primeraFilaDetalle">
                            <td id="sSerial"></td>
                            <td id="sTipoEquipo"></td>
                            <td id="sObservaciones"></td>
                            <th aling="center">
                                <button id="btn_modalSolucion" class="btn btn-success">Registrar Solucion</button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--registrar solucion-->
<div class="modal w-100" id="modalSolucion">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--modal encabezado-->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">Registrar Solucion</h4>
                <button type="button" id="btn_cerrar" class="text-white close" data-dismiss="modal">&times;</button>
            </div>
            <!--modal contenido-->
            <div class="modal-body">
                <tbody>
                <table id="tbl_solucion" class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    Serial:<br>
                                    <input type="text" id="txt_serial" name="txt_serial" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    Solucion:<br>
                                    <textarea id="txt_solucion" name="txt_solucion" cols="50" rows="10" placeholder="Ingrese aqui la solucion" class="form-control">                                        
                                    </textarea>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </tbody>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="btn_registrarSolucion">Registrar solucion</button>
            </div>                
        </div>
    </div>
</div>