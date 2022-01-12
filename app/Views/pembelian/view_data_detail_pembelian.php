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
                        <a href="<?= base_url('pembelian') ?>" type="button" class="btn btn-dark btn-sm"><i class="ti-arrow-left"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Supplier</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah Beli</th>
                                        <th>Total Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($detail_pembelian as $pmb) :
                                        $total += ($pmb['harga_satuan'] *  $pmb['jumlah_beli']);
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $pmb['nama_supplier'] ?>
                                            </td>
                                            <td>
                                                <?= $pmb['nama_produk'] . '-' . $pmb['jenis_produk'] ?>
                                            </td>
                                            <td>
                                                <?= nominal($pmb['harga_satuan']) ?>
                                            </td>
                                            <td>
                                                <?= $pmb['jumlah_beli'] ?>
                                            </td>
                                            <td>
                                                <?= nominal($pmb['harga_satuan'] *  $pmb['jumlah_beli']) ?>
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