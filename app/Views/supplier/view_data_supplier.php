<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Supplier</li>
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
                        <a href="<?= base_url('supplier/add') ?>" type="button" class="btn btn-dark btn-sm"><i class="ti-plus"></i> Tambah</a>
                        <hr>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>ID Supplier</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>No telp</th>
                                        <th class="text-center"><i class="fa fa-cog fa-spin"></i></th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($supplier as $supp) : ?>
                                        <tr>
                                            <td>
                                                <?= $supp['id_supplier'] ?>
                                            </td>
                                            <td>
                                                <?= $supp['nama_supplier'] ?>
                                            </td>
                                            <td>
                                                <?= $supp['alamat'] ?>
                                            </td>
                                            <td>
                                                <?= $supp['no_telp'] ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('supplier/edit/' . $supp['id_supplier']) ?>" type="button" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit fa-lg"></i></a>
                                                <a href="#" type="button" data-toggle="modal" data-target="#delete<?php echo $supp['id_supplier']; ?>" class="btn btn-danger btn-sm ">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($supplier as $supp) : ?>
    <form action="<?= base_url('supplier/delete') ?>" method="post">
        <div id="delete<?php echo $supp['id_supplier']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <input type="hidden" name="id_supplier" value="<?= $supp['id_supplier'] ?>">
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