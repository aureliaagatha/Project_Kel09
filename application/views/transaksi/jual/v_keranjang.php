<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Keranjang Belanja</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <?php echo form_open('c_tr_jual/update_keranjang'); ?>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless table-nowrap table-centered mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Furniture</th>
                                                                <th style="text-align:center">Harga</th>
                                                                <th width="85px" style="text-align:center">Jumlah</th>
                                                                <th style="text-align:center">Sub Total</th>
                                                                <th style="width: 50px;"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1; ?>
                                                            <?php foreach ($this->cart->contents() as $items){ 

                                                                 $furniture = $this->m_home->detail_furniture($items['id']);?>
                                                                <tr>
                                                                    <td style="text-align:center">
                                                                        <img src="<?php echo base_url('/assets/image/'.$furniture->fn_gambar) ?>" alt="contact-img"
                                                                            title="contact-img" class="rounded me-3" height="48" />
                                                                        <p class="m-0 d-inline-block align-middle font-16">
                                                                            <a href="#" class="text-reset font-family-secondary"><?php echo $items['name']; ?></a>
                                                                        </p>
                                                                    </td>
                                                                    <td style="text-align:right">
                                                                        Rp <?php echo number_format($items['price'], 0, ',', '.')?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo form_input(array(
                                                                            'name' => $i.'[qty]', 
                                                                            'value' => $items['qty'], 
                                                                            'min' => '0', 
                                                                            'max'=>"<?php echo $furniture->fn_stok?>",
                                                                            'size' => '5', 
                                                                            'type'=>'number',
                                                                            'class'=>'form-control'
                                                                            )); ?>
                                                                    </td>
                                                                    <td style="text-align:right">
                                                                        Rp <?php echo number_format($items['subtotal'], 0, ',', '.'); ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('c_tr_jual/delete_keranjang/'.$items['rowid']) ?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++; ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="col-sm-12 mt-3">
                                                        <div class="text-sm">
                                                            <button type="submit" href="<?php echo base_url('c_tr_jual/update_keranjang') ?>" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-refresh me-1"></i>Refresh</button>
                                                            <a href="<?php echo base_url('c_tr_jual/delete_all_keranjang') ?>" class="btn btn-outline-danger waves-effect waves-light"><i class="mdi mdi-delete-variant me-1"></i>Hapus</a>
                                                        </div>
                                                    </div>
                                                </div> <!-- end table-responsive-->
                                                <?php echo form_close(); ?>
                                            </div><!-- end col -->

                                            <div class="col-lg-4">
                                                <div class="border p-3 mt-4 mt-lg-0 rounded">
                                                    <h4 class="header-title mb-3">Total Keranjang</h4>

                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Total :</th>
                                                                    <th class="text-sm-end">Rp <?php echo number_format($this->cart->total(), 0, ',', '.'); ?></th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- end table-responsive -->

                                                    <!-- action buttons-->
                                                    <div class="row mt-3">
                                                        
                                                        <div class="col-sm-12">
                                                            <div class="text-sm-end">
                                                                <a href="<?php echo base_url('c_tr_jual/view_checkout') ?>" class="btn btn-primary"><i class="mdi mdi-cart-plus me-1"></i> Checkout </a>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row-->
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->