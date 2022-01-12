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
                        Tambah Data Produk
                    </div>
                    <div class="body">
                        <form action="<?= base_url('penjualan/add') ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-md-2 mb-1">
                                    <label class="form-label">ID Penjualan</label>
                                    <input type="text" class="form-control" value="<?= $id_penjualan; ?>" disabled>
                                </div>

                                <div class="form-group col-md-3 mb-1">
                                    <label for="tanggal" class="form-label">Tanggal Penjualan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control choose_date2" placeholder="Pilih Tanggal" name="tanggal" autocomplete="off">
                                        <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
                                    </div><!-- input-group -->
                                </div>
                                <div class="form-group col-md-4 mb-1">
                                    <label for="id_customer" class="form-label">Customer</label>
                                    <select name="id_customer" class="selectpicker" title="- - - Pilih Customer - - -" data-live-search="true" data-live-search-placeholder="Cari ...">
                                        <?php
                                        foreach ($customer as $list) {
                                        ?>
                                            <option value="<?= $list['id_customer'] ?>"><?= $list['id_customer'] . " - " . $list['nama_customer'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 pt-4 mt-2">
                                    <a href="<?= base_url('penjualan') ?>" class="btn btn-secondary"><i class="mdi mdi-close-thick fa-lg"></i> Batal</a>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Proses</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div> <!-- container-fluid -->

</div> <!-- content -->
</div> <!-- content -->



<?= $this->endSection('content-admin'); ?>