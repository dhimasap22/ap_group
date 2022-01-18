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
        <div class="container">
            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Invoice
                    <small class="page-info">
                        <i class="fa fa-angle-double-right text-80"></i>
                        <?php
                        foreach ($detail_penjualan as $pnj) :
                        ?>
                            ID: <?= $pnj['id_penjualan'] ?>
                        <?php endforeach; ?>
                    </small>
                </h1>

                <div class="page-tools">
                    <div class="action-buttons">
                        <a class="btn bg-white btn-light mx-1px text-95 " href="javascript:window.print()" data-title="Print">
                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                            Print
                        </a>
                        <a class="btn bg-white btn-light mx-1px text-95" href="<?= base_url('penjualan') ?>">
                            <i class="mr-1 fa fa-arrow-left text-primary-m1 text-120 w-2"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="container px-0 myDivToPrint">
                <div class="row mt-4">
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-150">
                                    <img src="<?= base_url('assets/images/ap_group.png'); ?>" alt="logo-1" height="200" width="150">
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="row">
                            <?php
                            $total = 0;
                            foreach ($detail_customer as $pnj) :
                                $total += ($pnj['harga_satuan'] *  $pnj['jumlah_jual']);
                            ?>
                                <div class="col-sm-6">
                                    <div>
                                        <span class="text-sm text-grey-m2 align-middle">To:</span>
                                        <span class="text-600 text-110 text-blue align-middle"> <?= $pnj['nama_customer'] ?></span>
                                    </div>
                                    <div class="text-grey-m2">
                                        <div class="my-1">
                                            <?= $pnj['alamat'] ?>
                                        </div>

                                        <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?= $pnj['no_telp'] ?></b></div>
                                    </div>
                                </div>
                                <!-- /.col -->

                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                    <hr class="d-sm-none" />
                                    <div class="text-grey-m2">
                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                            Invoice
                                        </div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> <?= $pnj['id_penjualan'] ?></div>

                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span><?= $pnj['tanggal_penjualan'] ?></div>

                                    </div>
                                </div>
                                <!-- /.col -->
                            <?php endforeach; ?>

                        </div>

                        <div class="mt-4">
                            <div class="row border-b-2 brc-default-l2"></div>

                            <!-- or use a table instead -->

                            <div class="table-responsive">
                                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                    <thead class="bg-none bgc-default-tp1">
                                        <tr>
                                            <th>Customer</th>
                                            <th>Nama Produk</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah Jual</th>
                                            <th>Total Penjualan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($detail_penjualan as $pnj) :
                                            $total += ($pnj['harga_satuan'] *  $pnj['jumlah_jual']);
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $pnj['nama_customer'] ?>
                                                </td>
                                                <td>
                                                    <?= $pnj['id_produk'] . '-' . $pnj['nama_produk'] ?>
                                                </td>
                                                <td>
                                                    <?= nominal($pnj['harga_satuan']) ?>
                                                </td>
                                                <td>
                                                    <?= $pnj['jumlah_jual'] ?>
                                                </td>
                                                <td>
                                                    <?= nominal($pnj['harga_satuan'] *  $pnj['jumlah_jual']) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>


                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    ----
                                </div>

                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2"><?= nominal($total) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-12 float-right identity">
                                    <p>UMKM CHUBBY<br><strong>Admin</strong></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content-admin'); ?>