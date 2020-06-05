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
                        <a href="<?php echo base_url(); ?>index.php/catalogos/alta_cliente/0" class="btn gradient-green-teal shadow-z-1 white pull-right"><i class="ft-user-plus"></i> Agregar Cliente</a><br><br>
                        <table class="table table-striped table-hover table-responsive" id="tabla">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Empresa</th>
                                    <th>Alias</th>
                                    <th>Personas de Contacto</th>
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
                "url": "<?php echo base_url(); ?>index.php/catalogos/getClientes"
            },
            "columns": [
                {"data": "id"},
                {"data": "empresa"},
                {"data": "alias"},
                {
                    "data": "contacto",
                },
                {
                    "data": "id",
                    "render": function (data, type, row, meta) {
                        return botoneria(data);
                    }
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
            window.location = '<?php echo base_url(); ?>index.php/catalogos/edicion_cliente/'+data.id;
        });
        load();
    });
    
    function botoneria(data){
        var str='<button type="button" class="mb-0 btn btn-sm btn-icon btn-success edit"><i class="ft-edit"></i></button>\
        <div class="btn-group ml-1 mb-0">\
                <button type="button" class="btn btn-sm btn-raised mb-0 btn-dark dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-bars"></i></button>\
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">\
                    <a class="dropdown-item" href="../cliente/facturas/'+data+'">Facturas</a>\
                    <a class="dropdown-item" href="../cliente/encuestas/'+data+'">Encuestas</a>\
                </div>\
            </div>';
        return str;
    }
</script>