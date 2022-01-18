<?php

namespace App\Controllers;

use \App\Models\PenjualanModel;
use \App\Models\ProdukModel;
use \App\Models\CustomerModel;

class Penjualan extends BaseController
{
    protected $validation;
    protected $session;
    protected $penjualanModel;
    protected $produkModel;
    protected $customerModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->penjualanModel = new PenjualanModel();
        $this->produkModel = new ProdukModel();
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Penjualan',
            'penjualan'             => $this->penjualanModel->getPenjualan(),
        ];
        return view('penjualan/view_data_penjualan', $data);
    }

    public function add()
    {
        $data = [
            'title'                      => 'Tambah Data Penjualan',
            'id_penjualan'               => $this->penjualanModel->code_penjualan_ID(),
            'customer'                   => $this->customerModel->getCustomer(),
        ];
        $this->validation->setRules(['tanggal' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data_session = array(
                'id_penjualan'                      => $this->penjualanModel->code_penjualan_ID(),
                'id_customer'                       => $this->request->getPost('id_customer'),
                'tanggal'                           => $this->request->getPost('tanggal'),
            );
            $this->session->set($data_session);
            return redirect()->to('/penjualan/addDetail');
        }
        return view('penjualan/add_data_penjualan', $data);
    }

    public function addDetail()
    {
        $id_penjualan       = $this->session->get("id_penjualan");
        $id_customer       = $this->session->get("id_customer");
        $tanggal            = $this->session->get("tanggal");
        $originalDate       = $tanggal;
        $newDate            = date("Y-m-d", strtotime($originalDate));

        $data = [
            'title'                             => 'Tambah Data Detail Penjualan',
            'produk'                            => $this->produkModel->getProduk(),
            'detail_penjualan'                  => $this->penjualanModel->getDetailPenjualan($id_penjualan),
        ];

        $this->validation->setRules(['jumlah_jual' => 'required']);
        $isDataValid            = $this->validation->withRequest($this->request)->run();
        $id_produk              = $this->request->getPost('id_produk');
        $jumlah_jual            = $this->request->getPost('jumlah_jual');
        $hpp                    = $this->request->getPost('hpp');
        $harga_satuan           = $this->request->getPost('harga_satuan');

        if ($isDataValid) {
            $stok = $this->produkModel->getTotalStok($id_produk);
            $jual = $stok - $jumlah_jual;
            $jumlah_data = $this->penjualanModel->getCountData($id_penjualan);


            if ($jumlah_data == 0) {

                $data_penjualan = array(
                    'id_penjualan'                  => $id_penjualan,
                    'id_customer'                  => $id_customer,
                    'tanggal_penjualan'             => $newDate,
                );

                $this->penjualanModel->createPenjualan($data_penjualan);

                $update_stok = array(
                    'stok' => $jual,
                );
                $this->produkModel->updateProduk($update_stok, $id_produk);

                $data_detail_penjualan = array(
                    'id_penjualan'          => $id_penjualan,
                    'id_produk'             => $id_produk,
                    'id_customer'           => $id_customer,
                    'hpp'                   => $hpp,
                    'harga_satuan'          => $harga_satuan,
                    'jumlah_jual'           => $jumlah_jual,
                );

                $this->penjualanModel->createDetailPenjualan($data_detail_penjualan);
            } else {

                $update_stok = array(
                    'stok' => $jual,
                );
                $this->produkModel->updateProduk($update_stok, $id_produk);

                $data_detail_penjualan = array(
                    'id_penjualan'          => $id_penjualan,
                    'id_produk'             => $id_produk,
                    'id_customer'           => $id_customer,
                    'hpp'                   => $hpp,
                    'harga_satuan'          => $harga_satuan,
                    'jumlah_jual'           => $jumlah_jual,
                );

                $this->penjualanModel->createDetailPenjualan($data_detail_penjualan);
            }

            session()->setFlashdata('success', 'Data penjualan Berhasil Ditambahkan');
            return redirect()->to('/penjualan/addDetail');
        }

        return view('penjualan/add_data_detail_penjualan', $data);
    }

    public function fetch_harga()
    {
        $id_produk      = $this->request->getPost('id_produk_penjualan');
        $harga          = $this->penjualanModel->getHargaProduk($id_produk);

        echo json_encode($harga);
    }

    public function selesai()
    {
        unset($_SESSION['id_penjualan']);
        unset($_SESSION['id_customer']);
        unset($_SESSION['tanggal']);
        session()->setFlashdata('success', 'Data Penjualan Berhasil Disimpan');
        return redirect()->to('/penjualan');
    }

    public function detail($id_penjualan)
    {
        $data = [
            'title'                 => 'Data Detail Penjualan',
            'detail_penjualan'      => $this->penjualanModel->getDetailPenjualan($id_penjualan)
        ];
        // dd($data);
        return view('penjualan/view_data_detail_penjualan', $data);
    }

    public function deleteDetail()
    {
        $id_detail_penjualan = $this->request->getPost('id_detail_penjualan');
        $this->penjualanModel->deleteDetailPenjualan($id_detail_penjualan);
        session()->setFlashdata('success', 'Data Keranjang Berhasil Dihapus');

        return redirect()->to('/penjualan/addDetail');
    }

    public function print($id_penjualan)
    {
        $data = [
            'title'                 => 'Data Detail Penjualan',
            'detail_penjualan'      => $this->penjualanModel->getDetailPenjualan($id_penjualan),
            'detail_customer'      => $this->penjualanModel->getPrint($id_penjualan)
        ];
        // dd($data);
        return view('penjualan/print_jual', $data);
    }
}
