<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Laporan Penjualan</h2>
                        </div>
                    </div> <!-- end row -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-bordered">
                                    <li class="nav-item">
                                        <b><h4 aria-expanded="true" >
                                            Filter Laporan Berdasarkan Bulan
                                        </h4></b>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <?php echo form_open('c_lap_jual/filter_lap_jual') ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Bulan</label>
                                                <select name="bulan" class="form-control">
                                                    <?php 
                                                        $mulai = 1;
                                                        for ($i = $mulai; $i < $mulai + 12; $i++)
                                                        {
                                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Tahun</label>
                                                <select name="tahun" class="form-control">
                                                    <?php 
                                                        $mulai = date('Y') - 2;
                                                        for ($i = $mulai; $i < $mulai + 10; $i++)
                                                        {
                                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <hr class="my-3" />

                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary mr--3"><i class="fa fa-eye"></i>  Lihat Laporan</button>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
