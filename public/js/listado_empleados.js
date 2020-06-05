function load() 
{
	// Destruimos la tabla del listado de empleados y la creamos de nuevo
  	table.destroy();
  	table = $('#tabla').DataTable({
	    "ajax": {
      		"url": "Empleados/getEmpleados"
    	},
    	"columns": [
      	{"data": "id", visible: false},
        {"data": "no", visible: false},
        {"data": "no_carro"},
        {"data": "empleado_tipo_unidad",title:"Tipo Unidad",class:"centrado_text",
           render:function(data,type,row)
            {
            if(data=='FULL') {   var html='FULL'; }  
                else if(data=='SENCILLO') {   var html='SENCILLO'; }
                   else{
                       var html='';
                   }  
            return html;
            }
        },
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
		          	var suspender_activar = '<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender white classBotonFratsa" data-title="Activar" onclick="modalActivaEmpleado('+row.id+')"> <i class="ft-check"></i> </a>';
	          	}  
	          	else 
	          	{
		          	var suspender_activar = '<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender white classBotonFratsa" data-title="Suspender" onclick="modalSuspendeEmpleado('+row.id+')"> <i class="ft-alert-circle"></i> </a>';
	          	}	
	          	
                var html='<div class="menu pmd-floating-action" role="navigation"  ><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-primary white visualiza classBotonFratsa" data-title="Visualizar"> <i class="icon-eye"></i></a><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-info white edit classBotonFratsa" data-title="Editar"  ><i class="ft-edit"></i></a><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default btn-icon btn-dark white classBotonFratsa" data-title="Documentos" onclick="modalMuestraDocumentos('+row.id+')" ><i class="ft-file-text"></i></a>'+suspender_activar+'<a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>';
	          	
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
    	// Crea la tabla del listado
        table = $('#tabla').DataTable();

        // Listener para editar 
        $('#tabla tbody').on('click', 'a.edit', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = 'empleados/edicion_empleado/'+data.id;
        });
        
        // Listener para Visualizar 
        $('#tabla tbody').on('click', 'a.visualiza', function () 
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
        //var base_url = 'http://localhost/fratsa/';
        $.ajax({
            url: "empleados/getDocumentosEmpleado/"+idEmpleado,
            success: function (response) 
            {
                var decodificado = jQuery.parseJSON(response);
                // Licencia
                if(decodificado[0].licencia=='') {  $("#nombre_licencia").html('No se ha cargado algún archivo');   }
                else {  $("#nombre_licencia").html('<a href=../../uploads/empleados/'+idEmpleado+'/'+decodificado[0].licencia+' target="_blank">Ver archivo Actual</a>');   } 
                $('#licencia_no').val(decodificado[0].licencia_no);
                $('#licencia_exp').val(decodificado[0].licencia_exp);
                $('#licencia_venc').val(decodificado[0].licencia_venc);
                // Vigencia medica
                if(decodificado[0].licencia=='') {  $("#nombre_medica").html('No se ha cargado algún archivo');   }
                else {  $("#nombre_medica").html('<a href=../../uploads/empleados/'+idEmpleado+'/'+decodificado[0].medica+' target="_blank">Ver archivo Actual</a>');   } 
                $('#medica_no').val(decodificado[0].medica_no);
                $('#medica_exp').val(decodificado[0].medica_exp);
                $('#medica_venc').val(decodificado[0].medica_venc);
                // Ine
                if(decodificado[0].licencia=='') {  $("#nombre_ine").html('No se ha cargado algún archivo');   }
                else {  $("#nombre_ine").html('<a href=../../uploads/empleados/'+idEmpleado+'/'+decodificado[0].ine+' target="_blank">Ver archivo Actual</a>');   }                 
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