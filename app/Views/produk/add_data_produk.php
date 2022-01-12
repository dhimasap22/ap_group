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
                        <form action="<?= base_url('produk/create') ?>" method="POST" class="no-validated" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_produk" class="col-form-label">ID Produk</label>
                                    <input type="text" class="form-control" name="id_produk" value="<?= $id_produk; ?>" autocomplete="off" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_produk" class="col-form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('nama_produk') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="jenis_produk" class="col-form-label">Jenis Produk</label>
                                    <select name="jenis_produk" class="selectpicker" title="- - - Pilih Jenis Produk - - -" data-live-search="true" data-live-search-placeholder="Cari ...">
                                        <option value="Bolu">Bolu</option>
                                        <option value="Cake">Cake</option>
                                        <option value="Cookies">Cookies</option>
                                    </select>
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('jenis_produk') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stok" class="col-form-label">Stok Awal</label>
                                    <input type="number" class="form-control" name="stok" placeholder="Stok" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('stok') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="harga" class="col-form-label">Harga Produk</label>
                                    <input type="text" class="form-control" name="harga" placeholder="Harga Produk" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('harga') ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" autocomplete="off">
                                    <?php if (isset($validation)) : ?>
                                        <span class="badge badge-danger"> <?= $validation->getError('deskripsi') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_image" class="col-form-label">Product Image</label>
                                <input type="file" class="dropify" data-max-file-size="10M" name="product_image" />
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a type="button" href="<?= base_url('produk') ?>" class="btn btn-secondary"><i class="ti-close"></i></a>
                                    <button type="submit" class="btn btn-primary"><i class="ti-save"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content-admin'); ?>