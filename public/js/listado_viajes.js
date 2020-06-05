var base_url = $('#base_url').val();

function load() {
    var clasePendiente="";
    var claseIniciado="";    
    var claseSolicitados="";    
    var clasePagados="";    
    var claseFinalizado="";
    var claseCancelado=""; 
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tablaViajes').DataTable({
        "ajax": {
            "url": base_url+"index.php/viajes/getListadoViajes"
        },
        "columns": [
            {"data": "id",class:"uniqueClassName"},
            {"data": "razon_social",class:"uniqueClassName"},
            {"data": "no_carro",class:"uniqueClassName"},
            {"data": "operador",class:"uniqueClassName"},
            {"data": "fecha_registro",class:"uniqueClassName"},
            {"data": "origen",class:"uniqueClassName"},
            {"data": "destino",class:"uniqueClassName"},
            {"data": "estatus",
                render:function(data,type,row)
                { 
                    if(data=='1')
                    {
                        var clasePendiente="green";   
                    }   
                    else if(data==2)
                    {
                        var clasePendiente="green";
                        var claseIniciado="green";    
                    }
                    else if(data==3)
                    {
                        var clasePendiente="green";
                        var claseIniciado="green";
                        var claseSolicitados="green"; 
                    }
                    else if(data==4)
                    {
                        var clasePendiente="green";
                        var claseIniciado="green";    
                        var claseSolicitados="green";    
                        var clasePagados="green";
                    }
                    else if(data==5)
                    {
                        var clasePendiente="green";
                        var claseIniciado="green";
                        var claseSolicitados="green";    
                        var clasePagados="green";
                        var claseFinalizado="green";
                    }
                    else if(data==6)
                    {
                        var clasePendiente="green";
                        var claseIniciado="green";    
                        var claseSolicitados="green";    
                        var clasePagados="green";
                        var claseFinalizado="green";
                        var claseCancelado="green";    
                    }
                    var html="<i class='ft-check-circle "+clasePendiente+"'></i> Pendiente <br> \
                              <i class='ft-check-circle "+claseIniciado+"'></i> Iniciado <br>\
                              <i class='ft-check-circle "+claseSolicitados+"'></i> Gastos Solicitados <br>\
                              <i class='ft-check-circle "+clasePagados+"'></i> Gastos Pagados <br>\
                              <i class='ft-check-circle "+claseFinalizado+"'></i> Finalizado <br>\
                              <i class='ft-check-circle "+claseCancelado+"'></i> Cancelado <br>";
                    return html;
                }

            },
            {"data": "estatus",class:"uniqueClassName",
                render:function(data,type,row)
                { 
                    if(data==2) {
                        var deshabilitadoInicio="iniciar";   
                    }
                    else {
                        var deshabilitadoInicio="noPermitido";   
                    }
                    if(data==1){
                                var html='<div class="menu pmd-floating-action" role="navigation"  >\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white iniciar classBotonFratsa " data-title="Iniciar Viaje" data-toggle="modal"><i class="ft-play-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa gastos" data-title="Solicitud de gastos" data-toggle="modal" > <i class="ft-file-plus"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_gastos" data-title="Histórico de Gastos Solicitados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_pagos" data-title="Histórico de Gastos Pagados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa finalizar" data-title="Finalizar Viaje" data-toggle="modal" data-target="#finalizar"><i class="ft-stop-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa cancela" data-title="Cancelar asignación de Viaje" data-toggle="modal" data-target="#cancelar"><i class="ft-x-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
                    }
                    else if(data==2){
                                var html='<div class="menu pmd-floating-action" role="navigation"  >\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa gastos" data-title="Solicitud de gastos" data-toggle="modal" > <i class="ft-file-plus"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_gastos" data-title="Histórico de Gastos Solicitados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_pagos" data-title="Histórico de Gastos Pagados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa finalizar" data-title="Finalizar Viaje" data-toggle="modal" data-target="#finalizar"><i class="ft-stop-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa cancela" data-title="Cancelar asignación de Viaje" data-toggle="modal" data-target="#cancelar"><i class="ft-x-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
                    }
                    else if(data==4){
                                var html='<div class="menu pmd-floating-action" role="navigation"  >\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa gastos" data-title="Solicitud de gastos" data-toggle="modal" > <i class="ft-file-plus"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_gastos" data-title="Histórico de Gastos Solicitados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_pagos" data-title="Histórico de Gastos Pagados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa finalizar" data-title="Finalizar Viaje" data-toggle="modal" data-target="#finalizar"><i class="ft-stop-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa cancela" data-title="Cancelar asignación de Viaje" data-toggle="modal" data-target="#cancelar"><i class="ft-x-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
                    }
                    else if(data==5){
                                var html='<div class="menu pmd-floating-action" role="navigation"  >\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa gastos" data-title="Solicitud de gastos" data-toggle="modal" > <i class="ft-file-plus"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_gastos" data-title="Histórico de Gastos Solicitados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_pagos" data-title="Histórico de Gastos Pagados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa cancela" data-title="Cancelar asignación de Viaje" data-toggle="modal" data-target="#cancelar"><i class="ft-x-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
                    }
                    else if(data==6){
                                var html='<div class="menu pmd-floating-action" role="navigation"  >\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa gastos" data-title="Solicitud de gastos" data-toggle="modal" > <i class="ft-file-plus"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_gastos" data-title="Histórico de Gastos Solicitados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_pagos" data-title="Histórico de Gastos Pagados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
                    }
                    else{
                        var html='<div class="menu pmd-floating-action" role="navigation"  >\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white iniciar classBotonFratsa " data-title="Iniciar Viaje" data-toggle="modal"><i class="ft-play-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa gastos" data-title="Solicitud de gastos" data-toggle="modal" > <i class="ft-file-plus"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_gastos" data-title="Histórico de Gastos Solicitados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_pagos" data-title="Histórico de Gastos Pagados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa finalizar" data-title="Finalizar Viaje" data-toggle="modal" data-target="#finalizar"><i class="ft-stop-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa cancela" data-title="Cancelar asignación de Viaje" data-toggle="modal" data-target="#cancelar"><i class="ft-x-circle"></i></a>\
                                <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
                    }
                    // Se muestran todos los botones correspondientes
                    
                    return html;
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
        table = $('#tablaViajes').DataTable();

        // Listener para Iniciar viaje
        $('#tablaViajes tbody').on('click', 'a.iniciar', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#idViaje').val(data.id);
            $("#iniciar").modal('show');
        });

        // Listener para gastos viaje
        $('#tablaViajes tbody').on('click', 'a.gastos', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#idViajeGasto').val(data.id);
            $("#solicitud").modal('show');
        });

        // Listener para finalizar viaje
        $('#tablaViajes tbody').on('click', 'a.finalizar', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $("#finalizar").modal('show');
            cargaDatosViaje(data.id);
            cargaDatosViajesub(data.id);
            $('#idViajeFinalizar').val(data.id);
        });
         // Listener para cancelar viaje
        $('#tablaViajes tbody').on('click', 'a.cancela', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();            
            $('#idCancelaViaje').val(data.id);
            $("#cancela").modal('show');
        });

        // Listener para Visualizar 
        $('#tablaViajes tbody').on('click', 'a.visualiza_gastos', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
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

        // Listener para Visualizar 
        $('#tablaViajes tbody').on('click', 'a.visualiza_pagos', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#historia').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/viajes/historia_monitoreo',
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
                    $('#historia_pagos').modal();
                    $('#place2').html(data);
                    $('#data-table_pagos').DataTable({
                        "order": [[ 3, "desc" ]],
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

        // Con esta parte, le indicamos al usuario que ya pasó cierta etapa
        // y no puede regresar a ella
        // Listener para Iniciar viaje
        $('#tablaViajes tbody').on('click', 'a.noPermitido', function () {
            $.alert({
                    icon: 'fa fa-warning',
                    title: 'Atención!',
                    content: 'El viaje ya pasó por esta fase',
                    type: 'red',
                    typeAnimated: true
                });
        });


        // Cargar la tabla del listado de Viajes
        load();
    });

    // Muestra el modal de las Tarifas a detalle
    function modalVisualizaTarifas(idTarifa)
    {
        $.ajax({
            url: "tarifas/getDetalleTarifa/"+idTarifa,
            success: function (response) 
            {
                // Parsea el contenido de la respuesta
                var decodificado = jQuery.parseJSON(response);
                // Inserta en cada input el valor correspondiente
                $('#estado_origen').val(decodificado[0].estado_origen);
                $('#origen').val(decodificado[0].origen);
                $('#estado_destino').val(decodificado[0].estado_destino);
                $('#destino').val(decodificado[0].destino);
                $('#diesel_sencillo').val(decodificado[0].diesel_sencillo );
                $('#tarifa_sencillo').val(decodificado[0].tarifa_sencillo);
                $('#rango_consumo_a_sencillo').val(decodificado[0].rango_consumo_a_sencillo);
                $('#rango_consumo_b_sencillo').val(decodificado[0].rango_consumo_b_sencillo);
                $('#tarifa_cxt_sencillo').val(decodificado[0].tarifa_cxt_sencillo);
                $('#tarifa_viaje_sencillo').val(decodificado[0].tarifa_viaje_sencillo);
                $('#kms_sencillo').val(decodificado[0].kms_sencillo);
                $('#diesel_full').val(decodificado[0].diesel_full );
                $('#tarifa_full').val(decodificado[0].tarifa_full);
                $('#rango_consumo_a_full').val(decodificado[0].rango_consumo_a_full);
                $('#rango_consumo_b_full').val(decodificado[0].rango_consumo_b_full);
                $('#tarifa_cxt_full').val(decodificado[0].tarifa_cxt_full);
                $('#tarifa_viaje_full').val(decodificado[0].tarifa_viaje_full);
                $('#kms_full').val(decodificado[0].kms_full);
            }
        });
        // Muestra el modal
        $("#modalDetalleTarifa").modal('show');
    }

    // Muestra el modal de las casetas a detalle
    function modalVisualizaCasetas(idTarifa)
    {
        $.ajax({
            url: "tarifas/getCasetasTarifa/"+idTarifa,
            success: function (response) 
            {
                // Parsea el contenido de la respuesta
                var decodificado = jQuery.parseJSON(response);
                
                // Identifica el modal a donde insertará los datos
                
                var modalCasetasTarifaBody = $("#modalCasetasTarifaBody");
                var modalCasetasTarifaBody2 = $("#modalCasetasTarifaBody2");
                // Deja el Div vacio, para no mostrar datos que pudieran haber sido cargados previamente
                modalCasetasTarifaBody.empty();
                modalCasetasTarifaBody2.empty();
                
                // Con la función "each", se agregará un registro en base a cada registro que venga de la respuesta
                // La variable i es el contador
                $.each(decodificado, function(i)
                {
                    if(decodificado[i].tipo == 'sencillo')
                    {
                        // Inserta el contenido dentro del DIV
                        modalCasetasTarifaBody.append('<div class="form-group row">\
                                    <div class="col-3 controls">\
                                        <input type="text" name="Caseta" id="Caseta" class="form-control form-control-sm toupper" value="'+ decodificado[i].nombre +'" disabled >\
                                    </div>\
                                    <div class="col-3 controls">\
                                        <input type="text" name="Costo" id="Costo" class="form-control form-control-sm toupper" value="'+ decodificado[i].costo +'" disabled >\
                                    </div>\
                                    <div class="col-3 controls">\
                                        <input type="text" name="Costo" id="Costo" class="form-control form-control-sm toupper" value="'+ decodificado[i].tipo +'" disabled >\
                                    </div>\
                        </div>');
                    }
                    else
                    {
                        // Inserta el contenido dentro del DIV
                        modalCasetasTarifaBody2.append('<div class="form-group row">\
                                        <div class="col-3 controls">\
                                            <input type="text" name="Caseta" id="Caseta" class="form-control form-control-sm toupper" value="'+ decodificado[i].nombre +'" disabled >\
                                        </div>\
                                        <div class="col-3 controls">\
                                            <input type="text" name="Costo" id="Costo" class="form-control form-control-sm toupper" value="'+ decodificado[i].costo +'" disabled >\
                                        </div>\
                                        <div class="col-3 controls">\
                                            <input type="text" name="Costo" id="Costo" class="form-control form-control-sm toupper" value="'+ decodificado[i].tipo +'" disabled >\
                                        </div>\
                            </div>');
                    }
                    
                }); 
            }
        });
        // Muestra el modal
        $("#modalCasetasTarifa").modal('show'); 
    }

    // Cambia el estatus de Cliente a "Suspendido"
    function suspendeCliente()
    {
        var parametros = {
                "idCliente" : $("#idCliente").val(),
                "tipo" : 2
        };
        $.ajax({
            type: "POST",
            url: "clientes/cambia_estatus_cliente",
            data: parametros,
            success: function (response) 
            {
                $("#suspension").modal('hide');  
                if (response==1)
                {
                    toastr.success('Suspendido Correctamente!', 'Hecho');
                    setTimeout(function() { window.location.href = "clientes"; }, 2000);                    
                }
                else
                {
                    toastr.success('Error inesperado, intente de nuevo mas tarde o contacte al administrador del Sistema', 'Error!');
                    setTimeout(function() { window.location.href = "clientes"; }, 2000);  
                }
            }
        });
    }

    // Cambia el estatus de Cliente a "Activo"
    function activaCliente()
    {
        var parametros = {
                "idCliente" : $("#idCliente").val(),
                "tipo" : 1
        };
        
        $.ajax({
            type: "POST",
            url: "clientes/cambia_estatus_cliente",
            data: parametros,
            success: function (response) 
            {
                $("#activacion").modal('hide');  
                if (response==1)
                {
                    toastr.success('Activado Correctamente!', 'Hecho');
                    setTimeout(function() { window.location.href = "clientes"; }, 2000);                    
                }
                else
                {
                    toastr.success('Error inesperado, intente de nuevo mas tarde o contacte al administrador del Sistema', 'Error!');
                    setTimeout(function() { window.location.href = "clientes"; }, 2000);  
                }
            }
        });
    }

function iniciarViaje()
{
    var idViaje = $("#idViaje").val();

    var parametros = {
        "observaciones_inicio" : $("#observaciones_inicio").val(),
        "no_expedicion" : $("#no_expedicion").val(),
        "carta_remision" : $("#carta_remision").val(),
        "toneladas" : $("#toneladas").val(),
    };
    
    $.ajax({
        type:'POST',
        url: base_url+'index.php/viajes/iniciarViaje/'+idViaje,
        data: parametros,
        success:function(data)
        {
            // Si existe el usuario, mostramos el mensaje de entrada y redirigimos
            if(data!=0)
            {   

                swal({ title: "Éxito",
                    text: "El viaje se ha iniciado de manera correcta",
                    type: 'success',
                    showCancelButton: false,
                    allowOutsideClick: false,
                });
            
                setTimeout(function(){ 
                    $('#iniciar').modal('hide')
                    table.ajax.reload();
                }, 2000);

                $("#observaciones_inicio").val('');
                $("#no_expedicion").val('');
                $("#carta_remision").val('');
                $("#toneladas").val('');
            
            }
            // En caso contrario, se notifica
            else
            {
                swal({ title: "Atención",
                    text: "El viaje no pudo iniciarse. Contacte al administrador del sistema",
                    type: 'error',
                    showCancelButton: false,
                    allowOutsideClick: false,
                });
            }
        }
    });
}

function solicitarGastos()
{
    var idViajeGasto = $("#idViajeGasto").val();

    var parametros = {
        "observaciones" : $("#observaciones").val(),
    };
    
    $.ajax({
        type:'POST',
        url: base_url+'index.php/viajes/solicitarGastos/'+idViajeGasto,
        data: parametros,
        success:function(data)
        {
            // Si existe el usuario, mostramos el mensaje de entrada y redirigimos
            if(data!=0)
            {
                swal({ title: "Éxito",
                    text: "Se han solicitado los gastos de manera correcta",
                    type: 'success',
                    showCancelButton: false,
                    allowOutsideClick: false,
                });
        
                setTimeout(function(){ 
                    $('#solicitud').modal('hide');
                    table.ajax.reload();
                }, 2000);
            }
            // En caso contrario, se notifica
            else
            {
                swal({ title: "Atención",
                    text: "Los gastos no pudieron solicitarse. Contacte al administrador del sistema",
                    type: 'error',
                    showCancelButton: false,
                    allowOutsideClick: false,
                });
            }
        }
    });
}

function finalizarViaje()
{
    var idViajeFinalizar = $("#idViajeFinalizar").val();

    var parametros = {
        "destino" : $("#destino").val(),
        "cliente_id" : $("#cliente_id").val(),
        "subcliente_id" : $("#subcliente_id").val(),
        "observaciones_fin" : $("#observaciones_fin").val(),
    };
    
    $.ajax({
        type:'POST',
        url: base_url+'index.php/viajes/finalizarViaje/'+idViajeFinalizar,
        data: parametros,
        success:function(data)
        {
            // Si existe el usuario, mostramos el mensaje de entrada y redirigimos
            if(data!=0)
            {
                swal({ title: "Éxito",
                    text: "Se ha finalizado el viaje de manera correcta",
                    type: 'success',
                    showCancelButton: false,
                    allowOutsideClick: false,
                });
                
                /*
                setTimeout(function(){ 
                    $('#finalizar').modal('hide');
                    table.ajax.reload();
                }, 2000);
                */
            }
            // En caso contrario, se notifica
            else
            {
                swal({ title: "Atención",
                    text: "Los gastos no pudieron solicitarse. Contacte al administrador del sistema",
                    type: 'error',
                    showCancelButton: false,
                    allowOutsideClick: false,
                });
            }
        }
    });
}

function cancelarViaje()
{
    var idCancelaViaje = $("#idCancelaViaje").val();

    var parametros = {
        "motivo_cancelacion" : $("#motivo_cancelacion").val(),
    };
    
    $.ajax({
        type:'POST',
        url: base_url+'index.php/viajes/cancelarViaje/'+idCancelaViaje,
        data: parametros,
        success:function(data)
        {
            // Si existe el usuario, mostramos el mensaje de entrada y redirigimos
            if(data!=0)
            {
                swal({ title: "Éxito",
                    text: "Se ha cancelado el viaje de manera correcta",
                    type: 'success',
                    showCancelButton: false,
                    allowOutsideClick: false,
                });
                
                setTimeout(function(){ 
                    $('#cancela').modal('hide');
                     table.ajax.reload();
                }, 2000);
            }
            // En caso contrario, se notifica
            else
            {
                swal({ title: "Atención",
                    text: "El viaje no se pudo cancelar. Contacte al administrador del sistema",
                    type: 'error',
                    showCancelButton: false,
                    allowOutsideClick: false,
                });
            }
        }
    });
}

function cargaDatosViaje(idViaje)
{
    $.ajax({
        url: base_url+'index.php/viajes/getInfoViaje/'+idViaje,
        success:function(data)
        {
            var respuesta = jQuery.parseJSON(data);
            $('#destino').val(respuesta['destino']);
            $('#cliente_id').val(respuesta['cliente_id']);
            $('#subcliente_id').val(respuesta['cliente_id']);
            
        }
    });
}
function cargaDatosViajesub(idViaje)
{
    $.ajax({
        url: base_url+'index.php/viajes/getInfoViajesub/'+idViaje,
        success:function(data)
        {
            var respuesta = jQuery.parseJSON(data);
            $('#subcliente_id').val(respuesta['subcliente_id']);
            
        }
    });
}