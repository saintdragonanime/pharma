
<body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////// //////////////////////////////////-->
    <div class="wrapper">


        <div data-active-color="white" data-background-color="primary"  class="app-sidebar"> 
            <div class="sidebar-header">
                <div class="logo clearfix" style="background-color: #fff">
                    <a href="<?php echo base_url(); ?>index.php/main/inicio" class="mb-3 logo-text float-left">
                        <div class="logo-img">
                           <img width="170px" src="<?php echo base_url(); ?>app-assets/img/ImagotipoFinal.png" />
                        </div>
                    </a>
                </div>
            </div>
            <!-- Sidebar Header Ends-->
            <!-- / main menu header-->
            <!-- main menu content-->
            <?php
            	$logueo = $this->session->userdata();
            ?>
            <div class="sidebar-content">
                <div class="nav-container">
                    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                        <!--
                        <li><a href="<?php echo base_url(); ?>index.php/main/inicio"><i class="ft-home"></i><span data-i18n="" class="menu-title">Inicio</span></a>
                        </li>
                        -->
                        <li class="has-sub nav-item"><a href="#"><i class="ft-clipboard"></i><span data-i18n="" class="menu-title">Catálogos</span></a>
                            <ul class="menu-content">
                                <?php if(isset($logueo["permiso_empleados"])) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/empleados" class="menu-item">Empleados</a>
                                </li>
                                <?php } ?>
                                <?php if(isset($logueo["permiso_clientes"])) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/clientes" class="menu-item">Clientes</a>
                                </li>
                                <?php } ?>
                                <?php if(isset($logueo["permiso_subclientes"])) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/subclientes" class="menu-item">Sub Clientes</a>
                                </li>
                                <?php } ?>
                                <?php if(isset($logueo["permiso_proveedores"])) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/proveedores" class="menu-item">Proveedores</a>
                                </li>
                                <?php } ?>
                                <?php if(isset($logueo["permiso_tarifas"])) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/tarifas" class="menu-item">Tarifas</a>
                                </li>
                                <?php } ?>
                                <?php if(isset($logueo["permiso_unidades"])) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/unidades" class="menu-item">Unidades</a>
                                </li>
                                <?php } ?>
                                <?php if(isset($logueo["permiso_incidentes"])) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/incidentes" class="menu-item">Incidentes</a>
                                </li>
                                <?php } ?>
                                <?php if(isset($logueo["permiso_almacen"])) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/almacen" class="menu-item">Almacen</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <li class="has-sub nav-item"><a href="#"><i class="ft-settings"></i><span data-i18n="" class="menu-title">Configuraciones</span></a>
                            <ul class="menu-content">
                                <li><a href="<?php echo base_url(); ?>index.php/Configuracion/" class="menu-item">Configuraciones</a>
                                </li>
                            </ul>
                        </li>
                        <?php if(1){ ?>

                       <li class="has-sub nav-item"><a href="#"><i class="ft-trending-up"></i><span data-i18n="" class="menu-title">Operaciones</span></a>
                            <ul class="menu-content">
                                <?php if(1){ ?>
                                <li><a href="<?php echo base_url(); ?>index.php/viajes/" class="menu-item">Viajes</a></li>
                                <?php }  ?>
                                <li><a href="<?php echo base_url(); ?>index.php/Tramo_viaje/" class="menu-item">Tramos</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/Gastos" class="menu-item">Gastos</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/Monitoreo" class="menu-item">Monitoreo</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/Monitoreo/hitorico" class="menu-item">Histórico Monitoreo</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/viajesfinalizados" class="menu-item">Viajes Finalizados</a>
                                <li><a href="<?php echo base_url(); ?>index.php/Viajes_terminados_cuentas" class="menu-item">Viajes Terminados Cuentas</a>
                                <li><a href="<?php echo base_url(); ?>index.php/Relacionafacturas" class="menu-item">Relacionar Facturas</a>
                                <li><a href="<?php echo base_url(); ?>index.php/Relacionacomplementos" class="menu-item">Relacionar Complementos</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/Revision_viajes_terminados" class="menu-item">Revisión Viajes Terminados</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/Viajes_terminados_pagos" class="menu-item">Viajes Terminados Pagos</a>
                                </li>
                                <li class="has-sub nav-item"><a href="#"><span data-i18n="" >Almacén</span></a>
                                    <ul class="menu-content">
                                         <li><a href="<?php echo base_url(); ?>index.php/solicitud_almacen/salida" class="menu-item">Salidas de almacén</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>index.php/solicitud_almacen/entrada" class="menu-item">Entradas de almacén</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>index.php/solicitud_almacen/asignacion" class="menu-item">Asignación a unidades</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/cuentas_cobrar/Clientes" class="menu-item">Cuentas por cobrar Clientes</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/cuentas_cobrar/Todos" class="menu-item">Cuentas por cobrar Todos</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>index.php/cuentas_cobrar/Cobros" class="menu-item">Cobros</a>
                                </li>
                            </ul>
                        </li>
                         <li class="has-sub nav-item"><a href="#"><i class="fa fa-file-excel-o"></i><span data-i18n="" class="menu-title">Reportes</span></a>
                            <ul class="menu-content">
                                <li><a href="<?php echo base_url(); ?>index.php/Reportes/Destinos" class="menu-item">Destinos</a></li>
                            </ul>
                            <ul class="menu-content">
                                <li><a href="<?php echo base_url(); ?>index.php/Reportes/FacturaCliente" class="menu-item">Factura Cliente</a></li>
                            </ul>
                            <ul class="menu-content">
                                <li><a href="<?php echo base_url(); ?>index.php/Reportes/FacturaCarro" class="menu-item">Factura Carro</a></li>
                            </ul>
                            <ul class="menu-content">
                                <li><a href="<?php echo base_url(); ?>index.php/Reportes/Mantenimiento" class="menu-item">Mantenimiento por Unidad</a></li>
                            </ul>
                            <ul class="menu-content">
                                <li><a href="<?php echo base_url(); ?>index.php/Reportes/ConsumoDiesel" class="menu-item">Consumo Diesel</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        
                    </ul>
                    
                </div>
            </div>
            <!-- main menu content-->
            <div class="sidebar-background"></div>
            <!-- main menu footer-->
            <!-- include includes/menu-footer-->
            <!-- main menu footer-->
        </div>
        <!-- / main menu-->

        <div class="main-panel">

            <!-- Navbar (Header) Starts-->
            <nav class="navbar navbar-expand-lg navbar-light bg-faded">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <!--                        <form role="search" class="navbar-form navbar-right mt-1">
                                                    <div class="position-relative has-icon-right">
                                                        <input type="text" placeholder="Search" class="form-control round"/>
                                                        <div class="form-control-position"><i class="ft-search"></i></div>
                                                    </div>
                                                </form>-->
                    </div>
                    <div class="navbar-container">
                        <div id="navbarSupportedContent" class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item mr-2"><a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen"><i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
                                        <p class="d-none">fullscreen</p></a></li>
<!--                                <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-flag font-medium-3 blue-grey darken-4"></i><span class="selected-language d-none"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right"><a href="javascript:;" class="dropdown-item py-1"><img src="../app-assets/img/flags/us.png" class="langimg"/><span> English</span></a><a href="javascript:;" class="dropdown-item py-1"><img src="../app-assets/img/flags/es.png" class="langimg"/><span> Spanish</span></a><a href="javascript:;" class="dropdown-item py-1"><img src="../app-assets/img/flags/br.png" class="langimg"/><span> Portuguese</span></a><a href="javascript:;" class="dropdown-item"><img src="../app-assets/img/flags/de.png" class="langimg"/><span> French</span></a></div>
                                </li>-->
                                <!------------------------------------------------------------->
                                <!----------------------- NOTIFICACIONES ---------------------->

                                <?php 
                                    $cuentaAlertas = count($logueo["alertasDocumentos"]);

                                ?>
                                <li class="dropdown nav-item">
                                    <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-bell font-medium-3 blue-grey darken-4">  </i> Empleado 
                                        <span class="notification badge badge-pill <?php if($cuentaAlertas!=0){ echo "badge-danger";} else{ echo "badge-success";}?>"><?php echo $cuentaAlertas; ?></span>
                                        <p class="d-none">Notificaciones</p>
                                    </a>
                                    <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                        
                                        <div class="noti-list">
                                            <?php if($cuentaAlertas!=0){
                                            foreach($logueo["alertasDocumentos"] as $alertas){
                                                ?>
                                             <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 danger">Alerta de Vencimiento</span>
                                                    <span class="noti-text">El empleado: <?php echo $alertas->nombre.' '.$alertas->paterno;?>
                                                    <br> 
                                                    presenta un documento a vencer hoy o mañana.
                                                    <br>
                                                    Revise cuanto antes esta información. </span>
                                                </span>
                                            </a>
                                            <?php }} else { ?>
                                            <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <label>No hay alertas de Documentos de Empleado</label>
                                            </a>    
                                            <?php }?>
                                        </div>
                                    </div>
                                </li>

                                <!----------------------- NOTIFICACIONES ---------------------->
                                <!------------------------------------------------------------->

                                <!----------------------------------------------------------------->
                                <!----------------------- PROXIMOS SERVICIOS ---------------------->

                                <?php 
                                    $cuentaServicios = count($logueo["proximosServicios"]);

                                ?>
                                <li class="dropdown nav-item">
                                    <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-bell font-medium-3 blue-grey darken-4">  </i>  Servicio
                                        <span class="notification badge badge-pill <?php if($cuentaServicios!=0){ echo "badge-danger";} else{ echo "badge-success";}?>"><?php echo $cuentaServicios; ?></span>
                                        <p class="d-none">Notificaciones</p>
                                    </a>
                                    <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                        
                                        <div class="noti-list">
                                            <?php if($cuentaServicios!=0){
                                            foreach($logueo["proximosServicios"] as $alertas){
                                                ?>
                                             <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 danger">Alerta de Próximo Servicio</span>
                                                    <span class="noti-text">La unidad con el económico: <?php echo floor($alertas->economico);?>, 
                                                    <br> 
                                                    que es de tipo <?php echo $alertas->tipo_vehiculo;?>
                                                    <br> 
                                                    presenta una fecha de servicio hoy o mañana. 
                                                    <br>
                                                    Revise cuanto antes esta información. </span>
                                                </span>
                                            </a>
                                            <?php }} else { ?>
                                            <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <label>No hay alertas de Próximos Servicios</label>
                                            </a>    
                                            <?php }?>
                                        </div>
                                    </div>
                                </li>

                                <!----------------------- PROXIMOS SERVICIOS ---------------------->
                                <!----------------------------------------------------------------->

                                <!------------------------------------------------------------->
                                <!----------------------- FISICOMECANICA ---------------------->

                                <?php 
                                    $cuentaFisico = count($logueo["fisicoMecanica"]);

                                ?>
                                <li class="dropdown nav-item">
                                    <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-bell font-medium-3 blue-grey darken-4">   </i> Fisicomecanica
                                        <span class="notification badge badge-pill <?php if($cuentaFisico!=0){ echo "badge-danger";} else{ echo "badge-success";}?>"><?php echo $cuentaFisico; ?></span>
                                        <p class="d-none">Notificaciones</p>
                                    </a>
                                    <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                        
                                        <div class="noti-list">
                                            <?php if($cuentaFisico!=0){
                                            foreach($logueo["fisicoMecanica"] as $alertas){
                                                ?>
                                             <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 danger">Alerta de FisicoMecanica</span>
                                                    <span class="noti-text">La unidad con el económico: <?php echo floor($alertas->economico);?>
                                                    <br> 
                                                    que es de tipo <?php echo $alertas->tipo_vehiculo;?>
                                                    <br> 
                                                    presenta una fecha de vencimiento hoy o mañana
                                                    <br>
                                                    para la fisicomecanica
                                                    <br>
                                                    Revise cuanto antes esta información. </span>
                                                </span>
                                            </a>
                                            <?php }} else { ?>
                                            <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <label>No hay alertas de Vencimiento de Fisicomecanica</label>
                                            </a>    
                                            <?php }?>
                                        </div>
                                    </div>
                                </li>

                                <!----------------------- FISICOMECANICA ---------------------->
                                <!------------------------------------------------------------->

                                <!----------------------------------------------------------->
                                <!----------------------- VERIFICACION ---------------------->

                                <?php 
                                    $cuentaVerificacion = count($logueo["verificacion"]);

                                ?>
                                <li class="dropdown nav-item">
                                    <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-bell font-medium-3 blue-grey darken-4">   </i> Verificacion
                                        <span class="notification badge badge-pill <?php if($cuentaVerificacion!=0){ echo "badge-danger";} else{ echo "badge-success";}?>"><?php echo $cuentaVerificacion; ?></span>
                                        <p class="d-none">Notificaciones</p>
                                    </a>
                                    <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                        
                                        <div class="noti-list">
                                            <?php if($cuentaVerificacion!=0){
                                            foreach($logueo["verificacion"] as $alertas){
                                                ?>
                                             <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 danger">Alerta de Verificacion</span>
                                                    <span class="noti-text">La unidad con el económico: <?php echo floor($alertas->economico);?>
                                                    <br> 
                                                    que es de tipo <?php echo $alertas->tipo_vehiculo;?>
                                                    <br> 
                                                    presenta una fecha de vencimiento hoy o mañana
                                                    <br>
                                                    para su verificacion
                                                    <br>
                                                    Revise cuanto antes esta información. </span>
                                                </span>
                                            </a>
                                            <?php }} else { ?>
                                            <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <label>No hay alertas de Vencimiento de Verificación</label>
                                            </a>    
                                            <?php }?>
                                        </div>
                                    </div>
                                </li>

                                <!----------------------- VERIFICACION ---------------------->
                                <!----------------------------------------------------------->

                                <!------------------------------------------------------>
                                <!----------------------- POLIZAS ---------------------->

                                <?php 
                                    $cuentaPolizas = count($logueo["polizas"]);

                                ?>
                                <li class="dropdown nav-item">
                                    <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-bell font-medium-3 blue-grey darken-4">  </i> Pólizas

                                        <span class="notification badge badge-pill <?php if($cuentaPolizas!=0){ echo "badge-danger";} else{ echo "badge-success";}?>"><?php echo $cuentaPolizas; ?></span>
                                    
                                        <p class="d-none">Notificaciones</p>
                                    </a>
                                    <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                        
                                        <div class="noti-list">
                                            <?php if($cuentaPolizas!=0){
                                            foreach($logueo["polizas"] as $alertas){
                                                ?>
                                             <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 danger">Alerta de Póliza</span>
                                                    <span class="noti-text">La unidad con el económico: <?php echo floor($alertas->economico);?>
                                                    <br> 
                                                    que es de tipo <?php echo $alertas->tipo_vehiculo;?>
                                                    <br> 
                                                    presenta una fecha de vencimiento hoy o mañana
                                                    <br>
                                                    para su póliza de seguro
                                                    <br>
                                                    Revise cuanto antes esta información. </span>
                                                </span>
                                            </a>
                                            <?php }} else { ?>
                                            <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                                                <label>No hay alertas de Vencimiento de Pólizas</label>
                                            </a>    
                                            <?php }?>
                                        </div>
                                    </div>
                                </li>

                                <!----------------------- POLIZAS ---------------------->
                                <!------------------------------------------------------>
                                
                                <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
                                        <p class="d-none">User Settings</p></a>
                                    <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                                        <!--
                                        <a href="javascript:;" class="dropdown-item py-1"><i class="ft-settings mr-2"></i><span>Configuración</span></a>
                                        <div class="dropdown-divider"></div>
                                        -->
                                        <!--<a href="<?php echo base_url(); ?>index.php/main/cerrar_sesion" class="dropdown-item">-->
                                        <a onclick="confirmaCerrarSesion()" class="dropdown-item">
                                            <i class="ft-power mr-2"></i><span>Cerrar Sesión</span>
                                        </a>


                                    </div>
                                </li>
<!--                                <li class="nav-item"><a href="javascript:;" class="nav-link position-relative notification-sidebar-toggle"><i class="ft-align-left font-medium-3 blue-grey darken-4"></i>
                                        <p class="d-none">Notifications Sidebar</p></a></li>-->
                            </ul>
                        </div>
                    </div>


                </div>

            </nav>

            <!-- Navbar (Header) Ends-->
            <script>
            function confirmaCerrarSesion()
            {
                /*
                var respuesta = confirm('¿Esta seguro de cerrar sesión?');
                if(respuesta == true)
                {
                    window.location = '<?php echo base_url(); ?>index.php/main/cerrar_sesion';  
                }
                */
                $.confirm({
                    icon: 'fa fa-warning',
                    title: 'Atención!',
                    content: '¿Está seguro de cerrar sesión?',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        confirmar: function () 
                        {
                            window.location = '<?php echo base_url(); ?>index.php/main/cerrar_sesion';  
                        },
                        cancelar: function () 
                        {
                            
                        }
                    }
                });
            }
            </script>