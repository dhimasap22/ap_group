<!-- Jquery Core Js -->
<script src="<?= base_url('assets/bundles/libscripts.bundle.js'); ?>"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?= base_url('assets/bundles/vendorscripts.bundle.js'); ?>"></script> <!-- Lib Scripts Plugin Js -->



<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url('assets/bundles/datatablescripts.bundle.js'); ?>"></script>
<script src="<?= base_url('assets/libs/jquery-datatable/buttons/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/jquery-datatable/buttons/buttons.bootstrap4.min.js'); ?>"></script>

<script src="<?= base_url('assets/libs/moment/moment.js'); ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- dropify js -->
<script src="<?= base_url('assets/libs/dropify/dropify.min.js') ?>"></script>

<script src="<?= base_url('assets/js/theme.js'); ?>"></script><!-- Custom Js -->
<script src="<?= base_url('assets/js/pages/tables/jquery-datatable.js'); ?>"></script>
<!-- Notif js -->
<script src="<?= base_url('assets/toastr/toastr.min.js'); ?>"></script>

<script>
    $('.dropify').dropify();
    $(function() {
        $('.choose_date2').bootstrapMaterialDatePicker({
            time: false,
            format: 'DD-MM-YYYY'
        });
    });
    $(".choose_date").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        locale: 'id',
        todayHighlight: true,
        orientation: 'bottom'
    });
    $(".choose_month").datepicker({
        format: "dd-mm-yyyy",
        startView: "months",
        minViewMode: "months",
        autoclose: true,
    });
</script>


<script type="text/javascript">
    <?php if (session()->getFlashdata('success')) { ?>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = 'toast-top-center';
        toastr.success("<?= session()->getFlashdata('success'); ?>");
    <?php } else if (session()->getFlashdata('error')) {  ?>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = 'toast-top-center';
        toastr.error("<?= session()->getFlashdata('error'); ?>");
    <?php } else if (session()->getFlashdata('warning')) {  ?>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = 'toast-top-center';
        toastr.warning("<?= session()->getFlashdata('warning'); ?>");
    <?php } else if (session()->getFlashdata('info')) {  ?>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.positionClass = 'toast-top-center';
        toastr.info("<?= session()->getFlashdata('info'); ?>");
    <?php } ?>
</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#id_produk_pembelian').change(function() {
            var id_produk_pembelian = $('#id_produk_pembelian').val();
            if (id_produk_pembelian != '') {
                $.ajax({
                    url: "<?= base_url('pembelian/fetch_harga'); ?>",
                    method: "POST",
                    data: {
                        id_produk_pembelian: id_produk_pembelian,
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#harga_satuan').val(data);
                        $('#harga_satuan_hide').val(data);
                    }
                });
            } else {
                $('#harga_satuan').val();
                $('#harga_satuan_hide').val();
            }
        });
    });
    $(document).ready(function() {
        $('#id_produk_penjualan').change(function() {
            var id_produk_penjualan = $('#id_produk_penjualan').val();
            if (id_produk_penjualan != '') {
                $.ajax({
                    url: "<?= base_url('penjualan/fetch_harga'); ?>",
                    method: "POST",
                    data: {
                        id_produk_penjualan: id_produk_penjualan,
                    },
                    dataType: 'json',
                    success: function(data) {
                        nilai_hpp = 10 / 100 * data;
                        nilai_akhir_hpp = parseInt(nilai_hpp) + parseInt(data);
                        $('#harga_hpp').val(nilai_akhir_hpp);
                        $('#harga_hpp_hide').val(nilai_akhir_hpp);
                        $('#harga_beli_hide').val(data);
                        console.log(nilai_akhir_hpp);
                        console.log(data);
                    }
                });
            } else {
                $('#harga_hpp').val();
                $('#harga_hpp_hide').val();
                $('#harga_beli_hide').val();
            }
        });
    });
</script>