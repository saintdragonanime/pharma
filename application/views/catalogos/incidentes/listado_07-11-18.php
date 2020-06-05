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
                        <form class="form" id="form-incidentes" method="post">
                            <h4 class="form-section"><i class="ft-user"></i> Datos de Incidente</h4>
                           <div class="row">
                                <div class="form-group col-md-12 row">
                                    <p class="col-2">Tipo</p>
                                     <div class="col-8 controls">
                                    
                                    <select id="projectinput6" name="tipo" class="form-control">
                                        <option value="none" selected="" disabled="">Seleccionar</option>
                                        <?php if(isset($unidades)){ ?>
                                        <option value="<?php echo $unidades->tipo; ?>" selected=""><?php echo $productos->tipo; ?></option>
                                        <?php } ?>
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
                                            <textarea rows="2" name="nombre" class="form-control form-control-sm "  ><?php if(isset($almacen)){ echo $almacen->nombre;} ?></textarea>
                                        </div>
                                </div>
                            </div>

                            
                            <br><hr>
                            <div class="row">
                                <button type="submit" class="btn btn-danger shadow-z-1 white classBotonFratsa" style="width: 40%; margin-left: 30%;">Guardar <i class="fa fa-save"></i></button>
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
                            <p class="col">¿Desea eliminar el incidente?</p>
                           </div>

                         <br>
                             <div class="modal-footer">
                                    <button type="button" id="btneliminar" class="btn btn-danger shadow-z-1 white" style="width: 35%; margin-left: 33%;">Eliminar <i class="ft-trash-2"></i></button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                             </div>         
                            </form>
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
                "bProcessing": true,
                "serverSide": true,
                "ajax":{
                 url :"<?php echo base_url(); ?>index.php/Incidentes/getData_tipo_incidentes",
                type: "post",  
                    error: function(){
                       $("#tabla_incidentes").css("display","none");
                     }
                  },
            "columns": [
                    {"data": "id"},
                    {"data": "tipo"}, 
                    {"data": "nombre"},    
                    {"data": "id",
                        "render": function ( data, type, row, meta ) {
                                return actions(data);
                        }
                    }
                 ],
                "order": [[ 1, "desc" ]]
            });

    function actions(data){
    return "<button type='button' class='btn btn-sm btn-icon btn-danger white eliminar white classBotonFratsa' data-toggle='modal' data-target='eliminarModal'><i class='ft-trash-2'></i></button>"
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
                        success: function (data) {
                          table.ajax.reload();  
                         $('#form-incidentes')[0].reset();
                         swal("Exito!","se inserto el registro","success");
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
         
    });

</script>


