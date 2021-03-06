<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('produk') ?>">Produk</a></li>
                <li class="breadcrumb-item active">Tambah Data Produk</li>
            </ul>
        </li>
    </ul>
</div>

<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header pb-2 pt-2 bg-dark text-white">
                        Tambah Data Detail Pembelian
                    </div>
                    <div class="body">
                        <form action="<?= base_url('pembelian/addDetail') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="id_produk" class="form-label">Produk</label>
                                    <select class="form-control select2" name="id_produk" id="id_produk_pembelian">
                                        <optgroup label="List Produk">
                                            <option value="" disabled selected>- - - Pilih Produk - - -</option>
                                            <?php
                                            foreach ($produk as $list) {
                                            ?>
                                                <option value="<?= $list['id_produk'] ?>"><?= $list['jenis_produk'] . " - " . $list['nama_produk'] ?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="jumlah_beli" class="form-label">Jumlah Beli</label>
                                    <div class="input-group">
                                        <input type="text" name="jumlah_beli" class="form-control" placeholder="Jumlah Beli" autocomplete="off">
                                        <span class="input-group-text"><i class="fa fa-calculator"></i></span>

                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="harga_satuan" disabled>
                                        <input type="hidden" class="form-control" name="harga_satuan" id="harga_satuan_hide">
                                        <span class="input-group-text"><i class="fa fa-money"></i></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-3 pt-4 mt-1">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-2 pt-2 bg-dark text-white">
                        Data Detail Pembelian
                    </div>
                    <div class="card-body pb-0">
                        <?php if ($detail_pembelian) : ?>
                            <div class="float-right">
                                <button onclick="location.href = '<?php echo site_url('pembelian/selesai') ?>';" class="btn btn-success" type="button">
                                    <i class="fa fa-floppy-o"></i> Selesai
                                </button>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Supplier</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah Beli</th>
                                    <th>Total Pembelian</th>
                                    <th class="text-center"><i class="fa fa-cog"></i></th>
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
                                        <td class="d-print-none text-center">
                                            <div class="btn-container">
                                                <button class="btn btn-danger btn-icon-only rounded-circle" type="button" data-toggle="modal" data-target="#delete<?= $pmb['id_detail_pembelian']; ?>">
                                                    <span class="btn-inner--icon"><i class="fa fa-trash-o"></i></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">Total</td>
                                    <td colspan="2" class="text-left"><?= nominal($total) ?></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div> <!-- end col -->

    </div> <!-- end row -->

</div> <!-- container-fluid -->



<?php foreach ($detail_pembelian as $pmb) : ?>
    <form action="<?= base_url('pembelian/deleteDetail') ?>" method="post">
        <div id="delete<?php echo $pmb['id_detail_pembelian']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">??</button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <input type="hidden" name="id_detail_pembelian" value="<?= $pmb['id_detail_pembelian'] ?>">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button href="#" class="btn btn-danger" type="submit"><i class="mdi mdi-trash-can fa-lg"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
<?php endforeach ?>



<?= $this->endSection('content-admin'); ?>