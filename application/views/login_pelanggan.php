
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Furnice | Pelanggan Login</title>
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
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                <br>
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="#" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="<?php echo base_url() ?>template/system/images/logo-dark.png" alt="" height="22">
                                            </span>
                                        </a>
                    
                                        <a href="#" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="<?php echo base_url() ?>template/system/images/logo-light.png" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="text-muted mb-4 mt-3">Anda Login Sebagai Pelanggan</p>
                                </div>

                                <?php echo $this->session->flashdata('pesan') ?>
                                <form method="post" action="<?php echo base_url('c_auth/login_pelanggan')?>" class="user">

                                    <div class="mb-2">
                                        <label for="emailaddress" class="form-label">Username</label>
                                        <input class="form-control" type="text" name="pl_username" id="pl_username" required="" placeholder="Masukkan Username Anda">
                                        <?php echo form_error('pl_username', '<div class="text-danger small"', '</div>') ?>
                                    </div>

                                    <div class="mb-2">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="pl_password" id="pl_password" class="form-control" placeholder="Masukkan Username Anda">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            <?php echo form_error('pl_password', '<div class="text-danger small"', '</div>') ?>
                                        </div>
                                    </div>

                                  
                                    <div class="text-center d-grid mt-4">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"> Masuk </button>
                                    </div>

                                </form>

                                <div class="text-center d-grid mt-2">
                                    <a href="<?php echo base_url('c_auth/login_karyawan'); ?>" class="btn btn-outline-primary waves-effect waves-light" type="submit"> Saya, Karyawan </a>
                                </div>
                                <br>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Belum punya akun? <a href="<?php echo base_url('c_home/registrasi'); ?>" class="text-white ms-1"><b>Daftar</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

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