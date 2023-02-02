<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <h4 class="page-title">Produk Furniture</h4>
                                </div>
                                <div class="col-auto">
                                    <div class="text-lg-end my-1 my-lg-0">
                                        <form class="d-flex flex-wrap align-items-center">
                                            <div class="me-3">
                                                <!-- <input type="search" class="form-control my-1 my-lg-0" id="inputPassword2" placeholder="Cari..."> -->
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end col-->
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">

                <?php foreach($furniture as $fn) { ?>
                
                <div class="col-md-6 col-xl-3">

                    <?php
                        echo form_open('c_tr_jual/add_keranjang');
                        echo form_hidden('id', $fn->fn_id);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $fn->fn_harga_jual);
                        echo form_hidden('name', $fn->fn_nama);
                        echo form_hidden('redirect_page',str_replace('index.php/','',current_url()));
                    ?>

                    <div class="card product-box">
                        <div class="card-body">
                            
                            <div class="bg-light">
                                <img src="<?= base_url('assets/image/'.$fn->fn_gambar) ?>" alt="product-pic" class="img-fluid" />
                            </div>

                            <div class="product-info">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="font-16 mt-0 sp-line-1"><?php echo $fn->fn_nama ?></h5>
                                        <h5 class="m-0"> <span class="text-muted">Rp <?php echo number_format($fn->fn_harga_jual, 0, ',', '.') ?></span></h5>
                                        <span class="badge bg-soft-success text-success mt-2">Stok <?php echo $fn->fn_stok ?></span>
                                    </div> 
                                </div> <!-- end row -->
                            </div> <!-- end product info-->
                            <div class="product-info">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm swalDefaultSuccess"><i class="fas fa-shopping-cart">&nbsp;</i> Tambah Keranjang</button>
                                    </div>
                                    <div class="col-auto">
                                        <!-- <button class="btn btn-outline-primary waves-effect waves-light btn-sm">Review</button> -->
                                        <a href="<?php echo base_url('c_home/detail_furniture/'.$fn->fn_id) ?>" class="btn btn-outline-primary waves-effect waves-light btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div> <!-- end row -->
                            </div> <!-- end product info-->
                        </div>
                    </div> <!-- end card-->
                    <?php echo form_close(); ?>
                </div> <!-- end col-->
                <?php } ?>
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
