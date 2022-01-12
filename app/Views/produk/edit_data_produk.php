<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item "><a href="<?= base_url('produk') ?>">Produk</a></li>
                <li class="breadcrumb-item active">Edit Data Produk</li>
            </ul>
        </li>
    </ul>
</div>

<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="<?= base_url('produk/edit/' . $produk['id_produk']) ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                    <input type="hidden" class="form-control" name="stok" value="<?= $produk['stok'] ?>">
                                    <label for="id_produk" class="col-form-label">ID Produk</label>
                                    <input type="text" class="form-control" value="<?= $produk['id_produk'] ?>" autocomplete="off" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_produk" class="col-form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" value="<?= $produk['nama_produk'] ?>" placeholder="Nama Produk" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="jenis_produk" class="col-form-label">Jenis Produk</label>
                                    <input type="text" class="form-control" name="jenis_produk" value="<?= $produk['jenis_produk'] ?>" placeholder=" Jenis Produk" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stok" class="col-form-label">Stok</label>
                                    <input type="number" class="form-control" name="stok" <?= $produk['stok'] ?> placeholder="Stok" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="harga" class="col-form-label">Harga Produk</label>
                                    <input type="text" class="form-control" name="harga" value="<?= $produk['harga'] ?>" placeholder="Harga Produk" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" value="<?= $produk['deskripsi'] ?>" placeholder="Deskripsi" autocomplete="off">
                                </div>
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