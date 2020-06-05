var base_url = $('#base_url').val();

$(document).ready(function()
{
    // Saber si es solo Visualización
        var visualiza = $("#visualizar_info").val();
        // En caso de que si, deshabilita todo
        if(visualiza == 1)
        {
            $("input").prop('disabled', true);
            $("textarea").prop('disabled', true);
            $("select").prop('disabled', true);
            $("checkbox").prop('disabled', true);
            $("button").prop('disabled', true);

        }


	// Contador de casetas sencillas
    $('#contador_div_casetas_sencilla').val(1);

    // Contador de casetas full
    $('#contador_div_casetas_full').val(1);

   	// Inicializar los select con CHOSEN
    $(".chosen-select").chosen({width: "100%"}); 

    // Obtener el ID de la tarifa; si es Alta vendrá en 0, si es Edición tendrá el valor correspondiente
    var idTarifa = $("#idTarifa").val(); 

    // Carga los datos de la tabla de las casetas sencillas de la Tarifa seleccionada
    table1 = $('#tablas_casetas_sencillo').DataTable({
                "ajax":{ "url": "../getCasetasTarifaSencilla/"+idTarifa,
            },
            "columns": [
              {"data": "id", visible: false},
              {"data": "nombre"},
              {"data": "costo"},
              {"data": "tipo", visible: false},
              {"data": "tarifa_id", visible: false},
              {"data":null,title:"Acciones",orderable:false,class:"centrado_text",
                    render:function(data,type,row){
                        //var html="<button type='button' class='btn btn-sm btn-icon btn-info white edit' title='Editar' onclick='modalEditaCaseta("+row.id+","+row.nombre+","+row.costo+")'><i class='ft-edit'></i></button> <button type='button' class='btn btn-sm btn-icon btn-danger white delete' title='Eliminar' onclick='modalEliminaCaseta("+row.id+")'><i class='ft-alert-circle'></i></button>";
                        var html="<button type='button' class='btn btn-sm btn-icon btn-danger white delete' title='Eliminar' onclick='modalEliminaCaseta("+row.id+")'><i class='ft-alert-circle'></i></button>";
                        return html;
                    }
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
            order: [0,'desc']
    });

    // Carga los datos de la tabla de las casetas full de la Tarifa seleccionada
    table2 = $('#tablas_casetas_full').DataTable({
                "ajax":{ "url": "../getCasetasTarifaFull/"+idTarifa,
            },
            "columns": [
              {"data": "id", visible: false},
              {"data": "nombre"},
              {"data": "costo"},
              {"data": "tipo", visible: false},
              {"data": "tarifa_id", visible: false},
              {"data":null,title:"Acciones",orderable:false,class:"centrado_text",
                    render:function(data,type,row){
                        //var html="<button type='button' class='btn btn-sm btn-icon btn-info white edit' title='Editar' onclick='modalEditaCaseta("+row.id+","+row.nombre+","+row.costo+")'><i class='ft-edit'></i></button> <button type='button' class='btn btn-sm btn-icon btn-danger white delete' title='Eliminar' onclick='modalEliminaCaseta("+row.id+")'><i class='ft-alert-circle'></i></button>";
                        var html="<button type='button' class='btn btn-sm btn-icon btn-danger white delete' title='Eliminar' onclick='modalEliminaCaseta("+row.id+")'><i class='ft-alert-circle'></i></button>";
                        return html;
                    }
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
            order: [0,'desc']
    });


    // Enviamos el Formulario a procesar
    $("#form_tarifa")
        .on('success.form.fv', function (e) {
            // Prevent form submission
            e.preventDefault();
            var $form = $(e.target);
            // Use Ajax to submit form data
            var fd = new FormData($form[0]);

            if($('#bandera_alta_edicion').val()=='alta')
            {
                var urlTarifa = "insertUpdateTarifa";
                var urlRetorno = "../tarifas";
            }
            else
            {
                var urlTarifa = "../insertUpdateTarifa";  
                var urlRetorno = "../../tarifas"; 
            }

            var resultadoVerifica = verificaTarifas();
             if(resultadoVerifica == 1)
             {
                toastr.error("Por favor ingrese almenos un importe de tarifa");
                $('#btn-tarifa').removeAttr('disabled');
                $('#btn-tarifa').removeClass('disabled');
             }
             else{
            $.ajax({
                type: "POST",
                url: urlTarifa,
                cache: false,
                data: fd,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) 
                {
                if(data.success)
                {
                 toastr.error("Ya existe una tarifa con datos similares. Ingrese datos diferentes. ");
                 setTimeout(function() { $('.btnFratsa').removeClass('disabled'); }, 2000);
                 setTimeout(function() { $('.inputDisabled').removeAttr("disabled");}, 2000);
                 }else{ 
                if (data.respuesta==1)
                    {
                        var texto="Se insertó la Tarifa";
                        var url=urlRetorno;
                        
                        swal({
                            title: 'Exito!',
                            text: texto,
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false
                        }).then(function (isConfirm) {
                            if (isConfirm) {
                            window.location = url;
                            }
                        }).catch(swal.noop);
                    }
                    else{
                        swal("Error!", "Se produjo un error, intente de nuevamente o contacte al administrador del sistema", "error")
                    }
                }
                }
            }); 
           }
        })
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                estado_origen: {
                    validators: {
                        notEmpty: {
                            message: "Por favor selecciona un Estado de Origen"
                        }
                    }
                },
                estado_destino: {
                    validators: {
                        notEmpty: {
                            message: "Por favor selecciona un Estado de Destino"
                        }
                    }
                },
                origen: {
                    validators: {
                        notEmpty: {
                            message: "Por favor ingrese el lugar de origen"
                        }
                    }
                },
                destino: {
                    validators: {
                        notEmpty: {
                            message: "Por favor ingrese  el lugar de destino"
                        }
                    }
                }
            }
        });


});


