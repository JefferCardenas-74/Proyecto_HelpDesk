/*
 *Author: NIGMA 
 */
var primeraFila;
var idSolicitud;
var primeraFilaEmpleado;


$(function(){
   
    listarCargos();
    listarDependencia();
    listarRol();
    listarEmpleados();
    
    primeraFila = $('#fila');
    primeraFilaEmpleado = $('#filaEmpleado');
    listarServiciosPorAsignar();
    
    $('#btn_regEmpleado').click(function(){
        $('#accion').val('Agregar');
        agregarEmpleado();
    });
    
    $('#btnAsignarTecnico').click(function(){
        asignarTecnico();
    });

    $('#btn_agregarDependencia').click(function(){

        if($("#txt_nombreDependencia").val() !== " "){

            agregarDependencia();

        }else{
            
            alertify.error("Debe validar el campo de texto");
        }
        
    });

    $('#btn_cerrar').click(function(){

        document.location.reload();
    });
    
});

function agregarEmpleado(){
        
    $.ajax({
       
        url:'../../controlador/empleadoControl.php',
        data: $('#frm').serialize(),
        dataType: 'json',
        type: 'get',
        cache:'false',
        
    success: function(resultado){
            if(resultado.estado){

                alertify.success('Empleado agregado correctamente.');

            }else{

                alertify.error(resultado.mensaje);
            }
        },
        
        error: function(ex){

            console.log(ex.responseText);
        }
        
    });
}

function asignarTecnico(){
    
    var parametros = {
        accion: 'AsignarTecnico',
        idSolicitud: idSolicitud,
        idEmpleado: $('#cb_empleado').val()
    };
    
    $.ajax({
        
        url: '../../controlador/solicitudControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,
        
        success: function(resultado){
            console.log(resultado);

            if(resultado.estado){

                $('#mensaje').html(resultado.mensaje);

                alertify.success('Se ha asignado un tecnico');
                
                alertify.alert("Se ha enviado un correo al Tecnico " + resultado.datos.perNombres +" "+resultado.datos.perApellidos, function(){
                    alertify.message('OK');
                });

                listarServiciosPorAsignar();
            }
            else{
                
                $('$mensaje').html(resultado.mensaje);
            }
        },
        
        error: function(ex){
            
            console.log(ex.responseText);
        }
    });
}

function listarCargos(){
    
    $('.otroCargo').remove();
    
    var parametros = {
        accion: 'listarCargo'
    };
    
    $.ajax({
       
        url: '../../controlador/cargoControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: 'false',
        
        success: function(resultado){
            
            var cargos = resultado.datos;
            $.each(cargos, function(i, cargo){
                $('#cb_cargo').append($('<option>',{
                    value: cargo.idCargo,
                    text: cargo.carNombre,
                    "class": "otroCargo"
                }));
            });
                        
        },
        
        error: function(ex){
                console.log(ex.responseText);
            }
    });
}

function listarDependencia(){
    
    $('.otraDependencia').remove();
    
    var parametros = {
        accion: 'listarDependencia'
    };
    
    $.ajax({
       
        url: '../../controlador/dependeciaControl.php',
        data: parametros,
        type: 'post',
        dataType: 'json',
        cache: 'false',
        
        success: function(resultado){

            var dependencia = resultado.datos;
            
            $.each(dependencia, function(i, dep){
               $('#cb_dependencia').append($('<option>',{
                   value: dep.idDependencia,
                   text: dep.depNombre,
                   "class": "otraDependencia"
               }));
            });
        },
        
        error: function(ex){
            console.log(ex.responseText);
        }
    });
}

