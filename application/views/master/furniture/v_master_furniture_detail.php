<!-- Main content -->
<div class="main-content" id="panel">
        <div class="container-fluid mt-3">

            <div class="card">
                <?php foreach($furniture as $fn) : ?>

                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Detail Furniture </h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_master_furniture') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a></button>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo base_url(). '/assets/image/' .$fn->fn_gambar ?>"
                                class="card-img-top">
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <td>Nama Furniture</td>
                                    <td><strong><?php echo $fn->fn_nama ?></strong></td>
                                </tr>

                                <tr>
                                    <td>Deskripsi</td>
                                    <td><strong><?php echo $fn->fn_deskripsi ?></strong></td>                                    
                                </tr>

                                <tr>
                                <td>Harga Beli</td>
                                    <td>
                                        <strong>Rp 
                                        <?php echo number_format($fn->fn_harga_beli, 0, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>

                                <tr>
                                <td>Harga Jual</td>
                                    <td>
                                        <strong>Rp 
                                        <?php echo number_format($fn->fn_harga_jual, 0, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>

                                <tr>
                                <td>Stok</td>
                                    <td><?php echo $fn->fn_stok ?></td>
                                </tr>

                                <tr>
                                <td>Kategori</td>
                                    <!-- <td><span class="badge bg-primary text-white" value="?php echo $fn->kf_id ?>">
                                    ?php echo $fn->kf_nama ?></td> -->
                                    <td><strong><?php echo $fn->kf_id ?></strong></td>
                                </tr>

                                <tr>
                                <td>Brand</td>
                                    <td><strong><?php echo $fn->bf_id ?></strong></td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>