var base_url = $('#base_url').val();
var table;
$(document).ready(function() {
	table=$('#tabla').DataTable();
	generate();
});

function generate() {
	table.destroy();
  table = $('#tabla').DataTable({
  	"ajax": {
      		"url": "PagoNomina/getPagos"
    	},
    	"columns": [
      	{"data": "id"},
      	{"data": "fecha"},
      	{"data": "monto"},
      	{"data": "nombre"},
      	{"data": "descripcion"},
      	{"data": "id",
      		render:function(data,type,row){
      			return Buton(data);
	        }
      	}
    	],
  });
	
}

function NewGasto(){
	$("#AddGasto").modal('show');
}

function SendData(){
	var info=$("#form-gasto").serialize();
	$.ajax({
		url: base_url+'PagoNomina/Add',
		type: 'POST',
		data: info,
		success: function(data) {
			location.reload();
	    },
	    error: function(jqXHR) {
	     	console.log(jqXHR);
	    }
	});
	
}

function Buton(id){
	return '<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender white classBotonFratsa" data-title="Eliminar" onclick="Eliminar('+id+')"> <i class="fa fa-trash-o"></i> </a>';
}

function Eliminar(id) {
	$.confirm({
        icon: 'fa fa-warning',
        title: 'Atención!',
        content: '¿Está seguro de eliminar el pago?',
        type: 'red',
        typeAnimated: true,
        buttons: {
            confirmar: function () 
            {
                SetData(id);
            },
            cancelar: function () 
            {
                
            }
        }
    });
}

function SetData(id){
	$.ajax({
		url: base_url+'PagoNomina/Dell',
		type: 'POST',
		data: {'id':id},
		success: function(data) {
			location.reload();
	    },
	    error: function(jqXHR) {
	     	console.log(jqXHR);
	    }
	});
}