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
	    <link href="<?php echo base_url() ?>template/system/css/config/creative/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
	    <link href="<?php echo base_url() ?>template/system/css/config/creative/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

	    <link href="<?php echo base_url() ?>template/system/css/config/creative/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
	    <link href="<?php echo base_url() ?>template/system/css/config/creative/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

	    <!-- icons -->
	    <link href="<?php echo base_url() ?>template/system/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/system/libs/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    </head>

    <!-- body start -->
    <body class="loading" data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ms-1">
                                Hi, <?php echo $this->session->userdata('pl_nama')?>
                                </span>
                                &nbsp;
                                <!-- <img src="?php echo base_url() ?>template/system/images/users/user-1.jpg" alt="user-image" class="rounded-circle"> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Selamat Datang!</h6>
                                </div>

                                <!-- item-->
                                <a href="<?php echo base_url('c_home/update_akun') ?>" class="dropdown-item notify-item">
                                    <i class="fas fa-user-cog"></i>
                                    <span>Akun Saya</span>
                                </a>

                                <!-- item-->
                                <a href="<?php echo base_url('c_tr_jual/daftar_transaksi') ?>" class="dropdown-item notify-item">
                                    <i class="fas fa-box"></i>
                                    <span>Daftar Transaksi</span>
                                </a>

                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fas fa-search-dollar"></i>
                                    <span>Daftar Promo</span>
                                </a> -->
                
                                <div class="dropdown-divider"></div>
                
                                <!-- item-->
                                <?php echo anchor('c_auth/logout_pelanggan','<span class="dropdown-item notify-item"><i class="fa fa-sign-out-alt ml-6"></i>Keluar</span>')?>
                            </div>
                        </li>
                
                        <!-- Deklarasi keranjang dan menghitung jumlah keranjang -->
                        <?php 
                            $keranjang = $this->cart->contents(); 
                            $jumlah_keranjang = 0;
                            foreach ($keranjang as $key => $value){
                                $jumlah_keranjang = $jumlah_keranjang + $value['qty'];
                            }
                        ?>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-shopping-cart noti-icon"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">
                                    <?php echo $jumlah_keranjang ?> 
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                        </span>Keranjang
                                    </h5>
                                </div>

                                <!-- Jika keranjang kosong -->
                                <?php if(empty($keranjang)){ ?>
                                    <div class="noti-scroll" data-simplebar>
                                        <p class="dropdown-item noti-title">Keranjang Belanja Kosong</p>
                                    </div>
                                <?php } else {
                                    foreach ($keranjang as $key => $value) { 
                                        $furniture = $this->m_home->detail_furniture($value['id']);
                                ?>

                                <!-- Data furniture jika keranjang isi -->
                                <div class="noti-scroll" data-simplebar>
                                    <!-- item-->
                                    <a href="#" class="dropdown-item notify-item">
                                        <div class="notify-icon mt-2">
                                            <img src="<?php echo base_url('/assets/image/'.$furniture->fn_gambar) ?>" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details"><?php echo $value['name'] ?></p>
                                        <p class="text-muted mb-1 user-msg">Qty @<?php echo $value['qty'] ?> x <?php echo number_format($value['price'], 0, ',', '.')  ?></p>
                                        <p class="text-muted mb-1 user-msg"><b>Sub Total</b> Rp <?= number_format($value['subtotal'], 0, ',', '.')  ?></p>
                                    </a>
                                    <?php } ?> <!-- Tutup foreach-->
                                </div>

                                <!-- Total keranjang -->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <tr>
                                            <td colspan="2"> </td>
                                            <td class="right">Total</td>
                                        </tr>
                                        <span class="float-end">Rp <b><?php echo number_format($this->cart->total(), 0, ',', '.'); ?></b>
                                    </h5>
                                </div>

                                <!-- Lihat Keranjang dan bayar belanja-->
                                <a href="<?php echo base_url('c_tr_jual/view_keranjang') ?>" class="dropdown-item text-center text-success notify-item notify-all">
                                    SEMUA KERANJANG
                                    <i class="fe-arrow-right"></i>
                                </a>
                                <a href="<?php echo base_url('c_tr_jual/view_checkout') ?>" class="dropdown-item text-center text-primary notify-item notify-all">
                                    BAYAR BELANJA
                                    <i class="fe-arrow-right"></i>
                                </a>

                                <?php }  ?>  <!-- Tutup if empty-->                           
                            </div>
                        </li>

                    </ul>
                
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="<?php echo base_url() ?>" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="<?php echo base_url() ?>template/system/images/logo-sm.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url() ?>template/system/images/logo-dark.png" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>
                
                        <a href="<?php echo base_url() ?>" class="logo logo-light text-center">
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

                        <?php $kategori_furniture = $this->m_home->get_all_data_kategori(); ?>
                        <li class="dropdown d-none d-xl-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                Kategori
                                <i class="mdi mdi-chevron-down"></i> 
                            </a>
                            <ul class="dropdown-menu">
                                <!-- item -->
                                <?php foreach($kategori_furniture as $key => $value) { ?>
                                <li>
                                    <a href="<?= base_url('c_home/list_kategori/'.$value->kf_id) ?>" class="dropdown-item">
                                        <?= $value->kf_nama ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>

                        <?php $brand_furniture = $this->m_home->get_all_data_brand(); ?>
                        <li class="dropdown d-none d-xl-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                Brand
                                <i class="mdi mdi-chevron-down"></i> 
                            </a>
                            <ul class="dropdown-menu">
                                <!-- item -->
                                <?php foreach($brand_furniture as $key => $value) { ?>
                                <li>
                                    <a href="<?= base_url('c_home/list_brand/'.$value->bf_id) ?>" class="dropdown-item">
                                        <?= $value->bf_nama ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end Topbar -->