
                </div> <!-- content -->
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="<?php echo base_url() ?>template/system/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="<?php echo base_url() ?>template/system/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/apexcharts/apexcharts.min.js"></script>

        <script src="<?php echo base_url() ?>template/system/libs/selectize/js/standalone/selectize.min.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="<?php echo base_url() ?>template/system/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="<?php echo base_url() ?>template/system/js/app.min.js"></script>

        <!-- third party js -->
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ?>template/system/libs/pdfmake/build/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="<?php echo base_url() ?>template/system/js/pages/datatables.init.js"></script>

        <!-- SweetAlert2 -->
        <script src="<?php echo base_url() ?>template/system/libs/sweetalert2/sweetalert2.min.js"></script>

        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                
                $('.swalDefaultSuccess').click(function() {
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp; Furniture Ditambah ke Keranjang'
                    })
                });
            });
        </script>

    </body>
</html>

