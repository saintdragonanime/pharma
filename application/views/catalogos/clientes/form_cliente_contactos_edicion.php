    <input type="hidden" id="contador_div_contactos" name="contador_div_contactos">
        <div id="personas">

        <?php 
            foreach($personas_contacto as $persona)
            {
        ?>
    
                            <div id="div_persona_contacto1" class="border" name="div_persona_contacto1">
                                <br>
                                <div class="row mt-2">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Nombre de contacto <span class="required">*</span></p>
                                            <div class="col-8 controls">
                                                <input type="text" id="persona_contacto[]" name="persona_contacto[]" class="form-control form-control-sm toupper" <?php if(isset($persona)){ echo "value='$persona->persona_contacto'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Tipo de Contacto</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="tipo_contacto[]" name="tipo_contacto[]" class="form-control form-control-sm toupper" <?php if(isset($persona)){ echo "value='$persona->tipo_contacto'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 1</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="telefono1[]" name="telefono1[]" class="form-control form-control-sm toupper" <?php if(isset($persona)){ echo "value='$persona->telefono1'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="telefono2[]" name="telefono2[]" class="form-control form-control-sm toupper" <?php if(isset($persona)){ echo "value='$persona->telefono2'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 1</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="correo1[]" name="correo1[]" class="form-control form-control-sm toupper" <?php if(isset($persona)){ echo "value='$persona->correo1'";} ?> >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="correo2[]" name="correo2[]" class="form-control form-control-sm toupper" <?php if(isset($persona)){ echo "value='$persona->correo2'";} ?> >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-10 row">
                                    </div>
                                    <div class="form-group col-md-2 row">
                                        <button type="button" onclick="muestraModalEliminaContacto()" class="btn btn-raised btn-danger">
                                            <i class="ft-minus-square"></i>  Eliminar
                                        </button>
                                    </div>
                                    
                                </div>
                                
                            </div>
            <?php 

            }
            ?>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="button" onclick="agregar_contacto()" class="mt-2 mb-0 round btn btn-info"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>