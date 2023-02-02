<!-- Main content -->
<div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
                <?php foreach($vendor as $vn) : ?>

                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Detail Vendor</h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_master_vendor') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <td>Vendor</td>
                                    <td><strong><?php echo $vn->vn_nama ?></strong></td>
                                </tr>

                                <tr>
                                <td>Telepon</td>
                                    <td><strong><?php echo $vn->vn_telepon ?></strong></td>
                                </tr>

                                <tr>
                                <td>Email</td>
                                    <td><strong><?php echo $vn->vn_email ?></strong></td>
                                </tr>

                                <tr>
                                <td>Alamat</td>
                                    <td><strong><?php echo $vn->vn_alamat ?></strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>