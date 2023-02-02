<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Furnice - Furniture Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>template/system/images/favicon.ico">

        <!-- third party css -->
        <link href="<?php echo base_url() ?>template/system/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>template/system/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>template/system/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>template/system/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- Plugins css -->
        <link href="<?php echo base_url() ?>template/system/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>template/system/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        
        <!-- App css -->
        <link href="<?php echo base_url() ?>template/system/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="<?php echo base_url() ?>template/system/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="<?php echo base_url() ?>template/system/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="<?php echo base_url() ?>template/system/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

        <!-- icons -->
        <link href="<?php echo base_url() ?>template/system/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/system/libs/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <!-- <img src="?php echo base_url() ?>template/system/images/users/user-1.jpg" alt="user-image" class="rounded-circle"> -->
                                <span class="pro-user-name ms-1">
                                    <?php echo $this->session->userdata('ky_nama')?> <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <div class="dropdown-divider"></div>
                
                                <!-- item-->
                                <?php echo anchor('c_auth/logout_karyawan','<span class="dropdown-item notify-item"><i class="fe-log-out"></i>Keluar</span>')?>
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a> -->
                
                            </div>
                        </li>
                    </ul>
                
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="#" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="<?php echo base_url() ?>template/system/images/logo-sm.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url() ?>template/system/images/logo-dark.png" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>
                
                        <a href="#" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="<?php echo base_url() ?>template/system/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url() ?>template/system/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                    </div>
                
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>   
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Dashboard Manager</li>
                            
                            <li>
                                <a href="<?php echo base_url('c_manager') ?>">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">Laporan</li>

                            <li>
                                <a href="<?php echo base_url('c_lap_jual') ?>">
                                    <i class="fas fa-file-upload"></i>
                                    <span> Laporan Penjualan </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('c_lap_beli') ?>">
                                    <i class="fas fa-file-download"></i>
                                    <span>  Laporan Pembelian </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
