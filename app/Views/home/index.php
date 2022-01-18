    <?= $this->extend('templates/head'); ?>
    <?= $this->section('content-admin'); ?>


    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="/">Home</a>
    </nav>


    <div class="sl-pagebody">
        <div class="page">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 bg-success">
                            <div class="body text-white">
                                <i class="fa fa-tags fa-5x float-right "></i>
                                <h5 class="text-white"><b>PRODUK</b></h5>
                                <h2 class="text-white"><?= $total_produk ?></h2>
                                <small>-</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 bg-info">
                            <div class="body text-white">
                                <i class="fa fa-users fa-5x float-right "></i>
                                <h5 class="text-white"><b>CUSTOMER</b></h5>
                                <h2 class="text-white"><?= $total_customer ?></h2>
                                <small>-</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 bg-primary">
                            <div class="body text-white">
                                <i class="ti-shopping-cart-full fa-5x float-right "></i>
                                <h5 class="text-white"><b>PEMBELIAN</b></h5>
                                <h2 class="text-white"><?= $total_pembelian ?></h2>
                                <small>-</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 bg-warning">
                            <div class="body text-white">
                                <i class="fa fa-money fa-5x float-right "></i>
                                <h5 class="text-white"><b>PENJUALAN</b></h5>
                                <h2 class="text-white"><?= $total_penjualan ?></h2>
                                <small>-</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection('content-admin'); ?>