function agregar_caseta_sencilla()
{
    var contador_div_casetas_sencilla = $('#contador_div_casetas_sencilla').val();
    var no_casetas = contador_div_casetas_sencilla;
    no_casetas++;

    $('#contador_div_casetas_sencilla').val(no_casetas);

    var $template = $('#CasetaSencilla1'),
                        $clone = $template
                        .clone()
                        .show()
                        .removeAttr('id')
                        .attr('id',"CasetaSencilla"+no_casetas)
                        .insertAfter("#CasetaSencilla"+contador_div_casetas_sencilla)
                        .append('<div class="row">\
                            <div class="col-md-12">\
                                <button type="button" onclick="eliminar_caseta_sencilla($(this))" class="mt-0 mb-0 btn-sm pull-right btn btn-danger"><i class="fa fa-minus"></i></button>\
                            </div>\
                        </div>')
                        $clone.find("input").val("");
    
}

function eliminar_caseta_sencilla(btn)
{
    var $row = btn.parents('.border_casetas_sencilla'),
                        $cmp1 = $row.find('[name="nombre[]"]'),
                        $cmp2 = $row.find('[name="costo[]"]');

                // Remove element containing the option
                $row.remove();
    var valorContador = $('#contador_div_casetas_sencilla').val();
    valorContador = valorContador - 1;
    $('#contador_div_casetas_sencilla').val(valorContador);
}

function agregar_caseta_full()
{
    var contador_div_casetas_full = $('#contador_div_casetas_full').val();
    var no_casetas_full = contador_div_casetas_full;
    no_casetas_full++;

    $('#contador_div_casetas_full').val(no_casetas_full);

    var $template = $('#CasetaFull1'),
                        $clone = $template
                        .clone()
                        .show()
                        .removeAttr('id')
                        .attr('id',"CasetaFull"+no_casetas_full)
                        .insertAfter("#CasetaFull"+contador_div_casetas_full)
                        .append('<div class="row">\
                            <div class="col-md-12">\
                                <button type="button" onclick="eliminar_caseta_full($(this))" class="mt-0 mb-0 btn-sm pull-right btn btn-danger"><i class="fa fa-minus"></i></button>\
                            </div>\
                        </div>')
                        $clone.find("input").val("");
    
}

