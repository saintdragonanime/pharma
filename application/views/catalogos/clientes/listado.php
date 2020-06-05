<div class="main-content">
    <div class="content-wrapper">
        <section class="color-palette">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header mb-3">Catálogo de Clientes</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h5><i class="ft-file-text"></i> Listado de Clientes</h5><hr>
                        <a href="<?php echo base_url(); ?>index.php/clientes/alta" class=" pull-right btn shadow-z-1 white classBotonFratsa
classBotonFratsa"><i class="ft-user-plus"></i> Agregar cliente </a><br><br>
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Razón Social</th>
                                    <th>RFC</th>
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

        <!-- Modal SUSPENSIÓN -->
                <div class="modal fade text-left" data-keyboard="false" id="suspension" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header classBotonFratsa white">
                                <h4 class="modal-title" id="myModalLabel10">Advertencia !</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>¿Está seguro de suspender a este Cliente?</h5>
                                <input type="hidden" id="idCliente" name="idCliente">
                                <p>Si desea continuar ingrese un comentario y luedo de click en "Aceptar", de lo contrario cierre la ventana.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-outline-danger" onclick="suspendeCliente()">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN Modal -->


                <!-- Modal ACTIVACIÓN -->
                <div class="modal fade text-left" data-keyboard="false" id="activacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header classBotonFratsa white">
                                <h4 class="modal-title" id="myModalLabel10">Advertencia !</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>¿Está seguro de activar este Cliente?</h5>
                                <input type="hidden" id="idCliente" name="idCliente">
                                <p>Si desea continuar de click en "Aceptar", de lo contrario cierre la ventana.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-outline-danger" onclick="activaCliente()">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN Modal -->

    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>public/js/listado_clientes.js"></script> 
