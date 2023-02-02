<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_home') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
                            </div>
                        </div>
                        <h4 class="page-title">Daftar Transaksi</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        
                            <ul class="nav nav-tabs nav-bordered">
                                <li class="nav-item">
                                    <a href="#belumbayar-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                        Belum Bayar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#diproses-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        Diproses
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#dikirim-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        Dikirim
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#selesai-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        Selesai
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Tab Belum bayar -->
                                <div class="tab-pane show active" id="belumbayar-b1">
                                    <table id="" class="display table dt-responsive nowrap w-100">
                                        <thead>
                                            <th>NO</th>
                                            <th>ID TRANSAKSI</th>
                                            <th>TANGGAL</th>
                                            <th>TOTAL</th>
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center">AKSI</th>
                                        </thead>
                                    
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach($belumbayar as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $value->tj_id ?></td>
                                                    <td><?php echo $value->tj_tanggal ?></td>
                                                    <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                    <td class="text-center">
                                                        <?php if($value->tj_status==1) { ?>
                                                            <span class="badge bg-danger">Belum Bayar</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('c_tr_jual/cust_tr_bayar/' .$value->tj_id) ?>" class="btn btn-primary btn-sm"><i class="far fa-money-bill-alt">&nbsp;</i>Bayar</a>
                                                    </td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Tab Belum bayar -->

                                <!-- Tab Proses -->
                                <div class="tab-pane" id="diproses-b1">
                                    <table id="" class="display table dt-responsive nowrap w-100">
                                        <thead>
                                            <th>NO</th>
                                            <th>ID TRANSAKSI</th>
                                            <th>TANGGAL</th>
                                            <th>TOTAL</th>
                                            <th class="text-center">STATUS</th>
                                            <!-- <th class="text-center">AKSI</th> -->
                                        </thead>
                                    
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach($diproses as $key => $value) {
                                            ?>
                                                <?php if($value->tj_status==2) { ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $value->tj_id ?></td>
                                                    <td><?php echo $value->tj_tanggal ?></td>
                                                    <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                    <td class="text-center">
                                                        <?php if($value->tj_status==2) { ?>
                                                            <span class="badge bg-warning"><i class="fa fa-box-open">&nbsp;</i>Pesanan Disiapkan</span><br>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php }
                                                else { ?>
                                                    <?php if($value->tj_status==3) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $value->tj_id ?></td>
                                                            <td><?php echo $value->tj_tanggal ?></td>
                                                            <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                            <td class="text-center">
                                                            <?php if($value->tj_status==3) { ?>
                                                                    <span class="badge bg-success"><i class="fa fa-box">&nbsp;</i>Siap Dikirim</span><br>
                                                                <?php } else { ?>                                                                        
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Tab Proses -->

                                <!-- Tab Dikirm -->
                                <div class="tab-pane" id="dikirim-b1">
                                    <table id="" class="display table dt-responsive nowrap w-100">
                                        <thead>
                                            <th>NO</th>
                                            <th>ID TRANSAKSI</th>
                                            <th>NO RESI</th>
                                            <th>TANGGAL</th>
                                            <th>TOTAL</th>
                                            <th class="text-center">STATUS</th>
                                            <!-- <th class="text-center">AKSI</th> -->
                                        </thead>
                                    
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach($dikirim as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $value->tj_id ?></td>
                                                    <td><?php echo $value->tj_resi ?></td>
                                                    <td><?php echo $value->tj_tanggal ?></td>
                                                    <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                    <td class="text-center">
                                                        <?php if($value->tj_status==4) { ?>
                                                            <span class="badge bg-info"><i class="fa fa-truck">&nbsp;</i>Sedang Dikirim</span> <br>
                                                        <?php }?>
                                                    </td>
                                                </tr>

                                            <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Tab Dikirm -->

                                <!-- Tab Selesai -->
                                <div class="tab-pane" id="selesai-b1">
                                    <table id="" class="display table dt-responsive nowrap w-100">
                                        <thead>
                                            <th>NO</th>
                                            <th>ID TRANSAKSI</th>
                                            <th>NO RESI</th>
                                            <th>TANGGAL</th>
                                            <th>TOTAL</th>
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center">AKSI</th>
                                        </thead>
                                    
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach($selesai as $key => $value) {
                                            ?>
                                                
                                                <?php if($value->tj_status==5) { ?>
                                                    <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $value->tj_id ?></td>
                                                    <td><?php echo $value->tj_resi ?></td>
                                                    <td><?php echo $value->tj_tanggal ?></td>
                                                    <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                    <td class="text-center">
                                                        <span class="badge bg-pink">Menunggu Konfirmasi</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if($value->tj_status==5) { ?>
                                                            <a href="<?= base_url('c_tr_jual/selesai/' .$value->tj_id) ?>" class="btn btn-success btn-sm"><i class="fa fa-check">&nbsp;</i>Selesai</a>
                                                        <?php } ?>  
                                                    </td>
                                                    </tr>
                                                <?php }
                                                else { ?>
                                                    <?php if($value->tj_status==0) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $value->tj_id ?></td>
                                                            <td><?php echo $value->tj_resi ?></td>
                                                            <td><?php echo $value->tj_tanggal ?></td>
                                                            <td><b>Rp <?php echo number_format( $value->tj_total, 0, ',', '.') ?></b></td>
                                                            <td class="text-center">
                                                                <span class="badge bg-success">Selesai</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <button class="btn btn-sm btn-primary btn-flat" 
                                                                data-bs-toggle="modal" data-bs-target="#kurir<?= $value->tj_id ?>">Detail Pesanan</button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Tab Selesai -->

                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
            
        </div> <!-- container -->

    </div> <!-- content -->
</div>

<!-- cek modal bukti pembayaran -->
<?php foreach ($belumbayar as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->tj_id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"><?= $value->tj_id ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <td><?= $value->tj_nama_bank ?></td>
                        </tr>
                        <tr>
                            <th>No Rekening</th>
                            <th>:</th>
                            <td><?= $value->tj_no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <td><?= $value->tj_atas_nama ?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td><?= number_format($value->tj_total,0) ?></td>
                        </tr>
                    </table>

                    <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/'.$value->tj_bukti_bayar) ?>" alt="">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>

<!-- cek modal bukti pembayaran -->
<?php foreach ($selesai as $key => $value) { ?>
    <div class="modal fade" id="kurir<?= $value->tj_id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"><?= $value->tj_id ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>No Resi</th>
                            <th>:</th>
                            <td><?= $value->tj_resi ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <th>:</th>
                            <td><?= $value->tj_tanggal ?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <td><?= $value->tj_nama ?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td><?= number_format($value->tj_total,0) ?></td>
                        </tr>
                        <tr>
                            <th>Kurir</th>
                            <th>:</th>
                            <td><?= $value->tj_kurir ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>:</th>
                            <td>Pesanan Diterima</td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>