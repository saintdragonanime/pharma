<style >
.uniqueClassCenter{
    text-align: center;
}
</style>
    <div class="main-content">
        <div class="content-wrapper">
        <section class="color-palette">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header mb-3">Catálogo de Unidades</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h5><i class="ft-file-text"></i> Listado de Unidades</h5><hr>
                        <a href="<?php echo base_url(); ?>index.php/unidades/alta" class=" pull-right btn btn-danger shadow-z-1 white"><i class="ft-user-plus"></i> Agregar nueva unidad </a>
                        <br><br>
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de vehiculo</th>
                                    <th>Marca</th>
                                    <th>Vencimiento Póliza</th>
                                    <th>Aseguradora</th>
                                    <th>Fecha servicio</th>
                                    <th>Estatus</th> 
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div id="visualModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header">
                <h4 class="modal-title">Datos de unidad</h4>
              </div>
                   <!--inicio-->
                 
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form-unidades" method="post">
                        <h4 class="form-section"><i class="ft-user"></i> Datos de Unidades</h4>
                    <div class="row">
                                <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Económico<span class="required">*</span></p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="number" id="economico" name="economico" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <p>Propietario</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <select id="propietario" name="propietario" class="form-control" disabled="">
                                                <option selected="" disabled="">Seleccionar</option>
                                                <option  value="Fratsa">Fratsa</option>
                                                <option value="Permisionario">Permisionario</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                 <div class="col-2">
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <p>%</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="number" id="porcentaje" name="porcentaje" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Tipo de vehiculo</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <select id="tipo_vehiculo" name="tipo_vehiculo" class="form-control" disabled>
                                                <option value="none" selected="" disabled="">Seleccionar</option>
                                                <option value="Tractor">Tractor</option>
                                                <option value="Plataforma">Plataforma</option>
                                                <option value="Dolly">Dolly</option>
                                               <option value="Camioneta">Camioneta</option>
                                            </select>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Modelo<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="modelo" name="modelo" class="form-control form-control-sm toupper" disabled>
                                    </div>
                            </div>
                     </div>

                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Serie<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="serie" name="serie" class="form-control form-control-sm toupper" disabled>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Motor<span class="required">*</span></p>
                                    <div class="col-9 controls">
                                        <input type="text" id="motor" name="motor" class="form-control form-control-sm toupper" disabled>
                                    </div>
                            </div>
                        </div>
                   
                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Año</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="anio" name="anio" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                     
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Placas</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="placas" name="placas" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Ejes</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="ejes" name="ejes" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                     </div>       
                     <div class="row">    
                           <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Marca</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="marca" name="marca" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                             </div>
                          
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p >Tarjeta de circulación</p>
                                        </div>
                                        <div class="col-sm-7">
                                             <p id="tarjeta_circulacion"></p>
                                        </div>
                                   </div>
                            </div>
                           
                     </div>  
                  </div>  
                    <div class="row">
                           <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Color</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="text" id="color" name="color" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Rastreo</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="rastreo" name="rastreo" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                    </div>
                   
                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <p>Fisicomecánica</p>
                                        </div>
                                        <div class="col-sm-3">
                                           <p id="fisicomecanica"></p> 
                                        </div>
                                    </div>
                            </div>
                             
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Expedición</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="fisicomecanica_exp" name="fisicomecanica_exp" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Vencimiento</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="fisicomecanica_venc" name="fisicomecanica_venc" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                    
                    </div>
                        
                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Proxima verificación</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="verificacion_proxima" name="verificacion_proxima" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Proximo servicio</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="servicio_proximo" name="servicio_proximo" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Fecha actual de servicio</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="fecha_actual" name="fecha_actual" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                     </div>       
                      
                    <h4 class="form-section"><i class="ft-file-text"></i> Poliza de seguro </h4>

                    <div class="row">
                        <div class="form-group col-md-11 row">
                                <p class="col-2">Número de poliza</p>
                                <div class="col-9 controls">
                                    <input type="number" id="no_poliza" name="no_poliza" class="form-control form-control-sm toupper" disabled>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-3">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Poliza</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p id="poliza"></p>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Expedición</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="poliza_exp" name="poliza_exp" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Vencimiento</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" name="poliza_venc" name="poliza_venc" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Suma asegurada</p>
                                        </div>
                                        <div class="col-sm-7">
                                           <input type="number" id="suma_asegurada" name="suma_asegurada" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Importe a pagar</p>
                                        </div>
                                        <div class="col-sm-8">
                                             <input type="number" id="importe_pagar" name="importe_pagar" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                    </div>
                
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Aseguradora</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="aseguradora" name="aseguradora" class="form-control form-control-sm toupper" disabled>
                                    </div>
                            </div>
                     </div>
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Inciso poliza</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="inciso_poliza" name="inciso_poliza" class="form-control form-control-sm toupper" disabled>
                                    </div>
                            </div>
                     </div>
                     <div class="row">
                            <div class="form-group col-md-11 row">
                                    <p class="col-2">Estatus</p>
                                    <div class="col-9 controls">
                                        <input type="text" id="poliza_estatus" name="poliza_estatus" class="form-control form-control-sm toupper" disabled >
                                    </div>
                            </div>
                     </div>

                    <div class="row">
                         <div class="col-5">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Fecha estatus</p>
                                        </div>
                                        <div class="col-sm-7">
                                           <input type="date" id="fecha_estatus" name="fecha_estatus" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                        </div>
                    </div>
     
                     <div class="row">
                            <div class="form-group col-md-4 row">
                                    <p class="col-6 ">Capacidad</p>
                                    <div class="col-6 controls">
                                        <input type="text" id="capacidad" name="capacidad" class="form-control form-control-sm toupper"  disabled>
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Kilometraje</p>
                                    <div class="col-6 controls">
                                         <input type="number" id="kilometraje" name="kilometraje" class="form-control form-control-sm toupper" disabled>
                                    </div>
                            </div>
                            <div class="form-group col-md-4 row">
                                    <p class="col-5">Rendimiento</p>
                                    <div class="col-7 controls">
                                        <input type="text" id="rendimiento" name="rendimiento" class="form-control form-control-sm toupper" disabled>
                                    </div>
                            </div>
                    </div>
                    
                        <br>
                        <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                       </div>
                    </form>
                </div>
               </div>
            
                  <!--fin-->
             </div>
      </div>
