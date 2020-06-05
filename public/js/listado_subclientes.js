function load() {
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tabla').DataTable({
        "ajax": {
            "url": "subclientes/getListadoSubclientes"
        },
        "columns": [
            {"data": "id"},
            {"data": "razon_social"},
            {"data": "rfc"},
            {"data": "telefono1"},
            {"data": "razon_social_cliente"},
            {"data": "condicion_pago"},
            {"data": "estatus",title:"Estatus",class:"centrado_text",
                // Dependiendod el número de estatus que traiga el registro, se muestra el texto correspondiente
                render:function(data,type,row)
                {
                if(data==1) {   var html='Activo'; }  
                    else if(data==2) {   var html='Suspendido'; }  
                return html;
                }
            },
            {"data": "estatus",class:"centrado_text",
                render:function(data,type,row){
                    // Si el estatus es diferente de activo, se mostrará el botón para "Activar"; de lo contrario será suspender
                    if(data!=1)
                    {
                        var suspender_activar = '<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default activar classBotonFratsa white" data-title="Activar" onclick="modalActivaCliente('+row.id+')"> <i class="ft-check"></i> </a>';
                    }  
                    else 
                    {
                        var suspender_activar = '<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender white classBotonFratsa" data-title="Suspender" onclick="modalSuspendeCliente('+row.id+')"> <i class="ft-alert-circle"></i> </a>';
                    } 

                    // Se muestran todos los botones correspondientes
                    var html='<div class="menu pmd-floating-action" role="navigation"  ><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white visualiza classBotonFratsa" data-title="Visualizar"> <i class="icon-eye"></i></a><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white edit classBotonFratsa" data-title="Editar"><i class="ft-edit"></i></a>'+suspender_activar+'<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
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
        table = $('#tabla').DataTable();

        //Listener para edicion
        $('#tabla tbody').on('click', 'a.edit', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = 'subclientes/edicion_subcliente/'+data.id;
        });

        // Listener para Visualizar 
        $('#tabla tbody').on('click', 'a.visualiza', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = 'subclientes/visualiza_subcliente/'+data.id;
        });

        load();
    });

    // Muestra el modal para suspender al cliente
    function modalSuspendeCliente(idCliente)
    {
        $("#suspension").modal('show');  
        $("#idCliente").val(idCliente);  
    }

    // Muestra el modal para activar al cliente
    function modalActivaCliente(idCliente)
    {
        $("#activacion").modal('show');  
        $("#idCliente").val(idCliente);  
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
            url: "subclientes/cambia_estatus_subcliente",
            data: parametros,
            success: function (response) 
            {
                $("#suspension").modal('hide');  
                if (response==1)
                {
                    toastr.success('Suspendido Correctamente!', 'Hecho');
                    setTimeout(function() { window.location.href = "subclientes"; }, 2000);                    
                }
                else
                {
                    toastr.success('Error inesperado, intente de nuevo mas tarde o contacte al administrador del Sistema', 'Error!');
                    setTimeout(function() { window.location.href = "subclientes"; }, 2000);  
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
            url: "subclientes/cambia_estatus_subcliente",
            data: parametros,
            success: function (response) 
            {
                $("#activacion").modal('hide');  
                if (response==1)
                {
                    toastr.success('Activado Correctamente!', 'Hecho');
                    setTimeout(function() { window.location.href = "subclientes"; }, 2000);                    
                }
                else
                {
                    toastr.success('Error inesperado, intente de nuevo mas tarde o contacte al administrador del Sistema', 'Error!');
                    setTimeout(function() { window.location.href = "subclientes"; }, 2000);  
                }
            }
        });
    }