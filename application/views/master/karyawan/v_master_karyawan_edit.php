    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Ubah Karyawan</h2>
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

                    echo form_open_multipart('c_master_karyawan/edit/' .$karyawan->ky_id) ?>

                    <form action="<?php echo base_url('c_master_karyawan/edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Username</label>
                                        <input type="text" class="form-control mb-4" name="ky_username" kyaceholder="Username.." value="<?php echo $karyawan->ky_username ?>">
                                    </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Password</label>
                                    <input type="password" class="form-control mb-4" name="ky_password" kyaceholder="Password.." value="<?php echo $karyawan->ky_password ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Nama Karyawan</label>
                                    <input type="text" class="form-control mb-4" name="ky_nama" kyaceholder="Nama Karyawan.." value="<?php echo $karyawan->ky_nama ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Posisi</label>
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
                                    <label class="form-control-label" for="input-address">Telepon</label>
                                    <input type="number" class="form-control mb-4" name="ky_telepon" kyaceholder="Telepon.." value="<?php echo $karyawan->ky_telepon ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Email</label>
                                    <input type="text" class="form-control mb-4" name="ky_email" kyaceholder="Email.." value="<?php echo $karyawan->ky_email ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Alamat</label>
                            <textarea rows="3" class="form-control mb-4" name="ky_alamat"><?php echo $karyawan->ky_alamat ?></textarea>
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