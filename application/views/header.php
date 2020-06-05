<!DOCTYPE html>
<html lang="en"  class="loading">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="author" content="Mangoo">
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
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/chartist.min.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/tables/datatable/dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/tables/datatable/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/toastr.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/easy-autocomplete.min.css"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/chosen.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/balloon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/spectrum.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/fullcalendar.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/pickadate/pickadate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/js/formvalidation/formValidation.min3f0d.css?v2.2.0">
        <!-- END VENDOR CSS-->
        <!-- BEGIN APEX CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/app.css">  
        <script src="<?php echo base_url(); ?>app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
        <!--
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css"> 
        -->
        <!-- END APEX CSS-->
        <!-- BEGIN Page Level CSS--> 
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <!-- END Custom CSS-->
        
        <!-- include summernote css/js -->
<!--        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>-->
  
        <link rel="stylesheet"  href="<?php echo base_url(); ?>app-assets/vendors/css/jquery.timepicker.css">
        <link rel="stylesheet"  href="<?php echo base_url(); ?>app-assets/vendors/css/datepicker.css">
     
        <script src="<?php echo base_url(); ?>app-assets/vendors/js/jquery.timepicker.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>app-assets/vendors/js/bootstrap-datepicker.js" type="text/javascript"></script>
 
        <link rel="stylesheet"  href="<?php echo base_url(); ?>app-assets/vendors/css/richtext.min.css">

        <script src="<?php echo base_url(); ?>app-assets/vendors/js/jquery.richtext.min.js" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

        
        <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.dataTables.min.css">
        <script src="<?php echo base_url(); ?>app-assets/js/dataTables.buttons.min.js"></script>
        
        <script src="<?php echo base_url(); ?>app-assets/js/chosen.jquery.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>app-assets/js/altEditor/dataTables.altEditor.free.js" type="text/javascript"></script>

        <!-- BOTONES -->
        <script src="<?php echo base_url(); ?>app-assets/js/jszip.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/jszip.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.bootstrap4.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.colVis.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.colVis.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.flash.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.flash.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.foundation.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.foundation.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.html5.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.jqueryui.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.jqueryui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.print.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.semanticui.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/buttons.semanticui.min.js" type="text/javascript"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.dataTables.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.foundation.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.foundation.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.jqueryui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.jqueryui.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.semanticui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/buttons.semanticui.min.css">

        <!--Estilos de botones de vista unidad-->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/estil.css">

        <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.editable.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>app-assets/js/jquery.tabledit.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>app-assets/js/jquery.tabledit.min.js" type="text/javascript"></script>

<!--        <script src="<?php echo base_url(); ?>app-assets/js/pick-a-datetime.js" type="text/javascript"></script>-->
<!--        <script src="<?php echo base_url(); ?>app-assets/js/pick-a-datetime.min.js" type="text/javascript"></script>-->
<!--        <script src="<?php echo base_url(); ?>app-assets/vendors/js/datepicker.common.js" type="text/javascript"></script>-->
        

<script src="<?php echo base_url(); ?>app-assets/vendors/js/pickadate/picker.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>app-assets/vendors/js/pickadate/picker.date.js" type="text/javascript"></script>

<!--    <script src="<?php echo base_url(); ?>app-assets/js/pick-a-datetime.js" type="text/javascript"></script>-->


        <style>
        .classBotonFratsa{
            background-color: #B71C1C;
        }    

        .classBotonFratsa:hover {
            background-color: #B71C1C;
        }  
        </style>

        <script>base_url="<?php echo base_url(); ?>";</script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>app-assets/vendors/js/confirm/jquery-confirm.min.css">
        <script src="<?php echo base_url(); ?>app-assets/vendors/js/confirm/jquery-confirm.min.js"></script>
        <input type="hidden" id="base_url" value="<?php echo base_url(); ?>"  >
    </head>