
<div class="main-content">
    <div class="content-wrapper">
        <section class="color-palette">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header mb-3">Catálogo de Empleados</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h5><i class="ft-file-text"></i> Listado de Empleados</h5>
                        <hr>
                        <a href="<?php echo base_url(); ?>index.php/empleados/alta" class=" pull-right btn btn-success shadow-z-1 white classBotonFratsa"><i class="ft-user-plus"></i> Agregar empleado </a>
                        <br><br>
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Puesto</th>
                                    <th>RFC</th>
                                    <th>No. SS</th>
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

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="form-group">
                <!-- Modal SUSPENSIÓN -->
                <div class="modal fade text-left" data-keyboard="false" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger white">
                                <h4 class="modal-title" id="myModalLabel10">Advertencia !</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>¿Está seguro de suspender a este empleado?</h5>
                                <input type="hidden" id="idEmpleado" name="idEmpleado">
                                <p>Si desea continuar ingrese un comentario y luedo de click en "Aceptar", de lo contrario cierre la ventana.</p>
                                <div class="form-group">
                                    <label for="userinput8">Motivo de suspensión</label>
                                    <textarea id="motivo_suspension" rows="5" class="form-control border-primary" name="motivo_suspension"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-outline-danger" onclick="suspendeEmpleado()">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN Modal -->

                <!-- Modal ELIMINACIÓN -->
                <div class="modal fade text-left" data-keyboard="false" id="danger2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger white">
                                <h4 class="modal-title" id="myModalLabel10">Advertencia !</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>¿Está seguro de eliminar este empleado?</h5>
                                <input type="hidden" id="idEmpleado" name="idEmpleado">
                                <p>El cambio será irreversible. Si desea continuar ingrese un comentario y luedo de click en "Aceptar", de lo contrario cierre la ventana.</p>
                                <div class="form-group">
                                    <label for="userinput8">Motivo de eliminación</label>
                                    <textarea id="motivo_eliminacion" rows="5" class="form-control border-primary" name="motivo_eliminacion"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-outline-danger" onclick="eliminaEmpleado()">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN Modal -->

                <!-- Modal Documentos -->
                <div class="modal fade text-left" data-keyboard="false" id="modal_documentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="width: 929px;">
                            <div class="modal-header bg-info white">
                                <h4 class="modal-title" id="myModalLabel10">Documentos de Empleado</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <h5>Licencia</h5>
                                        <hr>
                                        <div style="text-align: center;"><p id="nombre_licencia" name="nombre_licencia"></p></div><hr>
                                        <div class="form-group row">
                                            <p class="col-5">Número</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="licencia_no" id="licencia_no" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-5">Expedición</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="licencia_exp" id="licencia_exp" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-5">Vencimiento</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="licencia_venc" id="licencia_venc" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Vigencia Médica</h5>
                                        <hr>
                                        <div style="text-align: center;"><p id="nombre_medica" name="nombre_medica" ></p></div><hr>
                                        <div class="form-group row">
                                            <p class="col-5">Número</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="medica_no" id="medica_no" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-5">Expedición</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="medica_exp" id="medica_exp" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-5">Vencimiento</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="medica_venc" id="medica_venc" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>INE</h5>
                                        <hr>
                                        <div style="text-align: center;"><p id="nombre_ine" name="nombre_ine" ></p></div><hr>
                                        <div class="form-group row">
                                            <p class="col-5">Número</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="ine_no" id="ine_no" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-5">Expedición</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="ine_exp" id="ine_exp" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-5">Vencimiento</p>
                                            <div class="col-7 controls">
                                                <input type="text" name="ine_venc" id="ine_venc" class="form-control form-control-sm toupper" disabled >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN Modal -->

                <!-- Modal ACTIVACIÓN -->
                <div class="modal fade text-left" data-keyboard="false" id="activacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger white">
                                <h4 class="modal-title" id="myModalLabel10">Advertencia !</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>¿Está seguro de activar este empleado?</h5>
                                <input type="hidden" id="idEmpleado" name="idEmpleado">
                                <p>El cambio será irreversible. Si desea continuar de click en "Aceptar", de lo contrario cierre la ventana.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-outline-danger" onclick="activaEmpleado()">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN Modal -->
            </div>
        </div>

    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>public/js/listado_empleados.js"></script> 