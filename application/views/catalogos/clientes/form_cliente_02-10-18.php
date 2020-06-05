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
                    $title="Edición";
                    $idCliente = $cliente->id;
                    echo '<input type="hidden" id="bandera_alta_edicion" name="bandera_alta_edicion" value="edicion">';
                }
                else 
                { 
                    $idCliente = '0';
                    echo '<input type="hidden" id="bandera_alta_edicion" name="bandera_alta_edicion" value="alta">';
                }
            ?>
            <div class="content-header"><?php echo $title; ?> de Cliente</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    

                    <form class="form" id="form_cliente" method="post">
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
                                        <input type="text" id="planta_sucursal" name="planta_sucursal" class="form-control form-control-sm toupper" <?php if(isset($cliente)){ echo "value='$cliente->planta_sucursal'";} ?> >
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
                                                <input type="text" id="correo1[]" name="correo1[]" class="form-control form-control-sm toupper" >
                                            </div>
                                    </div>
                                    <div class="form-group col-md-6 row">
                                            <p class="col-4">Correo 2 </p>
                                            <div class="col-8 controls">
                                                <input type="text" id="correo2[]" name="correo2[]" class="form-control form-control-sm toupper"  >
                                            </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="button" onclick="agregar_contacto()" class="mt-2 mb-0 round btn btn-info"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            

                        </div>
                            <p>Contactos registrados</p><hr>
                            <br><br>
                            <?php 
                            if($title=="Edición")
                            {
                            ?> 
                            <table class="table table-sm dataTable" id="tabla_contactos_cliente" name="tabla_contactos_cliente">
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
                                        <button type="button" class="btn btn-raised btn-success btn-min-width mr-1 mb-1" onclick="agregar_complemento()">
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
                                            <p class="col-2">Del</p>
                                            <div class="col-2 controls">
                                                <input type="date" id="inicio_porcentaje[]" name="inicio_porcentaje[]" class="form-control form-control-sm toupper input-date" autocomplete="off" data-date-format="YYYY-MM-DD" value="2018-01-01">
                                            </div>
                                            <p class="col-2">Al</p>
                                            <div class="col-2 controls">
                                                <input type="date" id="fin_porcentaje[]" name="fin_porcentaje[]" class="form-control form-control-sm toupper input-date" autocomplete="off" data-date-format="YYYY-MM-DD" value="2018-01-01">
                                            </div>
                                        </div>                                        
                                        <br>
                                    </div>
                                    
                                </div>

                            <br><br>
                            <?php 
                            if($title=="Edición")
                            {
                            ?> 
                            <table class="table table-sm dataTable" id="tabla_complementos_pago" name="tabla_complementos_pago">
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
                                    <p class="pull-right">¿Cliente con unidades dedicadas?</p>  
                                </div>
                                <div class="col-md-6">
                                    <label class="switch">
                                        <input id="unidades_dedicadas" name="unidades_dedicadas" type="checkbox" <?php if(isset($empleado) && $permisos->permiso_proveedores=="on"){echo "checked"; } ?> onchange="muestraOcultaDivs()">
                                        <span class="sliderN round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 text-center" id="div_unidades_dedicadas1" name="div_unidades_dedicadas1" style="display: none;">                    
                            <h4 class="form-section"><i class="fa fa-truck"></i> Unidades dedicadas</h4>
                                <div class="col-md-12 row">
                                    <p class="col-5"></p>
                                    <div class="col-2 controls">
                                        <button type="button" class="btn btn-raised btn-success btn-min-width mr-1 mb-1" onclick="agregar_unidad()">
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
                                            <div class="col-2 controls">
                                                <input type="text" id="unidad[]" name="unidad[]" class="form-control form-control-sm toupper" >
                                            </div>
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
                            if($title=="Edición")
                            {
                            ?>    
                            <table class="table table-sm dataTable" id="tabla_unidades_dedicadas" name="tabla_unidades_dedicadas">
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
                            <a href="<?php echo base_url(); ?>index.php/empleados" class="btn btn-icon btn-secondary"><i class="ft-chevron-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-danger shadow-z-1 white" style="width: 50%; margin-left: 15%;">Guardar <i class="fa fa-save"></i></button>
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
        // Inializa los input 
        iniciaInputDate();

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
        
        table = $('#tabla_unidades_dedicadas').DataTable({
            "ajax":{ "url": "<?php echo base_url();?>clientes/getUnidadesDedicadas/<?php echo $idCliente; ?>",
            },
            "columns": [
              {"data": "id"},
              {"data": "unidad"},
              {"data": "costo_dia1"},
              {"data": "costo_dia2"},
              {"data": "cliente_id", visible: false},
              {"data":null,title:"Acciones",orderable:false,class:"centrado_text",
                    render:function(data,type,row){
                        var html="<button type='button' class='btn btn-sm btn-icon btn-danger white delete' title='Eliminar' onclick='modalEliminaUnidadDedicada("+row.id+")'><i class='ft-alert-circle'></i></button>";
                        return html;
                    }
                }
            ]
        });

        table2 = $('#tabla_complementos_pago').DataTable({
            "ajax":{ "url": "<?php echo base_url();?>clientes/getComplementosPago/<?php echo $idCliente; ?>",
            },
            "columns": [
              {"data": "id"},
              {"data": "porcentaje_gravado"},
              {"data": "inicio_porcentaje"},
              {"data": "fin_porcentaje"},
              {"data": "cliente_id", visible: false},
              {"data":null,title:"Acciones",orderable:false,class:"centrado_text",
                    render:function(data,type,row){
                        var html="<button type='button' class='btn btn-sm btn-icon btn-danger white delete' title='Eliminar' onclick='modalEliminaComplementoPago("+row.id+")'><i class='ft-alert-circle'></i></button>";
                        return html;
                    }
                }
            ]
        });

        
        table3 = $('#tabla_contactos_cliente').DataTable({
            "ajax":{ "url": "<?php echo base_url();?>clientes/getListadoContactosCliente/<?php echo $idCliente; ?>",
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
                        var html="<button type='button' class='btn btn-sm btn-icon btn-info white edit' title='Editar'><i class='ft-edit'></i></button> <button type='button' class='btn btn-sm btn-icon btn-danger white delete' title='Eliminar' onclick='modalEliminaComplementoPago("+row.id+")'><i class='ft-alert-circle'></i></button>";
                        return html;
                    }
                }
            ],
            lengthMenu: [[-1], ["All"]],
        dom: 'Brt',
        select: 'single',
        responsive: true,
        altEditor: true,
        buttons: [
            { text: '<button type="button" class="btn btn-primary">Editar Registro<i class="icon fa-edit"><i></button>',  name: 'edit'},
            { text: '<button type="button" class="btn btn-danger">Eliminar Registro<i class="icon fa-remove"><i></button>',name: 'delete' }
        ],
        "columnDefs": [
            {
            "targets": [0],//id
            "visible": false,
                "searchable": false
            }
        ]
    }).on('savedata', function(e, accion, pkid, data, rowindex){
        // e          Evento Jquery
        // accion     [add|edit|delete]
        // pkid       Primer campo en la data [id]                ... en add,    retorna null
        // data       Los campos adicionales  [campo_1, campo_n]  ... en delete, retorna null
        // rowindex   El index de la fila para el dataTable       ... en add,    retorna null
        
        $('#altEditor-modal .modal-body .alert').remove();
        $('#altEditor-modal .modal-body').append('<div class="alert alert-info" role="alert"><strong>Subiendo información...</strong></div>');
        // El switch maneja la acción que se desea: Agregar, Editar o Eliminar
        switch(accion)
        {
            /* EL CASO DE AGREGAR NO SE USA EN ESTE EJEMPLO
            case 'add':
                $.ajax('[ruta a enviar los datos a guardar]', {
                    data : $.param({'accion':'add', 'data':JSON.stringify(data)}),
                    type:'POST',
                    success: function(data)
                    {
                        tbl.row.add(data.data).draw(false);
                        
                        $('#altEditor-modal .modal-body .alert').remove();
                        $('#altEditor-modal').modal('hide');
                    },
                    error:function(){}
                });
                break;
            */
            case 'edit':
                $.ajax("<?php echo base_url();?>registros/actualizaTimesheetDetalladoRow2", 
                {
                    // Dependiendo de lo que se elija, se pueden envias los datos de forma "sencilla" o en forma JSON
                    /*data:$.param({'accion':'edit', 'pkid':pkid, 'data':JSON.stringify(data), 'rowindex':rowindex}),*/
                    data:$.param({'accion':'edit', 'pkid':pkid, 'data':data, 'rowindex':rowindex}),
                    type:'POST',
                    success: function(data){
                        // Preferentemente retornar data como JSON
                        // --- data : {data:{id:'new_pkid', campo_1:'', campo_n:''}, rowindex:'$_POST[rowindex]'}
                        // tbl.row(data.rowindex).data(data.data).draw();
                        
                        $('#altEditor-modal .modal-body .alert').remove();
                        alert("Hecho, se regarcará la página");
                    },
                    error:function(){}
                });
                break;
            case 'delete':
                $.ajax("<?php echo base_url();?>registros/actualizaTimesheetDetalladoRow2",
                {
                    data:$.param({'accion':'delete', 'pkid':pkid, 'data':data,'rowindex':rowindex}),
                    type:'POST',
                    success: function(data){
                        // Preferentemente retornar data como JSON
                        // --- data : {rowindex:'$_POST[rowindex]'}
                        // tbl.row(data.rowindex).remove().draw();
                        
                        $('#altEditor-modal .modal-body .alert').remove();
                        alert("Hecho, se regarcará la página");
                    },
                    error:function(){}
                });
                break;
            default:
                $('#altEditor-modal .modal-body .alert').remove();
                $('#altEditor-modal .modal-body').append('<div class="alert alert-danger" role="alert"><strong>Acción "'+accion+'" no autorizada!</strong></div>');
                break;
        }
    });


    $.fn.serializeArrayObj=function(a){$params=this.serializeArray(),$obj={};for($x in $params)$dats=$params[$x],$dats.name=$dats.name.replace("[]",""),"undefined"==typeof $obj[$dats.name]&&($obj[$dats.name]={length:0}),$obj[$dats.name][$obj[$dats.name].length]=$dats.value,$obj[$dats.name].length++;return"undefined"==typeof a&&(a=!0),a&&($obj=JSON.stringify($obj)),$obj};



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
                        url: "<?php echo base_url(); ?>index.php/clientes/insertUpdateCliente",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data==1)
                            {
                                var texto="Se insertó el Cliente";
                                var url="<?php echo base_url(); ?>index.php/clientes";
                                
                                <?php if(isset($cliente)){ // Si es Edicion
                                    echo "texto='Se actualizó el Cliente'; ";
                                    echo "url='".base_url()."index.php/catalogos/edicion_empleado/".$cliente->id."';";
                                } ?>
  
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
                                    <button type="button" onclick="eliminar_contacto($(this))" class="mt-0 mb-0 btn-sm pull-right btn btn-danger"><i class="fa fa-minus"></i></button>\
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

        var $template = $('#Unidad1'),
                            $clone = $template
                            .clone()
                            .show()
                            .removeAttr('id')
                            .attr('id',"Unidad"+no_unidades)
                            .insertAfter($template)
                            .append('<div class="row">\
                                <div class="col-md-12">\
                                    <button type="button" onclick="eliminar_unidad($(this))" class="mt-0 mb-0 btn-sm pull-right btn btn-danger"><i class="fa fa-minus"></i></button>\
                                </div>\
                            </div>')
                            $clone.find("input").val("");
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
                                    <button type="button" onclick="eliminar_complemento($(this))" class="mt-0 mb-0 btn-sm pull-right btn btn-danger"><i class="fa fa-minus"></i></button>\
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
</script>
