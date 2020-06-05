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
                if(isset($empleado))
                {
                    $title="Edición";

                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Empleado</div>
        </div>

        <input type="hidden" value="<?php echo $visualizar; ?>" id="visualizar_info" name="visualizar_info">
        <div class="card"> 
            <div class="card-body">
                <div class="card-block">
                    <form class="form " id="form-empleado" method="post">
                        <h4 class="form-section"><i class="ft-user"></i> Datos del Empleado</h4>
                        <div class="row">
                            <div class="col-md-6 row form-group">
                                    <p class="col-4">No. Empleado <span class="required">*</span></p>
                                    <div class="col-4 controls">
                                        <input type="text" name="no" id="no" class="form-control form-control-sm " <?php if(isset($empleado)){ echo "value='$empleado->no'";} ?> >
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Nombre <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="nombre" id="name" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->nombre'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Apellido Paterno <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="paterno" id="paterno" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->paterno'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Apellido Materno </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="materno" id="materno" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->materno'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Teléfono 1 <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="telefono1" id="telefono1" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->telefono1'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Teléfono 2 </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="telefono2" id="telefono2" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->telefono2'";} ?> >
                                    </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-12 row">
                                    <p class="col-2">Dirección <span class="required">*</span></p>
                                    <div class="col-10 controls">
                                        <textarea rows="2" name="direccion" id="direccion" class="form-control form-control-sm toupper"  ><?php if(isset($empleado)){ echo $empleado->direccion;} ?></textarea>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">RFC <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="rfc" id="rfc" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->rfc'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">CURP <span class="required">*</span></p>
                                    <div class="col-8 controls">
                                        <input type="text" name="curp" id="curp" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->curp'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Fecha Ingreso </p>
                                    <div class="col-8 controls">
                                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->fecha_ingreso'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Fecha Salida </p>
                                    <div class="col-8 controls">
                                        <input type="date" name="fecha_salida" id="fecha_salida" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->fecha_salida'";} ?> >
                                    </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6 row">
                                    <p class="col-4">No.Seguro Social </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="no_ss" id="no_ss" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->no_ss'";} ?> >
                                    </div>

                            </div>
                        </div>
                        
                        <h4 class="form-section"><i class="ft-file-text"></i> Información Laboral</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Tipo Empleado </p>
                                    <div class="col-8 controls">
                                        <select  name="tipo_empleado" id="tipo_empleado" class="form-control form-control-sm toupper"  >
                                            <option value="1">Interno</option>
                                            <option value="2">Externo</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Clave elector </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="clave_elector" id="clave_elector" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->clave_elector'";} ?> >
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">Puesto </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="puesto" id="puesto" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->puesto'";} ?> >
                                    </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                    <p class="col-3">Crédito</p>
                                    <div class="col-1 controls">
                                        <input type="checkbox" name="credito" id="credito" />
                                    </div>
                                    <p class="col-3">Porcentaje</p>
                                    <div class="col-5 controls">
                                        <input type="number" name="porcentaje_credito" id="porcentaje_credito" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->porcentaje_credito'";} ?> readonly max="100" min="0" >
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 row">
                                    <p class="col-4">No. Cuenta </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="no_cuenta" id="no_cuenta" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->no_cuenta'";} ?> >
                                    </div>
                            </div>
                             <div class="form-group col-md-6 row">
                                    <p class="col-4">Banco </p>
                                    <div class="col-8 controls">
                                        <input type="text" name="banco" id="banco" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->banco'";} ?> >
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <p class="col-2">Operador</p>
                            <div class="col-1 controls">
                                <input type="checkbox" name="muestra_detalle_laboral" id="muestra_detalle_laboral" />
                            </div>
                        </div>   

                        <div id="contenedor_div_detalle_laboral" name="contenedor_div_detalle_laboral" style="display: none" >
                            <div class="row">
                                <div class="form-group col-md-12 row">
                                        <p class="col-2">Restriciones Médicas </p>
                                        <div class="col-10 controls">
                                            <textarea rows="2" name="restriccion_medica" id="restriccion_medica" class="form-control form-control-sm toupper"  ><?php if(isset($empleado)){ echo $empleado->restriccion_medica;} ?></textarea>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                        <p class="col-4">No. económico del carro <span class="required">*</span></p>
                                        <div class="col-8 controls">
                                            <input type="text" name="no_carro" id="no_carro" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->no_carro'";} ?> >
                                        </div>
                                </div>
                                 <div class="form-group col-md-6 row">
                                        <p class="col-4">Dolly </p>
                                        <div class="col-8 controls">
                                            <input type="text" name="dolly" id="dolly" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->dolly'";} ?> >
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 row">
                                        <p class="col-4">Plataforma 1 </p>
                                        <div class="col-8 controls">
                                            <input type="text" name="plataforma" id="plataforma" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->plataforma'";} ?> >
                                        </div>
                                </div>
                                 <div class="form-group col-md-6 row">
                                        <p class="col-4">Plataforma 2 </p>
                                        <div class="col-8 controls">
                                            <input type="text" name="plataforma2" id="plataforma2" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->plataforma2'";} ?> >
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                        <h4 class="form-section"><i class="ft-upload"></i> Carga de Archivos</h4>
                        <div class="row">
                            <div class="col-md-4 ">
                                <h5>Licencia</h5>
                                <hr>
                                <?php 
                                if(isset($empleado))
                                {
                                    if(isset($empleado->licencia) && !empty($empleado->licencia))
                                    {
                                        echo '<div style="text-align: center;"><a href="'.base_url().'uploads/empleados/'.$empleado->id.'/'.$empleado->licencia.'" target="_blank">Ver archivo Actual</a></div><hr>';
                                    }
                                    else
                                    {
                                        echo '<div style="text-align: center;"><a>No hay archivo aún</a></div><hr>';
                                    } 
                                }
                                ?>
                                <div class="form-group row">
                                    <p class="col-5">Archivo <span class="required">*</span></p>
                                    <div class="col-7 controls ">
                                        <input type="file" name="licencia" id="licencia" class="form-control form-control-sm toupper " >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Número <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="text" name="licencia_no" id="licencia_no" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->licencia_no'";} ?> >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Expedición <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="date" name="licencia_exp" id="licencia_exp" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->licencia_exp'";} ?> >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Vencimiento <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="date" name="licencia_venc" id="licencia_venc" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->licencia_venc'";} ?> >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h5>Vigencia Médica</h5>
                                <hr>
                                <?php 
                                if(isset($empleado))
                                {
                                    if(isset($empleado->medica) && !empty($empleado->medica))
                                    {
                                        echo '<div style="text-align: center;"><a href="'.base_url().'uploads/empleados/'.$empleado->id.'/'.$empleado->medica.'" target="_blank" >Ver archivo Actual</a></div><hr>';
                                    }
                                    else
                                    {
                                        echo '<div style="text-align: center;"><a>No hay archivo aún</a></div><hr>';
                                    } 
                                }
                                ?>
                                <div class="form-group row">
                                    <p class="col-5">Archivo <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="file" name="medica" id="medica" class="form-control form-control-sm toupper"  >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Número <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="text" name="medica_no" id="medica_no" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->medica_no'";} ?> >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Expedición <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="date" name="medica_exp" id="medica_exp" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->medica_exp'";} ?> >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Vencimiento <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="date" name="medica_venc" id="medica_venc" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->medica_venc'";} ?> >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>INE</h5>
                                <hr>
                                <?php 
                                if(isset($empleado))
                                {
                                    if(isset($empleado->ine) && !empty($empleado->ine))
                                    {
                                        echo '<div style="text-align: center;"><a href="'.base_url().'uploads/empleados/'.$empleado->id.'/'.$empleado->ine.'" target="_blank" >Ver archivo Actual</a></div><hr>';
                                    }
                                    else
                                    {
                                        echo '<div style="text-align: center;"><a>No hay archivo aún</a></div><hr>';
                                    } 
                                }
                                ?>
                                <div class="form-group row">
                                    <p class="col-5">Archivo <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="file" name="ine" id="ine" class="form-control form-control-sm toupper"  >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Número <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="text" name="ine_no" id="ine_no" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->ine_no'";} ?> >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Expedición <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="date" name="ine_exp" id="ine_exp" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->ine_exp'";} ?> >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-5">Vencimiento <span class="required">*</span></p>
                                    <div class="col-7 controls">
                                        <input type="date" name="ine_venc" id="ine_venc" class="form-control form-control-sm toupper" <?php if(isset($empleado)){ echo "value='$empleado->ine_venc'";} ?> >
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <h4 class="form-section"><i class="ft-user-x"></i> Motivo suspensión o baja</h4>
                        <p><strong>Motivo Suspensión:</strong></p>
                        <label ><?php if(isset($empleado)){ echo $empleado->motivo_suspension;} ?></label>
                        <br>
                        <p><strong>Motivo Baja:</strong></p>
                        <label ><?php if(isset($empleado)){ echo $empleado->motivo_eliminacion;} ?></label>
                        
                        <h4 class="form-section"><i class="ft-unlock"></i> Seleccione los Permisos del Empleado</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="pull-right">Empleados</p>  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="switch">
                                            <input name="permiso_empleados" id="permiso_empleados" type="checkbox" 
                                                <?php if(isset($empleado) && isset($permisos[0]->permiso_empleados)) {echo "checked"; } ?>
                                            >
                                            <span class="sliderN round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="pull-right">Clientes</p>  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="switch">
                                            <input name="permiso_clientes" id="permiso_clientes" type="checkbox" 
                                                <?php if(isset($empleado) && isset($permisos[0]->permiso_clientes)) {echo "checked"; } ?>
                                            >
                                            <span class="sliderN round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="pull-right">Subclientes</p>  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="switch">
                                            <input name="permiso_subclientes" id="permiso_subclientes" type="checkbox" 
                                                <?php if(isset($empleado) && isset($permisos[0]->permiso_subclientes)) {echo "checked"; } ?>
                                            >
                                            <span class="sliderN round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="pull-right">Proveedores</p>  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="switch">
                                            <input name="permiso_proveedores" id="permiso_proveedores" type="checkbox" 
                                                <?php if(isset($empleado) && isset($permisos[0]->permiso_proveedores)) {echo "checked"; } ?>
                                            >
                                            <span class="sliderN round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="pull-right">Tarifas</p>  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="switch">
                                            <input name="permiso_tarifas" id="permiso_tarifas" type="checkbox" 
                                                <?php if(isset($empleado) && isset($permisos[0]->permiso_tarifas)){echo "checked"; } ?>
                                            >
                                            <span class="sliderN round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="pull-right">Unidades</p>  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="switch">
                                            <input name="permiso_unidades" id="permiso_unidades" type="checkbox" 
                                                <?php if(isset($empleado) && isset($permisos[0]->permiso_unidades)){echo "checked"; } ?>
                                            >
                                            <span class="sliderN round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="pull-right">Incidentes</p>  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="switch">
                                            <input name="permiso_incidentes" id="permiso_incidentes" type="checkbox" 
                                                <?php if(isset($empleado) && isset($permisos[0]->permiso_incidentes)){echo "checked"; } ?>
                                            >
                                            <span class="sliderN round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="pull-right">Almacen</p>  
                                    </div>
                                    <div class="col-md-6">
                                        <label class="switch">
                                            <input name="permiso_almacen" id="permiso_almacen" type="checkbox" 
                                                <?php if(isset($empleado) && isset($permisos[0]->permiso_almacen)){echo "checked"; } ?>
                                            >
                                            <span class="sliderN round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Usuario <span class="required">*</span></p>
                                    <div class="controls">
                                        <input type="text" name="usuario" id="usuario" class="form-control form-control-sm" autocomplete="off" <?php if(isset($empleado)){ echo "value='$empleado->usuario'";} ?>>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    
                                    <p>Contraseña 
                                        <span class="required">*</span> 

                                        <button type="button" class="btn" title="Mostrar Contraseña" style="width: 39px; height: 39px;" onclick="muestraContra(1)">
                                            <i class="ft-eye" > </i>
                                        </button>
                                    </p> 
                                    
                                    <div class="controls">
                                        <input type="password" name="password" id="password" class="form-control form-control-sm" autocomplete="off" <?php if(isset($empleado)){ echo "value='$empleado->password'";} ?>>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <p>Confirma contraseña <span class="required">*</span>
                                        <button type="button" class="btn" title="Mostrar Contraseña" style="width: 39px; height: 39px;" onclick="muestraContra(2)">
                                            <i class="ft-eye" > </i>
                                        </button>   
                                    </p>
                                    <div class="controls">
                                        <input type="password" name="confirma_password" id="confirma_password" class="form-control form-control-sm" autocomplete="off" <?php if(isset($empleado)){ echo "value='$empleado->password'";} ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/empleados" class="btn btn-icon btn-secondary"><i class="ft-chevron-left"></i> Regresar</a>
                            <!-- Si es edición muestra el botón de GUARDAR, en caso contrario no-->
                            <?php if($visualizar!=1)
                            {
                            ?>
                                <button type="submit" id="botonGuardar" name="botonGuardar" class="btn btn-danger shadow-z-1 white" style="width: 50%; margin-left: 15%; ">Guardar <i class="fa fa-save"></i></button>
                            <?php 
                            }
                            ?>
                        </div>
                    </form>
                </div>
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

        }

        // Habilitar o deshabilitar "Porcentaje de Crédito" según se active o no el checkbox 
        $("#credito").change(function() 
        {
            if($('#credito').is(':checked'))
            {
                $('#porcentaje_credito').prop('readonly', false); 
            } 
            else
            {
                $('#porcentaje_credito').val('');
                $('#porcentaje_credito').prop('readonly', true); 
            }
                
        });


        // Habilitar o deshabilitar "Porcentaje de Crédito" según se active o no el checkbox 
        $("#muestra_detalle_laboral").change(function() 
        {
            if($('#muestra_detalle_laboral').is(':checked'))
            {
                $('#contenedor_div_detalle_laboral').attr('style', 'display: inline');
                
                $cantidad = $clone.find('#licencia_no'),
                $('#form-empleado').formValidation('addField', $cantidad); 
                
            } 
            else
            {
                $('#restriccion_medica').val('');
                $('#no_carro').val('');
                $('#dolly').val('');
                $('#plataforma').val('');
                $('#plataforma2').val('');
                $('#contenedor_div_detalle_laboral').attr('style', 'display: none');  
            }
                
        });

        // Cuando cambie el input de confirmación de contraseña, se ejecutará la validación 
        // para saber si son iguales la contraseña y su confirmación
        $("#confirma_password").change(function() 
        {
            comparaContra();
        });

        // Cambia automáticamente las letras a mayúsculas
        $(".toupper").on("change",function()
        {
            $(this).val($(this).val().toUpperCase()); 
        });
         
        // Validación de formulario
        $("#form-empleado")
            .on('success.form.fv', function (e) 
            {
                // Prevent form submission
                e.preventDefault();
                var $form = $(e.target);
                // Use Ajax to submit form data
                //var fd = new FormData($form[0]);
                var fd = new FormData(this);
                <?php if(isset($empleado)){
                    echo "fd.append('id', $empleado->id);";
                }?>
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/empleados/insertUpdateEmpleado",
                    cache: false,
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data==1)
                        {
                            var texto="Se insertó el Empleado";
                            var url="<?php echo base_url(); ?>index.php/empleados";
                            
                            <?php if(isset($empleado))
                                {   // Si es Edicion
                                    echo "texto='Se actualizó el Empleado'; ";
                                    echo "url='".base_url()."index.php/empleados';";
                                } 
                            ?>

                            swal({
                                title: 'Exito!',
                                text: texto,
                                type: 'success',
                                showCancelButton: false,
                                allowOutsideClick: false
                            }).then(function (isConfirm) {
                                if (isConfirm) {
                                    //window.location = url;
                                }
                            }).catch(swal.noop);
                        }
                        else{
                            swal("Error!", "Se produjo un error, intente de nuevamente o contacte al administrador del sistema", "error")
                        }
                    }
                }); // fin ajax
            })
                .formValidation(
                {
                    framework: 'bootstrap',
                    icon: {
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh'
                    },
                    fields: 
                    {
                        no: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Número de Empleado"
                                },
                                regexp: {
                                    regexp: /[0-9]$/,
                                    message: 'Utilice solo dígitos'
                                }
                            }
                        },
                        nombre: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Nombre"
                                },
                                stringLength:{
                                    min:3,
                                    max:45,
                                    message:"Mínimo 3, máximo 45 caracteres"
                                },
                                regexp: {
                                    regexp: /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/, // VOCALES ACENTUADAS Y Ñ
                                    message: 'Introduce un nombre válido'
                                }
                            }
                        },
                        telefono1: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un número telefónico"
                                },
                                regexp: {
                                   regexp: /^[0-9]{10}$/,
                                   message:"Utilice 10 dígitos"
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
                        curp: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese el CURP"
                                }
                            }
                        },
                        unidad: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese la unidad"
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
                        },
                        confirma_password: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese la confirmación de Contraseña"
                                }
                            }
                        }
                    }
                });
                // FIN VALIDADOR
    });

    // Validar que la contraseña ingresada y su confirmación sea igual
    function comparaContra()
    {
        if ($("#password").val() !== $("#confirma_password").val()) 
        {
            swal({
                    title: 'Las contraseñas no son iguales!',
                    text: 'No podrá guardar al empleado hasta que las contraseñas coincidan',
                    type: 'error',
                    showCancelButton: false,
                    allowOutsideClick: false
                }).catch(swal.noop);
            // Se oculta el botón de guardar hasta que sean iguales
            $("#botonGuardar").attr("style", "visibility: hidden");
        }
        else 
        {
            // Se muestra el botón de guardar
            $("#botonGuardar").attr("style", "visibility: visible");
        }
    }

    function muestraContra(campo)
    {
        if(campo==1)
        {
            if($("#password").attr("type")=='text')
            {
                $("#password").attr("type","password");
            }
            else
            {
                $("#password").attr("type","text");
            }
        }    
        else 
        {
            if($("#confirma_password").attr("type")=='text')
            {
                $("#confirma_password").attr("type","password");
            }
            else
            {
                $("#confirma_password").attr("type","text");
            }
        }        
    }  
        
</script>
