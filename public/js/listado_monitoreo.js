var base_url = $('#base_url').val();

    $(document).ready(function () {
        var base_url = $('#base_url').val();
        table = $('#tabla_monitoreo').DataTable();
    
        //$('#registro').modal({backdrop: 'static', keyboard:true});
        //Listener para edicion   agregar visualiza incidente
        $('#tabla_monitoreo tbody').on('click', 'a.agregar', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
                  $('#registro').modal('show');
                  $('#btn_agregar').unbind().click(function(){
                     var fecha_monitoreo = $('#fecha_monitoreo').val();
                     var hora_monitoreo = $('#hora_monitoreo').val();
                     var lugar = $('#lugar').val();
                     var estatus = $('#estatus').val();
                     var comentarios = $('#comentarios').val();

                     if (lugar == "") {
                      toastr.error("Por favor ingrese un lugar");
                     }else if(estatus == ""){
                      toastr.error("Por favor ingrese un estatus");
                     }
                     else{
                       $.ajax({
                        type: 'POST',
                        async: false,
                        url: base_url+'index.php/Monitoreo/alta_monitoreo',
                        data:{id:data.id,fecha_monitoreo:fecha_monitoreo,hora_monitoreo:hora_monitoreo,lugar:lugar,estatus:estatus,comentarios:comentarios},
                        dataType: 'json',
                        success:function(data){
                            if(data>=1){
                                $('#registro').modal('hide');
                                toastr.success('Registro exitoso');

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
                       }
                  });
        });

        // Listener para Visualizar 
        $('#tabla_monitoreo tbody').on('click', 'a.visualiza_eventos', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#historia').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/monitoreo/historia_monitoreo',
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
                    $('#historia').modal();
                    $('#place').html(data);
                    $('#data-tableMonitoreo').DataTable({
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


        $('#tabla_monitoreo tbody').on('click', 'a.incidente', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
                  $('#incidente').modal('show');
                  $('#btn_incidente').unbind().click(function(){
                     var fecha = $('#fecha').val();
                     var hora = $('#hora').val();
                     var comentarios = $('#comentarios_incidente').val();
                     if (fecha == "") {
                      toastr.error("Por favor ingrese una fecha");
                     }else if(hora == ""){
                      toastr.error("Por favor ingrese una hora");
                     }
                     else{
                       $.ajax({
                        type: 'POST',
                        async: false,
                        url: base_url+'index.php/monitoreo/alta_incidente',
                        data:{id:data.id,fecha:fecha,hora:hora,comentarios:comentarios},
                        dataType: 'json',
                        success:function(data){
                            if(data>=1){
                                $('#incidente').modal('hide');
                                toastr.success('Registro exitoso');
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
                       }
                  });
        });

        // Listener para Visualizar 
        $('#tabla_monitoreo tbody').on('click', 'a.visualiza_incidentes', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#incidente_modal').modal('show');
               $.ajax({
                type:'POST',
                url: base_url+'index.php/monitoreo/historia_incidente',
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
                    $('#incidente_modal').modal();
                    $('#place_incidente').html(data);
                    $('#data-tableIncidente').DataTable({
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


        load();
    });

    function load() {
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tabla_monitoreo').DataTable({
        "ajax": {
            "url": base_url+"index.php/monitoreo/getListadoViajes"
        },
        "columns": [
            {"data": "id",class:"uniqueClassName"},
            {"data": "razon_social",class:"uniqueClassName"},
            {"data": "no_carro",class:"uniqueClassName"},
            {"data": "nombre",class:"uniqueClassName"},
            {"data": "fecha_inicio",class:"uniqueClassName"},
            {"data": "origen",class:"uniqueClassName"},
            {"data": "destino",class:"uniqueClassName"},
            {"data": null,class:"uniqueClassName",
                render:function(data,type,row){
                    // Se muestran todos los botones correspondientes
                    var html='<div class="menu pmd-floating-action" role="navigation"  >\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa agregar" data-title="Registrar monitoreo" data-toggle="modal" data-target="#registro"> <i class="ft-file-plus"></i></a>\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_eventos" data-title="Histórico de eventos" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa incidente" data-title="Incidente mayor" data-toggle="modal" data-target="#incidente"><i class="ft-file-plus"></i></a>\
                    <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa visualiza_incidentes" data-title="Histórico de incidentes" data-toggle="modal" data-target="#eventos"><i class="ft-file-text"></i></a>\
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

function cerrar(){

  $('#fecha_monitoreo').val('');
  $('#hora_monitoreo').val('');
  $('#lugar').val('');
  $('#estatus').val('');
  $('#comentarios').val('');

  $('#fecha').val('');
  $('#hora').val('');
  $('#comentarios_incidente').val('');

}

