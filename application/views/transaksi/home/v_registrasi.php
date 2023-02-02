<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Furnice | Pelanggan Signup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>template/system/images/favicon.ico">

		<!-- App css -->
		<link href="<?php echo base_url() ?>template/system/css/config/creative/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="<?php echo base_url() ?>template/system/css/config/creative/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="<?php echo base_url() ?>template/system/css/config/creative/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="<?php echo base_url() ?>template/system/css/config/creative/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="<?php echo base_url() ?>template/system/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <div class="auth-logo">
                                        <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="<?php echo base_url() ?>template/system/images/logo-dark.png" alt="" height="22">
                                            </span>
                                        </a>
                    
                                        <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="<?php echo base_url() ?>template/system/images/logo-light.png" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-sm-3">
                                            <h4 class="mt-3 mt-lg-0 mb-3">Daftar Pelanggan Baru</h4>

                                            <?php 
                                            //notifikasi validasi
                                            echo validation_errors('
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"></span>
                                                </button>
                                            ',' <span class="alert-text"> </div>');

                                            echo form_open_multipart('c_home/registrasi') ?>

                                            <form action="<?php echo base_url('c_home/registrasi') ?>" method="post" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label class="form-label">Username</label>
                                                        <input class="form-control" type="text" name="pl_username" placeholder="Masukan Nama Pengguna.." required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Password</label>
                                                        <input class="form-control" type="password" name="pl_password" placeholder="Masukan Kata Sandi.." required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Pelanggan</label>
                                                    <input class="form-control" type="text" name="pl_nama" placeholder="Masukan Nama Lengkap.." required>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label class="form-label">Telepon</label>
                                                        <input class="form-control" type="text" name="pl_telepon" placeholder="Masukan Telepon.." required>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Email</label>
                                                        <input class="form-control" type="text" name="pl_email" placeholder="Masukan Email.." required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea class="form-control" name="pl_alamat" rows="3"></textarea>
                                                </div>
                                                <div class="mt-4 mb-0">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"> Sign Up </button>
                                                    <a href="<?php echo base_url('c_auth/login_pelanggan'); ?>" class="btn btn-outline-primary w-100 waves-effect waves-light mt-2"> Sudah Punya Akun </a>
                                                </div>
                                            </form>
                                            
                                            <?php echo form_close() ?>
                                        </div>
                                        
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row-->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="<?php echo base_url() ?>template/system/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url() ?>template/system/js/app.min.js"></script>
        
    </body>
</html>