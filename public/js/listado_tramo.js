
var base_url = $('#base_url').val();

function load() {
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tablaViajes').DataTable({
        "ajax": {
            "url": base_url+"index.php/Tramo_viaje/getListadoViajes"
        },
        "columns": [
            {"data": "id",class:"uniqueClassName"},
            {"data": "razon_social",class:"uniqueClassName"},
            {"data": "no_carro",class:"uniqueClassName"},
            {"data": "operador",class:"uniqueClassName"},
            {"data": "fecha_inicio",class:"uniqueClassName"},
            {"data": "origen",class:"uniqueClassName"},
            {"data": "destino",class:"uniqueClassName"},
            {"data": "estatus",class:"uniqueClassName",
                render:function(data,type,row){
                    if(data==1)
                    {
                        var html="Pendiente";    
                    }   
                    else if(data==2)
                    {
                        var html="Iniciado";
                    }
                    else if(data==3)
                    {
                        var html="Gastos Solicitados";
                    }
                    else if(data==4)
                    {
                        var html="Gastos Pagados";
                    }
                    else if(data==5)
                    {
                        var html="Viaje Finalizado";
                    }
                    else if(data==6)
                    {
                        var html="Viaje Cancelado";
                    }
                    else
                    {
                        var html="";
                    }
                    
                    return html;
                }

            },
            {"data": null,class:"uniqueClassName",
                render:function(data,type,row){
                    // Se muestran todos los botones correspondientes
                    var html='<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa agregar" data-title="Alta de tramo"> <i class="fa fa-road"></i></a>';
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

        //Listener para edicion
        $('#tablaViajes tbody').on('click', 'a.agregar', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = base_url+'index.php/Tramo_viaje/edicion_tramo/'+data.id;
        });

        load();
    });

   
    

    

    