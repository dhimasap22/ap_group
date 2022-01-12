<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Laporan Penjualan</li>
            </ul>
        </li>
    </ul>
</div>

<div class="page">
    <div class="container-fluid mb-0 pb-0">
        <div class="row clearfix">
            <div class="col-lg-4">
                <div class="card">
                    <div class="body">
                        <form action="<?= site_url('laporan/laporanPenjualan/show_data_lap_penjualan') ?>" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control choose_month" name="start_date" autocomplete="off" placeholder="Pilih Bulan" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">
                                        <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page">
    <div class="container-fluid  mt-0 pt-0">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="pb-2">
                            <div class="row">
                                <div class="col-sm-12" style="background-color:white;" align="center">
                                    <b>AP GROUP</b>
                                </div>
                                <div class="col-sm-12" style="background-color:white;" align="center">
                                    <b>LAPORAN PENJUALAN</b>
                                </div>
                                <div class="col-sm-12" style="background-color:white;" align="center">
                                    <b>Periode <?= bulan($date)  ?> <?= $year ?></b>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 10px;">No</th>
                                        <th class="text-center">ID Transaksi</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Jumlah Barang</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $gtotal = 0;
                                    foreach ($lap_penjualan as $penjualan) :
                                        $gtotal += $penjualan->total;
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no = $no + 1 ?></td>
                                            <td class="text-center"><?= $penjualan->id_penjualan ?></td>
                                            <td class="text-center"><?= format_indo($penjualan->tanggal_penjualan) ?></td>
                                            <td class="text-center"><?= $penjualan->jumlah_jual ?></td>
                                            <td class="text-right">Rp <?= number_format($penjualan->harga_satuan) ?></td>
                                            <td class="text-right">Rp <?= number_format($penjualan->total) ?></td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Total</td>
                                        <td class="text-right">Rp <?= number_format($gtotal) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content-admin'); ?>