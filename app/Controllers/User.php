<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $validation;
    protected $userModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->userModel = new UserModel();
    }


    public function index()
    {
        $data = [
            'title'                 => 'Data User',
            'user'                 => $this->userModel->getUser(),
        ];
        return view('user/index', $data);
    }
    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data User',
        ];
        return view('user/create', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data User',
        ];

        $fileUser = $this->request->getFile('image');
        $fileUser->move('assets_login/images');
        $gambar = $fileUser->getName();

        $data = array(
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'password' => $this->request->getPost('password'),
            'kelompok' => $this->request->getPost('kelompok'),
            'image' => $gambar,
        );
        // dd($data);
        $this->userModel->createUser($data);
        session()->setFlashdata('success', 'Data User Berhasil Ditambahkan');
        return redirect()->to('/user');
    }

    public function aktif()
    {
        $id_user = $this->request->getPost('id_user');
        $data = array(
            'aktif' => '1',
        );
        // dd($id_user);
        $this->userModel->updateUser($data, $id_user);
        session()->setFlashdata('success', 'Data User Berhasil Di-Aktifkan');
        return redirect()->to('/user');
    }

    public function nonaktif()
    {
        $id_user = $this->request->getPost('id_user');
        $data = array(
            'aktif' => '0',
        );
        // dd($id_user);
        $this->userModel->updateUser($data, $id_user);
        session()->setFlashdata('success', 'Data User Berhasil Di-NonAktifkan');
        return redirect()->to('/user');
    }

    // public function edit($id_produk)
    // {
    //     $data = [
    //         'title'                 => 'Edit Data Produk',
    //         'produk'              => $this->produkModel->where('id_produk', $id_produk)->first()
    //     ];
    //     $this->validation->setRules(['nama_produk' => 'required']);
    //     $isDataValid = $this->validation->withRequest($this->request)->run();

    //     if ($isDataValid) {
    //         $data = array(
    //             'nama_produk' => $this->request->getPost('nama_produk'),
    //             'jenis_produk' => $this->request->getPost('jenis_produk'),
    //             'harga' => $this->request->getPost('harga'),
    //             'deskripsi' => $this->request->getPost('deskripsi'),
    //             'stok' => $this->request->getPost('stok'),
    //         );
    //         $this->produkModel->updateProduk($data, $id_produk);
    //         session()->setFlashdata('success', 'Data Produk Berhasil Diubah');

    //         return redirect()->to('/produk');
    //     }

    //     return view('produk/edit_data_produk', $data);
    // }

    // public function delete()
    // {
    //     $id = $this->request->getPost('id_produk');
    //     $this->produkModel->deleteProduk($id);
    //     session()->setFlashdata('success', 'Data Produk Berhasil Dihapus');

    //     return redirect()->to('/produk');
    // }
}
