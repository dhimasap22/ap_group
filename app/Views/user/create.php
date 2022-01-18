<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
                <li class="breadcrumb-item active">Tambah Data User</li>
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
                        Tambah Data User
                    </div>
                    <div class="body">
                        <form action="<?= base_url('user/create') ?>" method="POST" class="no-validated" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username" class="col-form-label">username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="password" autocomplete="off">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kelompok" class="col-form-label">Kelompok</label>
                                    <select name="kelompok" class="selectpicker" title="- - - Pilih Kelompok - - -" data-live-search="true" data-live-search-placeholder="Cari ...">
                                        <option value="Admin">Admin</option>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Gambar Profil</label>
                                <input type="file" class="dropify" data-max-file-size="10M" name="image" />
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-left d-none d-sm-block">
                                    <a type="button" href="<?= base_url('user') ?>" class="btn btn-secondary"><i class="ti-close"></i></a>
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