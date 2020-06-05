
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title="Alta"; 
                if(isset($proveedor)){
                    $title="Edición";
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Subcliente</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form_cliente" method="post">
                        <h4 class="form-section"><i class="ft-file-text"></i> Información para Facturar</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Razón Social <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="razon_social" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->razon_social'";} ?> >
                                    </div>
                            </div>
                            <div class="col-md-6 row">
                                    <div class="col-md-8">
                                        <p class="pull-right">Cliente con unidades dedicadas</p>  
                                    </div>
                                    <div class="col-md-4">
                                        <label class="switch">
                                            <input name="permiso_proveedores" type="checkbox" <?php if(isset($empleado) && $permisos->permiso_proveedores=="on"){echo "checked"; } ?>>
                                            <span class="sliderN round"></span>
                                        </label>
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
                            
                        </div>
                        <div class="row">
                            
                            <div class="form-group col-md-6 row">
                                    <p class="col-4"># Ext. </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="no_ext" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_ext'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
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
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <p class="col-3">Planta o Sucursal<span class="required">*</span></p>
                                    <div class="col-5 controls">
                                        <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <h4 class="form-section"><i class="ft-user-check"></i> Información General</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Condición de pago </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Correo certificación </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Método de Pago</p>
                                    <div class="col-8 controls">
                                        <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Forma de Pago </p>
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
                        <p>Personas de Contacto</p><hr>
                        <div id="personas">
                            <div id="persona_contacto" class="border">
                                <div class="row mt-2">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Persona de contacto</p>
                                            <div class="col-8 controls">
                                                <input type="text" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->municipio'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Tipo de Contacto</p>
                                            <div class="col-8 controls">
                                                <input type="text" name="estado" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->estado'";} ?> >
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
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="button" onclick="agregar_contacto()" class="mt-2 mb-0 round btn btn-info"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        
                         <h4 class="form-section"><i class="fa fa-truck"></i> Unidades dedicadas</h4>
                        <div class="text-center">
                            <table class="table table-sm width-70-per overflow-y-scroll" style="max-height: 300px;">
                                <tr>
                                    <th>Unidad</th>
                                    <th>Costo por día</th>
                                    <th>Costo por día (B)</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><div class="form-group"><input type="text" name="unidad[]" class="form-control form-control-sm toupper" ></div></td>
                                    <td>
                                        <div class="form-group"><input type="text" name="costo_dia[]" class="form-control form-control-sm toupper" ></div></td>
                                    <td>
                                        <div class="form-group"><input type="text" name="costo_diaB[]" class="form-control form-control-sm toupper" ></div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>

                            </table>
                             
                        </div>
                         
                         <h4 class="form-section"><i class="ft-plus-square"></i> Complementos de pago</h4>
                         
                         <div class="text-center overflow-y-scroll" style="max-height: 300px;">
                            <table class="table table-sm width-70-per">
                                <tr>
                                    <th>% Gravado</th>
                                    <th>Del</th>
                                    <th>Al</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group"><input type="text" name="unidad[]" class="form-control form-control-sm toupper" ></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" name="costo_dia[]" class="form-control form-control-sm toupper" ></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><input type="text" name="costo_diaB[]" class="form-control form-control-sm toupper" ></div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>

                            </table>
                             
                        </div>
                         
                        
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/subclientes" class="btn btn-icon btn-secondary"><i class="ft-chevron-left"></i> Regresar</a>
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
        $("#form-empleado")
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
                    $('#form_cliente').formValidation('addField', $cmp1);
                    $('#form_cliente').formValidation('addField', $cmp2);
    }
    
    function eliminar_contacto(btn){
        var $row = btn.parents('.border'),
                            $cmp1 = $row.find('[name="persona_contacto[]"]'),
                            $cmp2 = $row.find('[name="telefono1[]"]');

                    // Remove element containing the option
                    $row.remove();

                    // Remove field
                    $('#form_cliente').formValidation('removeField', $cmp1);
                    $('#form_cliente').formValidation('removeField', $cmp2);
                    
                    toastr.info('Contacto eliminado, los cambios se reflejarán solo al guardar proveedor');
    }

</script>
