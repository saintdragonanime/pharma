
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title="Alta"; 
                if(isset($proveedor)){
                    $title="Edición";
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Empresa</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form-proveedor" method="post" autocomplete="off">
                        <h4 class="form-section"><i class="ft-plus-circle"></i> Datos del Generales</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Nombre <span class="required">*</span></p>
                                    <div class="controls">
                                        <input type="text" name="nombre" class="toupper form-control" <?php if(isset($proveedor)){ echo "value='$proveedor->nombre'";} ?> >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Télefono </p>
                                    <div class="controls">
                                        <input type="text" name="telefono" class="form-control" <?php if(isset($proveedor)){ echo "value='$proveedor->telefono'";} ?>>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Correo Electrónico </p>
                                    <div class="controls">
                                        <input type="email" name="correo" class="form-control" <?php if(isset($proveedor)){ echo "value='$proveedor->correo'";} ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Dirección </p>
                                    <div class="controls">
                                        <div class="controls">
                                            <textarea name="direccion" class="toupper form-control" rows="3"><?php if(isset($proveedor)){ echo $proveedor->direccion;} ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/catalogos/empresas" class="btn btn-icon btn-secondary"><i class="ft-chevron-left"></i> Regresar</a>
                            <button type="submit" class="btn gradient-green-teal shadow-z-1 white" style="width: 50%; margin-left: 15%;">Guardar <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function () {
        // VALIDACION
        
        $(".toupper").on("change",function(){
            $(this).val($(this).val().toUpperCase());
        });

        $("#form-proveedor")
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
                        url: "<?php echo base_url(); ?>index.php/catalogos/insertUpdateToCatalogo/proveedores",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data==1)
                            {
                                var texto="Se insertó la Empresa";
                                var url="<?php echo base_url(); ?>index.php/catalogos/empresas";
                                
                                <?php if(isset($proveedor)){ // Si es Edicion
                                    echo "texto='Se actualizó la Empresa'; ";
                                    echo "url='".base_url()."index.php/catalogos/edicion_empresa/".$proveedor->id."';";
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
                        }
                    }
                });
                // FIN VALIDADOR
    });
    
    

</script>
