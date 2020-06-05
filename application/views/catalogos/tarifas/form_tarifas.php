
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php $title = "Alta"; 
                if(isset($tarifa))
                {
                    if($visualizar==1)
                    {
                        $title = "Visualización";
                    }
                    else
                    {
                                            $title = "Edición";                        
                    }

                }
                else
                {
                    $title = "Alta";
                }    
            ?>
        <div class="content-header"><?php echo $title; ?> de Tarifas</div>
        </div>
        <input type="hidden" value="<?php echo $visualizar; ?>" id="visualizar_info" name="visualizar_info">

        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form_tarifa" method="post" autocomplete="off">
                        <?php $title = "Alta"; 
                            if(isset($tarifa))
                            {
                                echo '<input type="hidden" id="bandera_alta_edicion" name="bandera_alta_edicion" value="edicion">';
                                echo '<input type="hidden" id="idTarifa" name="idTarifa" value="'.$tarifa->id.'">';
                            }
                            else
                            {
                                echo '<input type="hidden" id="bandera_alta_edicion" name="bandera_alta_edicion" value="alta">';
                                echo '<input type="hidden" id="idTarifa" name="idTarifa" value="0">';
                            }    
                        ?>

                        <h4 class="form-section"><i class="ft-info"></i> Tipo de Tarifa</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                <p class="col">Tipo</p>
                                <div class="col-8 controls">
                               
                                <select name="tipo_tarifa" id="tipo_tarifa" class="chosen-select"  data-placeholder="Seleccionar" >
                                    <option value="1" <?php if(isset($tarifa)){ if ($tarifa->tipo_tarifa==1) echo 'selected'; } ?>>Tarifa Normal</option>
                                    <option value="2" <?php if(isset($tarifa)){ if ($tarifa->tipo_tarifa==2) echo 'selected'; } ?>>Tramo de Vacio</option>
                                </select>
                               
                                </div>
                            </div>

                        </div>


                        <h4 class="form-section"><i class="ft-user"></i> Información de Cliente</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                <p class="col">Cliente <br> (Solo si es necesario)</p>
                                <div class="col-8 controls">
                               
                                <select name="cliente" id="cliente" class="chosen-select"  data-placeholder="Seleccionar">
                                    <option></option>
                                    <?php foreach($clientes as $cliente) 
                                    { 
                                    ?>
                                        <option value="<?php echo $cliente->id;?>" <?php if(isset($tarifa)){ if ($tarifa->cliente_id==$cliente->id) echo 'selected'; } ?>>
                                        <?php echo $cliente->razon_social;?>
                                        </option>
                                    <?php 
                                    } 
                                    ?>
                                </select>
                               
                                </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                <p class="col">Subcliente <br> (Solo si es necesario)</p>
                                <div class="col-8 controls">
                                <select name="subcliente" id="subcliente" class="chosen-select"  data-placeholder="Seleccionar">
                                    <option></option>
                                    <?php foreach($subclientes as $subcliente) 
                                    { 
                                    ?>
                                        <option value="<?php echo $subcliente->id;?>" <?php if(isset($tarifa)){ if ($tarifa->subcliente_id==$subcliente->id) echo 'selected'; } ?>>
                                        <?php echo $subcliente->razon_social;?>
                                        </option>
                                    <?php 
                                    } 
                                    ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4 class="form-section"><i class="ft-file-text"></i> Información de Tarifa</h4>
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                <p class="col">Estado Origen</p>
                                <div class="col-8 controls">
                                <select name="estado_origen" class="chosen-select"  data-placeholder="Seleccionar" id="estado_origen" onchange="puntoorigen()">
                                    <?php foreach($estados as $estado) 
                                    { 
                                    ?>
                                        <option value="<?php echo $estado->id;?>" <?php if(isset($tarifa)){ if ($tarifa->estado_origen==$estado->id) echo 'selected'; } ?>>
                                        <?php echo $estado->estado;?>
                                        </option>
                                    <?php 
                                    } 
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                <p class="col">Estado Destino</p>
                                <div class="col-8 controls">
                                <select name="estado_destino" class="chosen-select"  data-placeholder="Seleccionar" id="estado_destino" onchange="puntodestino()">
                                    <?php foreach($estados as $estado) 
                                    { 
                                    ?>
                                        <option value="<?php echo $estado->id;?>" <?php if(isset($tarifa)){ if ($tarifa->estado_destino==$estado->id) echo 'selected'; } ?>>
                                        <?php echo $estado->estado;?>
                                        </option>
                                    <?php 
                                    } 
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div ></div> 
                        </div>  
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                <p class="col">Origen</p>
                                <div class="col-8 controls textorigen">
                                    <!--  option  -->

                                </div>
                            </div>    
                            <div class="form-group col-md-6 row">
                                <p class="col">Destino</p>
                                <div class="col-8 controls textdestino">
                                </div>
                            </div>
                        </div>       
                        <h4 class="form-section"></h4>
                        <div class="row">
                             <div class="col-lg-6 col-md-12">
                                <h5 >Sencillo</h5>
                                <div class="row">
                                <p class="col-4">Diesel</p>
                                    <div class="col">
                                    <input type="text" id="diesel_sencillo" class="
                                    form-control form-control-sm toupper" name="diesel_sencillo" <?php if(isset($tarifa)){ echo "value='$tarifa->diesel_sencillo'";} ?> >
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <p class="col">Rango de consumo</p>
                                        <div class="col">   
                                        <input type="text" id="rango_consumo_a_sencillo" class="
                                        form-control form-control-sm toupper" name="rango_consumo_a_sencillo" <?php if(isset($tarifa)){ echo "value='$tarifa->rango_consumo_a_sencillo'";} ?>>
                                        </div>
                                        <p>-</p> 
                                        <div class="col">
                                        <input type="text" id="rango_consumo_b_sencillo" class="
                                        form-control form-control-sm toupper" name="rango_consumo_b_sencillo" <?php if(isset($tarifa)){ echo "value='$tarifa->rango_consumo_b_sencillo'";} ?> >
                                        </div>
                                </div>
                                        <br>
                                <div class="row">
                                        <p class="col-4">Tarifa</p>
                                        <div class="col">             
                                        <input type="text" id="tarifa_sencillo" class="
                                        form-control form-control-sm toupper" name="tarifa_sencillo" placeholder="$" <?php if(isset($tarifa)){ echo "value='$tarifa->tarifa_sencillo'";} ?> >
                                        </div>
                                </div>
                                        <br>
                                <div class="row">
                                        <p class="col-4">Tarifa operador CXT</p>
                                        <div class="col">             
                                        <input type="text" id="tarifa_cxt_sencillo" class="
                                        form-control form-control-sm toupper" name="tarifa_cxt_sencillo" placeholder="$" <?php if(isset($tarifa)){ echo "value='$tarifa->tarifa_cxt_sencillo'";} ?> >
                                        </div>
                                </div>
                                        <br>
                                <div class="row">
                                        <p class="col-4">Tarifa viaje</p>
                                        <div class="col">             
                                        <input type="text" id="tarifa_viaje_sencillo" class="
                                        form-control form-control-sm toupper" name="tarifa_viaje_sencillo" placeholder="$" <?php if(isset($tarifa)){ echo "value='$tarifa->tarifa_viaje_sencillo'";} ?> >
                                        </div>
                                </div>
                                        <br>                
                                <div class="row">
                                        <p class="col-4">KMs</p>
                                        <div class="col">             
                                        <input type="text" id="kms_sencillo" class="
                                        form-control form-control-sm toupper" name="kms_sencillo" <?php if(isset($tarifa)){ echo "value='$tarifa->kms_sencillo'";} ?> >
                                        </div>
                                </div>
                                <br>

                                <!---------------------------------------------------------->
                                <!----------------------- Nueva Caseta --------------------->
                                <h4 class="form-section"> Casetas Sencillo</h4>
                                
                                <input type="hidden" id="contador_div_casetas_sencilla" name="contador_div_casetas_sencilla">
                                <div id="CasetaSencilla1" name="CasetaSencilla1" class="border_casetas_sencilla">            
                                    <div class="row"> 
                                        <p class="col-4">Nombre</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="nombre[]" name="nombre[]" class="form-control form-control-sm toupper">
                                            </div> 
                                    </div>
                                    <div class="row"> 
                                        <p class="col-4">Costo</p>
                                            <div class="col-8 controls">
                                               <input type="text" name="costo[]" id="costo[]" class="form-control form-control-sm toupper " placeholder="$">
                                            </div>
                                    </div>
                                </div>
                                <br>    

                                <div class="col-2">
                                    <button type="button"  class="white btn btn-sm classBotonFratsa" onclick="agregar_caseta_sencilla()"  ><i class="fa fa-plus"></i></button>
                                </div>

                                <?php if(isset($tarifa)) { ?>
                                <!------------------------------------------------------------>
                                <!---------------------- Tabla Casetas ----------------------->
                                <div class="card-header">
                                    <h4 class="form-section">Casetas Sencillo</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <table class="table table-responsive text-center" id="tablas_casetas_sencillo" name="tablas_casetas_sencillo" >
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            </tbody>

                                                
                                        </table>
                                   </div>
                                </div>
                                <?php } ?>

                            </div>

                            <div class="col-lg-6 col-md-12">
                                       <h5 >Full</h5>
                                <div class="row">
                                <p class="col-4">Diesel</p>
                                    <div class="col">
                                    <input type="text" id="diesel_full" class="
                                    form-control form-control-sm toupper"  name="diesel_full" <?php if(isset($tarifa)){ echo "value='$tarifa->diesel_full'";} ?> >
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <p class="col">Rango de consumo</p>
                                        <div class="col">   
                                        <input type="text" id="rango_consumo_a_full" class="
                                        form-control form-control-sm toupper" name="rango_consumo_a_full" <?php if(isset($tarifa)){ echo "value='$tarifa->rango_consumo_a_full'";} ?> >
                                        </div>
                                        <p>-</p> 
                                        <div class="col">
                                        <input type="text" id="rango_consumo_b_full" class="
                                        form-control form-control-sm toupper" name="rango_consumo_b_full" <?php if(isset($tarifa)){ echo "value='$tarifa->rango_consumo_b_full'";} ?> >
                                        </div>
                                </div>
                                        <br>
                                <div class="row">
                                        <p class="col-4">Tarifa</p>
                                        <div class="col">             
                                        <input type="text" id="tarifa_full" class="
                                        form-control form-control-sm toupper" name="tarifa_full" placeholder="$" <?php if(isset($tarifa)){ echo "value='$tarifa->tarifa_full'";} ?> >
                                        </div>
                                </div>
                                        <br>
                                <div class="row">
                                        <p class="col-4">Tarifa operador CXT</p>
                                        <div class="col">             
                                        <input type="text" id="tarifa_cxt_full" class="
                                        form-control form-control-sm toupper" name="tarifa_cxt_full" placeholder="$" <?php if(isset($tarifa)){ echo "value='$tarifa->tarifa_cxt_full'";} ?> >
                                        </div>
                                </div>
                                        <br>
                                <div class="row">
                                        <p class="col-4">Tarifa viaje</p>
                                        <div class="col">             
                                        <input type="text" id="tarifa_viaje_full" class="
                                        form-control form-control-sm toupper" name="tarifa_viaje_full" placeholder="$" <?php if(isset($tarifa)){ echo "value='$tarifa->tarifa_viaje_full'";} ?> >
                                        </div>
                                </div>
                                        <br>                
                                <div class="row">
                                        <p class="col-4">KMs</p>
                                        <div class="col">             
                                        <input type="text" id="kms_full" class="
                                        form-control form-control-sm toupper" name="kms_full" <?php if(isset($tarifa)){ echo "value='$tarifa->kms_full'";} ?> >
                                        </div>
                                </div>
                                                
                                        <br>

                                
                                <!---------------------------------------------------------->
                                <!----------------------- Nueva Caseta --------------------->
                                <h4 class="form-section"> Casetas Full</h4>
                                
                                <input type="hidden" id="contador_div_casetas_full" name="contador_div_casetas_full">
                                <div id="CasetaFull1" name="CasetaFull1" class="border_casetas_full">            
                                    <div class="row"> 
                                        <p class="col-4">Nombre</p>
                                            <div class="col-8 controls">
                                                <input type="text" id="nombre2[]" name="nombre2[]" class="form-control form-control-sm toupper">
                                            </div> 
                                    </div>
                                    <div class="row"> 
                                        <p class="col-4">Costo</p>
                                            <div class="col-8 controls">
                                               <input type="text" name="costo2[]" id="costo2[]" class="form-control form-control-sm toupper " placeholder="$">
                                            </div>
                                    </div>
                                </div>
                                <br>    

                                <div class="col-2">
                                    <button type="button"   class="white btn btn-sm classBotonFratsa" onclick="agregar_caseta_full()"  ><i class="fa fa-plus"></i></button>
                                </div>

                                <?php if(isset($tarifa)) { ?>
                               <div class="card-header">
                                    <h4 class="form-section">Casetas Full</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <table class="table table-responsive text-center" id="tablas_casetas_full" name="tablas_casetas_full" >
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            </tbody>

                                                
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>             
                        </div>

                        <br>
                       
                        <div class="row">
                            <div class="form-group col-md-12 row">
                                <h4 class="form-section col-md-12"><i class="ft-list"></i> Observaciones</h4>
                                <br><br>
                                <div class="col-12 controls">
                                     <textarea rows="2" name="observaciones" class="form-control form-control-sm toupper" placeholder="Observaciones" id="observaciones" ><?php if(isset($tarifa)){ echo $tarifa->comentarios;} ?></textarea>
                                </div>
                            </div>
                        </div>
                 
                                <br><hr>

                                 <div class="row">
                                         <a href="<?php echo base_url(); ?>index.php/tarifas" class="btn btn-icon btn-secondary" style="background-color: gray;"><i class="ft-chevron-left"></i> Regresar</a>
                                <?php if($visualizar!=1)
                                {
                                ?>

                                         <button type="submit" class="btn btnFratsa classBotonFratsa shadow-z-1 white btn-tarifa inputDisabled" style="width: 50%; margin-left: 15%;" id="btn-tarifa">Guardar <i class="fa fa-save"></i></button>
                                <?php 
                                }
                                ?>
                                 </div>
                    </form>
                </div>
            </div>
        </div>



<div class="modal fade text-left" data-keyboard="false" id="modalEliminaCaseta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true"> 
            <div class="modal-dialog" role="document"> 
                <div class="modal-content"> 
                    <div class="modal-header classBotonFratsa white"> 
                        <h4 class="modal-title" id="myModalLabel10">Advertencia !</h4> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                            <span aria-hidden="true">&times;</span> 
                        </button> 
                    </div> 
                    <div class="modal-body"> 
                        <h5>¿Está seguro de eliminar esta Caseta?</h5> 
                        <input type="hidden" id="idCaseta" name="idCaseta"> 
                        <p>Si desea continuar de click en "Aceptar", de lo contrario cierre la ventana.</p> 
                    </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button> 
                        <button type="button" class="btn btn-outline-danger" onclick="eliminaCaseta()">Aceptar</button> 
                    </div> 
                </div> 
            </div> 
        </div> 






        
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>public/js/formulario_tarifas.js"></script>



<script type="text/javascript">
    $(document).ready(function($) {
        <?php if(isset($tarifa)){ ?>
            puntoorigen();
            setTimeout(function() {
            $('#origen option').attr('selected',false);
            $('#origen option[value=<?php echo $tarifa->origen;?>]').attr('selected',true);
             }, 3000);  

            puntodestino();
            setTimeout(function() {
            $('#destino option').attr('selected',false);    
            $('#destino option[value=<?php echo $tarifa->destino;?>]').attr('selected',true);
             }, 3000);  
        <?php } ?>
    });
</script>