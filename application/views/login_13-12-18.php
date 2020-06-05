<!DOCTYPE html>
<html lang="en" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>FRATSA</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>app-assets/img/icon.png">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>app-assets/img/icon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!--<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">-->
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/sweetalert2.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/js/formvalidation/formValidation.min3f0d.css?v2.2.0">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <style>
/*        body {
            background-image: url("<?php echo base_url(); ?>app-assets/img/banner.jpg");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
         }*/
     </style>
  </head>
  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--Registration Page Starts-->
<section id="regestration">
    <div class="container">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="col-12 col-sm-12 col-md-6" >
                                <div class="card-block">
                                        <img style="margin-top: 16%" alt="Card image cap" src="<?php echo base_url(); ?>app-assets/img/logo.jpg" width="350" height="155">
                                    <h2 class="card-title font-large-1 text-center white mt-3"></h2>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 d-flex align-items-center" style="background-color:#B71C1C">
                                <div class="card-block mx-auto">
                                    <br>
                                    <form id="form-login" method="post">
                                        <div class="form-group input-group mb-3">
                                            <span class="input-group-addon">
                                                <i class="icon-user"></i>
                                            </span>
                                            <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Usuario" >
                                        </div>
                                        <div class="form-group input-group mb-3">
                                            <span class="input-group-addon">
                                                <i class="ft-lock"></i>
                                            </span>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" >
                                        </div>
                                        <div class=" text-center">
                                            <button type="submit" class="btn btn-raised gradient-blue-grey-blue-grey white" >Iniciar Sesión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    
    $(document).ready(function()
    {
        $("#form-login").submit(function () {
            //login();
            if($("#usuario").val()=="" || $("#password").val()=="")
            {
                swal("Incorrecto","Verifique su nombre de usuario y/o contraseña","error");
            }
            else
            {
                login();
            }
            
        });
    });

    function login() {
        
        if($("#usuario").val()=="" || $("#password").val()=="")
        {
            swal("Incorrecto","Verifique su nombre de usuario y/o contraseña","error");
        }
        else{
            $.ajax({
                type: "POST",
                traditional: true,
                url: "<?php echo base_url(); ?>Main/iniciar_Sesion",
                cache: false,
                data: {usuario: $("#usuario").val(), pass: $("#password").val()},
                success: function (data) {
                    if (data==="ok")
                    {
                        swal({
                            title: 'Bienvenido',
                            text: "",
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false,
                        }).then(function (isConfirm) {
                            if (isConfirm) {
                               
                            }
                        }).catch(swal.noop);
                        window.location.href = "<?php echo base_url(); ?>index.php/main/inicio";
                    }
                    else
                    {
                        swal("Incorrecto","Verifique su nombre de usuario y/o contraseña","error");
                        window.location.href = "<?php echo base_url(); ?>";
                    }
                }
            }); // fin ajax
        }
    }

    

</script>
<!--Registration Page Ends-->
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/formvalidation/formValidation.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/formvalidation/framework/bootstrap.min.js"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?php echo base_url(); ?>app-assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    
    <!-- END PAGE LEVEL JS-->
  </body>
</html>