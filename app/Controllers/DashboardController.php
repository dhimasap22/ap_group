<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\CustomerModel;
use App\Models\SupplierModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
  public function __construct()
  {
    $this->produk   = new ProdukModel();
    $this->customer    = new CustomerModel();
    $this->supplier  = new SupplierModel();
    $this->user     = new UserModel();

    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title']   = 'Dashboard';
    $count_customer      = $this->customer->selectCount('id_customer')->first();
    $count_produk     = $this->produk->selectCount('id_produk')->first();
    $count_supplier    = $this->supplier->selectCount('id_supplier')->first();
    $count_user       = $this->user->selectCount('username')->first();

    $data['customer']      = $count_customer['id_customer'];
    $data['produk']     = $count_produk['id_produk'];
    $data['supplier']    = $count_supplier['id_supplier'];
    $data['user']       = $count_user['username'];

    $data['menu']   = "Dashboard";
    $data['sub']    = "Dashboard";

    return view('dashboard/index', $data);
  }
}
