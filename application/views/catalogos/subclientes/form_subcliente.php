<style>
.input-date 
{
    position: relative;
    width: 200px; height: 30px;
    color: white;
}

.input-date:before 
{
    position: absolute;
    top: 3px; left: 3px;
    content: attr(data-date);
    display: inline-block;
    color: black;
}

.input-date::-webkit-datetime-edit, .input-date::-webkit-inner-spin-button, .input-date::-webkit-clear-button 
{
    display: none;
}

.input-date::-webkit-calendar-picker-indicator 
{
    position: absolute;
    top: 3px;
    right: 0;
    color: black;
    opacity: 1;
}
</style>


<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title="Alta"; 
                if(isset($cliente))
                {
                    if($visualizar==1)
                    {
                        $title="Visualización";
                        $idCliente = $cliente->id;
                        echo '<input type="hidden" id="bandera_alta_edicion" name="bandera_alta_edicion" value="edicion">';
                    }
                    else
                    {
                        $title="Edición";
                        $idCliente = $cliente->id;
                        echo '<input type="hidden" id="bandera_alta_edicion" name="bandera_alta_edicion" value="edicion">';
                    }
                }
                else 
                { 
                    $idCliente = '0';
                    echo '<input type="hidden" id="bandera_alta_edicion" name="bandera_alta_edicion" value="alta">';
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Subcliente</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    
                    <input type="hidden" value="<?php echo $visualizar; ?>" id="visualizar_info" name="visualizar_info">

                    <form class="form" id="form_cliente" method="post" autocomplete="off">
                        <h4 class="form-section"><i class="ft-search"></i> Cliente del cual depende</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Cliente<span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <select id="cliente_id" name="cliente_id" class="form-control form-control-sm chosen-select">
                                            <?php foreach($listaClientes as $listaCli) 
                                            { 
                                            ?>
                                                <option value="<?php echo $listaCli->id;?>" <?php if(isset($cliente)){ if ($cliente->cliente_id==$listaCli->id) echo 'selected'; } ?>>
                                                    <?php echo $listaCli->razon_social;?>
                                                </option>
                                            <?php 
                                            } 
                                            ?>

                                        </select>
                                    </div>
                            </div>

                            <div class="form-group col-md-6 row">
                                    <p class="col-8">¿Desea utlizar los datos fiscales del cliente seleccionado?</p>
                                    <div class="col-4 controls">
                                        <label class="switch">
                                        <input id="utiliza_datos_fiscales" name="utiliza_datos_fiscales" type="checkbox" onchange="cargaDatosFiscales()">
                                        <span class="sliderN round"></span>
                                    </label>
                                    </div>
                            </div>
                            
                        </div>


                        <h4 class="form-section"><i class="ft-file-text"></i> Información para Facturar</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Razón Social <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" id="razon_social" name="razon_social" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->razon_social'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">RFC <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" id="rfc" name="rfc" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->rfc'";} ?> >
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Calle</p>
                                    <div class="col-8 controls">
                                        <input type="text" id="calle" name="calle" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->calle'";} ?> >
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            
                            <div class="form-group col-md-6 row">
                                    <p class="col-4"># Ext. </p>
                                    <div class="col-8 controls">
                                        <input type="text" id="no_ext" name="no_ext" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->no_ext'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4"># Int. </p>
                                    <div class="col-8 controls">
                                        <input type="text" id="no_int" name="no_int" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->no_int'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Colonia </p>
                                    <div class="col-8 controls">
                                        <input type="text" id="colonia" name="colonia" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->colonia'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">CP <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" id="cp" name="cp" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->cp'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Delegación o Municipio </p>
                                    <div class="col-8 controls">
                                        <input type="text" id="municipio" name="municipio" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->municipio'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Estado </p>
                                    <div class="col-8 controls">
                                        <input type="text" id="estado" name="estado" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->estado'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group row">
                                <p class="col-4">Planta o Sucursal</p>
                                    <div class="col-8 controls">
                                        <select id="planta_sucursal" name="planta_sucursal" class="form-control form-control-sm">
                                            <option value="1" <?php if(isset($cliente)){ if($cliente->planta_sucursal==1) echo "selected"; } ?>>PLANTA</option>
                                            <option value="2" <?php if(isset($cliente)){ if($cliente->planta_sucursal==2) echo "selected"; } ?>>SUCURSAL</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                        
                        
                        <h4 class="form-section"><i class="ft-user-check"></i> Información General</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Condición de pago </p>
                                    <div class="col-8 controls">
                                        <input type="text" id="condicion_pago" name="condicion_pago" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->condicion_pago'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Correo certificación </p>
                                    <div class="col-8 controls">
                                        <input type="email" id="correo_certificacion" name="correo_certificacion" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->correo_certificacion'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Método de Pago</p>
                                    <div class="col-8 controls">
                                        <input type="text" id="metodo_pago" name="metodo_pago" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->metodo_pago'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Forma de Pago </p>
                                    <div class="col-8 controls">
                                        <input type="text" id="forma_pago" name="forma_pago" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->forma_pago'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Observaciones </p>
                                    <div class="col-10 controls">
                                        <textarea rows="2" id="observaciones" name="observaciones" class="form-control form-control-sm toupper"  ><?php if(isset($empleado)){ echo $empleado->observaciones;} ?></textarea>
                                    </div>
                            </div>
                        </div>

                        <p>Personas de Contacto</p><hr>
                        
                        <input type="hidden" id="contador_div_contactos" name="contador_div_contactos">
                        <div id="personas">
                            <div id="div_persona_contacto1" class="border" name="div_persona_contacto1">
                                <div class="row mt-2">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Nombre de contacto <span class="required">*</span></p>
                                            <div class="col-8 controls">
                                                <input type="text" id="persona_contacto[]" name="persona_contacto[]" class="form-control form-control-sm toupper" >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Tipo de Contacto</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="tipo_contacto[]" name="tipo_contacto[]" class="form-control form-control-sm toupper" >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 1</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="telefono1[]" name="telefono1[]" class="form-control form-control-sm toupper"  >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="telefono2[]" name="telefono2[]" class="form-control form-control-sm toupper"  >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 1</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="correo1[]" name="correo1[]" class="form-control form-control-sm" >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="correo2[]" name="correo2[]" class="form-control form-control-sm"  >
                                            </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="button" onclick="agregar_contacto()" class="mt-2 mb-0 round btn classBotonFratsa white"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            

                        </div>
                            <p>Contactos registrados</p><hr>
                            <br><br>
                            <?php 
                            if($title=="Edición" || $title=="Visualización")
                            {
                            ?> 
                            <table class="table table-striped table-condensed table-hover table-responsive" id="tabla_contactos_cliente" name="tabla_contactos_cliente">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Contacto</th>
                                        <th>Telefono 1</th>
                                        <th>Telefono 2</th>
                                        <th>Correo 1</th>
                                        <th>Correo 2</th>
                                        <th></th>
                                        <th>Tipo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody >
                                </tbody>
                                
                            </table> 
                            <?php } ?>

                        <br><br>

                        <div class="text-center" style="max-height: 300px; display: inline;" id="complementos_pago" name="complementos_pago" >

                            <h4 class="form-section"><i class="ft-plus-square"></i> Complementos de pago</h4>

                                <div class="col-md-12 row">
                                    <p class="col-5"></p>
                                    <div class="col-2 controls">
                                        <button type="button" class="btn btn-raised mr-1 mb-1 classBotonFratsa white" onclick="agregar_complemento()">
                                            <i class="ft-plus-square"></i> Nuevo Complemento
                                        </button>
                                    </div>
                                    <p class="col-5"></p>
                                </div>
                                
                                <div class="content " >
                                    <input type="hidden" id="contador_div_complementos" name="contador_div_complementos">
                                    <div id="Complemento1" name="Complemento1" class="border_complementos">
                                        <br>
                                        <div class="col-md-12 row">
                                            
                                            <p class="col-2">% gravado</p>
                                            <div class="col-2 controls">
                                                <input type="text" id="porcentaje_gravado[]" name="porcentaje_gravado[]" class="form-control form-control-sm toupper">
                                            </div>
                                            <p class="col-1">Del</p>
                                            <div class="col-3 controls">
                                                <input type="date" id="inicio_porcentaje[]" name="inicio_porcentaje[]" class="form-control form-control-sm toupper">
                                            </div>
                                            <p class="col-1">Al</p>
                                            <div class="col-3 controls">
                                                <input type="date" id="fin_porcentaje[]" name="fin_porcentaje[]" class="form-control form-control-sm toupper">
                                            </div>
                                        </div>                                        
                                        <br>
                                    </div>
                                    
                                </div>

                            <br><br>
                            <?php 
                            if($title=="Edición" || $title=="Visualización")
                            {
                            ?> 
                            <table class="table table-striped table-condensed table-hover table-responsive" id="tabla_complementos_pago" name="tabla_complementos_pago">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>% Gravado</th>
                                        <th>Del</th>
                                        <th>Al</th>
                                        <th></th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody >
                                </tbody>
                                
                            </table> 
                            <?php } ?>
                        </div>

                        <br><br>
                        <div class="col-md-12 text-center">
                            <div class="col-md-12 row">
                                <div class="col-md-6">
                                    <p class="pull-right">¿Cliente con económicos dedicados?</p>  
                                </div>
                                <div class="col-md-6">
                                    <label class="switch">
                                        <input id="unidades_dedicadas" name="unidades_dedicadas" type="checkbox" <?php if(isset($cliente)){echo "checked"; } ?> onchange="muestraOcultaDivs()">
                                        <span class="sliderN round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 text-center" id="div_unidades_dedicadas1" name="div_unidades_dedicadas1" style="display: none;">                    
                            <h4 class="form-section"><i class="fa fa-truck"></i>Económicos dedicados</h4>
                                <div class="col-md-12 row">
                                    <p class="col-5"></p>
                                    <div class="col-2 controls">
                                        <button type="button" class="btn btn-raised btn-success btn-min-width mr-1 mb-1 classBotonFratsa" onclick="agregar_unidad()">
                                            <i class="ft-plus-square"></i> Nueva unidad
                                        </button>
                                    </div>
                                    <p class="col-5"></p>
                                </div>
                                
                                <div class="content " >
                                    <input type="hidden" id="contador_div_unidades" name="contador_div_unidades">
                                    <div id="Unidad1" name="Unidad1" class="border_unidades">
                                        <br>
                                        <div class="col-md-12 row">
                                            
                                            <p class="col-2">Unidad</p>
                                            <select id="unidad[]" name="unidad[]" class="col-2 form-control form-control-sm chosen-select2">
                                            <option></option>
                                            <?php foreach($unidades as $unidad) 
                                            { 
                                            ?>
                                                <option value="<?php echo $unidad->id;?>" ><?php echo $unidad->economico,' ',$unidad->nombre ;?></option>
                                            <?php 
                                            } 
                                            ?>

                                            </select>
                                            <p class="col-2">Costo por día</p>
                                            <div class="col-2 controls">
                                                <input type="text" id="costo_dia1[]" name="costo_dia1[]" class="form-control form-control-sm toupper" >
                                            </div>
                                            <p class="col-2">Costo por día (B)</p>
                                            <div class="col-2 controls">
                                                <input type="text" id="costo_dia2[]" name="costo_dia2[]" class="form-control form-control-sm toupper" >
                                            </div>
                                        </div>                                        
                                        <br>
                                    </div>
                                    
                                </div>

                            <br><br>
                            <?php 
                            if($title=="Edición" || $title=="Visualización")
                            {
                            ?>    
                            <table class="table table-striped table-condensed table-hover table-responsive" id="tabla_unidades_dedicadas" name="tabla_unidades_dedicadas">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Unidad</th>
                                        <th>Costo por día</th>
                                        <th>Costo por día (B)</th>
                                        <th>idCliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody >
                                </tbody>
                                
                            </table>
                            
                            <?php } ?>
                        </div>
                         
                        
                         
                        
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/subclientes" class="btn btn-icon btn-secondary" style="background-color: gray;"><i class="ft-chevron-left"></i> Regresar</a>
                            <?php if($visualizar!=1){ ?>
                            <button type="submit" class="btn shadow-z-1 classBotonFratsa white" style="width: 50%; margin-left: 15%;">Guardar <i class="fa fa-save"></i></button>
                            <?php }?>
                        </div>

                        

                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

