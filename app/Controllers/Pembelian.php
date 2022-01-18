<?php

namespace App\Controllers;

use \App\Models\PembelianModel;
use \App\Models\ProdukModel;
use App\Models\SupplierModel;

class Pembelian extends BaseController
{
    protected $validation;
    protected $session;
    protected $pembelianModel;
    protected $produkModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->pembelianModel = new PembelianModel();
        $this->produkModel = new ProdukModel();
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Pembelian',
            'pembelian'             => $this->pembelianModel->getPembelian(),
        ];
        return view('pembelian/view_data_pembelian', $data);
    }

    public function add()
    {
        $data = [
            'title'                       => 'Tambah Data Pembelian',
            'id_pembelian'                => $this->pembelianModel->code_pembelian_ID(),
            'supplier'                    => $this->supplierModel->getSupplier(),
        ];
        $this->validation->setRules(['tanggal' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data_session = array(
                'id_pembelian'                      => $this->pembelianModel->code_pembelian_ID(),
                'id_supplier'                       => $this->request->getPost('id_supplier'),
                'tanggal'                           => $this->request->getPost('tanggal'),
            );
            $this->session->set($data_session);
            return redirect()->to('/pembelian/addDetail');
        }
        return view('pembelian/add_data_pembelian', $data);
    }

    public function addDetail()
    {
        $id_pembelian       = $this->session->get("id_pembelian");
        $id_supplier        = $this->session->get("id_supplier");
        $tanggal            = $this->session->get("tanggal");
        $originalDate       = $tanggal;
        $newDate            = date("Y-m-d", strtotime($originalDate));

        $data = [
            'title'                         => 'Tambah Data Detail Pembelian',
            'produk'                         => $this->produkModel->getProduk(),
            'detail_pembelian'              => $this->pembelianModel->getDetailPembelian($id_pembelian),
        ];

        $this->validation->setRules(['jumlah_beli' => 'required']);
        $isDataValid            = $this->validation->withRequest($this->request)->run();
        $id_produk               = $this->request->getPost('id_produk');

        $jumlah_beli            = $this->request->getPost('jumlah_beli');
        $harga_satuan           = $this->request->getPost('harga_satuan');

        if ($isDataValid) {
            $stok = $this->produkModel->getTotalStok($id_produk);
            $total = $stok + $jumlah_beli;
            $jumlah_data = $this->pembelianModel->getCountData($id_pembelian);

            // dd($jumlah_data);

            if ($jumlah_data == 0) {

                $data_pembelian = array(
                    'id_pembelian'                  => $id_pembelian,
                    'id_supplier'                   => $id_supplier,
                    'tanggal_pembelian'             => $newDate,
                    'status'                        => 'Butuh Approve',
                );

                $this->pembelianModel->createPembelian($data_pembelian);

                $update_stok = array(
                    'stok' => $total,
                );
                $this->produkModel->updateProduk($update_stok, $id_produk);

                $data_detail_pembelian = array(
                    'id_pembelian'          => $id_pembelian,
                    'id_produk'              => $id_produk,
                    'id_supplier'           => $id_supplier,
                    'harga_satuan'          => $harga_satuan,
                    'jumlah_beli'           => $jumlah_beli,
                );
                $this->pembelianModel->createDetailPembelian($data_detail_pembelian);
            } else {
                $update_stok = array(
                    'stok' => $total,
                );
                $this->produkModel->updateProduk($update_stok, $id_produk);

                $data_detail_pembelian = array(
                    'id_pembelian'          => $id_pembelian,
                    'id_produk'              => $id_produk,
                    'id_supplier'           => $id_supplier,
                    'harga_satuan'          => $harga_satuan,
                    'jumlah_beli'           => $jumlah_beli,
                );

                $this->pembelianModel->createDetailPembelian($data_detail_pembelian);
            }

            session()->setFlashdata('success', 'Data Pembelian Berhasil Ditambahkan');
            return redirect()->to('/pembelian/addDetail');
        }

        return view('pembelian/add_data_detail_pembelian', $data);
    }

    public function fetch_harga()
    {
        $id_produk      = $this->request->getPost('id_produk_pembelian');
        $harga          = $this->pembelianModel->getHargaProduk($id_produk);

        echo json_encode($harga);
    }

    public function selesai()
    {
        unset($_SESSION['id_pembelian']);
        unset($_SESSION['id_supplier']);
        unset($_SESSION['tanggal']);
        session()->setFlashdata('success', 'Data Pembelian Berhasil Disimpan');
        return redirect()->to('/pembelian');
    }

    public function detail($id_pembelian)
    {
        $data = [
            'title'                 => 'Data Detail Pembelian',
            'detail_pembelian'      => $this->pembelianModel->getDetailPembelian($id_pembelian)
        ];
        return view('pembelian/view_data_detail_pembelian', $data);
    }

    public function deleteDetail()
    {
        $id_detail_pembelian = $this->request->getPost('id_detail_pembelian');
        $this->pembelianModel->deleteDetailPembelian($id_detail_pembelian);
        session()->setFlashdata('success', 'Data Keranjang Berhasil Dihapus');

        return redirect()->to('/pembelian/addDetail');
    }

    public function approve()
    {
        $data = [
            'title'                 => 'Data Pembelian',
            'pembelian'             => $this->pembelianModel->getPembelianApprove(),
        ];
        return view('pembelian/view_data_pembelian', $data);
    }

    public function updateApprove($id_pembelian)
    {
        $data = array(
            'status' => 'Approve',
        );
        // dd($id_pembelian);
        $this->pembelianModel->updatePembelian($data, $id_pembelian);
        session()->setFlashdata('success', 'Data Pembelian Approved');
        return redirect()->to('pembelian/approve');
    }
}
