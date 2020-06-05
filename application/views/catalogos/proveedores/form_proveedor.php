
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title="Alta"; 
                if(isset($proveedores)){
                    $title="Edición";
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de proveedores</div>
        </div>
        <input type="hidden" value="<?php echo $visualizar; ?>" id="visualizar_info" name="visualizar_info">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form_proveedor" method="post" autocomplete="off">
                        <h4 class="form-section"><i class="ft-file-text"></i> Datos de Proveedores</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Tipo </p>
                                    <div class="col-8 controls">

                                        <select id="tipo_proveedor" name="tipo_proveedor" class="form-control form-control-sm chosen-select">
                                            <option selected="" disabled="">Seleccionar</option>
                                                <?php if(isset($proveedores)){ ?>
                                                <option value="<?php echo $proveedores->tipo_proveedor; ?>" selected=""><?php echo $proveedores->tipo_proveedor; ?></option>
                                                <?php } ?>

                                            <?php foreach($tipo_proveedores as $tipo_proveedor) 
                                            { 
                                            ?>   
                                                
                                                <option value="<?php echo $tipo_proveedor->nombre;?>" >
                                                    <?php echo $tipo_proveedor->nombre;?>
                                                </option>
                                            <?php 
                                            } 
                                            ?>

                                        </select>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="row">
                             <div class="form-group col-md-6 row">
                                    <p class="col-4">Razón Social  <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" class="form-control form-control-sm toupper" name="razon_social" <?php if(isset($proveedores)){ echo "value='$proveedores->razon_social'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">RFC  <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="rfc" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->rfc'";} ?> >
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">CURP </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="curp" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->curp'";} ?> >
                                    </div>
                            </div>
                             <div class="form-group col-md-6 row">
                                    <p class="col-4">Calle </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->calle'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4"># Ext. </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="no_ext" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->no_ext'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4"># Int. </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->no_int'";} ?> >
                                    </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Colonia </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="colonia" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->colonia'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">CP <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" pattern="^\d+$" maxlength="5" name="cp" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->cp'";} ?>  required oninput="check_text(this);">
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Delegación o Municipio </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->municipio'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Estado </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedores)){ echo "value='$proveedores->estado'";} ?> >
                                    </div>
                            </div>
                        </div>


                        
                        <h4 class="form-section"><i class="ft-user-check"></i> Personas de contacto</h4>
          
                        <div id="personas">
                            <?php 
                            $i=0;
                            $size= 1;
                            if(isset($contactos_proveedores)){
                                $size=sizeof($contactos_proveedores);
                            }
                            do{
                            ?>
                            <div  class="border" name="div_persona_contacto1" <?php if($i==0){ ?>id="div_persona_contacto1" <?php } ?>>
                            <div>  
                                <div class="row mt-2">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Tipo de contacto  <span class="required">*</span></p>
                                            <div class="col-8 controls">
                                                <input type="text" id="tipo_contacto" name="tipo_contacto[]" class="form-control form-control-sm toupper " <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->tipo_contacto."'";} ?>                                       >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Condición de pago  <span class="required">*</span></p>
                                            <div class="col-8 controls">
                                                <input type="text"id="condicion_pago" name="condicion_pago[]" class="form-control form-control-sm toupper " <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->condicion_pago."'";} ?>>
                                            </div>
                                    </div>
                                </div>
                                 
                                <div class="row">
                                    <div class="form-group col-md-12 row">
                                            <p class="col-2">Persona de contacto <span class="required">*</span></p>
                                            <div class="col-10 controls">
                                                <input type="text" id="persona_contacto" name="persona_contacto[]" class="form-control form-control-sm toupper " <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->persona_contacto."'";} ?>>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 1  <span class="required">*</span></p>
                                            <div class="col-8 controls">
                                                <input  type="text" pattern="^\d+$" maxlength="20" id="telefono1" name="telefono1[]" class="form-control form-control-sm toupper" <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->telefono1."'";} ?>>
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="telefono2" name="telefono2[]" class="form-control form-control-sm toupper"  <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->telefono2."'";} ?>>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 1  <span class="required">*</span></p>
                                            <div class="col-8 controls">
                                                <input type="email" id="correo1" name="correo1[]" class="form-control form-control-sm " <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->correo1."'";} ?>>
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 2 </p>
                                            <div class="col-8 controls">
                                                <input type="email" id="correo2" name="correo2[]" class="form-control form-control-sm "  <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->correo2."'";} ?>>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Banco</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="banco" name="banco[]" class="form-control form-control-sm toupper" <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->banco."'";} ?>>
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Sucursal </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="sucursal" name="sucursal[]" class="form-control form-control-sm toupper"  <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->sucursal."'";} ?>>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">No. Cuenta</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="no_cuenta" name="no_cuenta[]" class="form-control form-control-sm toupper"  <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->no_cuenta."'";} ?>>
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Clave </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="clave" name="clave[]" class="form-control form-control-sm toupper"  <?php if(isset($contactos_proveedores[$i])){ echo "value='".$contactos_proveedores[$i]->clave."'";} ?>>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 row">
                                            <p class="col-2">Observaciones </p>
                                            <div class="col-10 controls">
                                                <textarea rows="2" id="observaciones" name="observaciones[]" class="form-control form-control-sm toupper" ><?php if(isset($contactos_proveedores[$i])){ echo $contactos_proveedores[$i]->observaciones;} ?></textarea>
                                            </div>
                                    </div>
                                </div>
                                
                            
                            </div>

                                <div class="row">
                                     <div class="col-md-12 text-center div_btn">
                                         <?php if($i==0){ ?>
                                        <button type="button" class="mt-2 mb-0 round btn classBotonFratsa white addButton"><i class="fa fa-plus"></i></button>
                                        <?php } else { ?>
                                        <button type="button" class="btn classBotonFratsa white pull-right removeButton"><i class="fa fa-plus"></i></button>
                                        <?php } ?>
                                     </div>
                            
                                </div>
                            </div>
                            <?php 
                                $i++;
                                }while($i<$size);
                            ?>
                    
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/proveedores" class="btn btn-icon btn-secondary" style="background-color: gray;"><i class="ft-chevron-left" ></i> Regresar</a>
                            <button type="submit" class="btn shadow-z-1 btnFratsa classBotonFratsa white" style="width: 50%; margin-left: 15%; ">Guardar <i class="fa fa-save"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     $(document).ready(function () {

        $('.chosen-select').chosen();

        // Saber si es solo Visualización
        var visualiza = $("#visualizar_info").val();
        // En caso de que si, deshabilita todo
        if(visualiza == 1)
        {
            $("input").prop('disabled', true);
            $("textarea").prop('disabled', true);
            $("button").prop('disabled', true);   
        }
        
        // Contador de contactos
        $('#contador_div_contactos').val(1);

         $(".toupper").on("change",function(){
            $(this).val($(this).val().toUpperCase()); 
         });
         
        // VALIDACION
        $("#form_proveedor")
                .on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    <?php if(isset($proveedores)){
                        echo "fd.append('id', $proveedores->id);";
                    }?>
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Proveedores/insertUpdateProveedor",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data>0)
                            {
                                var texto="Se insertó el Proveedor";
                                var url="<?php echo base_url(); ?>index.php/Proveedores/proveedores";
                                
                                <?php if(isset($proveedores)){ // Si es Edicion
                                    echo "texto='Se actualizó el Proveedor'; ";
                                    echo "url='".base_url()."index.php/Proveedores';";
                                } ?>
  
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
                        razon_social: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese razón social"
                                }
                            }
                        },
                        rfc: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese el RFC"
                                }
                            }
                        },
                        cp: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un código postal"
                                }
                            }
                        },
                        'tipo_contacto[]': {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un tipo contacto"
                                }
                            }
                        },
                        'condicion_pago[]': {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una condición de pago"
                                }
                            }
                        },
                        'persona_contacto[]': {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un nombre de contacto"
                                }
                            }
                        },
                        'telefono1[]': {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un teléfono"
                                },
                                regexp: {
                                    regexp: /^\d+$/,
                                    message: 'Por favor, introduzca un valor que sea válido'
                                }
                            }
                        },
                        'correo1[]': {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un correo"
                                }
                            }
                        },
                        'telefono2[]': {
                            validators: {
                                 regexp: {
                                    regexp: /^\d+$/,
                                    message: 'Por favor, introduzca un valor que sea válido'
                                }
                            }    
                        },
                        'no_cuenta[]': {
                            validators: {
                                 regexp: {
                                    regexp: /^\d+$/,
                                    message: 'Por favor, introduzca un valor que sea válido'
                                }
                            }    
                        },
                    }
                })
                .on('click', '.addButton', function () {
                    var $template = $("#div_persona_contacto1"),
                        $clone = $template
                        .clone()
                        .show()
                        .removeAttr('id')
                        .insertAfter($template);
                         $clone.find(".div_btn").html('<button type="button" class="btn btn-sm classBotonFratsa white pull-right removeButton"><i class="fa fa-minus"></i></button>');

                        $clone.find("input").val("");
                        $clone.find("textarea").val("");
                        
                $tipo_contacto = $clone.find('[name="tipo_contacto[]"]'),
                $condicion_pago = $clone.find('[name="condicion_pago[]"]'),
                $persona_contacto = $clone.find('[name="persona_contacto[]"]'),
                $telefono1 = $clone.find('[name="telefono1[]"]'),
                $telefono2 = $clone.find('[name="telefono2[]"]'),
                $correo1 = $clone.find('[name="correo1[]"]'),
                $correo2 = $clone.find('[name="correo2[]"]'),
                $no_cuenta = $clone.find('[name="no_cuenta[]"]');
                
             // Add new field
                $('#form_proveedor').formValidation('addField', $tipo_contacto);
                $('#form_proveedor').formValidation('addField', $condicion_pago);
                $('#form_proveedor').formValidation('addField', $persona_contacto);
                $('#form_proveedor').formValidation('addField', $telefono1);
                $('#form_proveedor').formValidation('addField', $telefono2);
                $('#form_proveedor').formValidation('addField', $correo1);
                $('#form_proveedor').formValidation('addField', $correo2);
                $('#form_proveedor').formValidation('addField', $no_cuenta);
                $(".toupper").on("change",function(){
                $(this).val($(this).val().toUpperCase()); 
                });

                })
                .on('click', '.removeButton', function () {
                    var $row = $(this).parents('.border'),
                            $tipo_contacto = $row.find('[name="tipo_contacto[]"]'),
                            $condicion_pago = $row.find('[name="condicion_pago[]"]'),
                            $persona_contacto = $row.find('[name="persona_contacto[]"]'),
                            $telefono1 = $row.find('[name="telefono1[]"]'),
                            $telefono2 = $row.find('[name="telefono2[]"]'),
                            $correo1 = $row.find('[name="correo1[]"]'),
                            $correo2 = $row.find('[name="correo2[]"]'),
                            $no_cuenta = $row.find('[name="no_cuenta[]"]'),
                            $banco = $row.find('[name="banco[]"]'),
                            $clave = $row.find('[name="clave[]"]'),
                            $sucursal = $row.find('[name="sucursal[]"]'),
                            $observaciones = $row.find('[name="observaciones[]"]');
                    // Remove element containing the option
                    $row.remove();

                    // Remove field
                    $('#form_proveedor').formValidation('removeField', $tipo_contacto);
                    $('#form_proveedor').formValidation('removeField', $condicion_pago);
                    $('#form_proveedor').formValidation('removeField', $persona_contacto);
                    $('#form_proveedor').formValidation('removeField', $telefono1);
                    $('#form_proveedor').formValidation('removeField', $telefono2);
                    $('#form_proveedor').formValidation('removeField', $correo1);
                    $('#form_proveedor').formValidation('removeField', $correo2);
                    $('#form_proveedor').formValidation('removeField', $no_cuenta);
                    $('#form_proveedor').formValidation('removeField', $banco);
                    $('#form_proveedor').formValidation('removeField', $clave);
                    $('#form_proveedor').formValidation('removeField', $sucursal);
                    $('#form_proveedor').formValidation('removeField', $observaciones);
                });
                // FIN VALIDADOR
    });

</script>
