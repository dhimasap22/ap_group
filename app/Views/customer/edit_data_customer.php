<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item "><a href="<?= base_url('customer') ?>">Customer</a></li>
                <li class="breadcrumb-item active">Edit Data Customer</li>
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
                        Edit Data Customer
                    </div>
                    <div class="body">
                        <form action="<?= base_url('customer/edit/' . $customer['id_customer']) ?>" method="POST" class="no-validated">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" name="id_customer" value="<?= $customer['id_customer'] ?>">
                                    <label for="id_customer" class="col-form-label">ID Customer</label>
                                    <input type="text" class="form-control" value="<?= $customer['id_customer'] ?>" autocomplete="off" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_customer" class="col-form-label">Nama Customer</label>
                                    <input type="text" class="form-control" name="nama_customer" value="<?= $customer['nama_customer'] ?>" placeholder="Nama Customer" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_telp" class="col-form-label">No Telp</label>
                                    <input type="number" class="form-control" name="no_telp" value="<?= $customer['no_telp'] ?>" placeholder="No Telp" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $customer['email'] ?>" placeholder="Email" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $customer['alamat'] ?>" placeholder="Alamat" autocomplete="off">
                            </div>

                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a type="button" href="<?= base_url('customer') ?>" class="btn btn-secondary"><i class="ti-close"></i></a>
                                    <button type="submit" class="btn btn-primary"><i class="ti-save"></i></button>
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