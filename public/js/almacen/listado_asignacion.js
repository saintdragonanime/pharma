$(document).ready(function () {
table=$('#tabla_asignaciones').DataTable({
        responsive: true,
        "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url:  base_url+"index.php/Solicitud_almacen/get_recordsAsignacion",
                type: "post",
                error: function () {
                    $("#tabla_asignaciones").css("display", "none");
                }
            },
            "columns": [
                {"data": "tipo"},
                {"data": "nombre"},
                {"data": "concepto"},
                {"data": "solicitante"},
                {"data": "cantidad"},
                {"data": "costo"},
                {"data": "total"},
                {"data": "cuenta_pago"},
                {"data": "fecha_pago"},
                {"data": "referencia"},
                {"data": "metodo_pago"},
                {"data": "fecha_solicitud"},
                // {
                //     "data": null,
                //     "defaultContent": "<button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='fa fa-trash'></i></button>"
                // }
            ]
    }); 

});