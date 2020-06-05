
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title="Alta"; 
                if(isset($empleado)){
                    $title="Edición";
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Unidades</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form-empleado" method="post">
                        <h4 class="form-section"><i class="ft-user"></i> Datos de Unidades</h4>
                    <div class="row">
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Económico<span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="text" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-4">Propietario</p>
                                    <div class="col-8 controls">
                                         <select id="projectinput6" name="propietario" class="form-control" <?php if(isset($unidades)){ echo "value='$unidades->tipo'";} ?>>
                                                <option value="none" selected="" disabled="">Seleccionar</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>

                                            </select>
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-2">%</p>
                                    <div class="col-8 controls">
                                        <input type="text" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6 row">
                                    <p class="col-4">Tipo de vehiculo</p>
                                    <div class="col-7 controls">
                                        <select id="projectinput6" name="tipo" class="form-control" <?php if(isset($unidades)){ echo "value='$unidades->tipo'";} ?>>
                                                <option value="none" selected="" disabled="">Seleccionar</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>

                                            </select>
                                    </div>
                            </div>

                    </div>

                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Modelo</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="txt_serie" name="serie" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Serie</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="txt_unidad" name="unidad" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->unidad'";} ?>>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Motor</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="txt_unidad" name="unidad" class="form-control form-control-sm toupper"  <?php if(isset($productos)){ echo "value='$productos->unidad'";} ?>>
                                    </div>
                            </div>
                        </div>
                    <div class="row">
                            <div class="form-group col-md-3 row">
                                    <p class="col-4">Año <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="text" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-3 row">
                                    <p class="col-4">Placas </p>
                                    <div class="col-7 controls">
                                        <input type="text" name="no_ext" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_ext'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-3 row">
                                    <p class="col-4">Marca</p>
                                    <div class="col-7 controls">
                                        <input type="text" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-4">Tarjeta de circulación</p>
                                    <div class="col-8 controls">
                                        <input type="file" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
                                    </div>
                            </div>

                    </div>
                        

                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-3">Color</p>
                                    <div class="col-7 controls">
                                        <input type="text" name="paterno" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->paterno'";} ?> >
                                    </div>
                            </div>

                            <div class="form-group col-md-6 row">
                                    <p class="col-3">Rastreo</p>
                                    <div class="col-7 controls">
                                        <input type="text" name="materno" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->materno'";} ?> >
                                    </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-4 row">
                                    <p class="col-6">Fisicomecánica<span class="required">*</span></p>
                                    <div class="col-6 controls">
                                        <input type="file" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-4">Expedición</p>
                                    <div class="col-8 controls">
                                         <input type="date" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Vencimiento</p>
                                    <div class="col-7 controls">
                                        <input type="date" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
                                    </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="form-group col-md-4 row">
                                    <p class="col-6 ">Proxima verificación<span class="required">*</span></p>
                                    <div class="col-6 controls">
                                        <input type="date" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-4">Proximo servicio</p>
                                    <div class="col-8 controls">
                                         <input type="date" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Fecha actual de servicio</p>
                                    <div class="col-7 controls">
                                        <input type="date" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
                                    </div>
                            </div>
                    </div>

                        
                        <h4 class="form-section"><i class="ft-file-text"></i> Poliza de seguro </h4>

                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Número de poliza</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="txt_serie" name="serie" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                    </div>
                            </div>
                        </div>

                    <div class="row">
                            <div class="form-group col-md-4 row">
                                    <p class="col-6">Pliza<span class="required">*</span></p>
                                    <div class="col-6 controls">
                                        <input type="file" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-4">Expedición</p>
                                    <div class="col-8 controls">
                                         <input type="date" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Vencimiento</p>
                                    <div class="col-7 controls">
                                        <input type="date" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-3">Suma asegurada</p>
                                    <div class="col-7 controls">
                                        <input type="text" name="paterno" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->paterno'";} ?> >
                                    </div>
                            </div>

                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Importe a pagar</p>
                                    <div class="col-7 controls">
                                        <input type="text" name="materno" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->materno'";} ?> >
                                    </div>
                            </div>
                    </div>
                
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Aseguradora</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="txt_serie" name="serie" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                    </div>
                            </div>
                     </div>
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Inciso poliza</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="txt_serie" name="serie" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                    </div>
                            </div>
                     </div>
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Estatus</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="txt_serie" name="serie" class="form-control form-control-sm toupper" <?php if(isset($productos)){ echo "value='$productos->serie'";} ?> >
                                    </div>
                            </div>
                     </div>

                    <div class="row">
                        <div class="form-group col-md-4 row">
                                    <p class="col-5">Fecha estatus</p>
                                    <div class="col-7 controls">
                                        <input type="date" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
                                    </div>
                            </div>
                    </div>
     
                     <div class="row">
                            <div class="form-group col-md-4 row">
                                    <p class="col-6 ">Capacidad<span class="required">*</span></p>
                                    <div class="col-6 controls">
                                        <input type="text" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-4">Kilometraje</p>
                                    <div class="col-8 controls">
                                         <input type="text" name="calle" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->calle'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Rendimiento</p>
                                    <div class="col-7 controls">
                                        <input type="text" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($proveedor)){ echo "value='$proveedor->no_int'";} ?> >
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
   
</script>
