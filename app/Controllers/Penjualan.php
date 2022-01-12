<?php

namespace App\Controllers;

use \App\Models\PenjualanModel;
use \App\Models\ProdukModel;
use \App\Models\CustomerModel;
use \App\Models\Laporan\JurnalModel;

class Penjualan extends BaseController
{
    protected $validation;
    protected $session;
    protected $penjualanModel;
    protected $produkModel;
    protected $customerModel;
    protected $jurnalModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->penjualanModel = new PenjualanModel();
        $this->produkModel = new ProdukModel();
        $this->customerModel = new CustomerModel();
        $this->jurnalModel = new JurnalModel();
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

            $jumlah_data = $this->penjualanModel->getCountData($id_penjualan);

            // dd($jumlah_data);

            if ($jumlah_data == 0) {

                $data_penjualan = array(
                    'id_penjualan'                  => $id_penjualan,
                    'id_customer'                  => $id_customer,
                    'tanggal_penjualan'             => $newDate,
                );

                $this->penjualanModel->createPenjualan($data_penjualan);

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
        $id_penjualan           = $this->session->get("id_penjualan");
        $id_customer            = $this->session->get("id_customer");
        $tanggal                = $this->session->get("tanggal");
        $originalDate           = $tanggal;
        $newDate                = date("Y-m-d", strtotime($originalDate));
        $id_jurnalD             = $this->jurnalModel->code_jurnal_IDD();
        $id_jurnalK             = $this->jurnalModel->code_jurnal_IDK();
        $total_penjualan        = $this->penjualanModel->getTotalPenjualan($id_penjualan);
        $total_hpp              = $this->penjualanModel->getTotalHpp($id_penjualan);

        //insert jurnal kas dan penjualan
        $jurnal1 = [
            [
                'id_jurnal'     => $id_jurnalD,
                'tanggal'       => $newDate,
                'id_akun'       => 111,
                'nominal'       => $total_penjualan,
                'posisi'        => 'd',
                'debet'         => $total_penjualan,
                'kredit'        => 0,
                'reff'          => $id_penjualan,
                'transaksi'     => 'Penjualan'
            ],
            [
                'id_jurnal'     => $id_jurnalK,
                'tanggal'       => $newDate,
                'id_akun'       => 411,
                'nominal'       => $total_penjualan,
                'posisi'        => 'k',
                'debet'         => 0,
                'kredit'        => $total_penjualan,
                'reff'          => $id_penjualan,
                'transaksi'     => 'Penjualan'
            ],
        ];

        $this->jurnalModel->createOrderJurnal($jurnal1);
        $id_jurnalD             = $this->jurnalModel->code_jurnal_IDD();
        $id_jurnalK             = $this->jurnalModel->code_jurnal_IDK();

        //insert jurnal hpp dan persediaan barang dagan
        $jurnal2 = [
            [
                'id_jurnal'     => $id_jurnalD,
                'tanggal'       => $newDate,
                'id_akun'       => 511,
                'nominal'       => $total_hpp,
                'posisi'        => 'd',
                'debet'         => $total_hpp,
                'kredit'        => 0,
                'reff'          => $id_penjualan,
                'transaksi'     => 'Penjualan'
            ],
            [
                'id_jurnal'     => $id_jurnalK,
                'tanggal'       => $newDate,
                'id_akun'       => 113,
                'nominal'       => $total_hpp,
                'posisi'        => 'k',
                'debet'         => 0,
                'kredit'        => $total_hpp,
                'reff'          => $id_penjualan,
                'transaksi'     => 'Penjualan'
            ],
        ];

        $this->jurnalModel->createOrderJurnal($jurnal2);

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

    public function addChart()
    {
        $id_penjualan       = $this->penjualanModel->code_penjualan_ID();
        $newDate            = date("Y-m-d");
        $id_produk               = $this->request->getPost('id_produk');
        $id_customer               = $this->request->getPost('id_customer');
        $jumlah_jual            = $this->request->getPost('jumlah_jual');
        $harga_satuan           = $this->request->getPost('harga_satuan');

        $jumlah_data = $this->penjualanModel->getCountData($id_penjualan);

        // dd($jumlah_data);

        if ($jumlah_data == 0) {

            $data_penjualan = array(
                'id_penjualan'                  => $id_penjualan,
                'id_customer'                   => $id_customer,
                'tanggal_penjualan'             => $newDate,
            );

            $this->penjualanModel->createPenjualan($data_penjualan);

            $data_detail_penjualan = array(
                'id_penjualan'          => $id_penjualan,
                'id_produk'             => $id_produk,
                'id_customer'           => $id_customer,
                'harga_satuan'          => $harga_satuan,
                'jumlah_jual'           => $jumlah_jual,
            );

            $this->penjualanModel->createDetailPenjualan($data_detail_penjualan);
        } else {
            $data_detail_penjualan = array(
                'id_penjualan'          => $id_penjualan,
                'id_produk'             => $id_produk,
                'id_customer'           => $id_customer,
                'harga_satuan'          => $harga_satuan,
                'jumlah_jual'           => $jumlah_jual,
            );

            $this->penjualanModel->createDetailPenjualan($data_detail_penjualan);
        }

        session()->setFlashdata('success', 'Data barang Berhasil Ditambahkan ke Chart');
        return redirect()->to('/home/detail/' . $id_produk);
    }
}
