    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Tambah Posisi</h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_master_posisi') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div>

                <div class="card-body">
                    <?php 
                    //notifikasi validasi
                    echo validation_errors('
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    ',' <span class="alert-text"> </div>');

                    echo form_open_multipart('c_master_posisi/add') ?>

                    <form action="<?php echo base_url('c_master_posisi/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Posisi<span style="color: red">*</span></label>
                            <input type="text" class="form-control mb-4" name="ps_nama" placeholder="Posisi..">
                        </div>

                        <hr class="my-4" />
                        <!-- Button -->
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary mr--3"><i class="fa fa-save"></i> Tambah</button>
                        </div>
                    </form>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>