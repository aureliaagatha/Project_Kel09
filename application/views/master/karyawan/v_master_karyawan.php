<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                        <h2>Karyawan</h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-lg-end my-1 my-lg-0">
                                <?php echo anchor('c_master_karyawan/add',
                                '<button class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-plus fa-sm"></i>
                                    Tambah
                                </button>') ?>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div>
                
                <div class="card-body">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>TELEPON</th>
                            <th>EMAIL</th>
                            <th class="text-center">AKSI</th>
                        </thead>
                    
                        <tbody>
                            <?php
                                $no=1;
                                foreach($karyawan as $ky) {
                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $ky->ky_nama ?></td>
                                    <td><?php echo $ky->ky_telepon ?></td>
                                    <td><?php echo $ky->ky_email ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('c_master_karyawan/detail/' .$ky->ky_id) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="<?= base_url('c_master_karyawan/edit/' .$ky->ky_id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <?=anchor('c_master_karyawan/delete/'.$ky->ky_id,
                                            '<div class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> 
                                            </div>',
                                            array('onclick' => "return confirm('Yakin ingin hapus data ini?')"))?>
                                    </td>
                                </tr>

                            <?php }  ?>
                        </tbody>
                    </table>
                </div> <!-- end card body-->

            </div> <!-- end card -->
        </div> <!-- end col-->
    </div> <!-- end row-->
</div> <!-- container -->
