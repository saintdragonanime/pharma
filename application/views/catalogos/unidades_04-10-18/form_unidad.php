
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title="Alta"; 
                if(isset($unidades)){
                    $title="Edición";
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Unidades</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form-unidades" method="post">
                        <h4 class="form-section"><i class="ft-user"></i> Datos de Unidades</h4>
                    <div class="row">
                                <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Económico<span class="required">*</span></p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="economico" name="economico" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <p>Propietario</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <select id="propietario" name="propietario" class="form-control" <?php if(isset($unidades)){ echo "value='$unidades->tipo'";} ?>>
                                                <option value="none" selected="" disabled="">Seleccionar</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-2">
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <p>%</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="porcentaje" name="porcentaje" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Tipo de vehiculo</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <select id="tipo_vehiculo" name="tipo_vehiculo" class="form-control" <?php if(isset($unidades)){ echo "value='$unidades->tipo'";} ?>>
                                                <option value="none" selected="" disabled="">Seleccionar</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>

                                            </select>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Modelo<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="modelo" name="modelo" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                    </div>
                            </div>
                     </div>

                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Serie<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="serie" name="serie" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->unidad'";} ?>>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Motor<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="motor" name="motor" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->unidad'";} ?>>
                                    </div>
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Año</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="año" name="año" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Placas</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="placas" name="placas" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_ext'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Ejes</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="ejes" name="ejes" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                        </div>
                                    </div>
                            </div>
                     </div>       
                     <div class="row">    
                           <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Marca</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="marca" name="marca" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                        </div>
                                    </div>
                             </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Tarjeta de circulación</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="file" id="tarjeta_circulacion" name="tarjeta_circulacion" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                        </div>
                                    </div>
                             </div>
                    </div>
                    <div class="row">
                           <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Color</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="text" id="color" name="color" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->paterno'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Rastreo</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="rastreo" name="rastreo" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->materno'";} ?> >
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Fisicomecánica</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="file" id="fisicomecanica" name="fisicomecanica" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Expedición</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="fisicomecanica_exp" name="fisicomecanica_exp" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Vencimiento</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="fisicomecanica_venc" name="fisicomecanica_venc" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                        </div>
                                    </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Proxima verificación</p>
                                        </div>
                                        <div class="col-sm-7">
                                           <input type="date" id="verificacion_proxima" name="verificacion_proxima" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Verificación actual</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="verificacion_actual" name="verificacion_actual" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Proximo servicio</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="servicio_proximo" name="servicio_proximo" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                        </div>
                                    </div>
                            </div>
                     </div>       
                     <div class="row">        
                             <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Fecha actual de servicio</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="date" id="fecha_actual_servicio" name="fecha_actual_servicio" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                        </div>
                                    </div>
                            </div>
                           
                    </div>

                        
                    <h4 class="form-section"><i class="ft-file-text"></i> Poliza de seguro </h4>

                    <div class="row">
                        <div class="form-group col-md-11 row">
                                <p class="col-2">Número de poliza</p>
                                <div class="col-9 controls">
                                    <input type="text" id="no_poliza" name="no_poliza" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Poliza</p>
                                        </div>
                                        <div class="col-sm-7">
                                           <input type="file" id="poliza" name="poliza" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Expedición</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="poliza_exp" name="poliza_exp" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Vencimiento</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" name="poliza_venc" name="poliza_venc" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Suma asegurada</p>
                                        </div>
                                        <div class="col-sm-7">
                                           <input type="text" id="suma_asegurada" name="suma_asegurada" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->paterno'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Importe a pagar</p>
                                        </div>
                                        <div class="col-sm-8">
                                             <input type="text" id="importe_pagar" name="importe_pagar" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->materno'";} ?> >
                                        </div>
                                    </div>
                            </div>
                    </div>
                
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Aseguradora</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="aseguradora" name="aseguradora" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->serie'";} ?> >
                                    </div>
                            </div>
                     </div>
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Inciso poliza</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="inciso_poliza" name="inciso_poliza" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->serie'";} ?> >
                                    </div>
                            </div>
                     </div>
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Estatus</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="poliza_estatus" name="poliza_estatus" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->serie'";} ?> >
                                    </div>
                            </div>
                     </div>

                    <div class="row">
                         <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Fecha estatus</p>
                                        </div>
                                        <div class="col-sm-6">
                                           <input type="date" id="fechas_estatus" name="fechas_estatus" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                        </div>
                                    </div>
                        </div>
                    </div>
     
                     <div class="row">
                            <div class="form-group col-md-4 row">
                                    <p class="col-6 ">Capacidad</p>
                                    <div class="col-6 controls">
                                        <input type="text" id="capacidad" name="capacidad" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-4">Kilometraje</p>
                                    <div class="col-8 controls">
                                         <input type="text" id="kilometraje" name="kilometraje" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Rendimiento</p>
                                    <div class="col-7 controls">
                                        <input type="text" id="rendimiento" name="rendimiento" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_int'";} ?> >
                                    </div>
                            </div>
                    </div>
                  
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/unidades" class="btn btn-icon btn-secondary"><i class="ft-chevron-left"></i> Regresar</a>
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
        $("#form-unidades")
                .on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    <?php if(isset($unidades)){
                        echo "fd.append('id', $unidades->id);";
                    }?>
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/catalogos/insertUpdateunidades",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data>0)
                            {
                                var texto="Se insertó el unidades";
                                var url="<?php echo base_url(); ?>index.php/catalogos/unidades";
                                
                                <?php if(isset($unidades)){ // Si es Edicion
                                    echo "texto='Se actualizó la unidad'; ";
                                    echo "url='".base_url()."index.php/catalogos/edicion_unidad/".$unidades->id."';";
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
                        economico: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una economía"
                                }
                            }
                        },
                        modelo: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un modelo"
                                }
                            }
                        },
                        serie: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una serie"
                                }
                            }
                        },
                        motor: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un motor"
                                }
                            }
                        }
                    }
                });
                // FIN VALIDADOR
    });

</script>