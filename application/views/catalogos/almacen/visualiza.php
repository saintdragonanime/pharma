
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <div class="content-header">Visualización de Almacen</div>
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
                                        
                                        <select disabled id="txt_tipo" name="tipo" class="form-control"  >
                                            <option selected="" disabled="">Seleccionar</option>
                                            <?php if(isset($productos)){ ?>
                                            <option value="<?php echo $productos->tipo; ?>" selected=""><?php echo $productos->tipo; ?></option>
                                            <?php } ?>
                                            
                                            <option value="1" >1</option>
                                            <option value="2" >2</option>
                                            <option value="3" >3</option>
                                            
                                            } 
                                        </select>
                                        </div>
                                    </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Articulo</p>
                                    <div class="col-8 controls">
                                       <input disabled type="text" id="txt_articulo" name="nombre" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->nombre'";} ?> >
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Descripción</p>
                                    <div class="col-8 controls">
                                        <textarea disabled rows="2" name="descripcion" class="form-control form-control-sm toupper"   ><?php if(isset($productos)){ echo $productos->descripcion;} ?></textarea>
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Clave/Serie</p>
                                    <div class="col-8 controls">
                                        <input  disabled type="text" id="txt_serie" name="serie" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Unidad de medida</p>
                                    <div class="col-8 controls">
                                        <input disabled type="text" id="txt_unidad" name="unidad" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->unidad'";} ?>>
                                    </div>
                            </div>
                        </div>



              <!--Falta rellenado en el selec-->
                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Ubicación</p>
                                    <div class="col-8 controls">
                                      <select  disabled id="txt_ubicacion" name="ubicacion" class="form-control"  >
                                            <option selected="" disabled="">Seleccionar</option>
                                            <?php if(isset($productos)){ ?>
                                            <option value="<?php echo $productos->ubicacion; ?>" selected=""><?php echo $productos->ubicacion; ?></option>
                                            <?php } ?>
                                            
                                            <option value="1" >1</option>
                                            <option value="2" >2</option>
                                            <option value="3" >3</option>
                                            
                                            } 
                                        </select>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Costo Unitario</p>
                                    <div class="col-8 controls">
                                        <input disabled type="number" id="txt_costo" name="costo" class="form-control form-control-sm toupper" placeholder="$"  <?php if(isset($productos)){ echo "value='$productos->costo'";} ?>>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Anaquel </p>
                                    <div class="col-8 controls">
                                        <input disabled type="text"  id="txt_anaquel" name="anaquel" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->anaquel'";} ?>>
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Sección</p>
                                    <div class="col-8 controls">
                                        <input disabled type="text" id="txt_seccion" name="seccion" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->seccion'";} ?>>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Stock</p>
                                    <div class="col-8 controls">
                                        <input disabled type="number" id="txt_stock" name="stock" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->stock'";} ?>>
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Precio unitario</p>
                                    <div class="col-8 controls">
                                        <input disabled type="number" id="txt_precio" name="precio" class="form-control form-control-sm toupper"  placeholder="$"  <?php if(isset($productos)){ echo "value='$productos->precio'";} ?>>
                                    </div>
                            </div>
                        </div>
                        
                         <div class="row">
                            <div class="form-group col-md-12 row">
                                   
                                    <div class="col-10 controls">
                                        <textarea disabled rows="2" id="txt_observaciones" name="observaciones" class="form-control form-control-sm toupper" placeholder="Observaciones" > <?php if(isset($productos)){ echo $productos->observaciones;} ?></textarea>
                                    </div>
                            </div>
                        </div>
                       
                        
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/almacen" class="btn btn-icon btn-secondary" style="background-color: gray;"><i class="ft-chevron-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


