<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('c_home') ?>"><i class="fas fa-angle-left">&nbsp;</i>Kembali</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Akun Saya</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                    <?php 
                                    //notifikasi validasi
                                    echo validation_errors('
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    ',' <span class="alert-text"> </div>');

                                    echo form_open_multipart('c_home/update_akun/' .$pelanggan->pl_id) ?>

                                    <form action="<?php echo base_url('c_home/update_akun') ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Username</label>
                                                    <input type="text" class="form-control mb-4" name="pl_username" placeholder="Username.." value="<?php echo $pelanggan->pl_username ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Password</label>
                                                    <input type="password" class="form-control mb-4" name="pl_password" placeholder="Password.." value="<?php echo $pelanggan->pl_password ?>"> 
                                                </div>
                                            </div>
                                        </div>    

                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Nama Pelanggan</label>
                                            <input type="text" class="form-control mb-4" name="pl_nama" placeholder="Nama Pelanggan.." value="<?php echo $pelanggan->pl_nama ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Telepon</label>
                                                    <input type="number" class="form-control mb-4" name="pl_telepon" placeholder="Telepon.." value="<?php echo $pelanggan->pl_telepon ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Email</label>
                                                    <input type="text" class="form-control mb-4" name="pl_email" placeholder="Email.." value="<?php echo $pelanggan->pl_email ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Alamat</label>
                                            <textarea rows="3" class="form-control mb-4" name="pl_alamat"><?php echo $pelanggan->pl_alamat ?></textarea>
                                        </div>

                                        <hr class="my-4" />
                                        <!-- Button -->
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary mr--3"><i class="fa fa-save"></i> Ubah</button>
                                        </div>
                                    </form>
                                    <?php echo form_close() ?>

                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->