</div>

          
<div id="suspenderModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header">
                <h4 class="modal-title">¡Atención!</h4>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form" id="form_almacen" method="post">
                           <div class="conteiner">
                            <p class="col">¿Desea suspender la unidad?</p>
                            <div class="col-12 controls">
                             <textarea rows="2" id="motivo" name="motivo" class="form-control form-control-sm toupper" placeholder="Motivo de la suspención" ></textarea>
                            </div>
                           </div>

                         <br>
                             <div class="modal-footer">
                                    <button type="button" id="btnsuspender" class="btn btn-danger shadow-z-1 white" style="width: 35%; margin-left: 33%;">Suspender <i class="ft-trash-2"></i></button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                             </div>         
                            </form>
                     </div>   
       </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
      var table = $('#tabla').DataTable({
                "bProcessing": true,
                "serverSide": true,
                "ajax":{
                 url :"<?php echo base_url(); ?>index.php/Unidades/getData_Unidades",
                type: "post",  
                    error: function(){
                       $("#tabla").css("display","none");
                     }
                  },
            "columns": [
                    {"data": "id"},
                    {"data": "tipo_vehiculo"}, 
                    {"data": "marca"},
                    {"data": "poliza_venc"},
                    {"data": "aseguradora"},
                    {"data": "fecha_estatus"},
                    {"data": "estatus"},
                    {"data": "estatus", class: "uniqueClassCenter",
                    "render": function (data, type, row, meta ) {    
                                return actions(data);
                    }
                    }
                 ],
                "order": [[ 1, "desc" ]]

            });

     function actions(data){
       var opcion = "";
        if(data=='Activo'){    
        opcion = '<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender" data-title="Suspender"> <i class="material-icons">highlight_off</i> </a>';
        } else{
        opcion = '<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default activar" data-title="Activar"> <i class="material-icons">done</i> </a>';
        }

     var btn='<div class="menu pmd-floating-action" role="navigation"  ><a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default edit" data-title="Editar"> <i class="material-icons">edit</i></a>  <a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default visual" data-title="Visualizar"><i class="material-icons">find_in_page</i></a>'+opcion+' <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>'; 
               
     return btn;    
    }
 

 //Listener para edicion
        $('#tabla').on('click', 'a.edit', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = '<?php echo base_url(); ?>index.php/Unidades/edicion_unidades/'+data.id;
        });

      $('#tabla').on('click', 'a.suspender', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var dato = row.data();
      $('#suspenderModal').modal('show');
          $('#btnsuspender').unbind().click(function(){
             var dat = $('#motivo').val();
             var datos = {id:dato.id,motivo:dat}; 
             if (dat=="") {
              toastr.error("Por favor ponga un motivo");
             }else{
               $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo base_url(); ?>index.php/Unidades/suspender_unidades',
                data: datos,
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        $('#suspenderModal').modal('hide');
                        $('.alert-success').html('unidades Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
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
               }
          });
      });

