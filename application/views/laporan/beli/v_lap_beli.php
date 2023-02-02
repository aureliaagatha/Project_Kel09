
    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="<?php echo base_url('c_lap_beli') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
                    </div>
                    <h4 class="page-title">Laporan Pembelian</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo & title -->
                        <div class="clearfix">
                            <div class="float-start">
                                <div class="auth-logo">
                                    <div class="logo logo-dark">
                                        <span class="logo-lg">
                                            <img src="<?php echo base_url() ?>template/system/images/logo-dark.png" alt="" height="22">
                                        </span>
                                    </div>
                
                                    <div class="logo logo-light">
                                        <span class="logo-lg">
                                            <img src="<?php echo base_url() ?>template/system/images/logo-light.png" alt="" height="22">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="float-end">
                                <h4 class="m-0 d-print-none">Laporan Pembelian</h4>
                            </div> -->
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <h3><b>Laporan Pembelian</b></h3>
                                </div>

                                <div class="mt-1">
                                    <h6>Bulan : <?= $bulan ?>, Tahun : <?= $tahun ?></h6>
                                </div> <!-- end col -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row mt-1">
                            <div class="col-sm-6">
                                <h4>PT. Furniture Bisa</h4>
                                <address>
                                    Jl. Haji Nawi No 293<br>
                                    Kelurahan Rawa Jati, Kecamatan Rawa Bunga<br>
                                    Kota Administrasi Jakarta Selatan<br>
                                    DKI Jakarta 13923
                                </address>
                            </div> <!-- end col -->

                            <div class="col-sm-6">
                                
                            </div> <!-- end col -->
                        </div> 
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mt-4 table-centered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Transaksi Id</th>
                                                <th style="width: 15%">Tanggal</th>
                                                <th style="width: 15%">Request By</th>
                                                <th style="width: 10%">Vendor</th>
                                                <th style="width: 15%" class="text-end">Total Biaya</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1;
                                            $total_harga = 0; 
                                                foreach ($lap_beli as $key => $value) {
                                                    $total_harga = $total_harga + $value->tb_total;
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><b><?php echo $value->tb_id ?></b></td>
                                                <td><?php echo $value->tb_tanggal ?></td>
                                                <td><?php echo $value->ky_id ?></td>
                                                <td><?php echo $value->vn_id ?></td>
                                                <td class="text-end"><b>Rp <?php echo number_format($value->tb_total, 0, ',', '.') ?></b></td>
                                            </tr>

                                            <?php $i++; 
                                                } ?>
                                        </tbody>
                                    </table>
                                    <h4> Total Harga Pembelian Bulan <?= $bulan ?>, Tahun <?= $tahun ?> = Rp.<?= number_format($total_harga,0) ?></h4>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="mt-4 mb-1">
                            <div class="text-end d-print-none">
                                <a href="javascript:window.print()" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-printer"></i>PDF</a>
                            </div>
                        </div>

                        <?php echo form_close();?>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row --> 
        
    </div> <!-- container -->