<div id="editarContactoModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" >

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header classBotonFratsa white">
                <h4 class="modal-title">¡Atención!</h4>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form" id="from_contacto_cliente" method="post">
                           <div class="conteiner">
                            <p class="col">¿Desea editar contacto?</p>
                           </div>
                                <div class="row mt-2">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Nombre de contacto <span class="required">*</span></p>
                                            <div class="col-8 controls">
                                                <input type="text" id="persona_contacto" name="persona_contacto" class="form-control form-control-sm toupper" >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Tipo de Contacto</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="tipo_contacto" name="tipo_contacto" class="form-control form-control-sm toupper" >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 1</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="telefono1" name="telefono1" class="form-control form-control-sm toupper"  >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Teléfono 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="telefono2" name="telefono2" class="form-control form-control-sm toupper"  >
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 1</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="correo1" name="correo1" class="form-control form-control-sm" >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="correo2" name="correo2" class="form-control form-control-sm"  >
                                            </div>
                                    </div>
                                </div>




                             <div class="modal-footer">
                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="btnEditarContactoCliente" class="btn btn-outline-danger">Aceptar</button>
                                    
                             </div>         
                            </form>
                     </div>   
       </div>
  </div>
</div>


<div id="eliminarContactoModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header classBotonFratsa white">
                <h4 class="modal-title">¡Atención!</h4>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form">
                           <div class="conteiner">
                            <p class="col">¿Desea eliminar Contacto?</p>
                            <p class="col">El cambio será irreversible. Si desea continuar de click en "Aceptar", de lo contrario cierre la ventana.</p>
                           </div>

                         <br>
                             <div class="modal-footer">
                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="btneliminarCliente" class="btn btn-outline-danger">Aceptar</button>
                                    
                             </div>         
                            </form>
                     </div>   
       </div>
  </div>