// Activar 
  $('#tabla').on('click', 'a.activar', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var dato = row.data();
            $.ajax({
             type: 'POST',
                async: false,
                url: '<?php echo base_url(); ?>index.php/Unidades/activar_unidades',
                data: {id:dato.id},
                dataType: 'json',
                success: function(response){
                    if(response.success){
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
 // Visuaizar 
        $('#tabla').on('click', 'a.visual', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var dato = row.data();
      $('#visualModal').modal('show'); 
          $.ajax({
          type: 'ajax',
          method: 'get',
          url: '<?php echo base_url() ?>index.php/Unidades/visual_unidad',
          data: {id:dato.id},
          async: false,
          dataType: 'json',
          success: function(data)
          {
            
          $('input[name=economico]').val(data.economico); 
          if(data.propietario == 'Fratsa')
           {
            $("#propietario").val('Fratsa');
           }
          if(data.propietario == 'Permisionario')
           {
            $("#propietario").val('Permisionario');
           } 
          $('input[name=propietario]').val(data.propietario); 
          $('input[name=porcentaje]').val(data.porcentaje);
          $('input[name=tipo_vehiculo]').val(data.tipo_vehiculo);
          if(data.tipo_vehiculo == 'Tractor')
           {
            $("#tipo_vehiculo").val('Tractor');
           }
          if(data.tipo_vehiculo == 'Plataforma')
           {
            $("#tipo_vehiculo").val('Plataforma');
           }
          if(data.tipo_vehiculo == 'Dolly')
           {
            $("#tipo_vehiculo").val('Dolly');
           }
          if(data.tipo_vehiculo == 'Camioneta')
           {
            $("#tipo_vehiculo").val('Camioneta');
           }
          $('')  
          $('input[name=modelo]').val(data.modelo);
          $('input[name=serie]').val(data.serie);
          $('input[name=motor]').val(data.motor);
          $('input[name=anio]').val(data.anio);
          $('input[name=placas]').val(data.placas);
          $('input[name=ejes]').val(data.ejes);
          $('input[name=marca]').val(data.marca); 
          if(data.tarjeta_circulacion == ""){
          $('#tarjeta_circulacion').html('<p class="btn btn-sm btn-secondary"><i class="ft-forder"></i> No existe</p>')
          }else{
          $('#tarjeta_circulacion').html('<a href="<?php echo base_url();?>uploads/unidades/'+data.id+'/'+data.tarjeta_circulacion+'" class="btn btn-sm btn-info" target="_blank" ><i class="ft-folder"></i> Archivo</a>');
          }
          $('input[name=color]').val(data.color);
          $('input[name=rastreo]').val(data.rastreo);
          if(data.fisicomecanica == ""){
          $('#fisicomecanica').html('<p class="btn btn-sm btn-secondary"><i class="ft-folder"></i> No existe</p>');
          }else{
          $('#fisicomecanica').html('<a href="<?php echo base_url();?>uploads/unidades/'+data.id+'/'+data.fisicomecanica+'" class="btn btn-sm btn-info" target="_blank"><i class="ft-folder"></i> Archivo</a>');
          }
          $('input[name=fisicomecanica_exp]').val(data.fisicomecanica_exp);
          $('input[name=fisicomecanica_venc]').val(data.fisicomecanica_venc);
          $('input[name=verificacion_proxima]').val(data.verificacion_proxima);
          $('input[name=servicio_proximo]').val(data.servicio_proximo);
          $('input[name=fecha_actual]').val(data.fecha_actual);
          $('input[name=no_poliza]').val(data.no_poliza);
          if(data.poliza == ""){
          $('#poliza').html('<p class="btn btn-sm btn-secondary"><i class="ft-folder"></i> No existe</p>'); 
          } else{
          $('#poliza').html('<a href="<?php echo base_url();?>uploads/unidades/'+data.id+'/'+data.poliza+'" class="btn btn-sm btn-info" target="_blank"><i class="ft-folder"></i> Archivo</a>');
          }
          $('input[name=color]').val(data.color);
          $('input[name=poliza_exp]').val(data.poliza_exp);
          $('input[name=poliza_venc]').val(data.poliza_venc);
          $('input[name=suma_asegurada]').val(data.suma_asegurada);
          $('input[name=importe_pagar]').val(data.importe_pagar);
          $('input[name=aseguradora]').val(data.aseguradora);
          $('input[name=inciso_poliza]').val(data.inciso_poliza);
          $('input[name=poliza_estatus]').val(data.poliza_estatus);
          $('input[name=fecha_estatus]').val(data.fecha_estatus);
          $('input[name=capacidad').val(data.capacidad);
          $('input[name=kilometraje]').val(data.kilometraje);
          $('input[name=rendimiento]').val(data.rendimiento);
          },
          error: function(){
            alert('no se muestran los datos');
          }
      });
      });   
   });
    
   

</script>
