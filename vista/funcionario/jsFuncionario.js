 
var equipo = null;
var detalleSolicitud=[];
var primeraFila;
var primeraFilaSolicitudes;

$(function(){

    primeraFila = $('#fila');
    primeraFilaSolicitudes = $('#filaSolicitudes');

    listarSolicitudes();

    $('#txtSerial').change(function(){
       obtenerEquipo(); 
    });
    
    $('#btn_agregarDetalle').click(function(){
        
        if(($('#txtSerial').val() !== "") && ($('#txtObservaciones').val() !== "")){
            agregarDetalleSolicitud();
        }else{
            
            $('#mensaje').html("Faltan datos por ingresar");
            alertify.error("Faltan datos por ingresar");
        }
    });
    
    $('#btn_regSolcitud').click(function(){

        if(($('#sItem').val() !== " ") && ($('#sSerial').val() !== " ")){

            registrarSolicitud(); 

        }else{

            $('#mensaje').html("No puede registrar una solicitud vacia");
            alertify.error("No puede registrar una solicitud vacia");
        }
        
    });
    
});


function obtenerEquipo(){
    equipo = null;
    
    var parametros ={
        accion:"Consultar",
        serial:$('#txtSerial').val()
    };
    
    $.ajax({
        
        url: '../../controlador/equipoControl.php',
        data: parametros,
        dataType:'json',
        type: 'post',
        cache: 'false',
        
        success: function(resultado){
            console.log(resultado);
            equipo = resultado.datos;
            if(equipo === null){
                
                $('#msjSerial').html("No Existe equipo con ese serial");
                $('#txtSerial').focus();
                
            }else{
                
              $('#msjSerial').html(" ");
            }
            
        }
    });
}

function agregarDetalleSolicitud(){
    
    $('#mensaje').html("");
    
    var existe = existeEquipoDetalle($('#txtSerial').val());
    
    if(!existe){
        
        $('.otraFila').remove();
        $('#tblSolicitudes tbody').append(primeraFila);
        
        var detalle = {
            idEquipo : equipo.idEquipo,
            serial: $('#txtSerial').val(),
            observaciones: $('#txtObservaciones').val()
        };
        
        //se agrega el detalle al arreglo que se creo al principio (detalleSolicitud)
        detalleSolicitud.push(detalle);
        
        $.each(detalleSolicitud, function(i, d){
            $('#sItem').html(i + 1);
            $('#sSerial').html(d.serial);
            $('#sObservaciones').html(d.observaciones);
            $('#tblSolicitudes tbody').append(primeraFila.clone(true).attr('class', 'otraFila'));
        });
        
        $('#tblSolicitudes tbody tr').first().remove();
        $('#txtSerial').val("");
        $('#txtObservaciones').val("");
    }else{
        
        alertify.error("Ya existe un detalle con ese serial");
    }
    
    
}

function existeEquipoDetalle(serial){
    
    var cantidad = detalleSolicitud.length;
    
    for(let i = 0; i < cantidad; i++){
        
        if(detalleSolicitud[i].serial === serial){
            return true;
        }
    }
    
    return false;
}

function registrarSolicitud(){
    
    var parametros = {
        
        datos: JSON.stringify(detalleSolicitud),
        accion: 'Agregar'
    };
    
    $.ajax({
        
        url:'../../controlador/solicitudControl.php',
        data:parametros,
        dataType: 'json',
        type: 'post',
        cache: 'false',
        
        success: function(resultado){
            console.log(resultado);
            if(resultado.estado){
                $('#mensaje').html('Solicitud registrada con exito');
                alertify.success('Solicitud registrada con exito');
                //se limpia el arreglo de detalles
                detalleSolicitud.length = 0;
                $('.otraFila').remove();
            }else{
                $('#mensaje').html('Problema al registrar la solicitud');
            }
        }
    });
    
}

function listarSolicitudes(){

    $('.otraFila').remove();

    var parametros = {
        accion: 'listarSolicitudesRealizadas'
    };

    $.ajax({

        url: '../../controlador/solicitudControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,

        success: function(resultado){

            console.log(resultado);

            var solicitudes = resultado.datos;

            $.each(solicitudes, function(i, sol){

                $('#sTicket').html(sol.solTicket);
                $('#sFecha').html(sol.solFechaHora);
                $('#sDetalle').html(sol.detObservacion);                

                if(sol.solEstado == 'Atendida'){

                    $('#sEstado').html(sol.solEstado);
                    $('#sEstado').attr('class', 'bg-success text-white');
                    

                }else if(sol.solEstado == 'Proceso'){

                    $('#sEstado').html(sol.solEstado);
                    $('#sEstado').attr('class', 'bg-warning text-white');

                }else{

                    $('#sEstado').html(sol.solEstado);
                    $('#sEstado').attr('class', 'bg-info text-white');
                }

                $('#tbl_listaSolicitudes').append(primeraFilaSolicitudes.clone(true).attr('class','otraFila'));
            });

            $('#tbl_listaSolicitudes tbody tr').first().remove();
            $('#tbl_listaSolicitudes').DataTable({
                responsive: true
            });


        },

        error: function(ex){

            console.log(ex.responseText);
        }
        
    });
}