var idEquipo;
var idSolicitud;
var idDetalleSolicitud;
var detalleSolicitud = [];
var primeraFilaSoluciones;
var primeraFilaDetalle;

$(function () {
    primeraFilaSoluciones = $('#fila');
    primeraFilaDetalle = $('#filaDetalle');

    listarSolicitudesAsignadas();

    $('#btn_registrarSolucion').click(function () {
        registrarSolucion();

    });

    $('#btn_cerrar').click(function(){

        document.location.reload();
    });

});

function listarSolicitudesAsignadas() {

    $('.otraFila').remove();
    $('#tbl_solicitudesAsignadas').append(primeraFilaSoluciones);

    var parametros = {
        accion: 'AsignadasTecnico'
    };
    $.ajax({
        url: '../../controlador/solicitudControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function (resultado) {
            console.log(resultado);

            $.each(resultado.datos, function (i, solicitud) {
                $('#sTicket').html(solicitud.solTicket);
                $('#sEmpleado').html(solicitud.perNombres + ' ' + solicitud.perApellidos);
                $('#sOficina').html(solicitud.depNombre);
                $('#sFecha').html(solicitud.solFechaHora);
                $('#btn_modal').attr('onclick', 'abrirModal(' + solicitud.idSolicitud + ')');
                $('#tbl_solicitudesAsignadas tbody').append(primeraFilaSoluciones.clone(true).attr('class', 'otraFila'));
            });
            $('#tbl_solicitudesAsignadas tbody tr').first().remove();
            
            $('#tbl_solicitudesAsignadas').DataTable({
                responsive: true
            });

            
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}

function abrirModal(id) {

    idSolicitud = id;
    listarDetalleSolicitud();
    $('#modal_detalleSolicitudes').modal();
}

function listarDetalleSolicitud() {

    $('.otroFilaDetalle').remove();


    var parametros = {
        accion: "detalleSolicitud",
        idSolicitud: idSolicitud

    };

    $.ajax({
        url: "../../controlador/solicitudControl.php",
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function (resultado) {
            console.log(resultado);
            detalleSolicitud = resultado.datos;
            $.each(resultado.datos, function (i, detalle) {
                $('#sSerial').html(detalle.equiSerial);
                $('#sTipoEquipo').html(detalle.tipNombre);
                $('#sObservaciones').html(detalle.detObservacion);
                $('#btn_modalSolucion').attr('onclick', 'abrirModalSolucion(' + i + ')');
                $('#tbl_detalle tbody').append(primeraFilaDetalle.clone(true).attr('class', 'otraFilaDetalle'));
            });
            $('#tbl_detalle tbody tr').first().remove();
        },
        error: function (ex) {
            console.log(ex.responseText);
        }
    });
}

function abrirModalSolucion(pos) {
    console.log(pos);
    idSolicitud = detalleSolicitud[pos].idSolicitud;
    idDetalleSolicitud = detalleSolicitud[pos].idDetalleSolicitud;
    $('#txt_serial').val(detalleSolicitud[pos].equiSerial);
    $('#modalSolucion').modal();
    $('#modal_detalleSolicitudes').modal('hide');
}

function registrarSolucion(){
    
    var parametros = {
        accion:'registrarSolucion',
        idSolicitud: idSolicitud,
        idDetalleSolicitud: idDetalleSolicitud,
        solucion:$('#txt_solucion').val()
    };
    
    $.ajax({
       url:'../../controlador/solicitudControl.php',
       data: parametros,
       dataType:'json',
       type:'post',
       cache:false,
       
       success:function(resultado){
           console.log(resultado);
           if(resultado.estado){

               $('#mensaje').html(resultado.mensaje);
               alertify.success('Se registro la solucion');

               document.location.reload();
           }
       },
       error: function(ex){
           console.log(ex.responseText);
       }
    });
    
}



















