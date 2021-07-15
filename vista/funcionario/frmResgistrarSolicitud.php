<?php 
    
    session_start();
    error_reporting(0);
    extract($_REQUEST);
    if(!isset($_SESSION['idEmpleado'])){
        header('location: ../vista/index.php?page=frm_inicioSesion&x=3');
    }
?>

<form id="tbl_registrarSolicitud">
<table class="table table-bordered" align="center" style="width: 85%">

    <thead class="bg-info text-white text-center">
        <tr>
            <th colspan="2">REGISTRAR SOLICITUD</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Serial del equipo:
            </td>
            <td>
                <div class="form-group">
                    <input type="text" name="txtserial" id="txtSerial" class="form-control">
                </div>

                <div id="msjSerial"></div>
            </td>
        </tr>        
        <tr>
            <td>
                Observaciones:             
            </td>
            <td>
                <div class="form-group">
                    <textarea name="txtObservaciones" id="txtObservaciones" class="form-control" rows="4" cols="20" placeholder="Ingrese el detalle"></textarea>
                </div>
            </td>
        </tr>
    </tbody>    
</table>
</form>

<div class="form-group" align="center">
    <button class="btn btn-outline-light btn-lg" id="btn_agregarDetalle">Agregar el Detalle</button>
</div>

<p>
<div id="mensaje" align="center"></div>
</p>

<form id="tbl_solicitudesTemp">
<table class="table table-bordered" align="center" style="width: 80%" id="tblSolicitudes">    
    <thead>
        <tr style="text-align: center">
            <th width="10%">Item</th>
            <th width="20%">Serial del equipo</th>
            <th width="70%">Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <tr id="fila" class="primerFila">
            <td id="sItem"></td>
            <td id="sSerial"></td>
            <td id="sObservaciones"></td>            
        </tr>
    </tbody>
</table>
</form>
<div class="form-group" align="center">
    <button id="btn_regSolcitud" class="btn btn-outline-light btn-lg">Registrar Solicitud</button>
</div>


