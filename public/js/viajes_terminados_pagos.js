var base_url = $('#base_url').val();

    $(document).ready(function () {
        table = $('#tablaViajes').DataTable();
        $('.chosen').chosen({width: "15%"});
        // Listener para Iniciar viaje

        $('#tablaViajes tbody').on('click', 'a.registrar_desglose', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            //$('#idViajeModalObservaciones').val(data.id);
            $("#liquidacion_modal").modal('show');
        });

        $(".liquidacion").click(function(){
         window.location = 'Revision_viajes_terminados/liquidacion_operador';
        });
        // Cargar la tabla del listado de Viajes
        load();
    });

function casetas_liquidacion(){
       $("#casetas_modal").modal('show');
} 

function load() {

    // Destruye la tabla y la crea de nuevo con los datos cargados 
    table.destroy();
    table = $('#tablaViajes').DataTable({
        "ajax": {
            "url": base_url+"index.php/Viajes_terminados_pagos/getListadoViajes_pagos"
        },
        "columns": [
            {"data": "id",class:"uniqueClassName"},
            {"data": "razon_social",class:"uniqueClassName"},
            {"data": "fecha_registro",class:"uniqueClassName"},
            {"data": "origen",class:"uniqueClassName"},
            {"data": "destino",class:"uniqueClassName"},
            {"data": "estatus",class:"uniqueClassName"},
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