function eliminar_caseta_full(btn)
{
    var $row = btn.parents('.border_casetas_full'),
                        $cmp1 = $row.find('[name="nombre2[]"]'),
                        $cmp2 = $row.find('[name="costo2[]"]');

                // Remove element containing the option
                $row.remove();
    var valorContador = $('#contador_div_casetas_full').val();
    valorContador = valorContador - 1;
    $('#contador_div_casetas_full').val(valorContador);
}

function modalEliminaCaseta(idCaseta)
{
    $("#modalEliminaCaseta").modal('show'); 
    $("#idCaseta").val(idCaseta); 
}   

function modalEditaCaseta(idCaseta,nombreCaseta,costoCaseta)
{
    $("#modalEditaCaseta").modal('show'); 
    $("#idCaseta").val(idCaseta); 
    $("#nombreCaseta").val(nombreCaseta); 
    $("#costoCaseta").val(costoCaseta); 
}

function eliminaCaseta()
{
    idCaseta = $("#idCaseta").val();
    idTarifa = $("#idTarifa").val();

    var parametros = {
                "idCaseta" : $("#idCaseta").val()
        };
        $.ajax({
            type: "POST",
            url: "../eliminaCaseta",
            data: parametros,
            success: function (response) 
            {
                $("#modalEliminaCaseta").modal('hide');  
                if (response==1)
                {
                    toastr.success('Eliminada Correctamente!', 'Hecho');
                    setTimeout(function() { window.location.href = "../edicion_tarifas/"+idTarifa; }, 2000);
                }
                else
                {
                    toastr.success('Error inesperado, intente de nuevo mas tarde o contacte al administrador del Sistema', 'Error!');
                    setTimeout(function() { window.location.href = "../edicion_tarifas/"+idTarifa; }, 2000);  
                }
            }
        });
}

function verificaTarifas()
{
    var tipo = $('#tipo_tarifa').val();
    var tarifa_sencillo = $('#tarifa_sencillo').val();
    var tarifa_full = $('#tarifa_full').val();

    var tarifa_cxt_sencillo = $('#tarifa_cxt_sencillo').val();
    var tarifa_cxt_full = $('#tarifa_cxt_full').val();

    var tarifa_viaje_sencillo = $('#tarifa_viaje_sencillo').val();
    var tarifa_viaje_full = $('#tarifa_viaje_full').val();
    

    var esta_origen = $('#estado_origen').val();
    var esta_destino = $('#estado_destino').val();
    var origen_tipo = $('#origen').val();
    var destino_tipo = $('#destino').val();

    if(tarifa_sencillo == "" && tarifa_full == "" && tarifa_cxt_sencillo == "" && tarifa_cxt_full == "" && tarifa_viaje_sencillo == "" && tarifa_viaje_full == "") 
    {
        if(tipo==1)
        {
            return 1;    
        }
    }
    else 
    {
        return 0;
    }
}
function puntoorigen(){
    var id = $('#estado_origen').val();
    $.ajax({
            type: "POST",
            url: base_url+"Tarifas/selectorigen",
            cache: false,
            data: {id:id},
            success: function (data) 
            {
               $('.textorigen').html(data);
               setTimeout(function() {
               $(".chosen-select").chosen({width: "100%"});  
                }, 3000);  
            }
        });
}
function puntodestino(){
    var id = $('#estado_destino').val();
    $.ajax({
            type: "POST",
            url: base_url+"Tarifas/selectdestino",
            cache: false,
            data: {id:id},
            success: function (data) 
            {
               $('.textdestino').html(data);
               setTimeout(function() {
               $(".chosen-select").chosen({width: "100%"}); 
            }, 3000);  
            }
        });
}

