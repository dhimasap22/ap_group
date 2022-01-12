<?php $uri = current_url(true); ?>

<?php if (session()->get('kelompok') == 'Admin') : ?>
    <div class="left_sidebar">
        <nav class="sidebar">
            <ul id="main-menu" class="metismenu">
                <li class="g_heading">Main</li>
                <li><a href="<?= base_url() ?>"><i class="ti-home"></i><span>Dashboard</span></a></li>

                <li class="g_heading">Master Data</li>

                <li <?php if ($uri->getSegment(1) == "customer") {
                        echo 'class="active"';
                    } ?>><a href="<?= base_url('customer') ?>"><i class="ti-email"></i><span>Customer</span></a></li>

                <li <?php if ($uri->getSegment(1) == "produk") {
                        echo 'class="active"';
                    } ?>><a href="<?= base_url('produk') ?>"><i class="ti-notepad"></i><span>Produk</span></a></li>

                <li <?php if ($uri->getSegment(1) == "supplier") {
                        echo 'class="active"';
                    } ?>><a href="<?= base_url('supplier') ?>"><i class="ti-comments"></i><span>Supplier</span></a></li>

                <li class="g_heading">Transaksi</li>

                <li <?php if ($uri->getSegment(1) == "pembelian") {
                        echo 'class="active"';
                    } ?>><a href="<?= base_url('pembelian') ?>"><i class="ti-email"></i><span>Pembelian</span></a></li>

                <li <?php if ($uri->getSegment(1) == "penjualan") {
                        echo 'class="active"';
                    } ?>><a href="<?= base_url('penjualan') ?>"><i class="ti-comments"></i><span>Penjualan</span></a></li>

            </ul>
        </nav>
    </div>

<?php endif; ?>



<?php if (session()->get('kelompok') == 'Pemilik') : ?>
    <div class="left_sidebar">
        <nav class="sidebar">
            <ul id="main-menu" class="metismenu">
                <li class="g_heading">Main</li>
                <li><a href="<?= base_url() ?>"><i class="ti-home"></i><span>Dashboard</span></a></li>

                <li class="g_heading">Master Data</li>
                <li <?php if ($uri->getSegment(1) == "produk") {
                        echo 'class="active"';
                    } ?>><a href="<?= base_url('produk') ?>"><i class="ti-notepad"></i><span>Produk</span></a></li>

                <li class="g_heading">Laporan</li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow"><i class="ti-lock"></i><span>Laporan</span></a>
                    <ul>
                        <li><a class="dropdown-item" href="<?= base_url('laporan/laporanPembelian') ?>">Laporan Pembelian</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('laporan/laporanPenjualan') ?>">Laporan Penjualan</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

<?php endif; ?>