<?= $this->extend('templates/head'); ?>
<?= $this->section('content-admin'); ?>


<div class="page">
    <ul class="navbar-nav mr-auto hidden-xs">
        <li class="nav-item page-header">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Data Pembelian</li>
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
                        <?php if (session()->get('kelompok') == 'Admin') : ?>
                            <a href="<?= base_url('pembelian/add') ?>" type="button" class="btn btn-dark btn-sm"><i class="ti-plus"></i> Tambah</a>
                        <?php endif; ?>
                        <hr>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID Pembelian</th>
                                        <th>ID Supplier</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th class="text-center"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pembelian as $pmb) : ?>
                                        <tr>
                                            <td>
                                                <?= $pmb['id_pembelian'] ?>
                                            </td>
                                            <td>
                                                <?= $pmb['id_supplier'] . ' - ' . $pmb['nama_supplier'] ?>
                                            </td>
                                            <td>
                                                <?= format_indo($pmb['tanggal_pembelian']) ?>
                                            </td>
                                            <td>
                                                <?php if ($pmb['status'] == 'Approve') : ?>
                                                    <span class="badge badge-lg badge-pill badge-success text-uppercase text-white"><?= $pmb['status'] ?></span>
                                                <?php else : ?>
                                                    <span class="badge badge-lg badge-pill badge-warning text-uppercase text-white"><?= $pmb['status'] ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="d-print-none text-center">
                                                <?php if (session()->get('kelompok') == 'Pemilik') : ?>
                                                    <a href="<?= base_url('pembelian/updateApprove/' . $pmb['id_pembelian']); ?>"><i class="fa fa-key fa-lg text-success"> </i></a>
                                                    <a href="<?= base_url('pembelian/detail/' . $pmb['id_pembelian']); ?>"><i class="fa fa-eye fa-lg text-info"> </i></a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('pembelian/detail/' . $pmb['id_pembelian']); ?>"><i class="fa fa-eye fa-lg text-info"></i></a>
                                                <?php endif; ?>
                                                <!-- <a type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $pmb['id_pembelian']; ?>">
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