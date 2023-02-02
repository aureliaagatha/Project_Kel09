<!-- Main content -->
<div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
                <?php foreach($promo as $pr) : ?>

                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Detail Promo</h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_master_promo') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <td>Nama Promo</td>
                                    <td><strong><?php echo $pr->pr_nama ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Deskripsi</td>
                                    <td><strong><?php echo $pr->pr_deksripsi ?></strong></td>                                    
                                </tr>

                                <tr>
                                <td>Jumlah</td>
                                    <td>
                                        <strong>Rp 
                                        <?php echo number_format($pr->pr_jumlah, 0, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Kode Promo</td>
                                    <td><strong><?php echo $pr->pr_kode ?></strong></td>
                                </tr>                                
                            </table>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>