//Obtener la URL BASE
var base_url = $('#base_url').val();

// Cargar la tabla
function load() 
{
    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tablaRelacionComplementos').DataTable({
        "ajax": {
            "url": base_url+"index.php/Relacionacomplementos/getListadoComplementos"
        },
        "columns": [
            {"data": "idcomplemento"},
            {"data": "no_orden"},
            {"data": "feha_carga"},
            {"data": "observaciones"},
            {"data": "fecha_remision"},
            {"data": "fecha_pago"},
            {"data": "idcomplemento",
                render:function(data,type,row)
                {
                    var html='<div class="menu pmd-floating-action" role="navigation"  >\
                        <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa" href="'+base_url+'index.php/Relacionacomplementos/registrarComplemento/'+row.idcomplemento+'" data-title="Visualizar" data-target="#Visualizar"> <i class="icon-eye"></i></a>\
                        <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white classBotonFratsa" onclick="eliminar('+row.idcomplemento+')" data-title="Eliminar" data-target="#Eliminar"> <i class="ft-trash-2"></i></a>\
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
$(document).ready(function () 
{
    table = $('#tablaRelacionComplementos').DataTable();
    load();
    $('.chosen-select').chosen({width: "100%"});      
});
function eliminar(id){
    $('#modaleliminar').modal();
    $('#id_comple').val(id);
}
function eliminarcomplemetno(){
     $.ajax({
            type: "POST",
            url: base_url + 'index.php/Relacionacomplementos/eliminarcomplemento',
            data:{id_comple:$('#id_comple').val()},
            async:false,
            success: function(data) {
            toastr.success('Eliminado Correctamente!', 'Hecho'); 
            table.ajax.reload();
            }
        }); // fin ajax
}