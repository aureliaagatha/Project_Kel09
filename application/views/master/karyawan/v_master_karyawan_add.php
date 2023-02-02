    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Tambah Karyawan</h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_master_karyawan') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
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

                    echo form_open_multipart('c_master_karyawan/add') ?>

                    <form action="<?php echo base_url('c_master_karyawan/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Username<span style="color: red">*</span></label>
                                    <input type="text" class="form-control mb-4" name="ky_username" placeholder="Username..">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Password<span style="color: red">*</span></label>
                                    <input type="password" class="form-control mb-4" name="ky_password" placeholder="Password..">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Nama<span style="color: red">*</span></label>
                                    <input type="text" class="form-control mb-4" name="ky_nama" placeholder="Nama Karyawan..">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">                                    
                                    <label class="control-label">Posisi<span style="color: red">*</span></label>
                                    <br />
                                    <select class="form-control" name="ps_id">
                                        <option disabled selected>--Pilih Posisi--</option>
                                        <?php foreach ($posisi as $ps) : ?>
                                            <option value="<?= $ps->ps_id ?>" <?= ($ps->ps_id ==  set_value('ps_id') ? 'selected' : '') ?>>
                                                <?= $ps->ps_nama ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Telepon<span style="color: red">*</span></label>
                                    <input type="number" class="form-control mb-4" name="ky_telepon" placeholder="Telepon..">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Email<span style="color: red">*</span></label>
                                    <input type="text" class="form-control mb-4" name="ky_email" placeholder="Email..">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Alamat<span style="color: red">*</span></label>    
                            <textarea rows="3" class="form-control mb-4" name="ky_alamat"></textarea>
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