<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h2>Pembelian Furniture </h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <a href="<?php echo base_url('c_tr_beli/view_keranjang') ?>"><i class="fa fa-shopping-cart"></i> Keranjang</a>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div>
                
                <div class="card-body">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th class="text-center">STOK</th>
                            <th class="text-center">AKSI</th>
                        </thead>
                    
                        <tbody>
                            <?php
                                $no=1;
                                foreach($furniture as $fn) {
                            ?>

                                <tr>

                                    <?php
                                        echo form_open('c_tr_beli/add_keranjang');
                                        echo form_hidden('id', $fn->fn_id);
                                        echo form_hidden('qty', 1);
                                        echo form_hidden('price', $fn->fn_harga_beli);
                                        echo form_hidden('name', $fn->fn_nama);
                                        echo form_hidden('redirect_page',str_replace('index.php/','',current_url()));
                                    ?>

                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $fn->fn_nama ?></td>
                                    <td>Rp <?php echo number_format($fn->fn_harga_beli, 0, ',', '.') ?></td>
                                    <td class="text-center"><?php echo $fn->fn_stok ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('c_tr_beli/detail_furniture/' .$fn->fn_id) ?>" class="btn btn-outline-primary waves-effect waves-light btn-sm"><i class="fa fa-eye"></i></a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm swalDefaultSuccess"><i class="fas fa-cart-plus">&nbsp;</i>Tambah</button>
                                    </td>

                                    <?php echo form_close(); ?>

                                </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div> <!-- end card body-->

            </div> <!-- end card -->
        </div> <!-- end col-->
    </div> <!-- end row-->
</div> <!-- container -->