</div>


<div id="eliminarComplementopagoModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header classBotonFratsa white">
                <h4 class="modal-title">¡Atención!</h4>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form">
                           <div class="conteiner">
                            <p class="col">¿Desea eliminar Complemento de pago?</p>
                            <p class="col">El cambio será irreversible. Si desea continuar de click en "Aceptar", de lo contrario cierre la ventana.</p>
                           </div>

                         <br>
                             <div class="modal-footer">
                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="btneliminarComplemento" class="btn btn-outline-danger">Aceptar</button>
                                    
                             </div>         
                            </form>
                     </div>   
       </div>
  </div>
</div>

<div id="eliminarModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header classBotonFratsa white">
                <h4 class="modal-title">¡Atención!</h4>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form">
                           <div class="conteiner">
                            <p class="col">¿Desea eliminar un económico dedicado?</p>
                            <p class="col">El cambio será irreversible. Si desea continuar de click en "Aceptar", de lo contrario cierre la ventana.</p>
                           </div>

                         <br>
                             <div class="modal-footer">
                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="btneliminardedicado" class="btn btn-outline-danger">Aceptar</button>
                                    
                             </div>         
                            </form>
                     </div>   
       </div>
  </div>
</div>




<script>
    $(document).ready(function () 
    {    
        // Saber si es solo Visualización
        var visualiza = $("#visualizar_info").val();
        // En caso de que si, deshabilita todo
        if(visualiza == 1)
        {
            $("input").prop('disabled', true);
            $("textarea").prop('disabled', true);
            $("select").prop('disabled', true);
            $("checkbox").prop('disabled', true);
            $("button").prop('disabled', true);
        }

        // Inializa los input 
        iniciaInputDate();

        // Inicializa los Chosen
        $(".chosen-select").chosen();
        $('.chosen-select2').chosen({width: "15%"});

        // Contador de contactos
        $('#contador_div_contactos').val(1);

        // Contador de unidades
        $('#contador_div_unidades').val(1);

        // Contador de Complementos
        $('#contador_div_complementos').val(1);

        // Convertir mayúsculas automáticamente
        $(".toupper").on("change",function(){
            $(this).val($(this).val().toUpperCase()); 
        });

        if($('#unidades_dedicadas').is(':checked'))
        {
            if($('#div_unidades_dedicadas1').css('display') == 'none')
            {
                $('#div_unidades_dedicadas1').css('display','inline');
            }  
        } 

        else
        {
            if($('#div_unidades_dedicadas1').css('display') == 'inline')
            {
                $('#div_unidades_dedicadas1').css('display','none');
            }   

        }      

        table = $('#tabla_unidades_dedicadas').DataTable({
            "ajax":{ 
                "url": "<?php echo base_url();?>index.php/subclientes/getUnidadesDedicadas/<?php echo $idCliente; ?>",
            },
            "columns": [
              {"data": "id"},
              {"data": "unidad"},
              {"data": "costo_dia1"},
              {"data": "costo_dia2"},
              {"data": "cliente_id", visible: false},
              {"data":null,title:"Acciones",orderable:false,class:"centrado_text",
                    render:function(data,type,row){
                        var html="<button type='button' class='btn btn-sm btn-icon classBotonFratsa white eliminarUnidad' title='Eliminar'><i class='ft-alert-circle'></i></button>";
                        return html;
                    }
                }
            ],
            // Cambiamos lo principal a Español
            "language": {
                "lengthMenu": "Desplegando _MENU_ elementos por página",
                "zeroRecords": "Lo sentimos - No se han encontrado elementos",
                "sInfo":  "Mostrando registros del _START_ al _END_ de un total de _TOTAL_  registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar : _INPUT_",
                "paginate": {
                    "previous": "Página previa",
                    "next": "Siguiente página"
                  }
            }
        });

        table2 = $('#tabla_complementos_pago').DataTable({
            "ajax":{ "url": "<?php echo base_url();?>index.php/subclientes/getComplementosPago/<?php echo $idCliente; ?>",
            },
            "columns": [
              {"data": "id"},
              {"data": "porcentaje_gravado"},
              {"data": "inicio_porcentaje"},
              {"data": "fin_porcentaje"},
              {"data": "cliente_id", visible: false},
              {"data":null,title:"Acciones",orderable:false,class:"centrado_text",
                    render:function(data,type,row){
                        var html="<button type='button' class='btn btn-sm btn-icon classBotonFratsa white eliminarComplemento_Pago' title='Eliminar'><i class='ft-alert-circle'></i></button>";
                        return html;
                    }
                }
            ],
            // Cambiamos lo principal a Español
            "language": {
                "lengthMenu": "Desplegando _MENU_ elementos por página",
                "zeroRecords": "Lo sentimos - No se han encontrado elementos",
                "sInfo":  "Mostrando registros del _START_ al _END_ de un total de _TOTAL_  registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar : _INPUT_",
                "paginate": {
                    "previous": "Página previa",
                    "next": "Siguiente página"
                  }
            }
        });

        
        table3 = $('#tabla_contactos_cliente').DataTable({
                "ajax":{ "url": "<?php echo base_url();?>index.php/subclientes/getListadoContactosSubcliente/<?php echo $idCliente; ?>",
            },
            "columns": [
              {"data": "id", visible: false},
              {"data": "persona_contacto"},
              {"data": "telefono1"},
              {"data": "telefono2"},
              {"data": "correo1"},
              {"data": "correo2"},
              {"data": "cliente_id", visible: false},
              {"data": "tipo_contacto"},
              {"data":null,title:"Acciones",orderable:false,class:"centrado_text",
                    render:function(data,type,row){
                        var html="<button type='button' class='btn btn-sm btn-icon classBotonFratsa white editarContactoClien' title='Editar'><i class='ft-edit'></i></button> <button type='button' class='btn btn-sm btn-icon classBotonFratsa white eliminarContactoClien' title='Eliminar'><i class='ft-alert-circle'></i></button>";
                        return html;
                    }
                }
            ],
            // Cambiamos lo principal a Español
            "language": {
                "lengthMenu": "Desplegando _MENU_ elementos por página",
                "zeroRecords": "Lo sentimos - No se han encontrado elementos",
                "sInfo":  "Mostrando registros del _START_ al _END_ de un total de _TOTAL_  registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar : _INPUT_",
                "paginate": {
                    "previous": "Página previa",
                    "next": "Siguiente página"
                  }
            }
            });


          /// Eliminar Unidadesdedicadas
         $('#tabla_unidades_dedicadas').on('click', '.eliminarUnidad', function(){
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var dato = row.data();
              $('#eliminarModal').modal('show');
                  $('#btneliminardedicado').unbind().click(function(){
                     var datos = {id:dato.id}; 
                       $.ajax({
                        type: 'POST',
                        async: false,
                        url: '<?php echo base_url(); ?>index.php/Clientes/eliminarUnidades_dedicadas',
                        data: datos,
                        dataType: 'json',
                        success: function(response){
                            if(response.success){
                                $('#eliminarModal').modal('hide');
                                $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                                toastr.success('Eliminado Correctamente!', 'Hecho');  
                                table.ajax.reload();
                            }else{
                                alert('Error');
                            }
                          },
                        error: function(jqXHR,estado,error){
                          console.log(jqXHR);
                          console.log(estado);
                          console.log(error);
                        }
                       });
                       //fin ajax
                  });
              });


               /// Eliminar Unidadesdedicadas
        $('#tabla_complementos_pago').on('click', '.eliminarComplemento_Pago', function(){
                var tr = $(this).closest('tr');
                var row = table2.row(tr);
                var dato = row.data();
          $('#eliminarComplementopagoModal').modal('show');
              $('#btneliminarComplemento').unbind().click(function(){
                 var datos = {id:dato.id}; 
                   $.ajax({
                    type: 'POST',
                    async: false,
                    url: '<?php echo base_url(); ?>index.php/Clientes/eliminarComplementoPago',
                    data: datos,
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#eliminarComplementopagoModal').modal('hide');
                            $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            toastr.success('Eliminado Correctamente!', 'Hecho');  
                            table2.ajax.reload();
                        }else{
                            alert('Error');
                        }
                      },
                    error: function(jqXHR,estado,error){
                      console.log(jqXHR);
                      console.log(estado);
                      console.log(error);
                    }
                   });
                   //fin ajax
              });
          });


         /// Eliminar Contactos de clientes
          $('#tabla_contactos_cliente').on('click', '.eliminarContactoClien', function(){
                var tr = $(this).closest('tr');
                var row = table3.row(tr);
                var dato = row.data();
          $('#eliminarContactoModal').modal('show');
              $('#btneliminarCliente').unbind().click(function(){
                 var datos = {id:dato.id}; 
                   $.ajax({
                    type: 'POST',
                    async: false,
                    url: '<?php echo base_url(); ?>index.php/Clientes/eliminarContactoCliente',
                    data: datos,
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#eliminarContactoModal').modal('hide');
                            $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            toastr.success('Eliminado Correctamente!', 'Hecho');  
                            table3.ajax.reload();
                        }else{
                            alert('Error');
                        }
                      },
                    error: function(jqXHR,estado,error){
                      console.log(jqXHR);
                      console.log(estado);
                      console.log(error);
                    }
                   });
                   //fin ajax
              });
          });

           /// Editar Contactos de clientes
          $('#tabla_contactos_cliente').on('click', '.editarContactoClien', function(){
                var tr = $(this).closest('tr');
                var row = table3.row(tr);
                var dato = row.data();
                $('#editarContactoModal').modal('show');
                $.ajax({
                      type: 'ajax',
                      method: 'get',
                      url: '<?php echo base_url() ?>index.php/Clientes/edicion_contacto_cliente',
                      data: {id:dato.id},
                      async: false,
                      dataType: 'json',
                      success: function(data){
                      $('input[name=persona_contacto]').val(data.persona_contacto); 
                      $('input[name=tipo_contacto]').val(data.tipo_contacto); 
                      $('input[name=telefono1]').val(data.telefono1); 
                      $('input[name=telefono2]').val(data.telefono2); 
                      $('input[name=correo1]').val(data.correo1); 
                      $('input[name=correo2]').val(data.correo2); 
                      },
                    error: function(jqXHR,estado,error){
                      console.log(jqXHR);
                      console.log(estado);
                      console.log(error);
                }
                });
               //fin ajax
                $('#btnEditarContactoCliente').unbind().click(function(){
                    var persona_contact = $('#persona_contacto').val();
                    var tipo_contact = $('#tipo_contacto').val();
                    var telefon1 = $('#telefono1').val();
                    var telefon2 = $('#telefono2').val();
                    var corre1 = $('#correo1').val();
                    var corre2 = $('#correo2').val();

                    $.ajax({
                    type: 'POST',
                    async: false,
                    url: '<?php echo base_url(); ?>index.php/Clientes/update_contacto_cliente',
                    data:{id:dato.id,persona_contacto:persona_contact,tipo_contacto:tipo_contact,telefono1:telefon1,telefono2:telefon2,correo1:corre1,correo2:corre2},
                    dataType: 'json',
                    success: function(response){

                            $('#editarContactoModal').modal('hide');
                            $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            toastr.success('Actualizado Correctamente!', 'Hecho');  
                            table3.ajax.reload();
                      },
                    error: function(jqXHR,estado,error){
                      console.log(jqXHR);
                      console.log(estado);
                      console.log(error);
                    }
                   });
                });
          });

            // VALIDACION
            $("#form_cliente")
                    .on('success.form.fv', function (e) {
                        // Prevent form submission
                        e.preventDefault();
                        var $form = $(e.target);
                        // Use Ajax to submit form data
                        var fd = new FormData($form[0]);
                        <?php if(isset($cliente)){
                            echo "fd.append('id', $cliente->id);";
                        }?>
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/subclientes/insertUpdateSubcliente",
                            cache: false,
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                if (data==1)
                                {
                                    var texto="Se insertó el Subcliente";
                                    var url="<?php echo base_url(); ?>index.php/Subclientes";
                                    
                                    <?php if(isset($cliente)){ // Si es Edicion
                                        echo "texto='Se actualizó el Subcliente';";
                                        echo "url='".base_url()."index.php/Subclientes';";
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
                            razon_social: {
                                validators: {
                                    notEmpty: {
                                        message: "Por favor ingrese la Razón Social"
                                    }
                                }
                            },
                            rfc: {
                                validators: {
                                    notEmpty: {
                                        message: "Por favor ingrese el RFC"
                                    }
                                }
                            },
                            cp: {
                                validators: {
                                    notEmpty: {
                                        message: "Por favor ingrese un Código Postal"
                                    }
                                }
                            },
                            persona_contacto: {
                                validators: {
                                    notEmpty: {
                                        message: "Por favor ingrese una Persona de Contacto"
                                    }
                                }
                            }
                        }
                    });
                    // FIN VALIDADOR
    });
    
    
        function agregar_contacto()
        {
            var div_actuales_contacto = $('#contador_div_contactos').val();
            var no_contactos = div_actuales_contacto;
            no_contactos++;

            $('#contador_div_contactos').val(no_contactos);

            var $template = $('#div_persona_contacto1'),
                                $clone = $template
                                .clone()
                                .show()
                                .removeAttr('id')
                                .attr('id',"div_persona_contacto"+no_contactos)
                                .insertAfter($template)
                                .append('<div class="row">\
                                    <div class="col-md-12">\
                                        <button type="button" onclick="eliminar_contacto($(this))" class="mt-0 mb-0 btn-sm pull-right btn classBotonFratsa white"><i class="fa fa-minus"></i></button>\
                                    </div>\
                                </div>')
                                $clone.find("input").val("");
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

        
        function agregar_unidad()
        {
            var contador_div_unidades = $('#contador_div_unidades').val();
            var no_unidades = contador_div_unidades;
            no_unidades++;

            $('#contador_div_unidades').val(no_unidades);

            $('.chosen-select2').chosen('destroy');

            var $template = $('#Unidad1'),
                                $clone = $template
                                .clone()
                                .show()
                                .removeAttr('id')
                                .attr('id',"Unidad"+no_unidades)
                                .insertAfter($template)
                                .append('<div class="row">\
                                    <div class="col-md-12">\
                                        <button type="button" onclick="eliminar_unidad($(this))" class="mt-0 mb-0 btn-sm pull-right btn classBotonFratsa white"><i class="fa fa-minus"></i></button>\
                                    </div>\
                                </div>')
                                $clone.find("input").val("");
            $('.chosen-select2').chosen({width: "15%"});
        }

        function eliminar_unidad(btn){
            var $row = btn.parents('.border_unidades'),
                                $cmp1 = $row.find('[name="unidad[]"]'),
                                $cmp2 = $row.find('[name="costo_dia1[]"]');

                        // Remove element containing the option
                        $row.remove();
            var valorContador = $('#contador_div_unidades').val();
            valorContador = valorContador - 1;
            $('#contador_div_unidades').val(valorContador);
        }

        function agregar_complemento()
        {
            var contador_div_complementos = $('#contador_div_complementos').val();
            var no_complementos = contador_div_complementos;
            no_complementos++;

            $('#contador_div_complementos').val(no_complementos);

            var $template = $('#Complemento1'),
                                $clone = $template
                                .clone()
                                .show()
                                .removeAttr('id')
                                .attr('id',"Complemento"+no_complementos)
                                .insertAfter($template)
                                .append('<div class="row">\
                                    <div class="col-md-12">\
                                        <button type="button" onclick="eliminar_complemento($(this))" class="mt-0 mb-0 btn-sm pull-right btn classBotonFratsa white"><i class="fa fa-minus"></i></button>\
                                    </div>\
                                </div>')
                                $clone.find("input").val("");
            
            iniciaInputDate();
        }

        function eliminar_complemento(btn){
            var $row = btn.parents('.border_complementos'),
                                $cmp1 = $row.find('[name="porcentaje_gravado[]"]'),
                                $cmp2 = $row.find('[name="inicio_porcentaje[]"]');

                        // Remove element containing the option
                        $row.remove();
            var valorContador = $('#contador_div_complementos').val();
            valorContador = valorContador - 1;
            $('#contador_div_complementos').val(valorContador);
        }

        function muestraOcultaDivs()
        {
            if($('#unidades_dedicadas').is(':checked'))
            {
                if($('#div_unidades_dedicadas1').css('display') == 'none')
                {
                    $('#div_unidades_dedicadas1').css('display','inline');
                }  
            }  
            else
            {
                if($('#div_unidades_dedicadas1').css('display') == 'inline')
                {
                    $('#div_unidades_dedicadas1').css('display','none');
                }   

            }           
        }

        function muestraModalUnidad()
        {
            $("#modalUnidades").modal('show');  
        }

        function iniciaInputDate()
        {
            // date format
            $(".input-date").on("change", function() {
                this.setAttribute(
                    "data-date",
                    moment(this.value, "YYYY-MM-DD")
                    .format( this.getAttribute("data-date-format") )
                )
            }).trigger("change");
        }

        function cargaDatosFiscales()
        {
            var idCliente = $("#cliente_id").val();
            if($('#utiliza_datos_fiscales').is(':checked'))
            {
                $.ajax({
                    async: false,
                    url: '<?php echo base_url(); ?>index.php/Subclientes/cargaDatosFiscales/'+idCliente,
                    success: function(response)
                    {
                        var respuesta = jQuery.parseJSON(response);
                        $('#razon_social').val(respuesta.razon_social);
                        $('#rfc').val(respuesta.rfc);
                        $('#calle').val(respuesta.calle);
                        $('#no_ext').val(respuesta.no_ext);
                        $('#no_int').val(respuesta.no_int);
                        $('#colonia').val(respuesta.colonia);
                        $('#cp').val(respuesta.cp);
                        $('#municipio').val(respuesta.municipio);
                        $('#estado').val(respuesta.estado);
                    }
                   });
            }
            
        }

</script>
