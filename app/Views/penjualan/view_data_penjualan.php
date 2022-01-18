<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>

<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Data Penjualan</li>
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
                        <a href="<?= base_url('penjualan/add') ?>" type="button" class="btn btn-dark btn-sm"><i class="ti-plus"></i> Tambah</a>
                        <hr>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID Penjualan</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal</th>
                                        <!-- <th>Status</th> -->
                                        <th>Print</th>
                                        <th class="text-center"><i class="fa fa-cog fa-spin"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($penjualan as $pnj) : ?>
                                        <tr>
                                            <td>
                                                <?= $pnj['id_penjualan'] ?>
                                            </td>
                                            <td>
                                                <?= $pnj['id_customer'] . ' - ' . $pnj['nama_customer'] ?>
                                            </td>
                                            <td>
                                                <?= $pnj['tanggal_penjualan'] ?>
                                            </td>
                                            <!-- <td>
                                                <span class="badge bg-success "><?= $pnj['status'] ?></span>
                                            </td> -->
                                            <td class="text-center">
                                                <!-- <a href="javascript:window.print()" class="btn btn-info waves-effect "><i class="fa fa-print fa-lg text-white"></i></a> -->
                                                <a href="<?= base_url('penjualan/print/' . $pnj['id_penjualan']); ?>" class="btn btn-info waves-effect "><i class="fa fa-print fa-lg text-white"></i></a>
                                            </td>
                                            <td class="d-print-none text-center">
                                                <a href="<?= base_url('penjualan/detail/' . $pnj['id_penjualan']); ?>"><i class="fa fa-eye fa-lg text-info"></i></a>
                                                <!-- <a type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $pnj['id_penjualan']; ?>">
                                                    <i class="mdi mdi-trash-can fa-lg text-danger"></i>
                                                </a> -->
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


<?= $this->endSection('content-admin'); ?>