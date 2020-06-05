var base_url = $('#base_url').val();

    $(document).ready(function () {
        $(".chosen_select").chosen({width: "40%"});
        table = $('#tablaViajes').DataTable();
        //Listener para edicion
        $('#tabla_gastos tbody').on('click', 'a.registro', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            var data = row.data();
                    $.ajax({
                        type:'POST',
                        url: base_url+'index.php/gastos/get_datos_pago',
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
                            $('#registro').modal('show');
                            $('#datos_pago').html(data);
                        }
                    });//fin ajax
                  


              $('#btn_agregar').unbind().click(function(){
                 var concepto = $('#concepto').val();
                 var cantidad = $('#cantidad').val();
                 var fecha_pago = $('#fecha_pago').val();
                 var referencia_pago = $('#referencia_pago').val();
                 var cuenta_pago = $('#cuenta_pago').val();
                 var observaciones = $('#observaciones').val();
              
                   $.ajax({
                    type: 'POST',
                    async: false,
                    url: base_url+'index.php/Gastos/registro_pago_gatos',
                    data:{id:data.id,concepto:concepto,cantidad:cantidad,fecha_pago:fecha_pago,referencia_pago:referencia_pago,cuenta_pago:cuenta_pago,observaciones:observaciones},
                    dataType: 'json',
                    success:function(data){
                        if(data>=1){
                            $('#registro').modal('hide');
                            toastr.success('Registro exitoso');
                            table.ajax.reload();
                        }else{
                            alert('Error');
                        }
                      },
                    error: function(jqXHR,estado,error){
                      console.log(jqXHR);
                      console.log(estado);
                      console.log(error);
                    }
                   });
                   //fin ajax
                   

                
              });
        });

        // Listener para Visualizar 
        $('#tabla_gastos tbody').on('click', 'a.visualiza_pagos', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#historia').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/Gastos/historia_monitoreo',
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
                    $('#place').html(data);
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


        // Listener para Visualizar 
        $('#tabla_gastos tbody').on('click', 'a.visualiza_gastos', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#historia').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/gastos/historia_gastos',
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
                    $('#place2').html(data);
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
                });//fin ajax
        });

        $('#tabla_gastos tbody').on('click', 'a.visualiza_gastos', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#historia').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/gastos/historia_gastos',
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
                    $('#place2').html(data);
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
                });//fin ajax
        });


        load();
    });

function load() {
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tabla_gastos').DataTable({
        "ajax": {
            "url": base_url+"index.php/gastos/getListadoViajes"
        },
        "columns": [
            {"data": "id",class:"uniqueClassName"},
            {"data": "razon_social",class:"uniqueClassName"},
            {"data": "no_carro",class:"uniqueClassName"},
            {"data": "operador",class:"uniqueClassName"},
            {"data": "fecha_inicio",class:"uniqueClassName"},
            {"data": "origen",class:"uniqueClassName"},
            {"data": "destino",class:"uniqueClassName"},
            {"data": null,class:"uniqueClassName",
                render:function(data,type,row){
                    // Se muestran todos los botones correspondientes
                    var html='<div class="menu pmd-floating-action" role="navigation"  >\
                        <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa registro" data-title="Registro" data-toggle="modal" data-target="#Registro"> <i class="ft-file-plus"></i></a>\
                        <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_pagos" data-title="Histórico de eventos" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                        <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_gastos" data-title="Histórico de Gastos Solicitados" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                        <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa white" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
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

function ocultar_pago(){
     var unidad=$('#unidad option:selected').val();
     if (unidad==2) {
        $('#id_efectivo').attr('style', 'display: block');
        $('#datos_pago').attr('style', 'display: none');
     }else{
        $('#id_efectivo').attr('style', 'display: none');
        $('#datos_pago').attr('style', 'display: block');
     }
     
}

