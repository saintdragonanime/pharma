var base_url = $('#base_url').val();

function load() {
    var claseFinalizado="";
    var claseDocumentosRecibidos="";    
    var claseFacturado="";    
    var clasePendienteComplemento="";
    
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tablaViajesFinalizados').DataTable({
        "ajax": {
            "url": base_url+"index.php/viajesfinalizados/getListadoViajesFinalizados"
        },
        "columns": [
            {"data": "id",class:"uniqueClassName"},
            {"data": "razon_social",class:"uniqueClassName"},
            {"data": "fecha_fin",class:"uniqueClassName"},
            {"data": "no_carro",class:"uniqueClassName"},
            {"data": "operador",class:"uniqueClassName"},
            {"data": "origen",class:"uniqueClassName"},
            {"data": "destino",class:"uniqueClassName"},
            {"data": "estatus",
                render:function(data,type,row)
                {
                    if(data=='5'){
                        var claseFinalizado="green";   
                    } 
                    else if (data=='7'){
                        var claseFinalizado="green";
                        var claseDocumentosRecibidos="green";
                    }
                    else if (data=='8'){
                        var claseFinalizado="green";
                        var claseDocumentosRecibidos="green";
                        var claseRegistrodesglose="green";
                    }
                    else if (data=='9'){
                        var claseFinalizado="green";
                        var claseDocumentosRecibidos="green";
                        var claseFacturado="green";
                        var clasePendienteComplemento="green";
                    }
                    var html="<i class='ft-check-circle "+claseFinalizado+"'></i> Finalizado <br> \
                              <i class='ft-check-circle "+claseDocumentosRecibidos+"'></i> Documentos Recibidos <br>\
                              <i class='ft-check-circle "+claseRegistrodesglose+"'></i> Registro Desglose<br>";
                    return html;
                }
            },
            {"data": null,class:"uniqueClassName",
                render:function(data,type,row)
                {
                    // Se muestran todos los botones correspondientes
                    var html='<div class="menu pmd-floating-action" role="navigation"  >\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa observaciones_pendientes" data-title="Observaciones Pendientes" data-toggle="modal" ><i class="ft-cloud"></i></a>\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa historico_observaciones" data-title="Histórico de Observaciones" data-toggle="modal" ><i class="ft-file-text"></i></a>\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa documentos_recibidos" data-title="Cambiar estatus a Documentos Recibidos" data-toggle="modal" data-target="#finalizar"><i class="ft-paperclip"></i></a>\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa desglose_documentos" data-title="Registrar Desglose de Documentos" data-toggle="modal" ><i class="ft-book"></i></a>\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
                    return html;
                    /*

                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa asociarFactura" data-title="Asociar Factura Electrónica" data-toggle="modal"><i class="ft-upload-cloud"></i></a>\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa complemento_pago" data-title="Complemento de pago" data-toggle="modal"><i class="ft-upload-cloud"></i></a>\
                    */
                }
            }
        ],
        "order": [[ 0, "desc" ]],
        "lengthMenu": [[25, 50, 100], [25, 50, 100]],
        "dom": 'Bfrtpl',
        // Muestra el botón de Excel para importar la tabla
        "buttons": [
            {   
                extend: 'excelHtml5',
                text: ' Descargar Excel <i class="fa fa-download"></i>',
                className: 'btn classBotonFratsa'
            }
        ],
        // Cambiamos lo principal a Español
        "language": {
            "lengthMenu": "Desplegando _MENU_ elementos por página",
            "zeroRecords": "Lo sentimos - No se han encontrado elementos",
            "sInfo":  "Mostrando registros del _START_ al _END_ de un total de _TOTAL_  registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar : _INPUT_",
            "paginate": {
                "previous": "Página previa",
                "next": "Siguiente página"
              }
        }
    });
}

    $(document).ready(function () {
        table = $('#tablaViajesFinalizados').DataTable();
        $('.chosen-select').chosen({width: "100%"});
        
        // Listener para Mostrar el modal de las observaciones pendientes
        $('#tablaViajesFinalizados tbody').on('click', 'a.observaciones_pendientes', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#idViajeModalObservaciones').val(data.id);
            $("#observaciones_modal").modal('show');
        });

        // Listener para cambiar estatus a "Documentos Recibidos"
        $('#tablaViajesFinalizados tbody').on('click', 'a.documentos_recibidos', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            //$('#idViajeModalDocumentos').val(data.id);
            $.confirm({
                icon: 'fa fa-warning',
                title: 'Atención!',
                content: '¿Seguro que desea cambiar el estatus a Documentos Recibidos?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    confirmar: function () 
                    {
                        $.ajax({
                            type:'POST',
                            url: base_url+'index.php/viajesfinalizados/cambiaEstatus',
                            data: {id:data.id,estatus:7},
                            async: false,
                            statusCode:{
                                404: function(data){
                                    toastr.error('Error!', '400');
                                },
                                500: function(){
                                    toastr.error('Error', '500');
                                }
                            },
                            success:function(data)
                            {
                                toastr.success('Hecho', 'Relizado Correctamente');
                                location.reload();
                            }
                        });
                    },
                    cancelar: function () {
                    }
                }
            });
        });

        // Listener para visualizar el histórico de observaciones 
        $('#tablaViajesFinalizados tbody').on('click', 'a.historico_observaciones', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#historiaObservaciones').modal('show');

            $.ajax({
                type:'POST',
                url: base_url+'index.php/viajesfinalizados/historia_observaciones',
                data: {id:data.id},
                success:function(data){
                    console.log(data);
                    $('#historiaObservaciones').modal();
                    $('#place').html(data);
                    $('#data-tableObservaciones').DataTable({
                        "order": [[ 0, "desc" ]],
                        "lengthMenu": [[25, 50, 100], [25, 50, 100]],
                        "dom": 'Bfrtpl',
                        // Muestra el botón de Excel para importar la tabla
                        "buttons": [
                          
                        ],
                        // Cambiamos lo principal a Español
                        "language": {
                            "lengthMenu": "Desplegando _MENU_ elementos por página",
                            "zeroRecords": "Lo sentimos - No se han encontrado elementos",
                            "sInfo":  "Mostrando registros del _START_ al _END_ de un total de _TOTAL_  registros",
                            "info": "Mostrando página _PAGE_ de _PAGES_",
                            "infoEmpty": "No hay registros disponibles",
                            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                            "search": "Buscar : _INPUT_",
                            "paginate": {
                                "previous": "Página previa",
                                "next": "Siguiente página"
                              }
                        }
                    });
                }
            });// Fin ajax
        });

        $('#tablaViajesFinalizados tbody').on('click', 'a.desglose_documentos', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location.href = base_url+'index.php/Viajesfinalizados/RegistrarDesglose/'+data.id;
        });

     
        $('#tablaViajesFinalizados tbody').on('click', 'a.asociarFactura', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#historia').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/viajes/historia_gastos',
                data: {id:data.id},
                async: false,
                statusCode:{
                    404: function(data){
                        toastr.error('Error!', 'No Se encuentra el archivo');
                    },
                    500: function(){
                        toastr.error('Error', '500');
                    }
                },
                success:function(data){
                    console.log(data);
                    $('#historia_gastos').modal();
                    $('#place').html(data);
                    $('#data-table_gastos').DataTable({
                        "order": [[ 0, "desc" ]],
                        "lengthMenu": [[25, 50, 100], [25, 50, 100]],
                        "dom": 'Bfrtpl',
                        // Muestra el botón de Excel para importar la tabla
                        "buttons": [
                          
                        ],
                        // Cambiamos lo principal a Español
                        "language": {
                            "lengthMenu": "Desplegando _MENU_ elementos por página",
                            "zeroRecords": "Lo sentimos - No se han encontrado elementos",
                            "sInfo":  "Mostrando registros del _START_ al _END_ de un total de _TOTAL_  registros",
                            "info": "Mostrando página _PAGE_ de _PAGES_",
                            "infoEmpty": "No hay registros disponibles",
                            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                            "search": "Buscar : _INPUT_",
                            "paginate": {
                                "previous": "Página previa",
                                "next": "Siguiente página"
                              }
                        }
                    });
                }
                });
                       //fin ajax
        });

        $('#tablaViajesFinalizados tbody').on('click', 'a.complemento_pago', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#complemento_pago').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/viajes/historia_gastos',
                data: {id:data.id},
                async: false,
                statusCode:{
                    404: function(data){
                        toastr.error('Error!', 'No Se encuentra el archivo');
                    },
                    500: function(){
                        toastr.error('Error', '500');
                    }
                },
                success:function(data){
              
                }
                });
                       //fin ajax
        });

        $('#tablaViajesFinalizados tbody').on('click', 'a.asociarFactura', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#asociar_factura').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/viajes/historia_gastos',
                data: {id:data.id},
                async: false,
                statusCode:{
                    404: function(data){
                        toastr.error('Error!', 'No Se encuentra el archivo');
                    },
                    500: function(){
                        toastr.error('Error', '500');
                    }
                },
                success:function(data){
              
                }
                });
                       //fin ajax
        });
   

        // Cargar la tabla del listado de Viajes
        load();

    });

function guardarObservacion()
{
    var estatus = $('#estatus_modal_obspendiente').val();
    var observacion = $('#observaciones_modal_obspendientes').val();
    var id = $('#idViajeModalObservaciones').val();

    $.ajax({
        type:'POST',
        url: base_url+'index.php/viajesfinalizados/guardarObservacion',
        data: {idViaje:id,estatus:estatus, observacion: observacion},
        async: false,
        statusCode:{
            404: function(data){
                toastr.error('Error!', '400');
            },
            500: function(){
                toastr.error('Error', '500');
            }
        },
        success:function(data)
        {
            toastr.success('Hecho', 'Relizado Correctamente');
            $("#observaciones_modal").modal('hide');
            table.ajax.reload();
            /*
            setTimeout(function() { location.reload(); }, 2000);
            */
        }
    });
}