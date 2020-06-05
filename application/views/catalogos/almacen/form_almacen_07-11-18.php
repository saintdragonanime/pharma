
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title="Alta"; 
                if(isset($productos)){
                    $title="Edición";
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Almacen</div>
            <div class="content-header"><?php echo $asd; ?></div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form-almacen" method="post">
                        <h4 class="form-section"><i class="ft-user"></i> Datos del Producto</h4>

                       <div class="row">
                       <div class="form-group col-md-12 row">
                       	                <p class="col-2">Tipo</p>
			                        	 <div class="col-8 controls">
			                        	
			                            
                                        <input type="text" id="tipo" name="tipo" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->tipo'";} ?> >
			                            </div>
			                        </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Articulo</p>
                                    <div class="col-8 controls">
                                       <input type="text" id="txt_articulo" name="nombre" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->nombre'";} ?> >
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Descripción</p>
                                    <div class="col-8 controls">
                                        <textarea rows="2" name="descripcion" class="form-control form-control-sm toupper"   ><?php if(isset($productos)){ echo $productos->descripcion;} ?></textarea>
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Clave/Serie</p>
                                    <div class="col-8 controls">
                                        <input type="text" id="txt_serie" name="serie" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Unidad de medida</p>
                                    <div class="col-8 controls">
                                        <input type="text" id="txt_unidad" name="unidad" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->unidad'";} ?>>
                                    </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Ubicación</p>
                                    <div class="col-8 controls">
                                      <select id="ubicacion" name="ubicacion" class="form-control" onchange="habilitar(this.value);">
                                            <option selected="" disabled="">Seleccionar</option>
                                            <?php if(isset($productos)){ ?>
                                            <option value="<?php echo $productos->ubicacion; ?>" selected=""><?php echo $productos->ubicacion; ?></option>
                                            <?php } ?>
                                            
                                            <option value="Escalera" >Escalera</option>
                                            <option value="Almacen" >Almacen</option>
                                            <option value="Taller" >Taller</option>
                                            
                                            } 
                                        </select>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Costo Unitario</p>
                                    <div class="col-8 controls">
                                        <input type="number" id="txt_costo" name="costo" class="form-control form-control-sm toupper" placeholder="$"  <?php if(isset($productos)){ echo "value='$productos->costo'";} ?>>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Anaquel </p>
                                    <div class="col-8 controls">
                                        <input type="text"  id="anaquel" name="anaquel" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->anaquel'";} ?>>
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Sección</p>
                                    <div class="col-8 controls">
                                        <input type="text" id="seccion" name="seccion" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->seccion'";} ?>>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Stock</p>
                                    <div class="col-8 controls">
                                        <input type="number" id="txt_stock" name="stock" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->stock'";} ?>>
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Precio unitario</p>
                                    <div class="col-8 controls">
                                        <input type="number" id="txt_precio" name="precio" class="form-control form-control-sm toupper"  placeholder="$"  <?php if(isset($productos)){ echo "value='$productos->precio'";} ?>>
                                    </div>
                            </div>
                        </div>
                        
                         <div class="row">
                            <div class="form-group col-md-12 row">
                                   
                                    <div class="col-10 controls">
                                        <textarea rows="2" id="txt_observaciones" name="observaciones" class="form-control form-control-sm toupper" placeholder="Observaciones" > <?php if(isset($productos)){ echo $productos->observaciones;} ?></textarea>
                                    </div>
                            </div>
                        </div>
                        
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/almacen" class="btn btn-icon btn-secondary"><i class="ft-chevron-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-danger shadow-z-1 white" style="width: 50%; margin-left: 15%;">Guardar <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $(".tuopper").on("change",function(){
            $(this).val($(this).val().toUpperCase());
        });
       //validar
       $("#form-almacen").on('success.form.fv', function (e) {
            // Prevent form submission
        e.preventDefault();
        var $form = $(e.target);
        var fd = new FormData($form[0]);
        <?php if(isset($productos)){
          echo "fd.append('id', $productos->id);";
        }?>

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Almacen/insertUpdateProducto",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                        if(data > 0)
                        {
                            var texto="Se insertó producto";
                            var url="<?php echo base_url(); ?>index.php/Almacen";
                               
                           <?php if(isset($productos)){
                            echo "texto='Se actualizo el producto';";
                            echo "url='".base_url()."index.php/almacen/edicion_producto/".$productos->id."';";
                           }?>
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
                        tipo: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un tipo"
                                }
                            }
                        },
                        nombre: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un nombre"
                                }
                            }
                        },
                         descripcion: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una descripción"
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
                         unidad: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una unidad"
                                }
                            }
                        },
                         ubicacion: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una ubicación"
                                }
                            }
                        },
                         costo: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un costo"
                                }
                            }
                        },
                         anaquel: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un anaquel"
                                }
                            }
                        },
                         seccion: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una sección"
                                }
                            }
                        },
                         stock: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un stock"
                                }
                            }
                        },
                         precio: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un precio"
                                }
                            }
                        },
                         observaciones: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una observación"
                                }
                            }
                        }
                        
                        
                    }
                });
                // FIN VALIDADOr

    });

function habilitar(value)
        {
            if(value=="Escalera" || value=="Taller" || value==false)
            {
                // habilitamos
                document.getElementById("anaquel").disabled=true;
                document.getElementById("anaquel").value="";
                document.getElementById("seccion").disabled=true;
                document.getElementById("seccion").value="";
                
            }else if(value=="Almacen" || value=="Almacen" || value==true){
                // deshabilitamos
                document.getElementById("anaquel").disabled=false;
                document.getElementById("seccion").disabled=false;
            }
    }

</script>

