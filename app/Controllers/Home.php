<?php

namespace App\Controllers;

use \App\Models\ProdukModel;
use \App\Models\CustomerModel;
use \App\Models\PembelianModel;
use \App\Models\PenjualanModel;


class Home extends BaseController
{

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->customerModel = new CustomerModel();
        $this->pembelianModel = new PembelianModel();
        $this->penjualanModel = new PenjualanModel();
    }
    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'total_produk'  => $this->produkModel->getProdukTotal(),
            'total_customer'  => $this->customerModel->getCustomerTotal(),
            'total_pembelian'  => $this->pembelianModel->getPembelianTotal(),
            'total_penjualan'  => $this->penjualanModel->getPenjualanTotal(),
        ];

        return view('home/index', $data);
    }
}
