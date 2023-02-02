<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href="<?php echo base_url('c_tr_jual/view_keranjang') ?>"><i class="fa fa-chevron-circle-left"></i> Kembali</a>
                        </div>
                        <h4 class="page-title">Checkout Keranjang</h4>
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
                                <div class="float-end">
                                    <h4 class="m-0 d-print-none">Invoice</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4 table-centered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Furniture</th>
                                                    <th style="width: 10%">Jumlah</th>
                                                    <th style="width: 15%" class="text-end">Harga</th>
                                                    <th style="width: 15%" class="text-end">Sub Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $i = 1; 
                                                    foreach ($this->cart->contents() as $items){ 
                                                        $furniture = $this->m_tr_jual->detail_furniture($items['id']); ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <b><?php echo $items['name']; ?></b> <br/>
                                                    </td>
                                                    <td class="text-center"><?php echo $items['qty']; ?></td>
                                                    <td class="text-end">Rp <?php echo number_format($items['price'], 0, ',', '.'); ?></td>
                                                    <td class="text-end">Rp <?php echo number_format($items['subtotal'], 0, ',', '.'); ?></td>
                                                </tr>

                                                <?php $i++; 
                                                    } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <?php 
                                echo form_open('c_tr_jual/checkout');
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="clearfix">
                                        <p><b>Rincian Penerima</b></p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" name="tj_nama">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Telepon</label>
                                                    <input type="text" class="form-control" name="tj_telepon">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea type="text" class="form-control" name="tj_alamat" rows="3"> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="float-end">
                                        <p><b>Total</b></p>
                                        <h3>Rp <?php echo number_format($this->cart->total(), 0, ',', '.'); ?></h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <!-- Hidden Textbox -->
                            <input name="tj_total" value="<?php echo $this->cart->total(); ?>" hidden>
                            <input name="pl_id" value="<?php echo $this->session->userdata('pl_id')?>" hidden>

                            <?php 
                                $i = 1;
                                $j = 1;
                                foreach ($this->cart->contents() as $items){ 
                                    echo form_hidden('qty'.$i++, $items['qty']); 
                                    echo form_hidden('subtotal'.$j++, $items['subtotal']);
                            }; ?>

                            <div class="mt-4 mb-1">
                                <div class="text-end d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-printer"></i></a>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Checkout</button>
                                </div>
                            </div>

                            <?php echo form_close();?>
                        </div>
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row --> 
            
        </div> <!-- container -->
    </div><!-- end content --> 
</div><!-- end content page --> 