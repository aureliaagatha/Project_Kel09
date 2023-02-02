<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="page-title-box">
                <h4 class="page-title">Pembayaran</h4>
            </div>
            <!-- Form row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3 header-title">No Rekening Toko Furnice</h4>
                            <hr />
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    Silahkan Transfer Uang Ke No Rekening Di bawah ini, Sebesar : 
                                    <h1 class="text-primary">Rp. <?= number_format($transaksi->tj_total,0) ?>.-</h1>
                                </label>
                                <br><br>
                                <table class="table">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bank</th>
                                        <th>No Rekening</th>
                                    </tr>
                                    <?php 
                                        $no=1;
                                        foreach($rekening as $key => $value) { 
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?= $value->jb_nama ?></td>
                                            <td><?= $value->jb_nomor ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3 header-title">Upload Bukti Pembayaran</h4>
                            <hr />
                            <?php
                                echo form_open_multipart('c_tr_jual/cust_tr_bayar/'.$transaksi->tj_id);
                            ?>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Atas Nama</label>
                                    <input name="tj_atas_nama" class="form-control" placeholder="Atas Nama.." >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Bank</label>
                                    <input name="tj_nama_bank" class="form-control" placeholder="Nama Bank.." required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No Rekening</label>
                                    <input name="tj_no_rek" class="form-control" placeholder="No Rekening.." required>
                                </div>
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Bukti Transfer</label>
                                    <input type="file" name="tj_bukti_bayar" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                <a href="<?= base_url('c_tr_jual/daftar_transaksi') ?>" class="btn btn-light waves-effect waves-light">Kembali</abstract>
                            <?php
                                echo form_close('')
                            ?>
                        </div> <!-- end card-body-->
                    </div>  <!-- end card -->
                </div>  <!-- end col -->
            </div>
        </div>
    </div>
</div>