function listarRol(){
    
    $('.otroRol').remove();
    
    var parametros = {
        accion: 'listarRol'
    };
    
    $.ajax({
        
        url: '../../controlador/rolControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: 'false',
        
        success: function(resultado){
            
            var roles = resultado.datos;
            $.each(roles, function(i, rol){
               
                $('#cb_rol').append($('<option>',{
                    
                    value: rol.idRol,
                    text: rol.rolNombre,
                    "class": "otroRol"
                }));
            });
        },
        
        error: function(ex){
            
            console.log(ex.responseText);
        }
    });
}

   function listarServiciosPorAsignar(){
    
    $('.otraFila').remove();
    $('#tblSolicitudes tbody').append(primeraFila);
    
    var parametros = {
        accion:'listaSolicitudes'
    };
    
    $.ajax({
        
        url: '../../controlador/solicitudControl.php',
        data: parametros,
        dataType: 'json',
        type: 'post',
        cache: false,
        
        success: function(resultado){
            console.log(resultado);
            $.each(resultado.datos, function(i, solicitud){
               $('#sSerial').html(solicitud.solTicket);
               $('#sEmpleado').html(solicitud.perNombres +" "+ solicitud.perApellidos);
               $('#sFecha').html(solicitud.solFechaHora);
               $('#btnMostrarModal').attr('onclick', 'abrirModal('+solicitud.idSolicitud+')');
               $('#tblSolicitudes tbody').append(primeraFila.clone(true).attr('class', 'otraFila'));               
            });
            $('#tblSolicitudes tbody tr').first().remove();
            $('#tblSolicitudes').DataTable({
                responsive: true
            });
        },
        error: function(ex){
            console.log(ex.responseText);
        }
                
    });
       
   }

  function abrirModal(id){
       idSolicitud = id;
       listarEmpleadoTecnicos();
       
       $('#modalAsignarTecnico').modal();
   }
   
   function listarEmpleadoTecnicos(){
       
       $('.otroEmpleado').remove();
       
       var parametros = {           
           accion: 'ListarTecnicos'
       };
       
       $.ajax({
            
            url: '../../controlador/empleadoControl.php',
            data: parametros,
            dataType: 'json',
            type: 'post',
            cache: false,
            
            success: function(resultado){
                console.log(resultado);
                var emp = resultado.datos;
                $.each(emp, function(i, empleado){
                    $('#cb_empleado').append($('<option>',{
                        value: empleado.idEmpleado,
                        text: empleado.perNombres +" "+ empleado.perApellidos,
                        'class':'otroEmpleado'
                    }));
                });
            },
            error: function(ex){
                console.log(ex.responseText);
            }
       });
   }

function agregarDependencia(){

    $.ajax({

        url: '../../controlador/dependeciaControl.php',
        data: $('#frm_agregarDependencia').serialize(),
        dataType: 'json',
        type: 'post',
        cache: 'false',

        success: function(resultado){

            console.log(resultado);

            if(resultado.estado){

                alertify.success('Empleado agregado correctamente.');

            }else{

                alertify.error('Empleado agregado correctamente.');
            }           
        },
        error: function(ex){
            console.log(ex.responseText);
        }

    });
}

    
function listarEmpleados(){

    $('.otraFila').remove();
    $('#tbl_listaEmpleados tbody').append(primeraFilaEmpleado);

    var parametros = {
        accion: 'listarEmpleados'
    };

    $.ajax({

            url: '../../controlador/empleadoControl.php',
            data: parametros,
            dataType: 'json',
            type: 'post',
            cache:'false',

            success: function(resultado){

                console.log(resultado);
                
                $.each(resultado.datos, function(i, emp){

                    $('#eIdentificacion').html(emp.perIdentificacion);
                    $('#eEmpleado').html(emp.perNombres +' '+ emp.perApellidos);
                    $('#eCorreo').html(emp.perCorreo);
                    $('#eCargo').html(emp.carNombre);
                    $('#eDependencia').html(emp.depNombre);
                    $('#tbl_listaEmpleados tbody').append(primeraFilaEmpleado.clone(true).attr('class', 'otraFila'));
                });

                $('#tbl_listaEmpleados tbody tr').first().remove();
                
                $('#tbl_listaEmpleados').DataTable({
                    responsive: true
                });
            },

            error: function(ex){

                console.log(ex.responseText);
            }
    });
}