<?php

namespace App\Controllers;

use \App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $validation;
    protected $produkModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Produk',
            'class'                 => 'active',
            'produk'                => $this->produkModel->getProduk(),
        ];
        return view('produk/view_data_produk', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Produk',
            'id_produk'           => $this->produkModel->code_produk_ID(),
        ];
        return view('produk/add_data_produk', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data Produk',
            'id_produk'           => $this->produkModel->code_produk_ID(),
        ];
        $this->validation->setRules($this->produkModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        $fileProduct = $this->request->getFile('product_image');
        $fileProduct->move('assets/images/product');
        $ProductName = $fileProduct->getName();

        if ($isDataValid) {
            $data = array(
                'id_produk' => $this->produkModel->code_produk_ID(),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'jenis_produk' => $this->request->getPost('jenis_produk'),
                'harga' => $this->request->getPost('harga'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'product_image' => $ProductName,
                'stok' => $this->request->getPost('stok'),
            );
            $this->produkModel->createProduk($data);
            session()->setFlashdata('success', 'Data Produk Berhasil Ditambahkan');
            return redirect()->to('/produk');
        } else {
            $data['validation'] = $this->validation;
            return view('produk/add_data_produk', $data);
        }
    }

    public function edit($id_produk)
    {
        $data = [
            'title'                 => 'Edit Data Produk',
            'produk'              => $this->produkModel->where('id_produk', $id_produk)->first()
        ];
        $this->validation->setRules(['nama_produk' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'nama_produk' => $this->request->getPost('nama_produk'),
                'jenis_produk' => $this->request->getPost('jenis_produk'),
                'harga' => $this->request->getPost('harga'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'stok' => $this->request->getPost('stok'),
            );
            $this->produkModel->updateProduk($data, $id_produk);
            session()->setFlashdata('success', 'Data Produk Berhasil Diubah');

            return redirect()->to('/produk');
        }

        return view('produk/edit_data_produk', $data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id_produk');
        $this->produkModel->deleteProduk($id);
        session()->setFlashdata('success', 'Data Produk Berhasil Dihapus');

        return redirect()->to('/produk');
    }
}
