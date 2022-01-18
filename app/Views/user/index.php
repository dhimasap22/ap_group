<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i>Home</a></li>
                <li class="breadcrumb-item active">user</li>
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
                        <a href="<?= base_url('user/add') ?>" type="button" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                        <hr>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Kelompok</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $item) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['username'] ?></td>
                                            <td><input type="password" value="<?= $item['password']; ?>" class="bg-transparent border-0" disabled></td>
                                            <td><?= $item['kelompok'] ?></td>
                                            <td class="text-center">
                                                <?php if ($item['aktif'] == '1') : ?>
                                                    <span class="badge badge-lg badge-pill badge-success text-uppercase text-white">Aktif</span>
                                                <?php else : ?>
                                                    <span class="badge badge-lg badge-pill badge-warning text-uppercase text-white">Non-Aktif</span>

                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <?php if ($item['username'] != 'pemilik') : ?>
                                                    <?php if ($item['aktif'] == '1') : ?>
                                                        <a href="#" type="button" data-toggle="modal" data-target="#update1<?php echo $item['id_user']; ?>" class="btn btn-danger btn-sm ">
                                                            <i class="fa fa-lock"></i>
                                                        </a>
                                                    <?php else : ?>
                                                        <a href="#" type="button" data-toggle="modal" data-target="#update2<?php echo $item['id_user']; ?>" class="btn btn-success btn-sm ">
                                                            <i class="fa fa-unlock"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($user as $usr) : ?>
    <div id="update1<?php echo $usr['id_user']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">Data User Akan Di-NonAktifkan</div>
                <div class="modal-body">
                    <div class="mb-2 mt-1">
                        <div class="float-right d-none d-sm-block">
                            <form action="user/nonaktif" method="POST">
                                <input type="hidden" name="id_user" value="<?= $usr['id_user'] ?>">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button class="btn btn-danger" type="submit"><i class="mdi mdi-lock fa-lg"></i> NonAktif</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($user as $usr) : ?>

    <div id="update2<?php echo $usr['id_user']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">Data User Akan Di- Aktifkan</div>
                <div class="modal-body">
                    <div class="mb-2 mt-1">
                        <div class="float-right d-none d-sm-block">
                            <form action="user/aktif" method="POST">

                                <input type="hidden" name="id_user" value="<?= $usr['id_user'] ?>">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button class="btn btn-danger" type="submit"><i class="mdi mdi-trash-can fa-lg"></i> Aktif</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?= $this->endSection('content-admin'); ?>