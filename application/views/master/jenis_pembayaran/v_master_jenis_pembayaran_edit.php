    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
               <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h2>Ubah Jenis Pembayaran</h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_master_jenis_pembayaran') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
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
                        </button>
                    ',' <span class="alert-text"> </div>');
                    
                    //jika gagal upload gambar
                    if(isset($error_upload)){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>'.$error_upload.'<span class="alert-text"> </div>';
                    }

                    echo form_open_multipart('c_master_jenis_pembayaran/edit/' .$jenis_pembayaran->jb_id) ?>

                    <form action="<?php echo base_url('c_master_jenis_pembayaran/edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Nama Rekening</label>
                                        <input type="text" class="form-control mb-4" name="jb_nama" placeholder="Nama Rekening.." 
                                        value="<?php echo $jenis_pembayaran->jb_nama ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">No Rekening</label>
                                        <input type="text" class="form-control mb-6" name="jb_nomor" placeholder="No Rekening.." 
                                        value="<?php echo $jenis_pembayaran->jb_nomor ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4" />
                        <!-- Button -->
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary mr--3"><i class="fa fa-save"></i> Ubah</button>
                        </div>
                    </form>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>