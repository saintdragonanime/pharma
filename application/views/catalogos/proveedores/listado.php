<div class="main-content">
    <div class="content-wrapper">
        <section class="color-palette">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header mb-3">Catálogo de Proveedores</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h5><i class="ft-file-text"></i> Listado de Proveedores</h5><hr>
                        <a href="<?php echo base_url(); ?>index.php/proveedores/alta" class=" pull-right btn shadow-z-1 white classBotonFratsa"><i class="ft-user-plus"></i> Agregar Proveedor </a><br><br>
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla"  style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo</th>
                                    <th>Razón Social</th>
                                    <th>RFC</th>
                                    <th>Persona de Contacto</th>
                                    <th>Teléfono</th>
                                    <th>Condiciones de pago</th>
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

<div id="suspenderModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header classBotonFratsa white" >
                <h4 class="modal-title">¡Atención!</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form" id="form_almacen" method="post">
                           <div class="conteiner">
                            <p class="col">¿Desea suspender el proveedor?</p>
                            <div class="col-12 controls">
                             <textarea rows="2" id="motivo" name="motivo" class="form-control form-control-sm toupper" placeholder="Motivo de la suspención" ></textarea>
                            </div>
                           </div>

                         <br>
                             <div class="modal-footer">
                                    <button type="button" id="btnsuspender" class="btn btn-danger shadow-z-1 classBotonFratsa white" style="width: 35%; margin-left: 33%;">Suspender <i class="ft-trash-2"></i></button>
                                    <button type="button" style="background-color:gray;" class="btn btn-default btn-secondary" data-dismiss="modal">Cerrar</button>
                             </div>         
                            </form>
                     </div>   
       </div>
  </div>
</div>


<script>

$(document).ready(function() {
      var table = $('#tabla').DataTable({
                /*
                "bProcessing": true,
                "serverSide": true,
                */
                "ajax":{
                 url :"<?php echo base_url(); ?>index.php/proveedores/getProveedores",
                type: "post",  
                    error: function(){
                       $("#tabla").css("display","none");
                     }
                  },
            "columns": [
                {"data": "id"},
                {"data": "tipo_proveedor"},
                {"data": "razon_social"},
                {"data": "rfc"},
                {"data": "persona_contacto"},
                {"data": "telefono1"},
                {"data": "condicion_pago"},
                {"data": "estatus"},                
                {"data": "estatus",
                        "render": function ( data, type, row, meta ) {
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
   // return "<div class='btn-group mr-1 mb-1'> <div class='fonticon-wrap'><button type='button' class='btn btn-sm btn-icon btn-info mr-1' data-toggle='dropdown'><i class='fa fa-list-alt'></i></button> <div class='dropdown-menu'><a class='dropdown-item edit'>Editar</a><a class='dropdown-item suspender' >Suspender</a></div>";
     
      var opcion = "";
        if(data=='Activo'){    
        opcion = '<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default suspender classBotonFratsa white" data-title="Suspender"> <i class="material-icons">highlight_off</i> </a>';
        } else{
       opcion = '<a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default activar classBotonFratsa white" data-title="Activar"> <i class="material-icons">done</i> </a>';
        }

     var btn='<div class="menu pmd-floating-action" role="navigation"  ><a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default edit classBotonFratsa white" data-title="Editar"> <i class="material-icons">edit</i></a><a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default visualiza white classBotonFratsa" data-title="Visualizar"><i class="material-icons">find_in_page</i></a>'+opcion+' <a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary classBotonFratsa" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>'; 

      return btn; 

    }

 //Listener para edicion
        $('#tabla').on('click', 'a.edit', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = '<?php echo base_url(); ?>index.php/Proveedores/edicion_proveedores/'+data.id;
        });

        // Listener para Visualizar 
        $('#tabla tbody').on('click', 'a.visualiza', function () 
        {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = '<?php echo base_url(); ?>index.php/Proveedores/visualizar_proveedores/'+data.id;
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
                url: '<?php echo base_url(); ?>index.php/Proveedores/suspender_proveedor',
                data: datos,
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        $('#suspenderModal').modal('hide');
                        $('.alert-success').html('proveedor Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
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
                url: '<?php echo base_url(); ?>index.php/Proveedores/activar_proveedor',
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

});


</script>