
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title="Alta"; 
                if(isset($proveedor)){
                    $title="Edición";
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Proveedor</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form_proveedor" method="post">
                        <h4 class="form-section"><i class="ft-file-text"></i> Información para Facturar</h4>
                        <div class="row">
                            <div class="col-md-6 row form-group">
                                    <p class="col-4">Tipo <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="tipo_proveedor" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->tipo_proveedor'";} ?> >
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Razón Social <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="razon_social" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->razon_social'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">RFC </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="rfc" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->rfc'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">CURP </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="curp" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->curp'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Calle <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-3 row">
                                    <p class="col-4"># Ext. </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="no_ext" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_ext'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-3 row">
                                    <p class="col-4"># Int. </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
                                    </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Colonia <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="colonia" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->colonia'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">CP <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="cp" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->cp'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Delegación o Municipio <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Estado </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                    </div>
                            </div>
                        </div>
                        
                        <h4 class="form-section"><i class="ft-user-check"></i> Personas de contacto</h4>
                        <div id="personas">
                            <div id="persona_contacto" class="border">
                                <div class="row mt-2">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Tipo de contacto</p>
                                            <div class="col-8 controls">
                                                <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Condición de pago </p>
                                            <div class="col-8 controls">
                                                <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 row">
                                            <p class="col-2">Persona de contacto</p>
                                            <div class="col-10 controls">
                                                <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 1</p>
                                            <div class="col-8 controls">
                                                <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 1</p>
                                            <div class="col-8 controls">
                                                <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Banco</p>
                                            <div class="col-8 controls">
                                                <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Sucursal </p>
                                            <div class="col-8 controls">
                                                <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">No. Cuenta</p>
                                            <div class="col-8 controls">
                                                <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Clabe </p>
                                            <div class="col-8 controls">
                                                <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 row">
                                            <p class="col-2">Observaciones </p>
                                            <div class="col-10 controls">
                                                <textarea rows="2" name="direccion" class="form-control form-control-sm toupper"  ><?php if(isset($empleado)){ echo $empleado->direccion;} ?></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="button" onclick="agregar_contacto()" class="mt-2 mb-0 round btn btn-info"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/proveedores" class="btn btn-icon btn-secondary"><i class="ft-chevron-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-danger shadow-z-1 white" style="width: 50%; margin-left: 15%;">Guardar <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function () {
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
                    <?php if(isset($proveedor)){
                        echo "fd.append('id', $proveedor->id);";
                    }?>
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/catalogos/insertUpdateEmpleado",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data==1)
                            {
                                var texto="Se insertó el Empleado";
                                var url="<?php echo base_url(); ?>index.php/catalogos/empleados";
                                
                                <?php if(isset($proveedor)){ // Si es Edicion
                                    echo "texto='Se actualizó el Empleado'; ";
                                    echo "url='".base_url()."index.php/catalogos/edicion_empleado/".$proveedor->id."';";
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
                        nombre: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Nombre"
                                }
                            }
                        },
                        clave: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese Clave"
                                }
                            }
                        },
                        telefono: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Teléfono"
                                }
                            }
                        },
                        direccion: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una Dirección"
                                }
                            }
                        },
                        correo: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Correo"
                                }
                            }
                        },
                        usuario: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese el nombre de Usuario"
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese la Contraseña"
                                }
                            }
                        }
                    }
                });
                // FIN VALIDADOR
    });
    
    
    function agregar_contacto(){
        var $template = $('#persona_contacto'),
                            $clone = $template
                            .clone()
                            .show()
                            .removeAttr('id')
                            .insertAfter($template)
                            .append('<div class="row">\
                                <div class="col-md-12">\
                                    <button type="button" onclick="eliminar_contacto($(this))" class="mt-0 mb-0 btn-sm pull-right btn btn-danger"><i class="fa fa-minus"></i></button>\
                                </div>\
                            </div>'),
                            $cmp1 = $clone.find('[name="persona_contacto[]"]'),
                            $cmp2 = $clone.find('[name="telefono1[]"]');

                    // Add new field
                    $('#form_proveedor').formValidation('addField', $cmp1);
                    $('#form_proveedor').formValidation('addField', $cmp2);
    }
    
    function eliminar_contacto(btn){
        var $row = btn.parents('.border'),
                            $cmp1 = $row.find('[name="persona_contacto[]"]'),
                            $cmp2 = $row.find('[name="telefono1[]"]');

                    // Remove element containing the option
                    $row.remove();

                    // Remove field
                    $('#form_proveedor').formValidation('removeField', $cmp1);
                    $('#form_proveedor').formValidation('removeField', $cmp2);
                    
                    toastr.info('Contacto eliminado, los cambios se reflejarán solo al guardar proveedor');
    }

</script>
