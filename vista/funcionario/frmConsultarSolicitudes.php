<?php 

//session_start();
error_reporting(0);
extract($_REQUEST);
if(!isset($_SESSION['idEmpleado'])){
    header('location: ../vista/index.php?page=frm_inicioSesion&x=3');
}
?>

<h4 align="center">LISTA DE SOLICITUDES REALIZADAS</h4>

<div class="row">
    <div class="col-lg-12">

        <table id="tbl_listaSolicitudes" class="display nowrap" cellspacing="0" align="center" style="width: 85%">
            <thead>
                <tr style="text-align: center;">
                    <th>Ticket</th>
                    <th>Fecha Solicitud</th>
                    <th>Detalle de la solicitud</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr id="filaSolicitudes" class="primeraFilaSolicitudes">
                    <td id="sTicket" ></td>
                    <td id="sFecha"></td>
                    <td id="sDetalle"></td>
                    <td id="sEstado"></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>