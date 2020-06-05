
<script>
    $(document).ready(function () {
        $(".chosen-select").chosen({width: "100%",placeholder_text_single:"Selecciona una Opción"});
        
        $(".toupper").on("change",function(){
            $(this).val($(this).val().toUpperCase());
        });
        
        <?php
        $lat = 19.426734;
        $lng = -99.168194;
        $zoom= 15;
        
        if (isset($cliente)) {
                if ($cliente->coordenadas != "") {
                    $coordenadas = explode(',', $cliente->coordenadas);
                    $lat = $coordenadas[0];
                    $lng = $coordenadas[1];
                }
            }
        ?>
                
                
        var map = new GMaps({
            el: '#mapa',
            lat: <?php echo $lat; ?>,
            lng: <?php echo $lng; ?>,
            zoom: <?php echo $zoom; ?>,
            click: function (e) {
                var lat = e.latLng.lat();
                var lng = e.latLng.lng();
                map.removeMarkers();
                map.addMarker({
                    lat: lat,
                    lng: lng
                });
                
                $('#coordenadas').val(lat + "," + lng);
            }
        });
        
        <?php 
            if (isset($cliente)) {
                if ($cliente->coordenadas != "") {
                    echo "map.addMarker({ lat: $lat, lng: $lng});"; 
                }
            }
        ?>

        
        $(".cp-change").on("change", function () {
            GMaps.geocode({
                address: "cp "+$(this).val(),
                callback: function(results, status) {
                  if (status == 'OK') {
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng.lat(), latlng.lng());
                  }
                }
              });
        });
        
        $(".mapa-dir").on("change",function(){
            map.removeMarkers();
                var coord=$("#coordenadas").val().split(",");
                map.addMarker({
                    lat: coord[0],
                    lng: coord[1]
                });
                map.setCenter(coord[0],coord[1]);
                map.setZoom(15);
            
            
        });

        //validador
        $("#form-cliente")
                .on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    <?php
                    if (isset($cliente)) {
                        echo "fd.append('id', $cliente->id);";
                    }
                    ?>
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/catalogos/insertUpdateCliente",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data > 0)
                            {
                                var texto = "Se insertó el Cliente";
                                var url = "<?php echo base_url(); ?>index.php/catalogos/clientes";

                                <?php
                                if (isset($cliente)) { // Si es Edicion
                                    echo "texto='Se actualizó el Cliente'; ";
                                    echo "url='" . base_url() . "index.php/catalogos/edicion_cliente/" . $cliente->id . "';";
                                }
                                ?>

                                swal({
                                    title: 'Exito!',
                                    text: texto,
                                    type: 'success',
                                    showCancelButton: false,
                                    allowOutsideClick: false,
                                }).then(function (isConfirm) {
                                    if (isConfirm) {
                                        window.location = url;
                                    }
                                }).catch(swal.noop);
                            }
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
                        empresa: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un nombre de Empresa"
                                }
                            }
                        },
                        alias: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese el alias del Cliente"
                                }
                            }
                        },
                        calle: {
                            validators: {
                                notEmpty: {
                                    message: "Campo de dirección obligatorio"
                                }
                            }
                        },
                        no_ext: {
                            validators: {
                                notEmpty: {
                                    message: "Campo de dirección obligatorio"
                                }
                            }
                        },
                        colonia: {
                            validators: {
                                notEmpty: {
                                    message: "Campo de dirección obligatorio"
                                }
                            }
                        },
                        poblacion: {
                            validators: {
                                notEmpty: {
                                    message: "Campo de dirección obligatorio"
                                }
                            }
                        },
                        cp: {
                            validators: {
                                notEmpty: {
                                    message: "Campo de dirección obligatorio"
                                }
                            }
                        }
                    }
                })
                .on('err.field.fv', function (e, data) {
                    if (data.fv.getSubmitButton()) {
                        data.fv.disableSubmitButtons(false);
                    }
                })
                .on('success.field.fv', function (e, data) {
                    if (data.fv.getSubmitButton()) {
                        data.fv.disableSubmitButtons(false);
                    }
                })
                .on('click', '.addButton', function () {
                    var $template = $("#template_persona"),
                        $clone = $template
                        .clone()
                        .show()
                        .removeAttr('id')
                        .insertAfter($("#template_persona"));
                    
                    $clone.find(".div_btn").html('<button type="button" class="btn btn-sm gradient-bloody-mary white pull-right removeButton"><i class="fa fa-minus"></i></button>');
                    // Add new field
                    $('#form-cliente').formValidation('addField', $clone.find('[name="nombre[]"]'));
                    $('#form-cliente').formValidation('addField', $clone.find('[name="telefono[]"]'));
                    $('#form-cliente').formValidation('addField', $clone.find('[name="correo[]"]'));
                })
                .on('click', '.removeButton', function () {
                    var $row = $(this).parents('.border'),
                            $nombre = $row.find('[name="nombre[]"]'),
                            $telefono = $row.find('[name="telefono[]"]'),
                            $correo = $row.find('[name="correo[]"]');
                    // Remove element containing the option
                    $row.remove();

                    // Remove field
                    $('#form-cliente').formValidation('removeField', $nombre);
                    $('#form-cliente').formValidation('removeField', $telefono);
                    $('#form-cliente').formValidation('removeField', $correo);
                });
        //fin validador
    });



</script>
