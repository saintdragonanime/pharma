<div class="main-content">
 <div class="content-wrapper">
    
        <div class="col-sm-12">
        <?php $title="Alta"; 
            if(isset($incidentes)){
                $title="Edición";
            }
        ?>
            <div class="content-header"><?php echo $title; ?> de Incidentes</div>
        </div>
        <div class="card">
            <div class="card-body">
                    <div class="card-block">
                        <form class="form" id="form-incidentes" method="post" autocomplete="off">
                            <h4 class="form-section"><i class="ft-user"></i> Datos de Incidente</h4>
                           <div class="row">
                                <div class="form-group col-md-12 row">
                                    <p class="col-2">Tipo</p>
                                     <div class="col-8 controls">
                                    
                                    <select name="tipo" class="form-control">
                                        <option value="none" selected="" disabled="">Seleccionar</option>
                              
                                        <option value="1">Conceptos generales</option>
                                        <option value="2">Concepto de incidencia</option>

                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 row">
                                        <p class="col-2">Nombre</p>
                                        <div class="col-8 controls">
                                            <textarea rows="2" name="nombre" class="form-control form-control-sm "  ></textarea>
                                        </div>
                                </div>
                            </div>

                            
                            <br><hr>
                            <div class="row">
                                <button type="submit" class="btn shadow-z-1 white classBotonFratsa" style="width: 40%; margin-left: 30%;">Guardar <i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="card-block">
                       <h5><i class="ft-file-text"></i> Listado de Incidentes</h5><hr>
                       <br><br>
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla_incidentes" style="width: 90%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo</th>
                                    <th>Nombre</th>
                                     <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                        </table>
                    </div>
           </div>
        </div>
 </div>
</div>

 <div id="eliminarModal" class="modal fade" role="dialog">
      <div class="modal-dialog" role="document">

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header white classBotonFratsa">
                <h4 class="modal-title">¡Atención!</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form" id="form_almacen" method="post">
                           <div class="conteiner">
                            <p class="col">¿Desea eliminar el incidente?</p>
                            <p class="col">El cambio será irreversible. Si desea continuar de click en "Aceptar", de lo contrario cierre la ventana.</p>
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

<div id="editarIncidenteModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" >

        <!-- Modal content-->
            <div class="modal-content ">
              <div class="modal-header classBotonFratsa white">
                <h4 class="modal-title">¡Atención!</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                   <!---->
                  <div class="col-md-12">
                           <form class="form" id="from_contacto_cliente" method="post">
                           <div class="conteiner">
                            <p class="col">¿Desea editar Incidente</p>
                           <div class="row">
                                <div class="form-group col-md-12 row">
                                    <p class="col-2">Tipo</p>
                                     <div class="col-8 controls">
                                    
                                    <select id="tipo" name="tipo" class="form-control">
                                        <option value="1">Conceptos generales</option>
                                        <option value="2">Concepto de incidencia</option>

                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 row">
                                        <p class="col-2">Nombre</p>
                                        <div class="col-8 controls">
                                            <input type="text" name="nombre" id="nombre" class="form-control form-control-sm "  >
                                        </div>
                                </div>
                            </div>



                             <div class="modal-footer">
                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="btnEditarIncidente" class="btn btn-outline-danger">Aceptar</button>
                                    
                             </div>         
                            </form>
                     </div>   
       </div>
      </div>
   </div>
 </div>
<script>

     $(document).ready(function () {
    /// Eliminar
      $('#tabla_incidentes').on('click', '.eliminar', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var dato = row.data();
      $('#eliminarModal').modal('show');
          $('#btneliminar').unbind().click(function(){
             var datos = {id:dato.id}; 
               $.ajax({
                type: 'get',
                async: false,
                url: '<?php echo base_url(); ?>index.php/Incidentes/deleteTipo_inicidentes',
                data: datos,
                dataType: 'json',
                success: function(response){
                   if(response.success){
                            $('#eliminarModal').modal('hide');
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
        var table = $('#tabla_incidentes').DataTable({
              "ajax":{
                 url :"<?php echo base_url(); ?>index.php/Incidentes/getData_tipo_incidentes",
               },
              "columns": [
                    {"data": "id"},
                    {"data": "tipo",
                      "render": function ( data, type, row ) {
                                if(data==1)
                                  return "Conceptos generales"; else return "Concepto de incidencia";
                        }
                    }, 
                    {"data": "nombre"},    
                    {"data": "estatus",
                        "render": function ( data, type, row, meta ) {
                                return actions(data);
                        }
                    }
                 ],
                "order": [[ 0, "desc" ]],
                "lengthMenu": [[25, 50, 100], [25, 50, 100]],
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
    return "<button type='button' class='btn btn-sm btn-icon classBotonFratsa white editarIncidente' title='Editar'><i class='ft-edit'></i></button> <button type='button' class='btn btn-sm btn-icon eliminar white classBotonFratsa' data-toggle='modal' data-target='eliminarModal'><i class='ft-trash-2'></i></button>"
    ;




    }
        // VALIDACION  incidete
        $("#form-incidentes").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Incidentes/insertIncidentes",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                         if(data.success){
                         toastr.error("Ya existe incidete. Ingrese otro con nombre diferente");
                         }else{ 
                         $('#form-incidentes')[0].reset();
                         swal("Exito!","se inserto el registro","success");
                          table.ajax.reload();
                        }

                      }
                    }); // fin ajax
                })
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh'
                    },
                    fields: {
                        tipo: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un tipo"
                                }
                            }
                        },
                         nombre: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Nombre"
                                }
                            }
                        }
                    }
                });
                // FIN VALIDADOR


 /// Editar Incidente
      $('#tabla_incidentes').on('click', '.editarIncidente', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var dato = row.data();
            $('#editarIncidenteModal').modal('show');
            $.ajax({
                  type: 'ajax',
                  method: 'get',
                  url: '<?php echo base_url() ?>index.php/Incidentes/edicion_incidente',
                  data: {id:dato.id},
                  async: false,
                  dataType: 'json',
                  success: function(data)
                  {
                    console.log($('#tipo').children()[0].text);
                    console.log($('#tipo').children()[1].text);

                    if(data.tipo==1)
                    {
                       $("#tipo").val("1");
                    }else {
                       $("#tipo").val("2");
                    }

                    $('input[name=nombre]').val(data.nombre); 
                  },
                error: function(jqXHR,estado,error){
                  console.log(jqXHR);
                  console.log(estado);
                  console.log(error);
            }
            });


           //fin ajax
            $('#btnEditarIncidente').unbind().click(function(){
                var tipo = $('#tipo').val();
                var nombre = $('#nombre').val();
                $.ajax({
                type: 'POST',
                async: false,
                url: '<?php echo base_url(); ?>index.php/Incidentes/editarIncidente',
                data:{id:dato.id,tipo:tipo,nombre:nombre},
                dataType: 'json',
                success: function(response){

                        $('#editarIncidenteModal').modal('hide');
                        $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                        toastr.success('Actualizado Correctamente!', 'Hecho');  
                        table.ajax.reload();
                  },
                error: function(jqXHR,estado,error){
                  console.log(jqXHR);
                  console.log(estado);
                  console.log(error);
                }
               });
            });
      });

         
    });

</script>


