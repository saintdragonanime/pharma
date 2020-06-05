$(document).ready(function () {
table=$('#tabla_salidas').DataTable({
        responsive: true,
        "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url:  base_url+"index.php/Solicitud_almacen/get_recordsSalidas",
                type: "post",
                error: function () {
                    $("#table_ins").css("display", "none");
                }
            },
            "columns": [
                {"data": "tipo"},
                {"data": "nombre"},
                {"data": "cantidad"},
                {"data": "solicitante"},
                {"data": "costo"},
                {"data": "total"},
                // {
                //     "data": null,
                //     "defaultContent": "<button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='fa fa-trash'></i></button>"
                // }
            ]
    }); 

});