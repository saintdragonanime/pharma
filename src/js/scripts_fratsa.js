

     $(document).ready(function () {
         $(".toupper").on("change",function(){
            $(this).val($(this).val().toUpperCase()); 
         });
         
        // VALIDACION
        $("#form-empleado")
                .on('success.form.fv', function (e) {
                    // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target);
                    // Use Ajax to submit form data
                    var fd = new FormData($form[0]);
                    <?php if(isset($empleado)){
                        echo "fd.append('id', $empleado->id);";
                    }?>
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/catalogos/insertUpdateEmpleado",
                        cache: false,
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data==1)
                            {
                                var texto="Se insertó el Empleado";
                                var url="<?php echo base_url(); ?>index.php/catalogos/empleados";
                                
                                <?php if(isset($empleado)){ // Si es Edicion
                                    echo "texto='Se actualizó el Empleado'; ";
                                    echo "url='".base_url()."index.php/catalogos/edicion_empleado/".$empleado->id."';";
                                } ?>
  
                                swal({
                                    title: 'Exito!',
                                    text: texto,
                                    type: 'success',
                                    showCancelButton: false,
                                    allowOutsideClick: false
                                }).then(function (isConfirm) {
                                    if (isConfirm) {
                                        window.location = url;
                                    }
                                }).catch(swal.noop);
                            }
                            else{
                                swal("Error!", "Se produjo un error, intente de nuevamente o contacte al administrador del sistema", "error")
                            }
                        }
                    }); // fin ajax
                })
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh'
                    },
                    fields: {
                        no: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Número de Empleado"
                                }
                            },
                            regexp: {
                                regexp: /^[0-9]{10}$/,
                                message: 'Utilice solo dígitos'
                            }
                        },
                        nombre: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Nombre"
                                }
                            }
                        },
                        paterno: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Apellido Paterno"
                                }
                            }
                        },
                        telefono1: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un número telefónico"
                                }
                            }
                        },
                        rfc: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese el RFC"
                                },
                                regexp: {
                                   regexp: /^[A-Z]{3,4}[0-9]{6}[A-Z0-9]{3}$/,
                                   message: 'Introduce un RFC válido',
                               }
                            }
                        },
                        curp: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese el CURP"
                                }
                            }
                        },
                        no_carro: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un número de carro"
                                }
                            }
                        },
                        clave: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese Clave"
                                }
                            }
                        },
                        telefono: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Teléfono"
                                }
                            }
                        },
                        direccion: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese una Dirección"
                                }
                            }
                        },
                        correo: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese un Correo"
                                }
                            }
                        },
                        usuario: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese el nombre de Usuario"
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "Por favor ingrese la Contraseña"
                                }
                            }
                        }
                    }
                });
                // FIN VALIDADOR
    });
