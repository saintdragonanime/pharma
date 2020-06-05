<div class="main-content">
    <div class="content-wrapper">
        <section class="color-palette">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header mb-3">Catálogo de Almacen</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h5><i class="ft-file-text"></i> Listado de Almacen</h5><hr>
                        <a href="<?php echo base_url(); ?>index.php/almacen/alta" class=" pull-right btn shadow-z-1 white classBotonFratsa"><i class="ft-user-plus"></i> Agregar nueva refacción o productos </a><br>
                        
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla_producto" style="width:98%">
                            <thead>
                                <tr>
                                    
                                    
                                    <th>#</th>
                                    <th>Tipo</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Clave</th>
                                    <th>Ubicación</th>
                                    <th>Precio</th>
                                    <th>Existencias</th>
                                    <th>Aciones</th>
                               
                                </tr>
                            </thead>
                            <tbody >
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div id="eliminarModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header classBotonFratsa white">
                <h4 class="modal-title">¡Atención!</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form" id="form_almacen" method="post">
                           <div class="conteiner">
                            <p class="col">¿Desea eliminar el producto?</p>
                            <p class="col">El cambio será irreversible. Si desea continuar de click en "Aceptar", de lo contrario cierre la ventana.</p>
                            <div class="col-12 controls">
                             <textarea rows="2" id="motivo" name="motivo" class="form-control form-control-sm toupper" placeholder="Motivo de eliminación" ></textarea>
                            </div>
                           </div>

                         <br>
                             <div class="modal-footer">
                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="btneliminar" class="btn btn-outline-danger">Aceptar</button>
                                    
                             </div>         
                            </form>
                     </div>   
       </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      
      var table = $('#tabla_producto').DataTable({
                /*
                "bProcessing": true,
                "serverSide": true,
                */
                "ajax":{
                 url :"<?php echo base_url(); ?>index.php/Almacen/getData_producto",
                type: "post",  
                    error: function(){
                       $("#tabla_producto").css("display","none");
                     }
                  },
            "columns": [
                    {"data": "id"},
                    {"data": "tipo"}, 
                    {"data": "nombre"},
                    {"data": "descripcion"},
                    {"data": "serie"},
                    {"data": "ubicacion"},
                    {"data": "costo"},
                    {"data": "stock"}, 
                    {"data": "id",
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

 //Listener para edicion
        $('#tabla_producto').on('click', 'a.edit', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = '<?php echo base_url(); ?>index.php/Almacen/edicion_producto/'+data.id;
        });
 // Visuaizar 
        $('#tabla_producto').on('click', 'a.visualizar', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = '<?php echo base_url(); ?>index.php/Almacen/edicion_producto_visualiza/'+data.id;
        });      
      /// Eliminar
      $('#tabla_producto').on('click', '.eliminar', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var dato = row.data();
      $('#eliminarModal').modal('show');
          $('#btneliminar').unbind().click(function(){
             var dat = $('#motivo').val();
             var datos = {id:dato.id,motivo:dat}; 
             if (dat=="") {
              toastr.error("Por favor ponga un motivo");
             }else{
               $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo base_url(); ?>index.php/Almacen/eliminarProducto',
                data: datos,
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        $('#eliminarModal').modal('hide');
                        $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
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
   });

    function actions(data){

      var btn='<div class="menu pmd-floating-action" role="navigation"  ><a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default edit white classBotonFratsa" data-title="Editar"> <i class="material-icons">edit</i></a>  <a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default visualizar white classBotonFratsa" data-title="Visualizar"><i class="material-icons">find_in_page</i></a> </a><a class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary white classBotonFratsa" data-title="Menu" href="javascript:void(0);"><i class="material-icons pmd-sm">reorder</i>  </a> </div>'; 
      return btn;

    
    }
    </script>