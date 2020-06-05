$(document).ready(function () {
table=$('#tabla_salidas').DataTable({
        responsive: true,
        "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url:  base_url+"index.php/Solicitud_almacen/get_recordsEntradas",
                type: "post",
                error: function () {
                    $("#tabla_salidas").css("display", "none");
                }
            },
            "columns": [
                {"data": "tipo"},
                {"data": "nombre"},
                {"data": "proveedor"},
                {"data": "cantidad"},
                {"data": "costo"},
                {"data": "total"},
                {"data": "fecha_creacion"},
                // {
                //     "data": null,
                //     "defaultContent": "<button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='fa fa-trash'></i></button>"
                // }
            ]
    }); 

});