<style type="text/css">
    .card-title {font-weight:700;} 
</style>


<div class="main-content">
   <div class="content-wrapper"><!-- input groups start -->

       <div class="row">
        <div class="col-sm-12">
         <div class="content-header">Configuraciones</div>
     </div>
 </div>

 <section class="sizing-input-group" id="input-group-sizing">

  <div class="row">
     <div class="col-lg-12 col-xl-6">
         <div class="card collapse-icon accordion-icon-rotate"> 
            <div id="headingCollapse12"  class="card-header">
                <a data-toggle="collapse" href="#collapse12" aria-expanded="false" aria-controls="collapse12" style="font-weight:700" class="card-title black ">Puestos</a>
            </div>
            <div id="collapse12" role="tabpanel" aria-labelledby="headingCollapse12" class="collapse" aria-expanded="false">
               <div class="card-body">
                <div class="col-md-12">
                   <form id="form-puestos" method="post" class="form-horizontal" autocomplete="off">
                    <div class="form-group row">
                        <p class="col-4">Número de puesto</p>
                        <div class="col-6 controls">
                            <input type="text" id="txt_puesto" name="nombre" class="form-control form-control-sm toupper" required>
                        </div>
                        <div class="col-2">
                            <button type="submit"  class="btn  classBotonFratsa white"><i class="fa fa-plus"></i></button>
                        </div> 
                    </div>
                </form>
            </div>
            <div class="card-block"> 
                <div style="overflow-y: scroll; height: 200px;">   
                    <table class="table table-striped table-condensed table-hover table-responsive"  id="tb_puesto">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Dato</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tabla_puesto">
                            <?php
                            foreach ($puestos as $p) {
                                echo " <tr>
                                <td></td>
                                <td>$p->nombre</td>
                                <td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_puesto($(this))'></button></td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>
</div>

<div class="col-lg-12 col-xl-6">
 <div class="card collapse-icon accordion-icon-rotate left">
    <div id="headingCollapse13"  class="card-header">
        <a data-toggle="collapse" href="#collapse13" aria-expanded="false" aria-controls="collapse13" class="card-title black ">Unidades de medida</a>
    </div>
    <div id="collapse13" role="tabpanel" aria-labelledby="headingCollapse13" class="collapse" aria-expanded="false">
      <div class="card-body">
       <div class="col-md-12">
          <form class="form" id="form-unidad_medida" method="post" autocomplete="off">
            <div class="form-group row">
                <p class="col-4">Unidades de medida</p>
                <div class="col-6 controls">
                   <input type="text" id="txt_unidad_medida" name="nombre" class="form-control form-control-sm toupper" required>
               </div>
               <div class="col-2">
                <button type="submit"  class="btn  classBotonFratsa white" ><i class="fa fa-plus"></i></button>
            </div>

        </div>
    </form>
</div>
<div class="card-block">  
    <div style="overflow-y: scroll; height: 200px;">   
        <table class="table table-striped table-condensed table-hover table-responsive" id="tb_unidad">
            <thead>
                <tr>
                    <th></th>
                    <th>Dato</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tabla_unidad">
                <?php
                foreach ($unidades_medida as $u) {
                    echo " <tr>
                    <td></td>
                    <td>$u->nombre</td>
                    <td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_unidad_medida($(this))'></button></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>      
</div>
</div>	

</section>
<!----vvvvvvvvvvvvvvvvvvvvvvvvvvvvv-->	

<!----vvvvvvvvvvvvvvvvvvvvvvvvvvvvv-->	

<section class="sizing-input-group" id="input-group-sizing">
	
  <div class="row">
     <div class="col-lg-12 col-xl-6">
         <div class="card collapse-icon accordion-icon-rotate"> 
            <div id="headingCollapse16"  class="card-header">
                <a data-toggle="collapse" href="#collapse16" aria-expanded="false" aria-controls="collapse16" class="card-title black">Tipo de proveedor</a>
            </div>
            <div id="collapse16" role="tabpanel" aria-labelledby="headingCollapse16" class="collapse" aria-expanded="false">
               <div class="card-body">
                <div class="col-md-12">
                    <form class="form" id="form-proveedor" method="post" autocomplete="off">
                        <div class="form-group row">
                            <p class="col-4">Tipo de proveedor</p>
                            <div class="col-6 controls">
                                <input type="text" id="txt_contacto" name="nombre" class="form-control form-control-sm toupper" required>
                            </div>
                            <div class="col-2">
                                <button type="submit"  class="btn  classBotonFratsa white"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-block">  
                    <div style="overflow-y: scroll; height: 200px;">   
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Dato</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tabla_contacto">
                             <?php
                             foreach ($tipo_contacto as $t) {
                                echo " <tr>
                                <td></td>
                                <td>$t->nombre</td>
                                <td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_contacto($(this))'></button></td>
                                </tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>
</div>
<div class="col-lg-12 col-xl-6">
 <div class="card collapse-icon accordion-icon-rotate left">
    <div id="headingCollapse17"  class="card-header">
        <a data-toggle="collapse" href="#collapse17" aria-expanded="false" aria-controls="collapse17" class="card-title black">Cuentas</a>
    </div>
    <div id="collapse17" role="tabpanel" aria-labelledby="headingCollapse17" class="collapse" aria-expanded="false">
      <div class="card-body">
       <div class="col-md-12">
          <form class="form" id="form-cuenta" method="post" autocomplete="off">
            <div class="form-group row">

                <p class="col-4">Cuenta</p>
                <div class="col-6 controls">
                   <input type="text" id="txt_cuenta" name="nombre" class="form-control form-control-sm toupper" required>
               </div>
               <div class="col-2">
                <button type="submit"  class="btn  classBotonFratsa white"><i class="fa fa-plus"></i></button>
            </div>    
        </div>
    </form>
</div>
<div class="card-block">  
  <div style="overflow-y: scroll; height: 200px;">     
    <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
        <thead>
            <tr>
                <th></th>
                <th>Dato</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tabla_cuentas">
         <?php
         foreach ($cuentas as $c) {
            echo " <tr>
            <td></td>
            <td>$c->nombre</td>
            <td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_cuenta($(this))'></button></td>
            </tr>";
        }
        ?>

    </tbody>
</table>
</div>
</div>
</div>
</div>      
</div>
</div>	

</section>

<section class="sizing-input-group" id="input-group-sizing">

  <div class="row">
     <div class="col-lg-12 col-xl-6">
         <div class="card collapse-icon accordion-icon-rotate"> 
            <div id="headingCollapse18"  class="card-header">
                <a data-toggle="collapse" href="#collapse18" aria-expanded="false" aria-controls="collapse18" class="card-title black">Ubicación</a>
            </div>
            <div id="collapse18" role="tabpanel" aria-labelledby="headingCollapse18" class="collapse" aria-expanded="false">
               <div class="card-body">
                <div class="col-md-12">
                    <form class="form" id="form-ubicacion" method="post" autocomplete="off">
                        <div class="form-group row">
                            <p class="col-4">Tipo de ubicación</p>
                            <div class="col-6 controls">
                                <input type="text" id="txt_ubicacion" name="nombre" class="form-control form-control-sm toupper" required>
                            </div>
                            <div class="col-2">
                                <button type="submit"  class="btn  classBotonFratsa white"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-block">  
                    <div style="overflow-y: scroll; height: 200px;">   
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Dato</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tabla_ubicacion">
                             <?php
                             foreach ($ubicacion as $u) {
                                echo " <tr>
                                <td></td>
                                <td>$u->nombre</td>
                                <td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_ubicacion($(this))'></button></td>
                                </tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>
</div>
<div class="col-lg-12 col-xl-6">
 <div class="card collapse-icon accordion-icon-rotate left"> 
    <div id="headingCollapse19"  class="card-header">
        <a data-toggle="collapse" href="#collapse19" aria-expanded="false" aria-controls="collapse19" class="card-title black">Propietario</a>
    </div>
    <div id="collapse19" role="tabpanel" aria-labelledby="headingCollapse19" class="collapse" aria-expanded="false">
       <div class="card-body">
        <div class="col-md-12">
            <form class="form" id="form-propietario" method="post" autocomplete="off">
                <div class="form-group row">
                    <p class="col-4">Nombre</p>
                    <div class="col-6 controls">
                        <input type="text" id="txt_propietario" name="nombre" class="form-control form-control-sm toupper" required>
                    </div>
                    <div class="col-2">
                        <button type="submit"  class="btn  classBotonFratsa white"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-block">  
            <div style="overflow-y: scroll; height: 200px;">   
                <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Dato</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tabla_propietario">
                     <?php
                     foreach ($propietario as $p) {
                        echo " <tr>
                        <td></td>
                        <td>$p->nombre</td>
                        <td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_propietario($(this))'></button></td>
                        </tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>    
</div>
</div>
</div>    
</section>


<section class="sizing-input-group" id="input-group-sizing">

  <div class="row">
        <!--
       <div class="col-lg-12 col-xl-6">
           <div class="card collapse-icon accordion-icon-rotate"> 
                <div id="headingCollapse14"  class="card-header">
                <a data-toggle="collapse" href="#collapse14" aria-expanded="false" aria-controls="collapse14" class="card-title black">Tipo de Unidades</a>
                </div>
                    <div id="collapse14" role="tabpanel" aria-labelledby="headingCollapse14" class="collapse" aria-expanded="false">
                         <div class="card-body">
                            <div class="col-md-12">
                                <form class="form" id="form-tipo_pago" method="post">
                                <div class="form-group row">
                                    <p class="col-4">Unidades</p>
                                    <div class="col-6 controls">
                                          <input type="text" id="txt_pago" name="nombre" class="form-control form-control-sm toupper" required>
                                     </div>
                                     <div class="col-2">
                                        <button type="submit"  class="btn  classBotonFratsa white"><i class="fa fa-plus"></i></button>
                                    </div>    
                                </div>
                                </form>  
                            </div>
                            <div class="card-block">    
                                 <div style="overflow-y: scroll; height: 200px;"> 
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Dato</th>
                                    <th></th>
                                </tr>
                            </thead >
                            <tbody id="tabla_tipo_pago">
                               <?php
                                    foreach ($tipos_pago as $u) {
                                        echo " <tr>
                                    <td></td>
                                    <td>$u->nombre</td>
                                    <td><button class='btn  ft-trash-2 white classBotonFratsa white' onclick='eliminar_tipo_pago($(this))'></button></td>
                                </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                         </div>
                         </div>
                         </div>
                    </div>    
            </div>
        </div>
    -->
    <div class="col-lg-6 col-xl-6">
     <div class="card collapse-icon accordion-icon-rotate">
        <div id="headingCollapse15"  class="card-header">
            <a data-toggle="collapse" href="#collapse15" aria-expanded="false" aria-controls="collapse15" class="card-title black">Vehículos</a>
        </div>
        <div id="collapse15" role="tabpanel" aria-labelledby="headingCollapse15" class="collapse" aria-expanded="false">
          <div class="card-body">
           <div class="col-md-12">
            <form class="form" id="form-vehiculo" method="post" autocomplete="off">
                <div class="form-group row">                            
                    <p class="col-4">Tipos de Vehículo</p>
                    <div class="col-6 controls">
                        <input type="text" name="nombre" class="form-control form-control-sm toupper" id="txt_vehiculo" required>
                    </div>
                    <div class="col-2">
                        <button type="submit"  class="btn  classBotonFratsa white" ><i class="fa fa-plus"></i></button>
                    </div>

                </div>
            </form>
        </div>
        <div class="card-block">    
          <div style="overflow-y: scroll; height: 200px;"> 
            <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                <thead>
                    <tr>
                        <th></th>
                        <th>Dato</th>   
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tabla_vehiculo">
                 <?php
                 foreach ($vehiculos as $v) {
                    echo " <tr>
                    <td></td>
                    <td>$v->nombre</td>
                    <td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_vehiculo($(this))'></button></td>
                    </tr>";
                }
                ?>

            </tbody>
        </table>

    </div>
</div>
</div>      
</div>
</div> 
</div>

<div class="col-lg-6 col-xl-6">
     <div class="card collapse-icon accordion-icon-rotate">
        <div id="headingCollapse16"  class="card-header">
            <a data-toggle="collapse" href="#collapse_almacen" aria-expanded="false" aria-controls="collapse_almacen" class="card-title black">Tipo Articulos Almacén</a>
        </div>
        <div id="collapse_almacen" role="tabpanel" aria-labelledby="headingCollapse16" class="collapse" aria-expanded="false">
          <div class="card-body">
           <div class="col-md-12">
            <form class="form" id="form-tipoAlmacen" method="post" autocomplete="off">
                <div class="form-group row">                            
                    <p class="col-4">Tipos de Articulos Almacén</p>
                    <div class="col-6 controls">
                        <input type="text" name="nombre" class="form-control form-control-sm toupper" id="txt_tipoAlmacen" required>
                    </div>
                    <div class="col-2">
                        <button type="submit"  class="btn  classBotonFratsa white" ><i class="fa fa-plus"></i></button>
                    </div>

                </div>
            </form>
        </div>
        <div class="card-block">    
          <div style="overflow-y: scroll; height: 200px;"> 
            <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                <thead>
                    <tr>
                        <th></th>
                        <th>Dato</th>   
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tabla_almacen">
                 <?php
                 foreach ($tipos_almacen as $v) {
                    echo " <tr>
                    <td></td>
                    <td>$v->nombre</td>
                    <td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_tipoAlmacen($(this))'></button></td>
                    </tr>";
                }
                ?>

            </tbody>
        </table>

    </div>
</div>
</div>      
</div>
</div> 
</div>



</section>
<script>
   $(document).ready(function () {
       $(".toupper").on("change",function(){
        $(this).val($(this).val().toUpperCase()); 
    });

        // VALIDACION  Puesto
        $("#form-puestos").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_puesto").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/guardarPuesto",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                            if(data.success){
                                toastr.error("Ya existe el puesto. Ingrese otro con nombre diferente");
                            }else{
                                $('#form-puestos')[0].reset();
                                $('#tabla_puesto').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_puesto($(this))'></button></td></tr>"
                                   );
                                swal("Exito!","se inserto el registro","success");
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


              // VALIDACION  Unidades
              $("#form-unidad_medida").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_unidad_medida").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/guardarUnidad_medida",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                           if(data.success){
                               toastr.error("Ya existe unidad de medida. Ingrese otro con nombre diferente");
                           }else{
                               $('#form-unidad_medida')[0].reset();
                               $('#tabla_unidad').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_unidad_medida($(this))'></button></td></tr>"
                                   );
                               swal("Exito!","se inserto el registro","success");
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

              // VALIDACION  Tipos pago
              $("#form-tipo_pago").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_pago").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/guardarTipo_pago",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                           if(data.success){
                               toastr.error("Ya existe pago. Ingrese otro con nombre diferente");
                           }else{                            
                               $('#form-tipo_pago')[0].reset();
                               $('#tabla_tipo_pago').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_tipo_pago($(this))'></button></td></tr>"
                                   );

                               swal("Exito!","se inserto el registro","success");
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

                      // VALIDACION  Vehiculo
                      $("#form-vehiculo").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_vehiculo").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/guardarVehiculos",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                           if(data.success){
                               toastr.error("Ya existe vehiculo. Ingrese otro con nombre diferente");
                           }else{                            
                               $('#form-vehiculo')[0].reset();
                               $('#tabla_vehiculo').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_vehiculo($(this))'></button></td></tr>"
                                   );

                               swal("Exito!","se inserto el registro","success");
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


                      // VALIDACION  Tipo contacto
                      $("#form-proveedor").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_contacto").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/guardarTipo_contacto",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                           if(data.success){
                               toastr.error("Ya existe contacto. Ingrese otro con nombre diferente");
                           }else{
                               $('#form-proveedor')[0].reset();
                               $('#tabla_contacto').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_contacto($(this))'></button></td></tr>"
                                   );

                               swal("Exito!","se inserto el registro","success");
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


                      // VALIDACION  Cuentas
                      $("#form-cuenta").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_cuenta").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/guardarCuentas",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                           if(data.success){
                               toastr.error("Ya existe cuenta. Ingrese otro con nombre diferente");
                           }else{
                               $('#form-cuenta')[0].reset();
                               $('#tabla_cuentas').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_cuenta($(this))'></button></td></tr>"
                                   );

                               swal("Exito!","se inserto el registro","success");
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

              // VALIDACION  ubicacion
              $("#form-ubicacion").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_ubicacion").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/guardarUbicacion",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                           if(data.success){
                               toastr.error("Ya existe ubicación. Ingrese otro con nombre diferente");
                           }else{
                               $('#form-ubicacion')[0].reset();
                               $('#tabla_ubicacion').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_ubicacion($(this))'></button></td></tr>"
                                   );

                               swal("Exito!","se inserto el registro","success");
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


              // VALIDACION  ubicacion
              $("#form-propietario").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_propietario").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/insertarPropietario",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                           if(data.success){
                               toastr.error("Ya existe propietario. Ingrese otro con nombre diferente");
                           }else{
                               $('#form-propietario')[0].reset();
                               $('#tabla_propietario').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_propietario($(this))'></button></td></tr>"
                                   );
                               swal("Exito!","se inserto el registro","success");
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

                 // VALIDACION  almacen
              $("#form-tipoAlmacen").on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    var texto=$("#txt_tipoAlmacen").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/Configuracion/insertarAlmacen",
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                           if(data.success){
                               toastr.error("Ya existe propietario. Ingrese otro con nombre diferente");
                           }else{
                               $('#form-tipoAlmacen')[0].reset();
                               $('#tabla_almacen').append("<tr><td></td><td>"+texto+"<td><button class='btn  ft-trash-2 classBotonFratsa white' onclick='eliminar_tipoAlmacen($(this))'></button></td></tr>"
                                   );
                               swal("Exito!","se inserto el registro","success");
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

function eliminar_puesto(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_puesto",
      data: {"nombre":nombre},
      success: function(data){

          row.remove();

      }
  }); 
}

function eliminar_unidad_medida(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_unidades_medida",
      data: {"nombre":nombre},
      success: function(data){
          row.remove();
      }
  }); 
}

function eliminar_tipo_pago(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_tipo_pago",
      data: {"nombre":nombre},
      success: function(data){
          row.remove();
      }
  }); 
}

function eliminar_vehiculo(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_vehiculo",
      data: {"nombre":nombre},
      success: function(data){
          row.remove();
      }
  }); 
}

function eliminar_contacto(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_contacto",
      data: {"nombre":nombre},
      success: function(data){
          row.remove();
      }
  }); 
}

function eliminar_cuenta(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_cuenta",
      data: {"nombre":nombre},
      success: function(data){
          row.remove();
      }
  }); 
}

function eliminar_ubicacion(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_ubicacion",
      data: {"nombre":nombre},
      success: function(data){
          row.remove();
      }
  }); 
}

function eliminar_propietario(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_propietario",
      data: {"nombre":nombre},
      success: function(data){
          row.remove();
      }
  }); 
}

function eliminar_tipoAlmacen(btn){
    var row=btn.closest("tr");
    var nombre = row.find("td").eq(1).html();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>index.php/Configuracion/eliminar_almacen",
      data: {"nombre":nombre},
      success: function(data){
          row.remove();
      }
  }); 
}

</script>

</div>
</div>