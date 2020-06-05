<style>
.uniqueClassName {
    text-align: center;
}
</style>

<div class="main-content">
    <div class="content-wrapper">
        <!--------------------------------------------------------------->
        <!--------------------------- LISTADO --------------------------->
        <section class="color-palette">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-header mb-3">Catálogo de Tarifas</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h5><i class="ft-file-text"></i> Listado de Tarifas</h5><hr>
                        <a href="<?php echo base_url(); ?>index.php/tarifas/alta" class=" pull-right btn shadow-z-1 white classBotonFratsa"><i class="ft-user-plus"></i> Agregar nueva tarifa </a>
                        <br><br>
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla_tarifas">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Sub cliente</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Tarifas</th>
                                    <th>Casetas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!--------------------------------------------------------------->
        <!------------------ Modal Detalles de Tarifas ------------------>
        <div class="modal fade text-left" data-keyboard="false" id="modalDetalleTarifa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header classBotonFratsa white">
                        <h4 class="modal-title " id="myModalLabel10">Tarifas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-2">Estado Origen</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="estado_origen" id="estado_origen" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                    <p class="col-2">Lugar Origen</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="origen" id="origen" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-2">Estado Destino</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="estado_destino" id="estado_destino" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                    <p class="col-2">Lugar Destino</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="destino" id="destino" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-2"></p>
                                    <p class="col-2" style="font-weight: bold;">Sencillo</p>
                                    <p class="col-2"></p>
                                    <p class="col-2"></p>
                                    <p class="col-2" style="font-weight: bold;">Full</p>
                                    <p class="col-2"></p>
                                </div>    
                            </div>                        
                        </div>

                        <div class="row">
                            <!-- SENCILLO -->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-2">Diesel</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="diesel_sencillo" id="diesel_sencillo" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                
                                    <p class="col-2">Diesel</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="diesel_full" id="diesel_full" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">    
                            <!-- SENCILLO -->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-1">Rango Consumo</p>
                                    <div class="col-1 controls">
                                    
                                    </div>
                                    <div class="col-2 controls">
                                        <input type="text" name="rango_consumo_a_sencillo" id="rango_consumo_a_sencillo" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                    <div class="col-2 controls">
                                        <input type="text" name="rango_consumo_b_sencillo" id="rango_consumo_b_sencillo" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                
                                    <p class="col-1">Rango Consumo</p>
                                    <div class="col-1 controls">
                                    
                                    </div>
                                    <div class="col-2 controls">
                                        <input type="text" name="rango_consumo_a_full" id="rango_consumo_a_full" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                    <div class="col-2 controls">
                                        <input type="text" name="rango_consumo_b_full" id="rango_consumo_b_full" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- SENCILLO -->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-2">Tarifa</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="tarifa_sencillo" id="tarifa_sencillo" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                
                                
                                    <p class="col-2">Tarifa</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="tarifa_full" id="tarifa_full" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">    
                            <!-- SENCILLO -->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-2">Tarifa Operador CXT</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="tarifa_cxt_sencillo" id="tarifa_cxt_sencillo" class="form-control form-control-sm toupper" disabled >
                                    </div>
                               
                                    <p class="col-2">Tarifa Operador CXT</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="tarifa_cxt_full" id="tarifa_cxt_full" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">    
                            <!-- SENCILLO -->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-2">Tarifa Viaje</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="tarifa_viaje_sencillo" id="tarifa_viaje_sencillo" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                
                                    <p class="col-2">Tarifa Viaje</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="tarifa_viaje_full" id="tarifa_viaje_full" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- SENCILLO -->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <p class="col-2">Kms</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="kms_sencillo" id="kms_sencillo" class="form-control form-control-sm toupper" disabled >
                                    </div>
                                
                                    <p class="col-2">Kms</p>
                                    <div class="col-4 controls">
                                        <input type="text" name="kms_full" id="kms_full" class="form-control form-control-sm toupper" disabled >
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

        <!--------------------------------------------------------------->
        <!------------------ Modal Detalles de Casetas ------------------>
        <div class="modal fade text-left" data-keyboard="false" id="modalCasetasTarifa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header classBotonFratsa white">
                        <h4 class="modal-title " id="myModalLabel10">Casetas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body " >
                        <div class="row">
                            <!-- SENCILLO -->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-6 controls" >
                                        <p class="col-12">Caseta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Costo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tipo</p>
                                    </div>
                                
                                    <div class="col-6 controls" >
                                        <p class="col-12">Caseta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Costo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tipo</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-6 controls" id="modalCasetasTarifaBody" name="modalCasetasTarifaBody">
                                        
                                    </div>
                                
                                    <div class="col-6 controls" id="modalCasetasTarifaBody2" name="modalCasetasTarifaBody2">
                                        <
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

    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>public/js/listado_tarifas.js"></script> 
