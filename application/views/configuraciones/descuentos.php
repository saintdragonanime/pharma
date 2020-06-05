
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <div class="content-header">Descuentos</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" method="post" id="form-descuentos" autocomplete="off">
                        <h4 class="form-section"><i class="ft-user"></i>Descuentos por Categoría</h4>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <p>Dos categorías:</p>
                            </div>
                            <div class="col-sm-4 input-group">
                                <input type="text" class="form-control" name="a_proveedor1" value="<?php echo $descuentos->a_proveedor1;?>">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <p>Tres o más categorías:</p>
                            </div>
                            <div class="col-sm-4 input-group">
                                <input type="text" class="form-control" name="a_proveedor2" value="<?php echo $descuentos->a_proveedor2;?>">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        
                        
                        <h4 class="form-section"><i class="ft-loader"></i>Descuentos a por Puntos</h4>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <p>De 0 a 50:</p>
                            </div>
                            <div class="col-sm-4 input-group">
                                <input type="text" class="form-control" name="por_puntos1" value="<?php echo $descuentos->por_puntos1;?>">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <p>De 51 a 100:</p>
                            </div>
                            <div class="col-sm-4 input-group">
                                <input type="text" class="form-control" name="por_puntos2" value="<?php echo $descuentos->por_puntos2;?>">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <p>De 100 a más:</p>
                            </div>
                            <div class="col-sm-4 input-group">
                                <input type="text" class="form-control" name="por_puntos3" value="<?php echo $descuentos->por_puntos3;?>">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        
                        <h4 class="form-section"><i class="ft-target"></i>Descuentos equipos a presión</h4>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <p>De 0 a 50:</p>
                            </div>
                            <div class="col-sm-4 input-group">
                                <input type="text" class="form-control" name="por_equipo1" value="<?php echo $descuentos->por_equipo1;?>">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <p>De 51 a más:</p>
                            </div>
                            <div class="col-sm-4 input-group">
                                <input type="text" class="form-control" name="por_equipo2" value="<?php echo $descuentos->por_equipo2;?>">
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <br><hr>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-success width-250">Guardar</button> 
                           </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function () {
         $("#template_doc").hide();
        // VALIDACION

        $("#form-descuentos")
                .on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    fd.append('id',1);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/configuraciones/insertUpdateToCatalogo/descuentos",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data==1)
                            {
                                var texto="Se actualizaron los porcentajes";
                                var url="<?php echo base_url(); ?>index.php/configuraciones/descuentos";
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
                    
                    }
                });
                // FIN VALIDADOR
    });

</script>
