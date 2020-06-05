function load() {
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tabla_tarifas').DataTable({
        "ajax": {
            "url": "tarifas/getListadoTarifas"
        },
        "columns": [
            {"data": "id",class:"uniqueClassName"},
            {"data": "nombre_cliente",class:"uniqueClassName",
                render:function(data,type,row){
                    if(data=='' || data==null)
                    {
                        var html="N/A";    
                    }   
                    else
                    {
                        var html=data;
                    }
                    
                    return html;
                }
            },
            {"data": "nombre_subcliente",class:"uniqueClassName",
                render:function(data,type,row){
                    if(data=='' || data==null)
                    {
                        var html="N/A";    
                    }   
                    else
                    {
                        var html=data;
                    }
                    
                    return html;
                }

            },
            {"data": "origen",class:"uniqueClassName"},
            {"data": "destino",class:"uniqueClassName"},
            {"data": null,class:"uniqueClassName",
                render:function(data,type,row){
                    var html="<button type='button' class='btn btn-sm btn-raised btn-icon btn-pure' onclick='modalVisualizaTarifas("+row.id+")' ><i class='icon-wallet'></i> Ver</button>";
                    return html;
                }
            },
            {"data": null,class:"uniqueClassName",
                render:function(data,type,row){
                    var html="<button type='button' class='btn btn-sm btn-raised btn-icon btn-pure' onclick='modalVisualizaCasetas("+row.id+")' ><i class='icon-directions'></i> Ver</button>";
                    return html;
                }
            },
            {"data": null,class:"uniqueClassName",
                render:function(data,type,row){
                    
                    // Se muestran todos los botones correspondientes
                    var html='<div class="menu pmd-floating-action" role="navigation"  ><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white visualiza classBotonFratsa" data-title="Visualizar"> <i class="icon-eye"></i></a><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white edit classBotonFratsa" data-title="Editar"><i class="ft-edit"></i></a><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
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
        table = $('#tabla_tarifas').DataTable();

        //Listener para edicion
        $('#tabla_tarifas tbody').on('click', 'a.edit', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = 'tarifas/edicion_tarifas/'+data.id;
        });

        // Listener para Visualizar 
        $('#tabla_tarifas tbody').on('click', 'a.visualiza', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = 'tarifas/visualiza_tarifas/'+data.id;
        });

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