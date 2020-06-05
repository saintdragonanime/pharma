var base_url = $('#base_url').val();

$(document).ready(function () {
        table = $('#tablaViajes').DataTable();
        
        $('#tablaViajes tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
        } );

        $('#button').click( function () 
        {
            var cadena = '';
            table.rows('.selected').every( function () {
                var d = this.data();
                cadena = cadena+d.id+',';
            });
            cadena = cadena.slice(0, -1);  // Retorna la cadena pero sin la "coma" al final

            window.location = base_url+'index.php/Revision_viajes_terminados/liquidacion_operador/'+cadena;

        });
            
        // Listener para Iniciar viaje
        $(".liquidacion").click(function(){
            window.location = 'Revision_viajes_terminados/liquidacion_operador';
        });
        // Cargar la tabla del listado de Viajes
        load();
    });

function load() {

    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tablaViajes').DataTable({
        "ajax": {
            "url": base_url+"index.php/Revision_viajes_terminados/getListadoViajes"
        },
        "columns": [
            {"data": "id",class:"uniqueClassName"},
            {"data": "razon_social",class:"uniqueClassName"},
            {"data": "fecha_registro",class:"uniqueClassName"},
            {"data": "origen",class:"uniqueClassName"},
            {"data": "destino",class:"uniqueClassName"},
            {"data": "estatus",class:"uniqueClassName"},
            /*
            {"data":  null ,class:"uniqueClassName" ,
                render:function(data,type,row)
                {
                    // Se muestran todos los botones correspondientes
                    var html='<input type="checkbox" id="" name=""><a class="col-4">';
                    return html;
                }
            }
            */
        ],
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

    

