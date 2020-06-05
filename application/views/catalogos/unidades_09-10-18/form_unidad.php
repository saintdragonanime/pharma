
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
                                            <input type="number" step="any" id="economico" name="economico" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->economico'";} ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <p>Propietario</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <select id="propietario" name="propietario" class="form-control" onchange="habilitar(this.value);">
                                                <option selected="" disabled="">Seleccionar</option>
                                                 <?php if(isset($unidades)){ ?>
                                                <option value="<?php echo $unidades->propietario; ?>" selected=""><?php echo $unidades->propietario; ?></option>
                                                <?php } ?>
                                                <option  value="Fratsa">Fratsa</option>
                                                <option value="Permisionario">Permisionario</option>
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
                                            <input type="number" min="0" max="100" id="porcentaje" name="porcentaje" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->porcentaje'";} ?>novalidate="false">
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
                                            <select id="tipo_vehiculo" name="tipo_vehiculo" class="form-control">
                                                <option value="none" selected="" disabled="">Seleccionar</option>
                                                <?php if(isset($unidades)){ ?>
                                                <option value="<?php echo $unidades->tipo_vehiculo; ?>" selected=""><?php echo $unidades->tipo_vehiculo; ?></option>
                                                <?php } ?>
                                                <option value="Tractor">Tractor</option>
                                                <option value="Plataforma">Plataforma</option>
                                                <option value="Dolly">Dolly</option>
                                               <option value="Camioneta">Camioneta</option>
                                            </select>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Modelo<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="modelo" name="modelo" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->modelo'";} ?> >
                                    </div>
                            </div>
                     </div>

                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Serie<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="serie" name="serie" class="form-control form-control-sm toupper"  <?php if(isset($unidades)){ echo "value='$unidades->serie'";} ?>>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Motor<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="motor" name="motor" class="form-control form-control-sm toupper"  <?php if(isset($unidades)){ echo "value='$unidades->motor'";} ?>>
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
                                            <input type="date" id="anio" name="anio" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->anio'";} ?> >
                                        </div>
                                    </div>
                            </div>
                     
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Placas</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="placas" name="placas" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->placas'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Ejes</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="ejes" name="ejes" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->ejes'";} ?> >
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
                                            <input type="text" id="marca" name="marca" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->marca'";} ?> >
                                        </div>
                                    </div>
                             </div>
                          
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Tarjeta de circulación</p>
                                        </div>
                                           <div class="col-sm-8">
                                           <?php if(isset($unidades)){ 
                                            if($unidades->tarjeta_circulacion == ""){ ?>
                                           <p class="btn btn-sm btn-secondary" ><i class="ft-folder"></i> No existe</p>
                                           <?php } else{ ?>
                                           <a href="<?php echo base_url();?>uploads/unidades/<?php echo $unidades->id?>/<?php echo $unidades->tarjeta_circulacion?>" class="btn btn-sm btn-info" target="_bank" ><i class="ft-folder"></i> Archivo</a>
                                           <?php } } ?> 
                                           <input type="file" id="tarjeta_circulacion" name="tarjeta_circulacion" class="form-control form-control-sm toupper">
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
                                           <input type="text" id="color" name="color" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->color'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Rastreo</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="rastreo" name="rastreo" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->rastreo'";} ?> >
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
                                            <?php if(isset($unidades)){
                                            if($unidades->fisicomecanica == ""){ ?>
                                            <p class="btn btn-sm btn-secondary"><i class="ft-folder"></i> No existe</p>
                                            <?php } else { ?>     
                                           <a href="<?php echo base_url();?>uploads/unidades/<?php echo $unidades->id?>/<?php echo $unidades->fisicomecanica?>" class="btn btn-sm btn-info" target="_bank"><i class="ft-folder"></i> Archivo</a>
                                           <?php } }?>
                                            <input type="file" id="fisicomecanica" name="fisicomecanica" class="form-control form-control-sm toupper" >
                                        </div>
                                    </div>
                            </div>
                             
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Expedición</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="fisicomecanica_exp" name="fisicomecanica_exp" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->fisicomecanica_exp'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Vencimiento</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="fisicomecanica_venc" name="fisicomecanica_venc" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->fisicomecanica_venc'";} ?> >
                                        </div>
                                    </div>
                            </div>
                    
                    </div>
                        
                    <div class="row">
                            <div class="col-s4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Proxima verificación</p>
                                        </div>
                                        <div class="col-sm-7">
                                           <input type="date" id="verificacion_proxima" name="verificacion_proxima" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->verificacion_proxima'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Proximo servicio</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="servicio_proximo" name="servicio_proximo" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->servicio_proximo'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Fecha actual de servicio</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="date" id="fecha_actual" name="fecha_actual" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->fecha_actual'";} ?> >
                                        </div>
                                    </div>
                            </div>
                     </div>       
                      
                    <h4 class="form-section"><i class="ft-file-text"></i> Poliza de seguro </h4>

                    <div class="row">
                        <div class="form-group col-md-11 row">
                                <p class="col-2">Número de poliza</p>
                                <div class="col-9 controls">
                                    <input type="number" id="no_poliza" name="no_poliza" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->no_poliza'";} ?> >
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
                                           <?php if(isset($unidades)){
                                           if($unidades->poliza == ""){ ?>
                                           <p class="btn btn-sm btn-secondary"><i class="ft-folder"></i> No existe</p>   
                                           <?php } else { ?>     
                                           <a href="<?php echo base_url();?>uploads/unidades/<?php echo $unidades->id?>/<?php echo $unidades->poliza?>" class="btn btn-sm btn-info" target="_bank"><i class="ft-folder"></i> Archivo</a>
                                           <?php } }?>
                                           <input type="file" id="poliza" name="poliza" class="form-control form-control-sm toupper">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Expedición</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="poliza_exp" name="poliza_exp" class="form-control form-control-sm toupper" <?php 
                                           if(isset($unidades)){ echo "value='$unidades->poliza_exp'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Vencimiento</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" name="poliza_venc" name="poliza_venc" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->poliza_venc'";} ?> >
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
                                           <input type="number" step="any" id="suma_asegurada" name="suma_asegurada" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->suma_asegurada'";} ?> >
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Importe a pagar</p>
                                        </div>
                                        <div class="col-sm-8">
                                             <input type="number" step="any" id="importe_pagar" name="importe_pagar" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->importe_pagar'";} ?> >
                                        </div>
                                    </div>
                            </div>
                    </div>
                
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Aseguradora</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="aseguradora" name="aseguradora" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->aseguradora'";} ?> >
                                    </div>
                            </div>
                     </div>
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Inciso poliza</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="inciso_poliza" name="inciso_poliza" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->inciso_poliza'";} ?> >
                                    </div>
                            </div>
                     </div>
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Estatus</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="poliza_estatus" name="poliza_estatus" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->poliza_estatus'";} ?> >
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
                                           <input type="date" id="fecha_estatus" name="fecha_estatus" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->fecha_estatus'";} ?> >
                                        </div>
                                    </div>
                        </div>
                    </div>
     
                     <div class="row">
                            <div class="form-group col-md-4 row">
                                    <p class="col-6 ">Capacidad</p>
                                    <div class="col-6 controls">
                                        <input type="text" id="capacidad" name="capacidad" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->capacidad'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-4">Kilometraje</p>
                                    <div class="col-8 controls">
                                         <input type="number" step="any" id="kilometraje" name="kilometraje" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->kilometraje'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Rendimiento</p>
                                    <div class="col-7 controls">
                                        <input type="text" id="rendimiento" name="rendimiento" class="form-control form-control-sm toupper" <?php if(isset($unidades)){ echo "value='$unidades->rendimiento'";} ?> >
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
         // conponer unidades de medida
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
                        url: "<?php echo base_url(); ?>index.php/unidades/insertUpdateUnidades",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data > 0)
                            {
                                var texto="Se insertó unidad";
                                var url="<?php echo base_url(); ?>index.php/Unidades/unidad";
                                
                                <?php if(isset($unidades)){ // Si es Edicion
                                    echo "texto='Se actualizó la unidad'; ";
                                    echo "url='".base_url()."index.php/Unidades/edicion_unidades/".$unidades->id."';";
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
                        porcentaje: {
                            validators: {
                               between: {
                                min: 0,
                                max: 100,
                                    message: "El porcentaje es de 0 a 100 "
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

    function habilitar(value)
        {
            if(value=="Fratsa" || value==false)
            {
                // habilitamos
                document.getElementById("porcentaje").disabled=true;
                document.getElementById("porcentaje").value="";
            }else if(value=="Permisionario" || value==true){
                // deshabilitamos
                document.getElementById("porcentaje").disabled=false;
            }
    }
</script>
