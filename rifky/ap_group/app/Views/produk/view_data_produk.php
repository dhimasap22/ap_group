<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Produk</li>
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
                        <a href="<?= base_url('produk/add') ?>" type="button" class="btn btn-dark btn-sm"><i class="ti-plus"></i> Tambah</a>
                        <hr>
                    </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <?php foreach ($produk as $prd) : ?>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="body text-right">
                            <span class="badge badge-md typeface-badge badge-pill bg-success text-white">Stok <?= $prd['stok'] ?></span>
                            <span class="badge badge-md typeface-badge badge-pill bg-primary text-white">Harga <?= nominal($prd['harga']) ?></span>
                        </div>
                        <div class="body text-center">
                            <img class="img-fluid" src="<?= base_url('assets/images/product/' . $prd['product_image']) ?>" class="thumb-img img-fluid" width="282" height="282">
                            <div class="mt-4">
                                <h6 class="font-17"> <?= $prd['id_produk'] ?></h6>
                                <h6 class="font-17"> <?= $prd['nama_produk'] ?></h6>
                            </div>
                            <div class="text-center">
                                <a href="<?= base_url('produk/edit/' . $prd['id_produk']) ?>" type="button" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit fa-lg"></i></a>
                                <a href="#" type="button" data-toggle="modal" data-target="#delete<?php echo $prd['id_produk']; ?>" class="btn btn-danger btn-sm "> <i class="fa fa-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php foreach ($produk as $prd) : ?>
    <form action="<?= base_url('produk/delete') ?>" method="post">
        <div id="delete<?php echo $prd['id_produk']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="id_produk" value="<?= $prd['id_produk'] ?>">
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