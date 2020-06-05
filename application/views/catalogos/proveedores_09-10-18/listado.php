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
                        <a href="<?php echo base_url(); ?>index.php/proveedores/alta" class=" pull-right btn btn-danger shadow-z-1 white"><i class="ft-user-plus"></i> Agregar Proveedor </a><br><br>
                        <table class="table table-striped table-condensed table-hover table-responsive" id="tabla">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Razón Social</th>
                                    <th>RFC</th>
                                    <th>Persona de Contacto</th>
                                    <th>Teléfono</th>
                                    <th>Condiciones de pago</th>
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

<script>
    function load() {
        table.destroy();
        table = $('#tabla').DataTable({
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/proveedores/getProveedores"
            },
            "columns": [
                {"data": "id"},
                {"data": "razon_social"},
                {"data": "rfc"},
                {"data": "contacto"},
                {"data": "telefono"},
                {"data": "condiciones_pago"},
                {
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-sm btn-icon btn-danger white edit'><i class='ft-edit'></i></button>"
                }
            ]
        });

    }
    $(document).ready(function () {
        table = $('#tabla').DataTable();

        //Listener para edicion
        $('#tabla tbody').on('click', 'button.edit', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data();
            window.location = '<?php echo base_url(); ?>index.php/proveedores/edicion/'+data.id;
        });

        load();
    });
</script>