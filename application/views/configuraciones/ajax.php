<script>
    $(document).ready(function () {

    });

    function agregar_item(catalogo) {
        if($("#nombre_" + catalogo).val()==""){
            swal("", "El nombre del elemento no puede estar vacio", "warning");
        }
        else{
            $.ajax({
                type: "POST",
                traditional: true,
                url: "<?php echo base_url(); ?>index.php/configuraciones/insertUpdateToCatalogo/" + catalogo + "s",
                data: {nombre: $("#nombre_" + catalogo).val()},
                success: function (data) {
                    if (data == 1)
                    {
                        swal({
                            title: 'Exito!',
                            text: "El elemento se añadio al listado de " + catalogo + "s",
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false
                        }).then(function (isConfirm) { 
                            if (isConfirm) {
                                window.location = url_listado(catalogo);
                            }
                        }).catch(swal.noop);
                    }
                }
            });
        }
    }
    
    function agregar_familia(){
        if($("#nombre_familia" ).val()==""){
            swal("", "El nombre del elemento no puede estar vacio", "warning");
        }
        else{
            $.ajax({
                type: "POST",
                traditional: true,
                url: "<?php echo base_url(); ?>index.php/configuraciones/insertUpdateToCatalogo/familias",
                data: {nombre: $("#nombre_familia").val(), codigo: $("#codigo").val()},
                success: function (data) {
                    if (data == 1)
                    {
                        swal({
                            title: 'Exito!',
                            text: "El elemento se añadio al listado de familias",
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false
                        }).then(function (isConfirm) { 
                            if (isConfirm) {
                                window.location = url_listado("familia");
                            }
                        }).catch(swal.noop);
                    }
                }
            });
        }
    }
    
    function eliminar_item(id,catalogo) {

        $.ajax({
            type: "POST",
            traditional: true,
            url: "<?php echo base_url(); ?>index.php/configuraciones/deleteFromCatalogo/" + catalogo + "s",
            data: {id: id},
            success: function (data) {
                
                    swal({
                        title: 'Exito!',
                        text: "El elemento se eliminó del listado de " + catalogo + "s",
                        type: 'success',
                        showCancelButton: false,
                        allowOutsideClick: false
                    }).then(function (isConfirm) {
                        if (isConfirm) {
                            window.location = url_listado();
                        }
                    }).catch(swal.noop);
                
            }
        });
    }
    
    function url_listado(catalogo){
    
        var url="<?php echo base_url(); ?>index.php/";
        
        switch(catalogo){
            case "marca": url+="configuraciones/productos"; break;
            case "documento": url+="configuraciones/documentos"; break;
            case "familia": url+="configuraciones/familias"; break;
            case "departamento": url+="configuraciones/departamentos"; break;
            default: url+="main/inicio"; break;
        }
        
        return url;
    }

</script>