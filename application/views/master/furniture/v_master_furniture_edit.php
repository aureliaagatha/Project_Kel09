    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Ubah Furniture </h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_master_furniture') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
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

                    echo form_open_multipart('c_master_furniture/edit/' .$furniture->fn_id) ?>

                    <form action="<?php echo base_url('c_master_furniture/edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Nama Furniture</label>
                            <input type="text" class="form-control mb-4" name="fn_nama" placeholder="Nama furniture.." value="<?php echo $furniture->fn_nama ?>">

                            <label class="form-control-label">Deskripsi</label>
                            <textarea rows="3" class="form-control mb-4" name="fn_deskripsi"><?php echo $furniture->fn_deskripsi ?></textarea>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Harga Beli</label>
                                        <input type="number" class="form-control mb-4" name="fn_harga_beli" placeholder="Harga beli (Rupiah).." 
                                        value="<?php echo $furniture->fn_harga_beli ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Harga Jual</label>
                                        <input type="number" class="form-control mb-4" name="fn_harga_jual" placeholder="Harga jual (Rupiah).." 
                                        value="<?php echo $furniture->fn_harga_jual ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Stok</label>
                                        <input type="number" class="form-control mb-4" name="fn_stok" placeholder="Stok (Unit).." 
                                        value="<?php echo $furniture->fn_stok ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Kategori<span style="color: red">*</span></label>
                                        <br />
                                        <select class="form-control" name="kf_id">
                                            <option disabled selected>--Pilih Kategori--</option>
                                            <?php foreach ($kategori as $kf) : ?>
                                                <option value="<?= $kf->kf_id ?>" <?= ($kf->kf_id ==  set_value('kf_id') ? 'selected' : '') ?>>
                                                    <?= $kf->kf_nama ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Brand<span style="color: red">*</span></label>
                                        <br />
                                        <select class="form-control" name="bf_id">
                                            <option disabled selected>--Pilih Brand--</option>
                                            <?php foreach ($brand as $bf) : ?>
                                                <option value="<?= $bf->bf_id ?>" <?= ($bf->bf_id ==  set_value('bf_id') ? 'selected' : '') ?>>
                                                    <?= $bf->bf_nama ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <label class="form-control-label" for="input-address">Ganti Gambar</label>
                            <input type="file" class="form-control mb-4" name="fn_gambar" id="preview_gambar" placeholder="Pilih gambar..">

                            <div class="col-lg-12 text-center mt-4 mb-4">
                                <img src="<?php echo base_url('assets/image/'.$furniture->fn_gambar)?>" id="gambar_load" width="300px" height="300px">
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