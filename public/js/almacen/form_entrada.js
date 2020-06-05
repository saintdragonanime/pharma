$(document).ready(function () {
    $('.chosen-select').chosen({width: "100%"});

    $("#tipo_articulo").on("change",function(){
    	get_articulo();
    });

    get_articulo();
    clean_articulos();

        
});

function get_articulo(){
	tipo=$("#tipo_articulo").val();
	$.ajax({
		type: "POST",
		url: base_url+"index.php/Solicitud_almacen/get_articulos",
		data: {tipo: tipo},
		success: function (result){
			$("#articulo").empty().append(result).trigger("chosen:updated");
		}
	});
}

function save_entrada(){
	datos=$("#form_entrada").serialize();
	$.ajax({
		type: "POST",
		url: base_url+"index.php/Solicitud_almacen/save_entrada",
		data: datos,
		success: function (result){
			 swal({
                            title: 'Exito!',
                            text: "Se guardo la operación",
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false
                        }).then(function (isConfirm) {
                            if (isConfirm) {
                                window.location = base_url+"index.php/Solicitud_almacen/entrada";
                            }
                        });
		}
	});
}

function add_articulo(){
	id=$("#articulo").val();
	$.ajax({
		type: "POST",
		url: base_url+"index.php/Solicitud_almacen/add_articulo",
		data: {id: id},
		success: function (result){
			$("#tabla_articulo").html(result);
		}
	});
}

function delete_element(btn){
	var row=btn.closest("tr").index();
	$.ajax({
		type: "POST",
		url: base_url+"index.php/Solicitud_almacen/delete_element",
		data: {row: row},
		success: function (result){
			$("#tabla_articulo").html(result);
		}
	});
}

function clean_articulos(){
	$.ajax({
		type: "POST",
		url: base_url+"index.php/Solicitud_almacen/clear_elements",
		success: function (result){
			$("#tabla_articulo").html("");
		}
	});
}