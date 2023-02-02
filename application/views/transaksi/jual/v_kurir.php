<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <!-- start page title -->
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Pesanan Dikirim</h2>
                        </div>
                    </div> <!-- end row -->
                </div>    
                <!-- end page title --> 

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                                <ul class="nav nav-tabs nav-bordered">
                                    <li class="nav-item">
                                        <a href="#pengiriman-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                            Pengiriman
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
                                    <div class="tab-pane show active" id="pengiriman-b1">
                                        <table id="" class="display table dt-responsive nowrap w-100">
                                            <thead>
                                                <th>NO</th>
                                                <th>ID TRANSAKSI</th>
                                                <th>NO RESI</th>
                                                <th>TANGGAL</th>
                                                <th class="text-center">STATUS</th>
                                                <th class="text-center">AKSI</th>
                                            </thead>
                                        
                                            <tbody>
                                                <?php
                                                    $no=1;
                                                    foreach($kirim as $key => $value) {
                                                ?>                                                    
                                                    <?php if($value->tj_status==4) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $value->tj_id ?></td>
                                                            <td><?php echo $value->tj_resi ?></td>
                                                            <td><?php echo $value->tj_tanggal ?></td>
                                                            <td class="text-center">
                                                                <span class="badge bg-warning">Sedang Dikirim</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if($value->tj_status==4) { ?>
                                                                    <button class="btn btn-sm btn-success btn-flat" 
                                                                        data-bs-toggle="modal" data-bs-target="#kurir<?= $value->tj_id ?>"><i class="far fa-eye">&nbsp;</i>Detail</button>
                                                                    <a href="<?= base_url('c_kurir/selesai/' .$value->tj_id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-check">&nbsp;</i>Selesai</a>
                                                                <?php } ?>                                                            
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php }  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Tab Belum bayar -->

                                    <!-- Tab Selesai -->
                                    <div class="tab-pane" id="selesai-b1">
                                    <table id="" class="display table dt-responsive nowrap w-100">
                                            <thead>
                                                <th>NO</th>
                                                <th>ID TRANSAKSI</th>
                                                <th>NO RESI</th>
                                                <th>TANGGAL</th>
                                                <th class="text-center">STATUS</th>
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
                                                            <td class="text-center">
                                                                <span class="badge bg-primary">Sudah Diterima Pembeli</span>
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
                                                                <td class="text-center">                                                                
                                                                    <span class="badge bg-success">Selesai</span>
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
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
</div>

<?php foreach ($kirim as $key => $value) { ?>
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
                            <th>Nama</th>
                            <th>:</th>
                            <td><?= $value->tj_nama ?></td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <th>:</th>
                            <td><?= $value->tj_telepon ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <td><p><?= $value->tj_alamat ?></p></td>
                        </tr>                        
                        <!-- <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <td>?= $value->tj_ongkir ?></td>
                        </tr> -->
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>