<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item "><a href="<?= base_url('supplier') ?>">Supplier</a></li>
                <li class="breadcrumb-item active">Edit Data Supplier</li>
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
                        Edit Data Supplier
                    </div>
                    <div class="body">
                        <form action="<?= base_url('supplier/edit/' . $supplier['id_supplier']) ?>" method="POST" class="no-validated">

                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" name="id_supplier" value="<?= $supplier['id_supplier'] ?>">
                                    <label for="id_supplier" class="col-form-label">ID Supplier</label>
                                    <input type="text" class="form-control" value="<?= $supplier['id_supplier'] ?>" autocomplete="off" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_supplier" class="col-form-label">Nama Supplier</label>
                                    <input type="text" class="form-control" name="nama_supplier" value="<?= $supplier['nama_supplier'] ?>" placeholder="Nama Supplier" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="alamat" class="col-form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?= $supplier['alamat'] ?>" placeholder="Alamat" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="no_telp" class="col-form-label">No Telp</label>
                                    <input type="number" class="form-control" name="no_telp" value="<?= $supplier['no_telp'] ?>" placeholder="No Telp" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a type="button" href="<?= base_url('supplier') ?>" class="btn btn-secondary"><i class="ti-close"></i></a>
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