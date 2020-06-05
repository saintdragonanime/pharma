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
                        <a href="<?php echo base_url(); ?>index.php/unidades/alta" class=" pull-right btn shadow-z-1 white classBotonFratsa"><i class="ft-user-plus"></i> Agregar nueva unidad </a>
                        <br><br>
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Económico</th>
                                    <th>Marca</th>
                                    <th>Vencimiento Póliza</th>
                                    <th>Aseguradora</th>
                                    <th>Fecha servicio</th>
                                    <th>Estatus</th> 
                                    <th>Tipo</th> 
                                    <th>Placas</th> 
                                    <th>Serie</th> 
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
              <div class="modal-header classBotonFratsa white">
                <h4 class="modal-title">Datos de unidad</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                   <!--inicio-->
                 
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form-unidades" method="post">
                        <h4 class="form-section"><i class="ft-user"></i> Datos de Unidades</h4>
                    <div class="row">
                                <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Económico<span class="required">*</span></p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="number" id="economico" name="economico" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Propietario</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="text" id="propietario" name="propietario" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>%</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="number" id="porcentaje" name="porcentaje" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Tipo de vehiculo</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="tipo_vehiculo" name="tipo_vehiculo" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-4">
                                <div class="form-group row">
                                   <div class="col-sm-4">
                                    <p>Modelo<span class="required">*</span></p>
                                    </div>
                                    <div class="col-8 controls">
                                        <input type="text" id="modelo" name="modelo" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group row">
                                   <div class="col-sm-4">
                                    <p >Serie<span class="required">*</span></p>
                                    </div>
                                    <div class="col-8 controls">
                                        <input type="text" id="serie" name="serie" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group row">
                                   <div class="col-sm-4">
                                    <p >Motor<span class="required">*</span></p>
                                    </div>
                                    <div class="col-8 controls">
                                        <input type="text" id="motor" name="motor" class="form-control form-control-sm toupper" disabled>
                                    </div>
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
                                            <input type="text" id="anio" name="anio" class="form-control form-control-sm toupper" disabled>
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
                                        <div class="col-sm-4">
                                            <p>Rastreo</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="rastreo" name="rastreo" class="form-control form-control-sm toupper" disabled>
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
                    </div>

                    <h4 class="form-section"><i class="ft-file-text"></i> Verificación </h4>

                    <div class="row">
                        <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Fecha de expedición</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="exp_verificacion" name="exp_verificacion" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Número de verificación</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="num_verificacion" name="num_verificacion" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p >Verificación</p>
                                        </div>
                                        <div class="col-sm-7">
                                             <p id="verificacion"></p>
                                        </div>
                                   </div>
                            </div>
                    </div>

                    <h4 class="form-section"><i class="ft-file-text"></i> Fisico mecánica </h4>
                    <div class="row">
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
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p>Fisicomecánica</p>
                                        </div>
                                        <div class="col-sm-7">
                                           <p id="fisicomecanica"></p> 
                                        </div>
                                    </div>
                            </div>                              
                    </div>

                    <h4 class="form-section"><i class="ft-file-text"></i> Servicio </h4>
                    <div class="row">
                            <!--
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
                            -->
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Fecha actual de servicio</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="fecha_actual" name="fecha_actual" class="form-control form-control-sm toupper"  disabled>
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
                     </div>  
                     <h4 class="form-section"><i class="ft-file-text"></i> Poliza de seguro </h4>
                     <div class="row">
                            <div class="col-8">
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                    <p >Número de poliza</p>
                                    </div>
                                    <div class="col-10 controls">
                                    <input type="text" id="no_poliza" name="no_poliza" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <p >Poliza</p>
                                        </div>
                                        <div class="col-sm-7">
                                             <p id="poliza"></p>
                                        </div>
                                   </div>
                            </div>
                    </div>


                    <div class="row">
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
                                        <div class="col-sm-4">
                                            <p>Vencimiento</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="poliza_venc" name="poliza_venc" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                    
                    </div>
                   
                    
                    <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                    <div class="col-sm-4">
                                    <p >Aseguradora</p>
                                    </div>
                                    <div class="col-8 controls">
                                        <input type="text" id="aseguradora" name="aseguradora" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Suma asegurada</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="number" step="any" id="suma_asegurada" name="suma_asegurada" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Importe a pagar</p>
                                        </div>
                                        <div class="col-sm-8">
                                             <input type="number" step="any" id="importe_pagar" name="importe_pagar" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                    </div>
                
                     <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                    <div class="col-sm-4">
                                    <p >Inciso poliza</p>
                                    </div>
                                    <div class="col-8 controls">
                                        <input type="text" id="inciso_poliza" name="inciso_poliza" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                    <div class="col-sm-4">
                                    <p >Estatus</p>
                                     </div>
                                    <div class="col-8 controls">
                                        <input type="text" id="poliza_estatus" name="poliza_estatus" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <p>Fecha estatus</p>
                                        </div>
                                        <div class="col-sm-8">
                                           <input type="date" id="fecha_estatus" name="fecha_estatus" class="form-control form-control-sm toupper" disabled>
                                        </div>
                                    </div>
                            </div>
                    </div>
     
                     <div class="row">
                            <div class="col-4">
                                    <div class="form-group row">
                                    <div class="col-sm-4">
                                    <p >Capacidad</p>
                                    </div>
                                    <div class="col-8 controls">
                                        <input type="text" id="capacidad" name="capacidad" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                    </div>
                            </div>
                             <div class="col-4">
                                    <div class="form-group row">
                                    <div class="col-sm-4">
                                    <p >Kilometraje</p>
                                    </div>
                                    <div class="col-8 controls">
                                         <input type="number" step="any" id="kilometraje" name="kilometraje" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-4">
                                    <div class="form-group row">
                                    <div class="col-sm-4">
                                    <p >Rendimiento</p>
                                    </div>
                                    <div class="col-8 controls">
                                        <input type="text" id="rendimiento" name="rendimiento" class="form-control form-control-sm toupper" disabled>
                                    </div>
                                    </div>
                            </div>
                    </div>
                        <br>
                        <div class="modal-footer">
                       <button type="button" class="btn btn-default btn-secondary" style="background-color: gray;" data-dismiss="modal">Cerrar</button>
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
              <div class="modal-header classBotonFratsa white">
                <h4 class="modal-title">¡Atención!</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
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
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="btnsuspender" class="btn btn-outline-danger">Aceptar</button>
                             </div>         
                            </form>
                     </div>   
       </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
      var table = $('#tabla').DataTable({
                /*
                "bProcessing": true,
                "serverSide": true,
                */
                "ajax":{
                 url :"<?php echo base_url(); ?>index.php/Unidades/getData_Unidades",
                type: "post",  
                    error: function(){
                       $("#tabla").css("display","none");
                     }
                  },
            "columns": [
                    {"data": "id", visible: false},
                    {"data": "economico",
                        render:function(data,type,row){
                            var econom=row.economico;
                            return Math.trunc(econom);
                        }}, 
                    {"data": "marca"},
                    {"data": "poliza_venc",
                        render:function(data,type,row){
                            var html=row.fecha_estatus;
                            var res = html.split("-");
                            var res2 = res[2]+'-'+res[1]+'-'+res[0];
                            return res2;
                        }
                    },
                    {"data": "aseguradora"},
                    {"data": "fecha_estatus",
                        render:function(data,type,row){
                            var html=row.fecha_estatus;
                            var res = html.split("-");
                            var res2 = res[2]+'-'+res[1]+'-'+res[0];
                            return res2;
                        }
                    },
                    {"data": "estatus"},
                    {"data": "tipo_vehiculo"},
                    {"data": "placas"},
                    {"data": "serie"},
                    {"data": "estatus", class: "uniqueClassCenter",
                    "render": function (data, type, row, meta ) {    
                                return actions(data);
                    }
                    }
                 ],
                "order": [[ 0, "desc" ]],
                "lengthMenu": [[25, 50, 100], [25, 50, 100]],
                "dom": 'Bfrtpl',
                // Muestra el botón de Excel para importar la tabla
                "buttons": [
                    {   
                        extend: 'excelHtml5',
                        text: ' Descargar Excel <i class="fa fa-download"></i>',
                        className: 'btn classBotonFratsa'
                    }
                ],
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

     function actions(data){
       var opcion = "";
        if(data=='Activo'){    
        opcion = '<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender white classBotonFratsa" data-title="Suspender"> <i class="fa fa-times"></i> </a>';
        } else{
        opcion = '<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default activar white classBotonFratsa" data-title="Activar"> <i class="material-icons">done</i> </a>';
        }

     var btn='<div class="menu pmd-floating-action" role="navigation"  ><a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default edit classBotonFratsa white" data-title="Editar"> <i class="material-icons">edit</i></a>  <a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default visual white classBotonFratsa" data-title="Visualizar"><i class="material-icons">find_in_page</i></a>'+opcion+' <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary white classBotonFratsa" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>'; 
      /*

           var opcion = "";
        if(data=='Activo'){    
        opcion = '<button style="background-color:yellow" type="button" class="btn btn-sm btn-info dropdown-item suspender" ><i class="ft-folder"></i> Suspender</button>';
        } else{
        opcion = '<button style="background-color:#1CBCD8;" type="button" class="dropdown-item activar" >Activar</button>';
        }

    var btn='<div class="btn-group ml-1 mb-0">\
                <button type="button" class="btn btn-sm btn-info mr-1  dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-bars"></i></button>\
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">\ <a style="background-color:#80CED0;" class="dropdown-item edit">Editar</a>\ <button type="button" class="dropdown-item visual" >Visualizar</button>\
                    '+opcion+'\
                </div>\
            </div>';
*/            
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
             if (dat == "") {
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
 // Visualizar 
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
          $('#tarjeta_circulacion').html('<p class="btn btn-sm btn-secondary" style="background-color: gray;><i class="ft-forder"></i> No existe</p>')
          }else{
          $('#tarjeta_circulacion').html('<a href="<?php echo base_url();?>uploads/unidades/'+data.id+'/'+data.tarjeta_circulacion+'" class="btn btn-sm btn-info" target="_blank" ><i class="ft-folder"></i> Archivo</a>');
          }
          $('input[name=color]').val(data.color);
          $('input[name=rastreo]').val(data.rastreo);
          $('input[name=exp_verificacion]').val(data.exp_verificacion);
          $('input[name=num_verificacion]').val(data.num_verificacion);
          if(data.verificacion == ""){
          $('#verificacion').html('<p class="btn btn-sm btn-secondary" style="background-color: gray;><i class="ft-folder"></i> No existe</p>');
          }else{
          $('#verificacion').html('<a href="<?php echo base_url();?>uploads/unidades/'+data.id+'/'+data.verificacion+'" class="btn btn-sm btn-info" target="_blank"><i class="ft-folder"></i> Archivo</a>');
          }
          $('input[name=rastreo]').val(data.rastreo);
          if(data.fisicomecanica == ""){
          $('#fisicomecanica').html('<p class="btn btn-sm btn-secondary" style="background-color: gray;><i class="ft-folder"></i> No existe</p>');
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
          $('#poliza').html('<p class="btn btn-sm btn-secondary" style="background-color: gray;"><i class="ft-folder"></i> No existe</p>'); 
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
          $('input[name=motivo]').val(data.motivo);
          },


          error: function(){
            alert('no se muestran los datos');
          }
      });
      });   
   });
    
   

</script>
