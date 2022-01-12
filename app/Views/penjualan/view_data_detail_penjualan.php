<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Data Pembelian</li>
            </ul>
        </li>
    </ul>
</div>

<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="pt-3 col-md-12 text-left">
                        <a href="<?= base_url('penjualan') ?>" type="button" class="btn btn-dark btn-sm"><i class="ti-arrow-left"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Pelanggan</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah Jual</th>
                                        <th>Total Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($detail_penjualan as $pnj) :
                                        $total += ($pnj['harga_satuan'] *  $pnj['jumlah_jual']);
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $pnj['nama_customer'] ?>
                                            </td>
                                            <td>
                                                <?= $pnj['id_produk'] . '-' . $pnj['nama_produk'] ?>
                                            </td>
                                            <td>
                                                <?= nominal($pnj['harga_satuan']) ?>
                                            </td>
                                            <td>
                                                <?= $pnj['jumlah_jual'] ?>
                                            </td>
                                            <td>
                                                <?= nominal($pnj['harga_satuan'] *  $pnj['jumlah_jual']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td class="text-left"><?= nominal($total) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div> <!-- content -->





<?= $this->endSection('content-admin'); ?>