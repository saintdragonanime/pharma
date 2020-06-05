var base_url = $('#base_url').val();
$(document).ready(function() {	
//validar
       var visualiza=$('#visualiza').val();
           if(visualiza ==1){
                $("input").prop('disabled', true);
                $("textarea").prop('disabled', true);
                $("select").prop('disabled', true);
           }


       $("#form_registro").on('success.form.fv', function (e) {
            e.preventDefault();
            var $form = $(e.target);
            var fd = new FormData($form[0]);
                    $.ajax({
                        type: "POST",
                        url: base_url+"index.php/Relacionacomplementos/registrar",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            swal({
                                    title: 'Exito!',
                                    text: 'Se guardo correctamente',
                                    type: 'success',
                                    showCancelButton: false,
                                    allowOutsideClick: false
                                }).then(function (isConfirm) {
                                }).catch(swal.noop);
                            setTimeout(function() { window.location = base_url+"index.php/Relacionacomplementos";}, 1000);
                        }
                    }); // fin ajax
                })
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh'
                    },
                    fields: {
                        no_orden: {
                            validators: {
                                notEmpty: {
                                    message: "Este campo es obligatorio"
                                }
                            }
                        },
                        feha_carga: {
                            validators: {
                                notEmpty: {
                                    message: "Este campo es obligatorio"
                                }
                            }
                        },
                    }
                });
                // FIN VALIDADOr
});
function factura_select(){
         params = {};
		 params.id_cliente = $('#idcliente').val();
		 params.id_subcliente = $('#subcliente').val();       
         $.ajax({
            type: "POST",
            url: base_url + 'index.php/Relacionacomplementos/getviajefactura',
            data:params,
            async:false,
            success: function (data) {
               $('#select_factura').html(data);
            }
        }); // fin ajax
}
function agregar_factura()
{
var contador_div_factura = $('#contador_div_factura').val();
var no_factura = contador_div_factura;
no_factura++;
$('#contador_div_factura').val(no_factura);
var $template = $('#n_factura1'),
                    $clone = $template
                    .clone()
                    .show()
                    .removeAttr('id')
                    .attr('id',"n_factura"+no_factura)
                    .insertAfter($template)
                    .append('<div class="row">\
                        <div class="col-md-12">\
                            <button type="button" onclick="eliminar_factura($(this))" class="btn btn-sm classBotonFratsa white pull-right"><i class="fa fa-minus"></i></button>\
                        </div>\
                    </div>')
                    $clone.find("input").val("");
}
function eliminar_factura(btn){
    var $row = btn.parents('.border_factura'),
                        $cmp3 = $row.find('[name="idfactura[]"]');

                // Remove element containing the option
                $row.remove();
    var valorContador = $('#contador_div_factura').val();
    valorContador = valorContador - 1;
    $('#contador_div_factura').val(valorContador);
}

function getfatura(id){
    $('#modal_factura').modal();
         $.ajax({
            type: "POST",
            url: base_url + 'index.php/Relacionacomplementos/getfactura',
            data:{id_factura:id},
            async:false,
            success: function(data) {
               $('#mostrar_factura').html(data);
            }
        }); // fin ajax
}