<!-- Main content -->
<div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
                <?php foreach($pelanggan as $pl) : ?>

                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Tambah Pelanggan</h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_master_pelanggan') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <td>Username</td>
                                    <td><strong><?php echo $pl->pl_username ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Password</td>
                                    <td><strong><?php echo $pl->pl_password ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Nama Pelanggan</td>
                                    <td><strong><?php echo $pl->pl_nama ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Telepon</td>
                                    <td><strong><?php echo $pl->pl_telepon ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><strong><?php echo $pl->pl_email ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Alamat</td>
                                    <td><strong><?php echo $pl->pl_alamat ?></strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>