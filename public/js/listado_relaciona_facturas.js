//Obtener la URL BASE
var base_url = $('#base_url').val();

// Cargar la tabla
function load() 
{
    var claseFinalizado="";
    var claseDocumentosRecibidos="";    
    var claseFacturado="";    
    var clasePendienteComplemento="";
    
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tablaRelacionFacturas').DataTable({
        "ajax": {
            "url": base_url+"index.php/Relacionafacturas/getListadoFacturas"
        },
        "columns": [
            {"data": "id"},
            {"data": "fecha_carga"},
            {"data": "no_orden_compra"},
            {"data": "xml"},
            {"data": "pdf"},
            {"data": "fecha_remision"},
            {"data": "idCliente", visible: false},
            {"data": "razon_social"},
            {"data": "id",
                render:function(data,type,row)
                {
                    // Se muestran todos los botones correspondientes
                    var html='<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white  classBotonFratsa asociarFactura" title="Editar" data-toggle="modal"><i class="ft-edit-3"></i></a>';
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

$(document).ready(function () 
{
    // Declarar la tabla
    table = $('#tablaViajesFinalizados').DataTable();

    // Cargar la tabla del listado de Viajes
    load();

    // Inicializar los "SELECT" estilo CHOSEN
    $('.chosen-select').chosen({width: "100%"});
    
    // Envía a la vista, luego de dar click en la acción de la tabla
    $('#tablaViajesFinalizados tbody').on('click', 'a.asociarFactura', function () 
    {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var data = row.data();
        window.location = base_url+'index.php/Relacionafacturas/factura/'+data.id;
        data.id
    });        
});

function agregaNuevaFactura()
{
    window.location = base_url+'index.php/Relacionafacturas/factura';
}