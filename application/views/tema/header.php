<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon_1.ico">

        <title><?php echo $titulo; ?></title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/morris/morris.css">

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>vassets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/propios.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>


    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">

                            <li class="navbar-c-items">
                                <a> <?php echo $this->session->userdata('nombre'); ?></a>
                            </li>

                            <li class="dropdown navbar-c-items">
                                <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true">
                                    <span class="glyphicon  glyphicon-user" aria-hidden="true"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i>Update data</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>
                            <li class="dropdown navbar-c-items">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                    <span class="glyphicon  glyphicon-bell" aria-hidden="true"></span> 
                                    <span class="badge badge-xs badge-danger">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                    <li class="list-group nicescroll notification-list">
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog fa-2x text-custom"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Updates</h5>
                                                    <p class="m-0">
                                                        <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New user registered</h5>
                                                    <p class="m-0">
                                                        <small>You have 10 unread messages</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog fa-2x text-custom"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="list-group-item text-right">
                                            <small class="font-600">See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu active">
                                <a href="#"><i class="md  md-person"></i>User</a>
                                <ul class="submenu">
                                    <li class="active">
                                        <a href="index.html">Add</a>
                                    </li>
                                    <li class="active">
                                        <a href="index.html">List</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="md md-color-lens"></i>Category</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url(); ?>Categoria_controller/vista_agregar_categoria">Add</a></li>
                                    <li><a href="<?php echo base_url(); ?>Categoria_controller/listar_categorias">List</a></li>
                                </ul>
                            </li>


                            <li class="has-submenu">
                                <a href="#"><i class="md md-layers"></i>Subcategory</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url(); ?>Subcategoria_controller/vista_agregar_subcategoria">Add</a></li>
                                    <li><a href="<?php echo base_url(); ?>Subcategoria_controller/listar_subcategorias">List</a></li>
                                </ul> 

                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="md  md-label"></i>Product</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url(); ?>Productos_controller/vista_agregar_producto">Add</a></li>
                                    <li><a href="<?php echo base_url(); ?>Productos_controller/mostrar_productos">List</a></li>
                                </ul>         
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="md  md-local-shipping"></i>Truck</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url(); ?>Camion_controller/vista_agregar_camion">Add</a></li>
                                    <li><a href="<?php echo base_url(); ?>Camion_controller/listar_camiones">List</a></li>
                                </ul>         
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="md  md-perm-contact-cal"></i>Pailot</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url(); ?>Chofer_controller/vista_agregar_chofer">Add</a></li>
                                    <li><a href="<?php echo base_url(); ?>Chofer_controller/listar_chofer">List</a></li>
                                </ul>         
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="md  md-folder"></i>Route</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url(); ?>Ruta_controller/vista_agregar_ruta">Add</a></li>
                                    <li><a href="<?php echo base_url(); ?>Ruta_controller/listar_rutas">List</a></li>
                                </ul>         
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="md  md-assignment-late"></i>Orders</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url(); ?>Pedidos_controller/vista_agregar_pedido">Add</a></li>
                                    <li><a href="<?php echo base_url(); ?>Pedidos_controller/listar_pedidos_pendientes">List Order Pending</a></li>
                                    <li><a href="<?php echo base_url(); ?>Pedidos_controller/listar_pedidos_enviados">List Order Sent</a></li>
                                </ul>         
                            </li>

                            <li class="">
                                <a href="<?php echo base_url(); ?>Tienda_controller/tienda"><i class="md md-shopping-cart"></i>Store</a>
                            </li>

                            <li class="">
                                <a href="<?php echo base_url(); ?>Contacto_controller/contacto"><i class="md md-account-child"></i>Contact</a>
                            </li>
                        
                            <li class="">
                                <a href="#"><i class="md md-account-child"></i>Reports</a>
                            </li>
                            
                        </ul>
                        <!--End navigation menu-->
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->

        <div class="wrapper">
            <div class="container">