<style type="text/css">
    #mapa {
        width: 90%;
        height: 230px;
        margin-left: 5%;
    }
</style>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCfEKOtiXFIT9FExIw1-a-Lgn2SJFAxxX4"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/gmaps.js" type="text/javascript"></script>


<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <?php
            $title = "Alta";
            if (isset($cliente)) {
                $title = "Edición";
            }
            ?>
            <div class="content-header"><?php echo $title; ?> de Cliente</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" id="form-cliente" method="post" autocomplete="off">
                        <br>
                        <h5><i class="ft-user"></i> Datos del Cliente</h5>
                        <div style="height: 5px" class="gradient-green-teal"></div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Empresa <span class="required">*</span></p>
                                    <div class="controls">
                                        <input type="text" name="empresa" class="form-control form-control-sm toupper" <?php
                                        if (isset($cliente)) {
                                            echo "value='$cliente->empresa'";
                                        }
                                        ?> >
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Alias <span class="required">*</span></p>
                                    <div class="controls">
                                        <input type="text" name="alias" class="form-control form-control-sm toupper" <?php
                                        if (isset($cliente)) {
                                            echo "value='$cliente->alias'";
                                        }
                                        ?>>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--Personas de Contacto-->
                        <p><i class="ft-users"></i> Personas de Contacto</p><div style="height: 3px" class="gradient-green-teal"></div><br>
                        <?php 
                            $i=0;
                            $size= 1;
                            if(isset($contactos)){
                                $size=sizeof($contactos);
                            }
                            do{
                        ?>
                        <div class="border" <?php if($i==0){ ?>id="template_persona" <?php } ?>>
                            <div class="row">
                            <!--<div class="col-md-6">-->
                                <div class="form-group col-md-4">
                                    <p>Nombre <span class="required">*</span></p>
                                    <div class="controls">
                                        <input type="text" name="nombre[]" class="form-control form-control-sm toupper" <?php
                                        if (isset($contactos[$i])) {
                                            echo "value='".$contactos[$i]->nombre."'";
                                        }
                                        ?> >
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <p>Telefono <span class="required">*</span></p>
                                    <div class="controls">
                                        <input type="text" name="telefono[]" class="form-control form-control-sm" <?php
                                        if (isset($contactos[$i])) {
                                            echo "value='".$contactos[$i]->telefono."'";
                                        }
                                        ?> >
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <p>Correo <span class="required">*</span></p>
                                    <div class="controls">
                                        <input type="text" name="correo[]" class="form-control form-control-sm" <?php
                                        if (isset($contactos[$i])) {
                                            echo "value='".$contactos[$i]->email."'";
                                        }
                                        ?> >
                                    </div>
                                </div>
                            <!--</div>-->
                            
                        </div>
                        <p>Tipo de Contacto <span class="required">*</span></p>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <p>Cotización <input type="checkbox" name="cotizacion[]" value="1" <?php if(isset($contactos[$i]) && $contactos[$i]->cotizacion){ echo "checked";} ?> /></p>
                            </div>
                            <div class="form-group col-md-3">
                                <p>Facturación <input type="checkbox" name="facturacion[]" value="1" <?php if(isset($contactos[$i]) && $contactos[$i]->facturacion){ echo "checked";} ?> /></p>
                            </div>
                            <div class="form-group col-md-3">
                                <p>Orden de Trabajo <input type="checkbox" name="orden[]" value="1" <?php if(isset($contactos[$i]) && $contactos[$i]->orden){ echo "checked";} ?> /></p>
                            </div>
                            <div class="col-md-3 div_btn">
                                <?php if($i==0){ ?>
                                <button type="button" class="btn btn-sm gradient-green-teal white pull-right addButton"><i class="fa fa-plus"></i></button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-sm gradient-bloody-mary white pull-right removeButton"><i class="fa fa-plus"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        </div>
                        <?php 
                            $i++;
                            }while($i<$size);
                        ?>
                        
                        <!--Direccion-->
                        <p><i class="ft-map"></i> Direccion</p><div style="height: 3px" class="gradient-green-teal"></div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Calle <span class="required">*</span></p>
                                    <div class="controls">
                                        <input name="calle" class="form-control form-control-sm toupper" <?php
                                        if (isset($cliente)) {
                                            echo "value='" . $cliente->calle . "'";
                                        }
                                        ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>No. Exterior <span class="required">*</span></p>
                                            <div class="controls">
                                                <input name="no_ext" class="form-control form-control-sm toupper" <?php
                                                if (isset($cliente)) {
                                                    echo "value='" . $cliente->no_ext . "'";
                                                }
                                                ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>No. Interior</p>
                                            <div class="controls">
                                                <input name="no_int" class="form-control form-control-sm toupper" <?php
                                                if (isset($cliente)) {
                                                    echo "value='" . $cliente->no_int . "'";
                                                }
                                                ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Colonia <span class="required">*</span></p>
                                    <div class="controls">
                                        <input name="colonia" class="form-control form-control-sm toupper" <?php
                                        if (isset($cliente)) {
                                            echo "value='" . $cliente->colonia . "'";
                                        }
                                        ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p>Código Postal <span class="required">*</span></p>
                                            <div class="controls">
                                                <input name="cp" id="cp" class="form-control form-control-sm cp-change" <?php
                                                if (isset($cliente)) {
                                                    echo "value='" . $cliente->cp . "'";
                                                }
                                                ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">

                                        <div class="form-group">
                                            <p>Ciudad o Poblacion <span class="required">*</span></p>
                                            <div class="controls">
                                                <input name="poblacion" class="form-control form-control-sm toupper" <?php
                                                if (isset($cliente)) {
                                                    echo "value='" . $cliente->poblacion . "'";
                                                }
                                                ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Estado </p>
                                    <div class="controls">
                                        <select name="estado" class="form-control form-control-sm" >
                                            <?php
                                            foreach ($estados as $e) {
                                                $sel="";
                                                if(strtoupper($e->estado)==$cliente->estado){
                                                   $sel="selected"; 
                                                }
                                                echo "<option $sel>$e->estado</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!--MAPAS-->
                        <p><i class="ft-map-pin"></i> Mapa de Direccion</p><div style="height: 3px" class="gradient-green-teal"></div><br>

                        <p>Seleccione la ubicación en el mapa</p>


                        <div id="mapa"></div>

                        <input type="text" id="coordenadas" name="coordenadas" hidden <?php
                        if (isset($cliente)) {
                            echo "value='" . $cliente->coordenadas . "'";
                        }
                        ?>>

                        <br>

                        <!--Datos fiscales-->
                        <h5><a data-toggle="collapse" href="#collapseFiscales"><i class="ft-file-text"></i> Datos Fiscales</a></h5>
                        <div style="height: 5px" class="gradient-green-teal"></div><br>

                        <div class="collapse" id="collapseFiscales">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Razón Social </p>
                                        <div class="controls">
                                            <input type="text" name="razon_social" class="form-control form-control-sm toupper" <?php
                                            if (isset($cliente)) {
                                                echo "value='$cliente->razon_social'";
                                            }
                                            ?> >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>RFC </p>
                                        <div class="controls">
                                            <input type="text" name="rfc" class="form-control form-control-sm toupper" <?php
                                            if (isset($cliente)) {
                                                echo "value='$cliente->rfc'";
                                            }
                                            ?> >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>Código Postal </p>
                                        <div class="controls">
                                            <input type="text" name="cp_fiscal" class="form-control form-control-sm" <?php
                                            if (isset($cliente)) {
                                                echo "value='$cliente->cp_fiscal'";
                                            }
                                            ?> >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>Dirección </p>
                                        <div class="controls">
                                            <textarea name="direccion_fiscal" id="direccion_fiscal" class="form-control form-control-sm toupper" rows="3"><?php
                                                if (isset($cliente)) {
                                                    echo $cliente->direccion_fiscal;
                                                }
                                                ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>CURP </p>
                                        <div class="controls">
                                            <input type="text" name="curp" class="form-control form-control-sm toupper" <?php
                                            if (isset($cliente)) {
                                                echo "value='$cliente->curp'";
                                            }
                                            ?> >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>No. de Cuenta </p>
                                        <div class="controls">
                                            <input type="text" name="cuenta" class="form-control form-control-sm" <?php
                                            if (isset($cliente)) {
                                                echo "value='$cliente->cuenta'";
                                            }
                                            ?> >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>Observaciones </p>
                                        <div class="controls">
                                            <textarea name="observaciones" id="observaciones" class="form-control form-control-sm" rows="3"><?php
                                                if (isset($cliente)) {
                                                    echo $cliente->observaciones;
                                                }
                                                ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br><hr>
                        <div class="row">
                            <a href="<?php echo base_url(); ?>index.php/catalogos/clientes" class="btn btn-icon btn-secondary"><i class="ft-chevron-left"></i> Regresar</a>
                            <button type="submit" class="btn gradient-green-teal shadow-z-1 white" style="width: 50%; margin-left: 15%;">Guardar <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'js_cliente.php';
