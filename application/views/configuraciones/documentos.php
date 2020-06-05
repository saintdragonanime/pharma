
<div class="main-content">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <div class="content-header">Documentos</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" method="post" autocomplete="off">
                        <h4 class="form-section"><i class="ft-file-text"></i> Listado de Documentos</h4>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="text" id="nombre_documento" class="form-control form-control-sm" placeholder="Nueva Documento">
                            </div>
                            <button type="button" onclick="agregar_item('documento')" class="btn btn-sm btn-raised btn-outline-primary"><i class="ft-plus"></i></button>
                        </div>
                        <table class="table table-condensed">
                            <?php foreach ($documentos as $d) { ?>
                                <tr>
                                    <td width="90%"><?php echo $d->nombre; ?></td>
                                    <td><button type="button" onclick="eliminar_item(<?php echo $d->id; ?>, 'documento')" class="btn btn-raised btn-icon btn-pure danger mr-1"><i class="fa fa-times-circle"></i></button></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'ajax.php';
