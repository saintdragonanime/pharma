var base_url = $('#base_url').val();


var table = "";
$(document).ready(function() {

    table = $('#table_factura').DataTable({
        "ajax": {
            "url": base_url+"index.php/Relacionafacturas/getlistadofactura"
        },
        "columns": [
            {"data": "id"},
            {"data": "no_orden_compra"},
            {"data": "fecha_factura"},
            {"data": "comentarios", visible: false},
            {"data": "fecha_remision"},
            {"data": "fecha_remision2"},
            {"data": "razon_social"},
            {"data": null,
                render:function(data,type,row){
                    // Se muestran todos los botones correspondientes
                    var html='<div class="menu pmd-floating-action" role="navigation"  >\
                        <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa visualizar" data-title="Visualizar" data-toggle="modal" data-target="#Visualizar"> <i class="icon-eye"></i></a>\
                        <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa eliminar" data-title="Eliminar" data-toggle="modal" data-target="#Eliminar"> <i class="ft-trash-2"></i></a>\
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

    $('#table_factura tbody').on('click', 'a.visualizar', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location.href = base_url+'index.php/Relacionafacturas/visualizar/'+data.id;
    });
    $('#table_factura tbody').on('click', 'a.eliminar', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            $('#modaleliminar').modal();
            $('#idfactura').val(data.id);
    });    



});

function eliminarfactura(){
    var id = $('#idfactura').val();
    $.ajax({
        type: "POST",
        url: base_url+"Relacionafacturas/eliminarfactura",
        data: {id:id},
        success: function (response) 
        {
            toastr.success('Eliminado Correctamente!', 'Hecho');
            setTimeout(function() { $('#modaleliminar').modal('hide'); }, 1000);  
            table.ajax.reload();
        }
    });
}