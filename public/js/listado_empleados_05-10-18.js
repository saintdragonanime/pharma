function load() 
{
	// Destruimos la tabla del listado de empleados y la creamos de nuevo
  	table.destroy();
  	table = $('#tabla').DataTable({
	    "ajax": {
      		"url": "empleados/getEmpleados"
    	},
    	"columns": [
      	{"data": "id"},
      	{"data": "nombre"},
      	{"data": "telefono1"},
      	{"data": "puesto"},
      	{"data": "rfc"},
      	{"data": "no_ss"},
      	{"data": "estatus",title:"Estatus",class:"centrado_text",
	        // Dependiendod el número de estatus que traiga el registro, se muestra el texto correspondiente
        	render:function(data,type,row)
        	{
          	if(data==1) {   var html='Activo'; }  
              	else if(data==0) {   var html='Eliminado'; }  
                  	else if(data==2) {   var html='Suspendido'; }  
	        return html;
        	}
      	},
      	{"data": "estatus",title:"Acciones",orderable:false,class:"centrado_text",
	        render:function(data,type,row){
	        	// Si el estatus es diferente de activo, se mostrará el botón para "Activar"; de lo contrario será suspender
	          	if(data!=1)
	          	{
		          	//var suspender_activar = "<button type='button' class='btn btn-sm btn-icon btn-success white' title='Activar' onclick='modalActivaEmpleado("+row.id+")'><i class='ft-check'></i></button>";
                    var suspender_activar = '<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender" data-title="Suspender" onclick="modalActivaEmpleado('+row.id+')"> <i class="material-icons">highlight_off</i> </a>';
	          	}  
	          	else 
	          	{
		          	//var suspender_activar = "<button type='button' class='btn btn-sm btn-icon btn-warning white' title='Suspender' onclick='modalSuspendeEmpleado("+row.id+")'><i class='ft-alert-circle'></i></button>";
                    var suspender_activar = '<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender" data-title="Suspender" onclick="modalSuspendeEmpleado('+row.id+')"> <i class="material-icons">highlight_off</i> </a>';
	          	}	
	          	// Se muestran todos los botones correspondientes
	          	//var html="<button type='button' class='btn btn-sm btn-icon btn-primary white visualiza' title='Visualizar'><i class='icon-eye'></i> </button><button type='button' class='btn btn-sm btn-icon btn-info white edit' title='Editar'><i class='ft-edit'></i></button><button type='button' class='btn btn-sm btn-icon btn-dark white' title='Documentos' onclick='modalMuestraDocumentos("+row.id+")' ><i class='ft-file-text'></i></button><button type='button' class='btn btn-sm btn-icon btn-danger white delete' title='Eliminar' onclick='modalEliminaEmpleado("+row.id+")'><i class='fa fa-times'></i></button>"+suspender_activar;
                var html='<div class="menu pmd-floating-action" role="navigation"  ><a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default edit" data-title="Editar"> <i class="material-icons">edit</i></a>  <a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default visual" data-title="Visualizar"><i class="material-icons">find_in_page</i></a>'+suspender_activar+' <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
	          	return html;
	        }
      	}
    	],
    	"dom": 'Bfrtpl',
    	// Muestra el botón de Excel para importar la tabla
    	"buttons": [
          	{   
    	        extend: 'excelHtml5', text: '<i class="ft-download" style="color: black"></i> <label style="color: black"> Descargar Excel</label>'
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
        },
  	});
}



    $(document).ready(function () 
    {
    		// Crea la tabla del listado
        table = $('#tabla').DataTable();

        // Listener para editar 
        $('#tabla tbody').on('click', 'button.edit', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = 'empleados/edicion_empleado/'+data.id;
        });
        
        // Listener para Visualizar 
        $('#tabla tbody').on('click', 'button.visualiza', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = 'empleados/visualiza_empleado/'+data.id;
        });

        load();
    });

    // Muestra el modal para suspender al empleado
    function modalSuspendeEmpleado(idEmpleado)
    {
        $("#danger").modal('show');  
        $("#idEmpleado").val(idEmpleado);  
    }

    // Muestra el modal para eliminar al empleado
    function modalEliminaEmpleado(idEmpleado)
    {
        $("#danger2").modal('show');  
        $("#idEmpleado").val(idEmpleado);  
    }

    // Muestra el modal para activar al empleado
    function modalActivaEmpleado(idEmpleado)
    {
        $("#activacion").modal('show');  
        $("#idEmpleado").val(idEmpleado);  
    }

    // Muestra el modal con los documentos del Empleado, que obtendremos via AJAX
    function modalMuestraDocumentos(idEmpleado)
    {
        var base_url = 'http://localhost/fratsa/';
        $.ajax({
            url: "empleados/getDocumentosEmpleado/"+idEmpleado,
            success: function (response) 
            {
                var decodificado = jQuery.parseJSON(response);
                // Licencia
                if(decodificado[0].licencia=='') {  $("#nombre_licencia").html('No se ha cargado algún archivo');   }
                else {  $("#nombre_licencia").html('<a href="'+base_url+'uploads/empleados/'+idEmpleado+'/'+decodificado[0].licencia+'" target="_blank">Ver archivo Actual</a>');   } 
                $('#licencia_no').val(decodificado[0].licencia_no);
                $('#licencia_exp').val(decodificado[0].licencia_exp);
                $('#licencia_venc').val(decodificado[0].licencia_venc);
                // Vigencia medica
                if(decodificado[0].licencia=='') {  $("#nombre_medica").html('No se ha cargado algún archivo');   }
                else {  $("#nombre_medica").html('<a href="'+base_url+'uploads/empleados/'+idEmpleado+'/'+decodificado[0].medica+'" target="_blank">Ver archivo Actual</a>');   } 
                $('#medica_no').val(decodificado[0].medica_no);
                $('#medica_exp').val(decodificado[0].medica_exp);
                $('#medica_venc').val(decodificado[0].medica_venc);
                // Ine
                if(decodificado[0].licencia=='') {  $("#nombre_ine").html('No se ha cargado algún archivo');   }
                else {  $("#nombre_ine").html('<a href="'+base_url+'uploads/empleados/'+idEmpleado+'/'+decodificado[0].ine+'" target="_blank">Ver archivo Actual</a>');   }                 
                $('#ine_no').val(decodificado[0].ine_no);
                $('#ine_exp').val(decodificado[0].ine_exp);
                $('#ine_venc').val(decodificado[0].ine_venc);
            }
        });
        $("#modal_documentos").modal('show');
    }

    // Cambia el estatus de Empleado a "Eliminado", y agrega el comentario correspondiente
    function eliminaEmpleado()
    {
        var parametros = {
                "idEmpleado" : $("#idEmpleado").val(),
                "motivo_eliminacion" : $("#motivo_eliminacion").val(),
                "tipo" : 0
        };
        $.ajax({
            type: "POST",
            url: "empleados/cambia_estatus_empleado",
            data: parametros,
            success: function (response) 
            {
                $("#danger2").modal('hide');  
                if (response==1)
                {
                    toastr.success('Suspendido Correctamente!', 'Hecho');
                    setTimeout(function() { window.location.href = "empleados"; }, 2000);                    
                }
                else
                {
                    toastr.success('Error inesperado, intente de nuevo mas tarde o contacte al administrador del Sistema', 'Error!');
                    setTimeout(function() { window.location.href = "empleados"; }, 2000);  
                }
            }
        });
    }

    // Cambia el estatus de Empleado a "Suspendido", y agrega el comentario correspondiente
    function suspendeEmpleado()
    {
        var parametros = {
                "idEmpleado" : $("#idEmpleado").val(),
                "motivo_suspension" : $("#motivo_suspension").val(),
                "tipo" : 2
        };
        $.ajax({
            type: "POST",
            url: "empleados/cambia_estatus_empleado",
            data: parametros,
            success: function (response) 
            {
                $("#danger").modal('hide');  
                if (response==1)
                {
                    toastr.success('Suspendido Correctamente!', 'Hecho');
                    setTimeout(function() { window.location.href = "empleados"; }, 2000);                    
                }
                else
                {
                    toastr.success('Error inesperado, intente de nuevo mas tarde o contacte al administrador del Sistema', 'Error!');
                    setTimeout(function() { window.location.href = "empleados"; }, 2000);  
                }
            }
        });
    }

    // Cambia el estatus de Empleado a "Activo"
    function activaEmpleado()
    {
     	  var parametros = {
                "idEmpleado" : $("#idEmpleado").val(),
                "tipo" : 1
        };
        
        $.ajax({
            type: "POST",
            url: "empleados/cambia_estatus_empleado",
            data: parametros,
            success: function (response) 
            {
                $("#activacion").modal('hide');  
                if (response==1)
                {
                    toastr.success('Activado Correctamente!', 'Hecho');
                    setTimeout(function() { window.location.href = "empleados"; }, 2000);                    
                }
                else
                {
                    toastr.success('Error inesperado, intente de nuevo mas tarde o contacte al administrador del Sistema', 'Error!');
                    setTimeout(function() { window.location.href = "empleados"; }, 2000);  
                }
            }
        });
    }