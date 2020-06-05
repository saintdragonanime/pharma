var base_url = $('#base_url').val();
$(document).ready(function () {
        $("#form_factura").on('success.form.fv', function (e) {
                    e.preventDefault();
                    var $form = $(e.target);
                    var fd = new FormData($form[0]);
                    $.ajax({
                        type: "POST",
                        url: base_url + 'index.php/Relacionafacturas/relacionfactura',
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType:'json',
                        success: function (data) {
                            if(data>=1){
                            swal({
                                    title: 'Exito!',
                                    text: 'Se registro la factura',
                                    type: 'success',
                                    showCancelButton: false,
                                    allowOutsideClick: false
                                }).then(function (isConfirm) {
                                    if (isConfirm) {
                                        window.location = url;
                                    }
                                }).catch(swal.noop);
                                setTimeout(function() {window.location = base_url+'index.php/Relacionafacturas';}, 2000);
                                
                               } 

                            
                        }
                    }); // fin ajax
         }).formValidation();
         
         
         if($('#visual').val()==2){
            $("input").prop('disabled', true);
            $("textarea").prop('disabled', true);
         }
 });

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
                        $cmp3 = $row.find('[name="id_viaje[]"]');

                // Remove element containing the option
                $row.remove();
    var valorContador = $('#contador_div_factura').val();
    valorContador = valorContador - 1;
    $('#contador_div_factura').val(valorContador);
}
function viajes_select(){
         params = {};
		 params.id_cliente = $('#id_cliente').val();
		 params.id_subcliente = $('#id_subcliente').val();
         params.fecha_b = $('#fecha_b').val();
         $.ajax({
            type: "POST",
            url: base_url + 'index.php/Relacionafacturas/getviajefactura',
            data:params,
            async:false,
            success: function (data) {
               $('#select_viaje').html(data);
            }
        }); // fin ajax
}

function getfaturaviaje(id){
    $('#modal_factura_viaje').modal();
    params = {};
         params.id_factura = id;
         $.ajax({
            type: "POST",
            url: base_url + 'index.php/Relacionafacturas/gettableviajesfactura',
            data:params,
            async:false,
            success: function(data) {
               $('#mostrar_viaje').html(data);
            }
        }); // fin ajax
}

